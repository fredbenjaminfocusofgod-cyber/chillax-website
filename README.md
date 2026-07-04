# Chillax Hotel and Spa - Website 🌿

A complete hotel booking and management system for Chillax Hotel and Spa featuring premium accommodation, spa services, and VIP experiences.

## 🎨 Brand Colors

- **Primary:** Burgundy/Maroon (#8B3A3A)
- **Secondary:** Gold/Yellow (#D4AF37)
- **Accent:** Green (#6B8E23)
- **Light:** White/Off-white (#F5F5F5)
- **Dark:** Dark Gray (#2C2C2C)

## ✨ Features

### Frontend
✅ Responsive design (mobile-friendly)
✅ Image gallery with hover effects
✅ Online booking form with validation
✅ Contact form for inquiries
✅ Testimonials section with ratings
✅ Dynamic pricing display
✅ Smooth animations & transitions

### Backend
✅ Admin authentication & login
✅ Gallery image upload & management
✅ Booking management system
✅ Testimonials approval workflow
✅ Contact message handling
✅ Email notifications
✅ Database-driven content

### Services
✅ Accommodation (Standard & Deluxe)
✅ Massage & Therapy
✅ Spa Services
✅ VIP Lounge Access
✅ Premium amenities

## 📁 File Structure

```
chillax-website/
├── index.php                 # Home page
├── css/
│   ├── style.css            # Main styles with Chillax colors
│   └── responsive.css       # Mobile responsive styles
├── js/
│   └── main.js              # JavaScript functionality
├── includes/
│   ├── db.php               # Database connection
│   ├── functions.php        # Helper functions
│   ├── header.php           # Header navigation
│   └── footer.php           # Footer
├── admin/
│   ├── login.php            # Admin authentication
│   ├── dashboard.php        # Admin dashboard
│   ├── gallery.php          # Gallery management
│   └── admin.css            # Admin styles
├── handlers/
│   ├── booking_handler.php  # Process bookings
│   ├── contact_handler.php  # Process contact forms
│   ├── get_gallery.php      # Fetch gallery images
│   ├── get_testimonials.php # Fetch testimonials
│   └── get_pricing.php      # Fetch pricing
├── database/
│   └── schema.sql           # Database schema
└── README.md                # This file
```

## 🚀 Quick Start

### 1. Database Setup

```bash
mysql -u root -p
CREATE DATABASE chillax_hotel;
USE chillax_hotel;
SOURCE database/schema.sql;
```

### 2. Configuration

Edit `includes/db.php` with your database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_NAME', 'chillax_hotel');
```

### 3. Create Upload Directory

```bash
mkdir -p uploads/gallery
chmod 755 uploads/gallery
```

### 4. Admin Login

**URL:** `http://localhost/chillax-website/admin/login.php`
- **Username:** admin
- **Password:** admin123

⚠️ **IMPORTANT:** Change the admin password immediately after first login!

## 🔑 Admin Credentials

```
Username: admin
Password: admin123
```

## 📋 Database Tables

### admin_users
Stores admin user credentials with password hashing

### gallery
Stores uploaded images for the gallery section

### bookings
Stores customer booking requests

### testimonials
Stores customer reviews (requires approval)

### pricing
Stores service pricing and features

### contact_messages
Stores inquiry messages from contact form

## 📱 Responsive Breakpoints

- **Desktop:** 1200px+
- **Tablet:** 768px - 1199px
- **Mobile:** Below 768px

## 🎯 Key Pages

| Page | URL | Description |
|------|-----|-------------|
| Homepage | `/` | Main landing page |
| Admin Login | `/admin/login.php` | Admin authentication |
| Admin Dashboard | `/admin/dashboard.php` | Admin control panel |
| Gallery Manager | `/admin/gallery.php` | Upload/manage images |

## 📞 Contact Information

- **Phone:** +256756220567
- **Email:** info@chillaxhotel.com
- **Location:** Chillax Hotel and Spa, Uganda
- **Tagline:** "Take Me To The Chillax" - Your Ultimate Relaxation Destination

## 🔒 Security Notes

⚠️ Remember to:
- Change default admin password
- Update database credentials in `db.php`
- Use HTTPS in production
- Set proper file permissions (644 for files, 755 for directories)
- Keep PHP and MySQL updated

## 🎨 Customization

### Colors
Edit the CSS variables in `css/style.css`:

```css
:root {
    --primary-color: #8B3A3A;
    --secondary-color: #D4AF37;
    /* ... */
}
```

### Contact Information
Update in `includes/header.php` and `includes/footer.php`

### Pricing
Add/edit pricing through admin panel or directly in database

## 📝 TODO / Future Features

- [ ] Payment gateway integration (Stripe/PayPal)
- [ ] Advanced booking calendar
- [ ] Multi-language support
- [ ] SMS notifications
- [ ] Advanced analytics dashboard
- [ ] Email template system
- [ ] User account system
- [ ] Review system
- [ ] Promotions/discounts
- [ ] Loyalty program

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript (Vanilla)
- **Backend:** PHP 7.4+
- **Database:** MySQL/MariaDB
- **Server:** Apache/Nginx
- **Design Pattern:** MVC-like structure

## 📄 License

All rights reserved © 2026 Chillax Hotel and Spa

## 🤝 Support

For technical support or questions, contact the development team.

---

**Developed with ❤️ for Chillax Hotel and Spa**
