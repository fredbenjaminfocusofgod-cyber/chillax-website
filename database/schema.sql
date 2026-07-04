-- Database Schema for Chillax Hotel and Spa

CREATE TABLE admin_users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE gallery (
    id INT PRIMARY KEY AUTO_INCREMENT,
    filename VARCHAR(255) NOT NULL,
    alt_text VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bookings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    service VARCHAR(50) NOT NULL,
    checkin DATE NOT NULL,
    checkout DATE NOT NULL,
    guests INT,
    message TEXT,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (email),
    INDEX (status)
);

CREATE TABLE testimonials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    author VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    rating INT DEFAULT 5,
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (status)
);

CREATE TABLE pricing (
    id INT PRIMARY KEY AUTO_INCREMENT,
    service_name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    features TEXT,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    status VARCHAR(20) DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (status)
);

-- Sample Admin User (username: admin, password: admin123)
INSERT INTO admin_users (username, password, email) VALUES
('admin', '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36P4/KFm', 'admin@chillaxhotel.com');

-- Sample Pricing Data
INSERT INTO pricing (service_name, description, price, features, display_order) VALUES
('Accommodation - Standard', 'Comfortable room with basic amenities', 80.00, 'Free WiFi, Air Conditioning, TV, Private Bathroom, Bed & Breakfast', 1),
('Accommodation - Deluxe', 'Luxurious room with premium amenities', 120.00, 'Free WiFi, Air Conditioning, TV, Mini Bar, Premium Toiletries, City View', 2),
('Massage Therapy', 'Professional massage and relaxation', 50.00, '1 Hour Session, Expert Therapist, Aromatherapy, Relaxation Music', 3),
('Full Spa Package', 'Complete spa experience', 150.00, 'Massage, Facial, Body Scrub, Steam Bath, Sauna, Refreshments', 4),
('VIP Lounge Access', 'Exclusive VIP experience', 100.00, 'Free WiFi, Premium Beverages, Snacks, Quiet Environment, Entertainment', 5);
