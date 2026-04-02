# 🍛 SpiceRoute Kitchen – Online Food Ordering System
### PHP + MySQL | Admin Panel + Staff Panel

---

## 📁 Project Structure

```
food_ordering/
├── index.php                    → Redirects to admin login
├── database.sql                 → Full database schema + seed data
│
├── includes/
│   ├── config.php               → DB config, session, helpers
│   └── check_coupon.php         → AJAX coupon validation endpoint
│
├── admin/                       → 🔐 Admin Panel (Full Access)
│   ├── login.php                → Admin login page
│   ├── logout.php
│   ├── header.php               → Sidebar + topbar layout
│   ├── footer.php
│   ├── dashboard.php            → Stats, charts, recent orders
│   ├── orders.php               → All orders with filters & status update
│   ├── order_detail.php         → Full order view + update
│   ├── new_order.php            → POS-style order creation
│   ├── print_order.php          → Printable receipt
│   ├── menu_items.php           → Add / Edit / Delete menu items
│   ├── categories.php           → Manage categories
│   ├── coupons.php              → Coupon management
│   ├── staff.php                → Staff member management
│   ├── customers.php            → Customer directory
│   ├── reports.php              → Revenue & analytics reports
│   └── settings.php             → Restaurant settings
│
└── staff/                       → 👨‍🍳 Staff Panel (Limited Access)
    ├── login.php                → Staff login page
    ├── logout.php
    ├── header.php               → Staff sidebar layout
    ├── footer.php
    ├── dashboard.php            → Staff-specific overview
    ├── orders.php               → View & update all orders
    ├── my_orders.php            → Orders assigned to me (card view)
    ├── order_detail.php         → Order detail + update
    ├── new_order.php            → Staff POS order creation
    ├── menu.php                 → Read-only menu browser
    └── print_order.php          → Print receipt
```

---

## ⚙️ Installation & Setup

### Requirements
- PHP 7.4+ (PHP 8.x recommended)
- MySQL 5.7+ or MariaDB 10.3+
- Apache/Nginx with mod_rewrite enabled
- XAMPP / WAMP / LAMP stack

---

### Step 1 – Copy Project Files

Place the entire `food_ordering/` folder inside your web server root:
- **XAMPP**: `C:/xampp/htdocs/food_ordering/`
- **WAMP**: `C:/wamp64/www/food_ordering/`
- **Linux**: `/var/www/html/food_ordering/`

---

### Step 2 – Create the Database

1. Open **phpMyAdmin** → `http://localhost/phpmyadmin`
2. Click **New** → Name it `food_ordering_db` → Click **Create**
3. Select the new database → Click **Import** tab
4. Choose the file `food_ordering/database.sql` → Click **Go**

✅ This creates all tables and inserts sample data (categories, menu items, coupons, admin + staff users).

---

### Step 3 – Configure Database Connection

Edit `includes/config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // ← your MySQL username
define('DB_PASS', '');           // ← your MySQL password (blank for XAMPP default)
define('DB_NAME', 'food_ordering_db');
define('BASE_URL', 'http://localhost/food_ordering/');
```

---

### Step 4 – Open in Browser

- **Admin Panel**: http://localhost/food_ordering/admin/login.php
- **Staff Panel**: http://localhost/food_ordering/staff/login.php

---

## 🔑 Default Login Credentials

### Admin
| Field    | Value                     |
|----------|---------------------------|
| Email    | admin@foodorder.com       |
| Password | password                  |

### Staff
| Field    | Value                     |
|----------|---------------------------|
| Email    | staff@foodorder.com       |
| Password | password                  |

> ⚠️ **Important**: Change these passwords immediately after first login via the Admin → Staff management page.

> **Note**: The database stores passwords hashed with PHP's `password_hash()`. The default password `password` is stored as its bcrypt hash. If login fails, run this SQL to reset:
> ```sql
> UPDATE users SET password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' WHERE email IN ('admin@foodorder.com','staff@foodorder.com');
> ```

---

## 🎛️ Admin Panel Features

| Feature | Description |
|---------|-------------|
| **Dashboard** | Live stats, weekly revenue chart (Chart.js), top-selling items, recent orders |
| **Orders** | Filter by status, search, inline status update via dropdown |
| **Order Detail** | Full order view, update status/payment/staff assignment, notes |
| **New Order (POS)** | Click-to-add menu, cart management, coupon application, customer details |
| **Menu Items** | Add/Edit/Delete items, toggle availability, filter by category |
| **Categories** | Add/Edit/Delete food categories with item count |
| **Coupons** | Create % or fixed-amount coupons with expiry, usage limits |
| **Staff** | Add/Edit/Delete staff, toggle active/inactive status |
| **Customers** | View all registered customers with order history + spend |
| **Reports** | Date-range revenue reports, daily trend chart, payment breakdown, top items |
| **Settings** | Restaurant name, address, phone, tax rate, delivery charge, hours |
| **Print Receipt** | Auto-print thermal-style receipt for any order |

---

## 👨‍🍳 Staff Panel Features

| Feature | Description |
|---------|-------------|
| **Dashboard** | My active orders, all pending count, my delivery stats |
| **All Orders** | View all orders, update status, self-assign unassigned orders |
| **My Orders** | Card-view of personally assigned orders with quick status update |
| **New Order** | Full POS to create orders (auto-assigned to logged-in staff) |
| **Menu Browser** | Read-only menu view by category |
| **Print Receipt** | Print order slips |

---

## 🗄️ Database Tables

| Table | Description |
|-------|-------------|
| `users` | Admin & staff accounts (role column) |
| `categories` | Food categories |
| `menu_items` | Food items with price, veg/non-veg, availability |
| `customers` | Registered customer accounts |
| `orders` | All orders with status, payment, assignment |
| `order_items` | Line items for each order |
| `coupons` | Discount codes with rules |
| `settings` | Key-value store for restaurant config |

---

## 🔐 Security Notes

- All user inputs are sanitized with `sanitize()` using `htmlspecialchars` + `strip_tags`
- Passwords hashed with `password_hash()` / verified with `password_verify()`
- Session-based authentication with role checks (`requireAdmin()`, `requireStaff()`)
- Admin routes are protected — staff cannot access admin-only pages
- Prepared statements used for login queries to prevent SQL injection

---

## 🎨 Tech Stack

- **Backend**: PHP 8 (procedural, no framework)
- **Database**: MySQL with MySQLi
- **Frontend**: Vanilla HTML/CSS/JavaScript (dark theme)
- **Charts**: Chart.js 4.4
- **Icons**: Font Awesome 6.5
- **Fonts**: Google Fonts (Playfair Display + DM Sans)

---

## 📱 Screenshots Overview

| Page | Theme |
|------|-------|
| Admin Login | Dark, orange/fire gradient |
| Admin Dashboard | Charts, stat cards, order table |
| POS / New Order | Split panel menu browser + cart |
| Staff Login | Dark teal theme |
| My Orders | Kanban-style card view |
| Print Receipt | Monospace thermal receipt style |

---

## 🚀 Extending the System

To add features:
- **Online customer ordering**: Add `customer/` folder with registration, menu browsing, cart (sessions), checkout
- **Real-time updates**: Add AJAX polling or WebSockets for live order notifications
- **Image uploads**: Add `move_uploaded_file()` handling in menu_items.php
- **SMS/Email notifications**: Integrate Twilio or PHPMailer
- **Payment gateway**: Add Razorpay/Stripe integration in checkout

---

*Built with PHP + MySQL | SpiceRoute Kitchen Management System*
