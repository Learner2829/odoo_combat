<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizational Grievance Support System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #f0f0f0;
            --accent-color: #ff9900;
            --text-color: #333333;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-color);
            background-color: #f8f8f8;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        .content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            color: var(--primary-color);
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 10px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .dashboard-item {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .dashboard-item:hover {
            transform: translateY(-5px);
        }

        .dashboard-item h2 {
            color: var(--primary-color);
            margin-top: 0;
        }

        .btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: var(--accent-color);
        }

        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('hero-background.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: var(--accent-color);
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
        }

        .features, .about, .contact, .contact-page {
            padding: 60px 0;
            text-align: center;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .feature-item i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .about p {
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            display: grid;
            gap: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .contact-form textarea {
            height: 150px;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .social-links {
            list-style-type: none;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        .social-links a {
            color: white;
            font-size: 1.2rem;
        }

        .contact-page h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-container {
            display: flex;
            gap: 40px;
            margin-bottom: 40px;
        }

        .contact-info, .contact-form {
            flex: 1;
        }

        .contact-info h2, .contact-form h2, .map-container h2 {
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .info-item i {
            font-size: 1.2rem;
            color: var(--accent-color);
            margin-right: 15px;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group textarea {
            height: 150px;
        }

        .map-container {
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .footer-content {
                flex-direction: column;
                gap: 20px;
            }

            .contact-container {
                flex-direction: column;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
        }

        input, select {
            margin-bottom: 10px;
            padding: 5px;
            width: 200px;
        }

        button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.html" class="logo">OGSS</a>
            <ul class="nav-links">
            <li><a href="adminlogin.php" class="btn-login">Admine-login</a></li>
                <li><a href="log-in.php" class="btn-login">Login</a></li>
                <li><a href="sign-in.php" class="btn-login">Sign-in</a></li>
            </ul>
        </div>
    </nav>

    <header id="home" class="hero">
        <div class="hero-content">
            <h1>Welcome to Odoo</h1>
            <a href="log-in.php" class="btn btn-primary">Get Started</a>
        </div>
    </header>

    <section id="features" class="features">
        <div class="content">
            <h1>Key Features</h1>
            <div class="feature-grid">
                <div class="feature-item">
                    <i class="fas fa-user-shield"></i>
                    <h3>User Management</h3>
                    <p>Efficiently manage user roles and permissions.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-cog"></i>
                    <h3>System Settings</h3>
                    <p>Customize OGSS to fit your organizational needs.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <h3>Analytics</h3>
                    <p>Track and analyze grievance data for informed decision-making.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="content">
            <h1>About OGSS</h1>
            <p>Organizational Grievance Support System (OGSS) is dedicated to providing a robust platform for managing and resolving grievances within organizations.</p>
        </div>
    </section>

    <section id="admin_dashboard" class="dashboard">
        <div class="dashboard-item">
            <h2>Admin Dashboard</h2>
            <p>Manage users, configure system settings, and view analytics.</p>
            <a href="#" class="btn">Manage Users</a>
            <a href="#" class="btn">System Settings</a>
            <a href="#" class="btn">View Analytics</a>
        </div>
    </section>

    <section id="employee_dashboard" class="dashboard">
        <div class="dashboard-item">
            <h2>Employee Dashboard</h2>
            <p>Submit grievances, view submitted grievances, and track resolutions.</p>
            <a href="#" class="btn">Submit Grievance</a>
            <a href="#" class="btn">View Submitted Grievances</a>
            <a href="#" class="btn">Track Resolutions</a>
        </div>
    </section>

    <section id="contact" class="contact">
        <div class="content">
            <h1>Contact Us</h1>
            <div class="contact-container">
                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Address:</strong>
                            <p>123 Example St, City, Country</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <strong>Phone:</strong>
                            <p>+123 456 7890</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email:</strong>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <ul class="social-links">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <form action="#">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
            <p>&copy; 2024 Organizational Grievance Support System. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Optional: Add JavaScript for interactive elements or form validation
    </script>
</body>
</html>
