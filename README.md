# One Stop Soko - Inventory Management Application

One Stop Soko is a Laravel-based application built for small-scale businesses to manage their inventory, sales, supplies, customer requests, and finances through an integrated dashboard. This application is designed with modular features that include role-based access control, transaction tracking, and detailed reporting.

---

## Table of Contents

- [Overview](#overview)
- [Key Features](#key-features)
- [Architecture & Modules](#architecture--modules)
  - [Spartie Roles & Permissions](#spartie-roles--permissions)
  - [Users Module](#users-module)
  - [Supplier Module](#supplier-module)
  - [Supplies Module](#supplies-module)
  - [Clients Module](#clients-module)
  - [Inventory Module](#inventory-module)
  - [Product Categories & Products](#product-categories--products)
  - [Sales Module](#sales-module)
  - [Customer Requests](#customer-requests)
  - [Reports](#reports)
  - [Parameters](#parameters)
  - [Dashboard](#dashboard)
  - [Wallet & Transactions](#wallet--transactions)
  - [Employee Module](#employee-module)
- [Installation & Setup](#installation--setup)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## Overview

One Stop Soko is an end-to-end inventory and sales management system that helps business owners keep track of:
- **Products:** Their details, categories, and inventory levels.
- **Sales:** Tracking each sale, updating inventory, and updating a central wallet.
- **Supplies:** Recording stock purchases, which increase inventory and reduce available funds.
- **Users and Roles:** Managing access via Spartie roles and permissions.
- **Reports & Dashboard:** Visualizing key metrics including sales trends, supply expenses, and inventory status.
- **Employee Management:** Tracking employee salaries, payments, and related wallet balances.

The system is built on Laravel and leverages modern best practices for data integrity, scalability, and modularity.

---

## Key Features

- **Spartie Roles and Permissions:** Granular control over user access and actions within the app.
- **Users Module:** Manage users and link them with roles/permissions for secure access.
- **Supplier Management:** Maintain records of suppliers who provide products.
- **Supplies Management:** When purchasing stock, update the product quantity and automatically deduct the purchase cost from the wallet.
- **Clients Management:** Manage customer data who purchase products.
- **Inventory Overview:** Quickly view products and their quantities in stock.
- **Product Categories & Products:** Organize and manage all product-related details.
- **Sales Module:** Process client sales that decrement product quantity and add funds to the wallet.
- **Customer Requests:** Capture requests for products that are not currently in inventory.
- **Reports:** Generate visual reports for sales, supplies, and other critical metrics.
- **Parameters:** Configure permissions, roles, and assign users to their respective roles.
- **Dashboard:** Real-time visualization of the app’s key metrics and activities.
- **Wallet:** Track the current available funds by adjusting for sales (increases) and supplies (decreases).
- **Transactions:** Log every sale and supply as a transaction for audit purposes.
- **Employee Management:** Record employee details, manage salary information, and track wallet balances for salary disbursements.

---

## Architecture & Modules

### Spartie Roles & Permissions

- **Description:** Integrates Spartie (or a similar roles and permissions package) to manage access rights.
- **Implementation:** Each user is assigned a role with specific permissions. These roles determine which parts of the app the user can access.

### Users Module

- **Description:** Manages application users.
- **Integration:** Tied to Spartie roles and permissions to enforce access control.

### Supplier Module

- **Description:** Tracks suppliers who provide products.
- **Key Fields:** Supplier name, contact information, ratings, and payment terms.

### Supplies Module

- **Description:** Records purchases of stock.
- **Behavior:** On creation, the module increments product quantity and reduces the wallet balance.
- **Key Process:** After a supply record is created, a wallet transaction is generated to deduct the cost.

### Clients Module

- **Description:** Manages customer records.
- **Key Features:** Captures customer details and maintains purchase histories.

### Inventory Module

- **Description:** Provides a quick overview of available products and their quantities.
- **Key Features:** Real-time stock updates and searchable product listings.

### Product Categories & Products

- **Product Categories:** Organizes products into logical groups.
- **Products:** Contains detailed product information including SKU, description, price, cost, and current stock levels.

### Sales Module

- **Description:** Handles client purchases.
- **Behavior:** On processing a sale, product quantity is decremented and the wallet balance is increased by the sale amount.
- **Integration:** Each sale is linked to clients, products, and the user who made the sale.

### Customer Requests

- **Description:** Allows customers to request products that are not currently in inventory.
- **Usage:** Provides insights into potential new stock items.

### Reports

- **Description:** Generates detailed visualizations and metrics.
- **Key Reports:** Sales trends (daily, weekly, monthly, quarterly, yearly), supply expenses, inventory status, top-selling products, and client purchase patterns.

### Parameters

- **Description:** Configuration settings for roles, permissions, and other operational parameters.
- **Usage:** Allows administrators to manage and update system configurations without code changes.

### Dashboard

- **Description:** A central hub for visualizing current operational metrics.
- **Key Metrics:** Wallet balance, recent sales, pending customer requests, inventory status, and employee metrics.

### Wallet & Transactions

- **Wallet:** Maintains the current available funds.
- **Transactions:** Logs every financial change including sales (inflows) and supplies (outflows).  
- **Adjustment Process:** Updates the wallet balance automatically upon creating or updating sale or supply records.

### Employee Module

- **Description:** Manages employee details, including salary information.
- **Behavior:** Displays salary, tracks payments, and updates employee-related wallet balances.

---

## Installation & Setup

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/yourusername/onestopsoko.git
   cd onestopsoko
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan storage:link
   php artisan serve
   ```

# Usage

- **Access the Dashboard:**  
  Log in with your user credentials. The dashboard provides an overview of sales, supplies, wallet balance, and more.

- **Manage Entities:**  
  Use the sidebar navigation to manage Users, Suppliers, Clients, Products, Sales, and Supplies.

- **Process Sales and Supplies:**  
  - When a sale is processed, the system deducts the sold quantity from Inventory and adds the sale amount to the Wallet.
  - When supplies are recorded, the Inventory increases accordingly while the Wallet balance is decreased.

- **Generate Reports:**  
  Access the Reports module to view visual trends and detailed metrics for your operations.

- **Role Management:**  
  Administrators can update roles and permissions via the Parameters module to control access across the app.

- **Employee Management:**  
  Track employee salaries, payment dates, and related wallet adjustments.

---

# Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create your feature branch:
   ```bash
   git checkout -b feature/my-new-feature
3. Make your changes.
4. Commit your changes:
   ```bash
   git add .
   git commit -m "My new feature"
5. Push your changes:
    ```bash
    git push origin feature/my-new-feature


# Contact
- For questions or support, please contact:

- Email: nickforbizz@gmail.com
- Twitter: @wainaina_nik
- linkedin: https://www.linkedin.com/in/wainaina-nik
- Website: onestopsoko.supertechnomads.com
   



