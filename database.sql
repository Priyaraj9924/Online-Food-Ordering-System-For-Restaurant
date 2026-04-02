-- ============================================
-- Online Food Ordering System - Database Schema
-- ============================================

CREATE DATABASE IF NOT EXISTS food_ordering_db;
USE food_ordering_db;

-- Users Table (Admin & Staff)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff') DEFAULT 'staff',
    phone VARCHAR(20),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Categories Table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Menu Items Table
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    is_veg TINYINT(1) DEFAULT 1,
    status ENUM('available', 'unavailable') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- Customers Table
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Orders Table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    customer_name VARCHAR(100),
    customer_phone VARCHAR(20),
    delivery_address TEXT,
    total_amount DECIMAL(10,2) NOT NULL,
    discount DECIMAL(10,2) DEFAULT 0,
    tax DECIMAL(10,2) DEFAULT 0,
    final_amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('cash', 'online', 'card') DEFAULT 'cash',
    payment_status ENUM('pending', 'paid') DEFAULT 'pending',
    order_status ENUM('pending', 'confirmed', 'preparing', 'out_for_delivery', 'delivered', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    assigned_staff INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL,
    FOREIGN KEY (assigned_staff) REFERENCES users(id) ON DELETE SET NULL
);

-- Order Items Table
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    menu_item_id INT,
    item_name VARCHAR(150) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_item_id) REFERENCES menu_items(id) ON DELETE SET NULL
);

-- Coupons Table
CREATE TABLE coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    discount_type ENUM('percentage', 'fixed') DEFAULT 'percentage',
    discount_value DECIMAL(10,2) NOT NULL,
    min_order DECIMAL(10,2) DEFAULT 0,
    max_uses INT DEFAULT 100,
    used_count INT DEFAULT 0,
    expiry_date DATE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Settings Table
CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) UNIQUE NOT NULL,
    setting_value TEXT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================
-- Default Data
-- ============================================

-- Admin User (password: admin123)
INSERT INTO users (name, email, password, role) VALUES 
('Super Admin', 'admin@foodorder.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');
INSERT INTO users (name, email, password, role) VALUES 
('Priyarajsinh', 'priyaraj@foodorder.com', 'Priyaraj#9924', 'admin');

-- Staff User (password: staff123)
INSERT INTO users (name, email, password, role, phone) VALUES 
('John Staff', 'staff@foodorder.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'staff', '9876543210');
INSERT INTO users (name, email, password, role, phone) VALUES 
('Rachna Patel', 'Rachna@foodorder.com', 'Rachna@123', 'staff', '8454853400');
INSERT INTO users (name, email, password, role, phone) VALUES 
('Riyaz Shaikh', 'Riyaz@foodorder.com', 'Riyaz@123', 'staff Incharge', '7874157100');
INSERT INTO users (name, email, password, role, phone) VALUES 
('Santosh Kumar', 'Santosh@foodorder.com', 'Santosh@123', 'staff', '8600115400');

-- Categories
INSERT INTO categories (name, description) VALUES
('Starters', 'Delicious appetizers to kick off your meal'),
('Main Course', 'Hearty and fulfilling main dishes'),
('Burgers & Sandwiches', 'Fresh handcrafted burgers and sandwiches'),
('Pizza', 'Wood-fired artisan pizzas'),
('Desserts', 'Sweet treats to end your meal'),
('Beverages', 'Refreshing drinks and juices');

-- Menu Items
INSERT INTO menu_items (category_id, name, description, price, is_veg) VALUES
(1, 'Veg Spring Rolls', 'Crispy rolls stuffed with mixed vegetables', 149.00, 1),
(1, 'Chicken Wings', 'Spicy glazed chicken wings with dip', 249.00, 0),
(1, 'Paneer Tikka', 'Marinated cottage cheese grilled to perfection', 199.00, 1),
(2, 'Butter Chicken', 'Creamy tomato-based chicken curry', 329.00, 0),
(2, 'Dal Makhani', 'Slow-cooked black lentils in rich gravy', 249.00, 1),
(2, 'Veg Biryani', 'Fragrant basmati rice with vegetables', 279.00, 1),
(3, 'Classic Burger', 'Beef patty with fresh veggies and sauce', 199.00, 0),
(3, 'Veg Burger', 'Crispy veggie patty with fresh toppings', 159.00, 1),
(4, 'Margherita Pizza', 'Classic tomato sauce with mozzarella', 299.00, 1),
(4, 'Pepperoni Pizza', 'Loaded with pepperoni and cheese', 399.00, 0),
(5, 'Chocolate Lava Cake', 'Warm chocolate cake with molten center', 149.00, 1),
(5, 'Gulab Jamun', 'Soft milk dumplings in sugar syrup', 99.00, 1),
(6, 'Fresh Lime Soda', 'Chilled lime soda with mint', 79.00, 1),
(6, 'Mango Lassi', 'Creamy yogurt mango drink', 99.00, 1);

-- Settings
INSERT INTO settings (setting_key, setting_value) VALUES
('restaurant_name', 'SpiceRoute Kitchen'),
('restaurant_address', '123 Food Street, Vadodara, Gujarat'),
('restaurant_phone', '+91 98765 43210'),
('restaurant_email', 'info@spiceroute.com'),
('tax_rate', '5'),
('delivery_charge', '40'),
('currency', '₹'),
('opening_time', '10:00'),
('closing_time', '23:00');

-- Sample Coupon
INSERT INTO coupons (code, discount_type, discount_value, min_order, expiry_date) VALUES
('WELCOME20', 'percentage', 20, 300, '2026-06-31'),
('FLAT50', 'fixed', 50, 200, '2026-01-01');
