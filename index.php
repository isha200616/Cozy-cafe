<?php
require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cozy Cafe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f1e4;
            color: #333;
        }
        
        .bg-brown {
            background-color: #6b4f4f !important;
        }
        
        .navbar-brand,
        .nav-link,
        .footer-text {
            color: #fff !important;
        }
        
        .navbar-nav .nav-link.active {
            text-decoration: underline;
        }
        
        .header-section {
            background-color: #6b4f4f;
            color: #fff;
            padding: 30px 0 20px 0;
            text-align: center;
        }
        
        .header-section h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }
        
        .menu-card img {
            height: 220px;
            object-fit: cover;
        }
        
        .about-section,
        .contact-section {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            padding: 30px;
            margin-bottom: 40px;
        }
        
        footer {
            background-color: #6b4f4f;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-brown">
        <div class="container">
            <!-- Logo on the left, circular and smaller -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="image/logo.png" alt="Cozy Cafe Logo" class="rounded-circle" style="height: 80px; width: 80px; object-fit: cover;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- Trigger Menu modal -->
                        <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#menuModal">Menu</a>
                    </li>
                    <li class="nav-item">
                        <!-- Trigger About modal -->
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">About Us</a>
                    </li>
                    <li class="nav-item">
                        <!-- Trigger Contact modal -->
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact</a>
                    </li>
                </ul>
                <!-- Sign In Button -->
                <button class="btn btn-outline-light ms-3" data-bs-toggle="modal" data-bs-target="#signInModal">Sign In</button>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section class="header-section">
        <div class="container">
            <h1>Welcome to Cozy Cafe</h1>
            <p>Your perfect spot for coffee and snacks!</p>
        </div>
    </section>

    <!-- Image Carousel -->
    <div id="cafeCarousel" class="carousel slide container my-5" data-bs-ride="carousel">
        <div class="carousel-inner rounded shadow">
            <div class="carousel-item active">
                <img src="image/cofee.jpg" class="d-block w-100" alt="Coffee">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Coffee</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/cake.jpg" class="d-block w-100" alt="Cake">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cake</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/sandwich.jpg" class="d-block w-100" alt="Sandwich">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sandwich</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/menu.jpeg" class="d-block w-100" alt="Menu">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Menu</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#cafeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#cafeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Menu Modal -->
    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-brown">
                    <h5 class="modal-title text-white" id="menuModalLabel">Our Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="image/menu.jpeg" class="img-fluid rounded shadow mb-3" alt="Menu">
                    <p class="mt-2">Explore our delicious offerings!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us Modal -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-0" style="border-radius: 18px; overflow: hidden;">
                <div class="modal-header bg-brown" style="border-bottom: none;">
                    <h5 class="modal-title text-white" id="aboutModalLabel">About Us</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center p-0" style="background: url('image/bg.jpg') center center / cover no-repeat;min-width: 500px; min-height: 500px;">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(107, 79, 79, 0.55);">
                        <div class="text-white text-center px-4 py-5" style="max-width: 700px; font-size: 1.3rem; font-weight: 400; border-radius: 12px;">
                            Cozy Cafe is your neighborhood spot for great coffee, fresh snacks, and a relaxing atmosphere. We pride ourselves on using high-quality ingredients and providing friendly service. Whether you're meeting friends, working, or just taking a break, Cozy Cafe
                            is the perfect place to unwind.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-brown">
                    <h5 class="modal-title text-white" id="contactModalLabel">Contact</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <strong>Email:</strong> cozycafe@example.com<br>
                        <strong>Phone:</strong> 987654321<br>
                        <strong>Address:</strong> Lalpur, Ranchi
                    </p>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Type your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-brown bg-brown text-white">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign In Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" aria-labelledby="signInModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-brown">
                    <h5 class="modal-title text-white" id="signInModalLabel">Sign In</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="signin-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="signin-email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signin-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signin-password" placeholder="Enter your password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="link-secondary small">Forgot password?</a>
                        </div>
                        <button type="submit" class="btn bg-brown text-white w-100">Sign In</button>
                    </form>
                    <div class="text-center mt-3">
                        <span class="text-secondary">New user?</span>
                        <a href="#" class="link-primary ms-1" data-bs-toggle="modal" data-bs-target="#signUpModal" data-bs-dismiss="modal">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-brown">
                    <h5 class="modal-title text-white" id="signUpModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="signup-name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="signup-name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="signup-email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signup-password" placeholder="Create a password" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="signup-confirm-password" placeholder="Confirm your password" required>
                        </div>
                        <button type="submit" class="btn bg-brown text-white w-100">Sign Up</button>
                    </form>
                    <div class="text-center mt-3">
                        <span class="text-secondary">Already have an account?</span>
                        <a href="#" class="link-primary ms-1" data-bs-toggle="modal" data-bs-target="#signInModal" data-bs-dismiss="modal">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="footer-text mb-1">Contact us: cozycafe@example.com | Phone: 987654321</p>
            <p class="footer-text mb-0">&copy; 2025 Cozy Cafe. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>