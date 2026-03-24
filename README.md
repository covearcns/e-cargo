# E-Cargo - E-Comm Cargo Specialist Inc.

A responsive, professional data-entry web application for cargo shipment and transaction management.

## Tech Stack
- Apache
- PHP (Procedural)
- MySQL
- Bootstrap 5
- HTML5/CSS3

## Features
- User authentication with role-based access control (Admin, Encoder, Viewer)
- Shipment management (CRUD operations)
- Transaction entry with dynamic dropdown and auto-loading details
- Auto-generated tracking numbers and shipment IDs
- Responsive design (desktop, tablet, mobile)
- Paginated and searchable listings
- Dashboard with summary counts

## Installation

### Prerequisites
- XAMPP (Apache + MySQL + PHP)
- Git

### Setup Instructions

1. Clone the repository:
```bash
git clone https://github.com/covearcns/e-cargo.git
cd e-cargo
```

2. Move the project to XAMPP htdocs:
```bash
cp -r e-cargo /path/to/xampp/htdocs/
```

3. Start XAMPP (Apache and MySQL services)

4. Create the database:
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Import `schema.sql` to create all tables

5. Configure database connection:
   - Edit `config/db_config.php` with your MySQL credentials

6. Access the application:
   - http://localhost/e-cargo/index.php

## Default Login Credentials
- **Admin**: username: `admin` | password: `admin123`
- **Encoder**: username: `encoder` | password: `encoder123`
- **Viewer**: username: `viewer` | password: `viewer123`

## Database Tables
- `users` - User accounts with roles
- `shipment` - Shipment records with tracking
- `transaction` - Transaction records linked to shipments

## File Structure
```
e-cargo/
├── config/
│   └── db_config.php
├── models/
│   ├── User.php
│   ├── Shipment.php
│   └── Transaction.php
├── views/
│   ├── login.php
│   ├── dashboard.php
│   ├── shipment_list.php
│   ├── shipment_form.php
│   ├── transaction_list.php
│   ├── transaction_form.php
│   └── user_management.php
├── handlers/
│   ├── auth_handler.php
│   ├── shipment_handler.php
│   └── transaction_handler.php
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
├── schema.sql
├── index.php
└── README.md
```

## License
MIT