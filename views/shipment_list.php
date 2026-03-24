<?php
// Assuming you have a connection to your database already established

// Records per page
$records_per_page = 10;

// Get the current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

// Search functionality
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$search_sql = $search_query ? "WHERE shipment_name LIKE '%$search_query%'" : ''; 

// Fetch total records for pagination
total_records_sql = "SELECT COUNT(*) FROM shipments $search_sql";
total_records_result = mysqli_query($conn, $total_records_sql);
total_records = mysqli_fetch_array($total_records_result)[0];
total_pages = ceil($total_records / $records_per_page);

// Fetch shipments for the current page
$sql = "SELECT * FROM shipments $search_sql LIMIT $start_from, $records_per_page";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Shipment List</title>
</head>
<body>
<div class="container">
    <h1 class="my-4">Shipment List</h1>

    <form class="form-inline mb-3" method="GET" action="">
        <input type="text" class="form-control mr-2" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search by shipment name">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Shipment Name</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['shipment_name']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td><?php echo htmlspecialchars($row['shipment_date']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search_query); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>
</body>
</html>
