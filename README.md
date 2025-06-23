# 📬 Feedback Submission System with Admin Approval

A lightweight, MVC-based **PHP application** that allows users to submit feedback. All feedback submissions are moderated by an admin, who can approve or reject them. Built with **Core PHP**, **MySQL**, and **Bootstrap**.

---

## 🚀 Features

- ✅ User feedback form with **JavaScript & PHP validation**
- ✅ Admin panel to **approve/reject feedback**
- ✅ Display all **approved feedbacks publicly**
- ✅ Built using the **MVC architectural pattern**
- ✅ Clean folder structure and modular codebase
- ✅ Flash messages for submission status

---

## 🛠️ Tech Stack

| Layer     | Technology       |
|-----------|------------------|
| Backend   | PHP (Core PHP)   |
| Frontend  | HTML, CSS, JavaScript, Bootstrap 5 |
| Database  | MySQL            |
| Server    | Apache/Nginx (via XAMPP, WAMP, or LAMP)

---

## 📋 Feedback Fields & Validation Rules

| Field      | Type    | Required | Validation Rules |
|------------|---------|----------|------------------|
| Full Name  | Text    | ✅       | Min 3 characters, alphabets and spaces only |
| Email      | Text    | ✅       | Valid email format, must be unique |
| Rating     | Select  | ✅       | Numeric (1 to 5) |
| Message    | Textarea| ✅       | Max 250 characters; letters, numbers, spaces, punctuation allowed |

---

## 📂 Folder Structure

```
feedback-system/
│
├── assets/              # CSS & JS assets
├── config/              # Database configuration
├── controllers/         # Application logic (MVC Controllers)
├── helpers/              # Helper Functions
├── models/              # Database queries (MVC Models)
├── views/               # HTML UI (MVC Views)
│   ├── layouts/         # Header & Footer templates
│   └── feedback/        # Feedback form, list
│   └── admin/           # Admin login & dashboard
├── index.php            # Entry point
├── .htaccess            # Clean URL routing (optional)
├── feedback.sql         # Database schema
└── README.md
```

---

## 🧪 Installation & Setup

### Prerequisites
- PHP 7.0+
- MySQL 5.6+
- Apache/Nginx (Recommended: XAMPP/WAMP/LAMP stack)

### Steps

1. **Clone or Download**
   ```bash
   git clone https://github.com/Techyrushi/feedback-system.git
   ```

2. **Import Database**
   - Open `phpMyAdmin` or your MySQL CLI
   - Import `feedback.sql` into a database (e.g., `feedback_system`)

3. **Configure Database**
   - Edit `/config/database.php` with your database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'feedback_system');
     ```

4. **Place in Web Root**
   - Copy the project folder into `htdocs/` (XAMPP) or `www/` (WAMP)

5. **Access via Browser**
   ```
   http://localhost/feedback-system/
   ```

---

## 🔐 Admin Panel

- **URL:** `http://localhost/feedback-system/admin/login`
- **Credentials:**
  - **Username:** `admin`
  - **Password:** `Qwerty@123`

---

## 👨‍💻 Usage Guide

### 🔸 Public User:
- Visit the homepage
- Submit feedback through the form
- Gets a success message (pending admin approval)
- Approved feedbacks are shown publicly

### 🔸 Admin:
- Login using credentials
- View all feedback submissions
- Approve or reject any feedback
- Only approved feedback is visible to the public

---

## 📄 SQL Schema (`feedback_system.sql`)

```sql
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    message VARCHAR(250) NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

---

## 💬 Flash Messages

Success and error messages are displayed using **Bootstrap alerts** and disappear automatically after a few seconds.

---

## 👨‍💻 Author

**Rushikesh Chavan**  
Backend & DevOps Developer