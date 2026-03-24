<?php

class Transaction {
    private $conn;
    private $table_name = "transactions";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new transaction
    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (field1, field2, field3) VALUES (:field1, :field2, :field3)";

        $stmt = $this->conn->prepare($query);

        // sanitize
        $data['field1'] = htmlspecialchars(strip_tags($data['field1']));
        $data['field2'] = htmlspecialchars(strip_tags($data['field2']));
        $data['field3'] = htmlspecialchars(strip_tags($data['field3']));

        // bind values
        $stmt->bindParam(':field1', $data['field1']);
        $stmt->bindParam(':field2', $data['field2']);
        $stmt->bindParam(':field3', $data['field3']);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Get all transactions
    public function get_all_transactions() {
        $query = "SELECT * FROM " . $this->table_name . " t JOIN shipments s ON t.shipment_id = s.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get a transaction by ID
    public function get_transaction_by_id($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    // Update a transaction
    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " SET field1 = :field1, field2 = :field2 WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // sanitize
        $data['field1'] = htmlspecialchars(strip_tags($data['field1']));
        $data['field2'] = htmlspecialchars(strip_tags($data['field2']));

        // bind values
        $stmt->bindParam(':field1', $data['field1']);
        $stmt->bindParam(':field2', $data['field2']);
        $stmt->bindParam(':id', $id);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete a transaction
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
