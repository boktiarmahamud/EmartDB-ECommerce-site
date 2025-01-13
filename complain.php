<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  // Redirect to the login page if not logged in
  echo "<script>
        alert('You must log in first.');
        window.location.href = 'login.php'; // Redirect to login page
    </script>";
  // header("Location: login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBN Mart</title>
    <link rel="stylesheet" href="style.css">
    
    
    <style>
        
/* Complaint Form Container */
.complaint-container {
    width: 100%;
    max-width: 1000px; /* Increased max width for larger screens */
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.complaint-container h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Form Labels and Input Fields */
form label {
    font-size: 16px;
    color: #555;
    margin-bottom: 5px;
    display: block;
}

form input[type="text"],
form input[type="email"],
form textarea,
form input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

form textarea {
    resize: vertical;
}

form button.submit-btn {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button.submit-btn:hover {
    background-color: #0056b3;
}

/* Optional Image Preview */
#product_photo {
    padding: 5px;
}

/* Full Width Design for Smaller Screens */
@media (max-width: 768px) {
    .complaint-container {
        width: 100%;
        padding: 15px;
        margin: 20px auto;
    }

    form label,
    form input[type="text"],
    form input[type="email"],
    form textarea,
    form input[type="file"],
    form button.submit-btn {
        font-size: 16px; /* Adjusting font size for smaller screens */
    }
}
        
        
        /* Dropdown Menu Styling */
.profile-dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    top: 100%;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1;
    width: 220px; /* Adjust width as necessary */
}

.profile-dropdown:hover .dropdown-menu {
    display: block;
}


.user-actions {
    display: flex;
    align-items: center; /* Align icons vertically */
    gap: 20px; /* Add some space between the icons */
}

/* Adjust the position of the notification icon */
.notification-link {
    display: flex;
    align-items: center;
    position: relative;
    justify-content: space-between; /* Aligns buttons side by side with space in between */
    gap: 1px; /* Adds space between buttons */
    margin-top: 5px;
    width: 100%; /* Ensure the container spans the full width */
}
}

/* Ensure the notification icon is positioned correctly */
.notification-icon {
    width: 20px;
    height: 20px;
    display: block;
    margin-right: 5px; /* Adjust this margin if needed */
    
}




    
    
    </style>
    
    
    
    
</head>
<body>
    <header>
        <div class="header-top">
            <img src="home/logo.png" alt="SBN Logo" class="logo">
            <nav class="nav-links">
                <a href="profile.php">Home</a>
                <a href="#">Shop</a>
                <a href="#">Order Track</a>
                <a href="help.php">Help & Support</a>
				<a href="complain.php">Complain</a>
            </nav>
			
            <div class="search-bar">
                <input type="text" placeholder="Search products...">
                <button><img src="home/search.png" alt="Search"></button>
            </div>
			
           <div class="user-actions">
                <div class="profile-dropdown">
                    <a href="#" class="profile-link">
                        <img src="home/account.png" alt="Profile"> Profile
                    </a>
                    <div class="dropdown-menu">
                        <a href="manage-account.html">Manage My Account</a>
                        <a href="#">My Orders</a>
                        <a href="#">My Wishlist & Followed Stores</a>
                        <a href="#">My Reviews</a>
                        <a href="#">My Returns & Cancellations</a>
                        <a href="index.php">Logout</a>
                        
                    </div>
                    
                </div>
               
                      <!-- Notification icon added here -->
                    <a href="notifications.php" class="notification-link">
                        <img src="notification.png" alt="Notifications" class="notification-icon">
                    </a>
                <a href="#" class="cart"><img src="home/cart.png" alt="Cart"></a>
               
            </div>

        </div>
        <div class="header-bottom">
			<a href="#" class="all-categories"><img src="home/menu.png" height="15" width="15" style="margin-right:5px">All Categories</a>
			<a href="#"><img src="home/deal.png" height="15" width="15" style="margin-right:5px">Top Deals</a>
			<a href="#"><img src="home/flash.png" height="15" width="15" style="margin-right:5px">Flash Sale</a>
			<a href="categories/computer/computer.php"><img src="home/laptop.png" height="15" width="15" style="margin-right:5px">Computers</a>
			<a href="categories/camera/camera.php"><img src="home/camera.png" height="15" width="15" style="margin-right:5px">Cameras</a>
			<a href="categories/tv/tv.php"><img src="home/monitor.png" height="15" width="15" style="margin-right:5px">TV & Video</a>
			<a href="categories/headphone/headphone.php"><img src="home/headphones.png" height="15" width="15" style="margin-right:5px">Headphones</a>
			<a href="categories/phone/phone.php"><img src="home/phone.png" height="15" width="15" style="margin-right:5px">Phones</a>
			<a href="categories/watch/watch.php"><img src="home/watch.png" height="15" width="15" style="margin-right:5px">Watches</a>
		</div>		
		
		
        
        <
    </header>
    
    <main>
        
        <!-- Check if the complaint was submitted successfully -->
        <?php if (isset($_SESSION['complaint_success']) && $_SESSION['complaint_success'] === true): ?>
            <div class="notification-message">
                Your complaint has been submitted successfully!
            </div>
            <?php unset($_SESSION['complaint_success']); // Clear the success message ?>
        <?php endif; ?>
       
        <div class="complaint-container">
            <h2>Submit a Complaint</h2>
            <form action="complain_submit.php" method="post" enctype="multipart/form-data">
                <label for="username">Your Name:</label>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>

                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="product_photo">Upload Product Photo (optional):</label>
                <input type="file" id="product_photo" name="product_photo" accept="image/*">

                <label for="complaint">Your Complaint:</label>
                <textarea id="complaint" name="complaint" rows="5" placeholder="Describe your issue..." required></textarea>

                <button type="submit" class="submit-btn">Submit Complaint</button>
            </form>
        </div>
    </main>
    
    
    
    <footer class="footer">
    <div class="container">
        <div class="footer-row">
            <div class="footer-column">
                <h3>Popular Categories</h3>
                <ul>
                    <li><a href="tv-home-theater.html">TV & Home Theater</a></li>
                    <li><a href="computers-tablets.html">Computers & Tablets</a></li>
                    <li><a href="cameras-drones.html">Cameras, Camcorders & Drones</a></li>
                    <li><a href="cell-phones.html">Cell Phones</a></li>
                    <li><a href="audio.html">Audio</a></li>
                    <li><a href="video-games.html">Video Games</a></li>
                    <li><a href="movies-music.html">Movies & Music</a></li>
                    <li><a href="car-electronics-gps.html">Car Electronics & GPS</a></li>
                    <li><a href="wearable-technology.html">Wearable Technology</a></li>
                    <li><a href="health-wellness.html">Health & Wellness</a></li>
                    <li><a href="smart-home.html">Smart Home</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Popular Brands</h3>
                <ul>
                    <li><a href="apple.html">Apple</a></li>
                    <li><a href="samsung.html">Samsung</a></li>
                    <li><a href="xiaomi.html">Xiaomi</a></li>
                    <li><a href="dyson.html">Dyson</a></li>
                    <li><a href="hp.html">HP</a></li>
                    <li><a href="sony.html">Sony</a></li>
                    <li><a href="philips.html">Philips</a></li>
                    <li><a href="lg.html">LG</a></li>
                    <li><a href="lenovo.html">Lenovo</a></li>
                    <li><a href="dell.html">Dell</a></li>
                    <li><a href="all-brands.html">All Brands</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="about-us.html">About Us</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                    <li><a href="help-center.html">Help Center</a></li>
                    <li><a href="career.html">Career</a></li>
                    <li><a href="policy.html">Policy</a></li>
                    <li><a href="sitemap.html">Sitemap</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Customer Care</h3>
                <ul>
                    <li><a href="payments.html">Payments</a></li>
                    <li><a href="order-tracking.html">Order Tracking</a></li>
                    <li><a href="product-returns.html">Product Returns</a></li>
                    <li><a href="wishlist.html">Wishlist</a></li>
                    <li><a href="shopping-cart.html">Shopping Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>
            <div class="footer-column newsletter">
                <h3>Newsletter</h3>
                <p>Subscribe to get notified about product launches, special offers, and news.</p>
                <form class="subscribe-form">
                    <input type="email" placeholder="Your Email">
                    <button type="submit">Subscribe</button>
                </form>
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="https://www.facebook.com/mdsozib.mia.5621/"><img src="social/fb.png" height="30" width="30" alt="Facebook" class="social-icon"></a>
                    <a href="#"><img src="social/instagram.png" height="30" width="30" alt="Instagram" class="social-icon"></a>
                    <a href="#"><img src="social/twitter.png" height="30" width="30" alt="Twitter" class="social-icon"></a>
                    <a href="#"><img src="social/linkedin.png" height="30" width="30" alt="LinkedIn" class="social-icon"></a>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>
