# Facebook Clone - Project Setup & Run Guide

## Overview
This is a Facebook-like social media platform built with **PHP**, **MySQL**, and **Bootstrap**. Follow this guide to set up and run the project on your local machine.

---

## 📋 Prerequisites

- **Windows OS** (or any OS with XAMPP support)
- **XAMPP** (Apache, PHP, MySQL)
- **Web Browser** (Chrome, Firefox, Edge, etc.)
- **Text Editor** (VS Code, Notepad++, etc.) - optional

---

## 🚀 Step-by-Step Setup Guide

### **Step 1: Download & Install XAMPP**

1. Go to [Apache Friends - XAMPP](https://www.apachefriends.org/)
2. Click **Download** (choose the latest stable version for Windows)
3. Run the installer:
   - `xampp-windows-x64-X.X.X-installer.exe`
4. Follow the installation wizard:
   - Choose installation location (default: `C:\xampp`)
   - Select components: **Apache**, **MySQL**, **PHP** (should be checked by default)
   - Complete the installation
5. Launch **XAMPP Control Panel**

---

### **Step 2: Verify Project Location**

Make sure the `fb` project folder is in the XAMPP web root:

```
C:\xampp\htdocs\fb\
```

If it's not already there, copy/move the entire `fb` folder to `C:\xampp\htdocs\`.

---

### **Step 3: Start Apache and MySQL**

1. Open **XAMPP Control Panel**
2. Click **Start** next to:
   - **Apache** (should show "Running" in green)
   - **MySQL** (should show "Running" in green)

> ⚠️ If they fail to start, check the logs or try running as Administrator.

---

### **Step 4: Access phpMyAdmin**

1. In your browser, go to:
   ```
   http://localhost/phpmyadmin
   ```
2. You should see the phpMyAdmin dashboard (default login usually has no password)

---

### **Step 5: Create the Database**

#### **Option A: Create a new database manually**

1. In phpMyAdmin, click **New** (left sidebar)
2. Database name: **facebook**
3. Collation: **utf8mb4_general_ci**
4. Click **Create**

---

### **Step 6: Import the Database Structure & Data**

1. In phpMyAdmin, select the **facebook** database (from left sidebar)
2. Click the **Import** tab (top menu)
3. Click **Choose File** and select:
   ```
   C:\xampp\htdocs\fb\DB\facebook_final.sql
   ```
4. Click **Import** button
5. Wait for the import to complete (you should see "Import has been successfully executed")

This creates all the necessary tables:
- `userlist` (users data)
- `postdata` (posts)
- `commentdata` (comments)
- `abusedata` (activity logs)
- Other related tables

---

### **Step 7: Configure Database Connection**

1. Open the file:
   ```
   C:\xampp\htdocs\fb\config.php
   ```
2. Verify/update the connection settings:
   ```php
   <?php
   session_start();
   
   $host = 'localhost';
   $user = 'root';
   $pass = '';              // MySQL root password (usually blank on fresh XAMPP)
   $db   = 'facebook';      // Database name
   $port = 3306;            // Default MySQL port
   
   $con = mysqli_connect($host, $user, $pass, $db, $port);
   
   if (!$con) {
       die('Database connection failed: ' . mysqli_connect_error());
   }
   ```

3. Save the file

> **Note:** If MySQL root has a password, replace `''` with your password on the `$pass` line.

---

### **Step 8: Access the Application**

1. **Main Login Page:**
   ```
   http://localhost/fb/index.php
   ```

2. The login page will display with two options:
   - **Regular User Login** (uses database credentials)
   - **Admin Panel Login** (hard-coded credentials)

---

## 🔐 Login Credentials

### **Admin Panel Login**

Use these hard-coded credentials to access the admin dashboard:

| Field | Value |
|-------|-------|
| **Mobile Number** | `8412003013` |
| **Password** | `admin` |

**How to login as Admin:**
1. Go to `http://localhost/fb/index.php`
2. Enter mobile number: `8412003013`
3. Enter password: `admin`
4. Click **Log in**
5. You will be redirected to the **Admin Dashboard** (`admindashboard.php`)

---

### **Regular User Login**

Users are stored in the `facebook` database in the `userlist` table.

**To create a test user:**
1. Register a new account via: `http://localhost/fb/register.php`
2. Fill in the registration form with:
   - First Name
   - Last Name
   - Mobile Number
   - Date of Birth
   - Gender
   - Password (choose any password)
3. Click **Sign Up**
4. After registration, log in via: `http://localhost/fb/index.php`
   - Mobile Number: (the one you registered)
   - Password: (your chosen password)

---

## 📁 Project Structure

```
C:\xampp\htdocs\fb\
├── index.php                    # Login page (main entry point)
├── register.php                 # User registration
├── dashboard.php                # User dashboard
├── admindashboard.php           # Admin panel
├── profile.php                  # User profile
├── viewpost.php                 # View individual posts
├── postbackend.php             # Post data handling (backend)
├── profile_backend.php         # Profile update handler (backend)
├── notification.php            # Notifications
├── logout.php                  # Logout handler
├── config.php                  # Database configuration ⚙️
├── logo.png                    # Logo image
├── DB/
│   ├── facebook_final.sql      # Complete database structure & data ✅
│   ├── facebook_new.sql
│   ├── facebook.sql
│   └── facebook31-03-2023.sql
├── uploads/                    # User uploaded files (profile pics, etc.)
└── README.md                   # This file
```

---

## ✅ Admin Panel Features

Once logged in as Admin, you can:

1. **View All Users**
   - See total registered users
   - View user details (name, mobile, gender, DOB, etc.)

2. **View Posts**
   - See total posts created
   - View posts count

3. **View Comments**
   - See total comments on posts
   - View comment details

4. **Activity Logs**
   - See reported abuse/suspicious activity
   - Track user activity

---

## 🐛 Troubleshooting

### **Error: "Access denied for user 'root'@'localhost' (using password: NO)"**

**Solution:**
- MySQL root has a password set
- Update `config.php` and add the password to the `$pass` variable
- Or reset the MySQL root password via XAMPP Shell

### **Error: "Connection refused"**

**Solution:**
- Apache or MySQL is not running
- Start both services in the XAMPP Control Panel

### **Database tables not found**

**Solution:**
- Re-import the SQL file:
  1. Open phpMyAdmin
  2. Select `facebook` database
  3. Click **Import**
  4. Choose `DB/facebook_final.sql`
  5. Click **Import**

### **Can't see uploaded files/images**

**Solution:**
- Ensure `uploads/` folder has write permissions
- Right-click `uploads/` folder → Properties → Security → Edit permissions

---

## 🌐 Quick URL Reference

| Page | URL |
|------|-----|
| Login | http://localhost/fb/index.php |
| Register | http://localhost/fb/register.php |
| User Dashboard | http://localhost/fb/dashboard.php |
| Admin Dashboard | http://localhost/fb/admindashboard.php |
| Profile | http://localhost/fb/profile.php |
| phpMyAdmin | http://localhost/phpmyadmin |

---

## 💡 Tips & Best Practices

1. **Session Timeout:**
   - Sessions expire after browser close or manual logout
   - Always log out before ending your session

2. **Database Backup:**
   - Regularly export your data from phpMyAdmin
   - File → Export

3. **Security Notes:**
   - **DO NOT** use these credentials in production
   - Admin credentials are hard-coded (not best practice)
   - SQL queries should use prepared statements to prevent SQL injection

4. **File Uploads:**
   - User profile pictures and posts are stored in the `uploads/` folder
   - Ensure proper folder permissions

---

## 🆘 Need Help?

If you encounter issues:

1. Check the **XAMPP Log Files**:
   - Apache log: `C:\xampp\apache\logs\error.log`
   - MySQL log: `C:\xampp\mysql\data\`

2. Verify XAMPP services are running

3. Check phpMyAdmin connection to database

4. Ensure `config.php` has correct database credentials

---

## ✨ Summary

**Quick Setup Checklist:**
- [ ] Download & install XAMPP
- [ ] Start Apache & MySQL
- [ ] Create `facebook` database in phpMyAdmin
- [ ] Import `facebook_final.sql`
- [ ] Verify `config.php` database settings
- [ ] Visit `http://localhost/fb/index.php`
- [ ] Login with Admin credentials or register as user

**Done!** 🎉 Your Facebook clone is ready to use.

---

**Last Updated:** February 27, 2026
