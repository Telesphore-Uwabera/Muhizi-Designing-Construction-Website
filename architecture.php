<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('admin-panel/includes/config.php');

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Gallery | Muhizi Construction & Design</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="hero_bg_box">
            <img src="images/hero-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid header_top_container">

                    <div class="contact_nav fon">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Nyamirambo, KN 2 AVE
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call : +250 780 620 735
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                muhizidesigningacademy@gmail.com
                            </span>
                        </a>
                        <a href="">
                            <i class="bi bi-clock" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                </svg></i>
                            <span>
                                Mon - Fri 09:00-17:30
                            </span>
                        </a>
                    </div>
                    <div class="social_box">

                    </div>
                </div>
            </div>
            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container">
                        <a class="navbar-brand" href="index">
                            <span class="font-weight-bold">Muhizi Designing & Construction</span>
                        </a>

                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Collapsible Menu -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="architecture">Architectural Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="training">Training</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="service">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- end header section -->
    </div>

    <!-- team section -->

    <section class="team_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Visit Our Architectural Gallery</h2>
                <p>
                    Welcome to our architectural gallery, where innovation and creativity converge in every corner.
                    Explore the beauty of design firsthand, <br>and let our spaces inspire your imagination.
                </p>
            </div>

            <!-- Existing images row (static images you mentioned) -->
            <div class="row">
                <!-- Your existing image boxes go here -->
                <div class="col-lg-3 col-md-6 mx-auto">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/q.jpg" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>Club Rafiki Youth <br>Center Navigation Map</h5>
                        </div>
                    </div>
                </div>
                <!-- Other images here -->
            </div>

            <!-- New Photo Gallery Section (Dynamically fetched images from the gallery table) -->
            <div id="photo-gallery" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <?php

      // Query to select images from the gallery table
      $sql = "SELECT id, caption, image_path FROM gallery";
      $result = $conn->query($sql);

      // Check if any rows are returned
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $caption = htmlspecialchars($row['caption']);
          $imagePath = 'admin-panel/' . htmlspecialchars($row['image_path']);

          echo '
          <div class="gallery-item">
            <img src="' . $imagePath . '" alt="' . $caption . '" class="w-32 h-32 object-cover mx-auto">
            <p class="text-center mt-2">' . $caption . '</p>
          </div>';
        }
      } else {
        echo '<p>No images found in the gallery.</p>';
      }

      // Close the database connection
      $conn->close();
      ?>
            </div>

        </div>
    </section>


    <!-- info section -->
    <section class="info_section">
        <div class="container">
            <!-- Top Section -->
            <div class="info_top">
                <div class="row align-items-center">
                    <!-- Brand and Logo -->
                    <div class="col-md-3 col-sm-6 text-center text-md-start">
                        <a class="navbar-brand" href="index">
                            Muhizi Designing<br> & Construction
                        </a>
                    </div>
                    <!-- Contact Info -->
                    <div class="col-md-5 col-sm-6 text-center text-md-start">
                        <div class="info_contact">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>Nyamirambo, KN AVE 2</span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+250 780 620 735</span>
                            </a>
                        </div>
                    </div>
                    <!-- Logo -->
                    <div class="col-md-4 col-sm-12 text-center">
                        <div class="social_box">
                            <img src="images/logo.png" alt="Company Logo" style="height: 100px; width: 100px;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bottom Section -->
            <div class="info_bottom mt-4">
                <div class="row">
                    <!-- Mission Statement -->
                    <div class="col-lg-3 col-md-6">
                        <div class="info_detail">
                            <h5>Our Mission</h5>
                            <p>
                                Deliver customized solutions with precision and care, emphasizing prompt service and
                                reliability across construction and project management needs.
                            </p>
                        </div>
                    </div>
                    <!-- WhatsApp Link -->
                    <div class="col-lg-3 col-md-6">
                        <div class="info_form">
                            <h5>WhatsApp</h5>
                            <form action="">
                                <button type="submit" class="btn btn-success">
                                    <a class="nav-link text-white" href="https://wa.me/message/PG4P52HZ36YKP1">Chat With
                                        Us</a>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Vision Statement -->
                    <div class="col-lg-4 col-md-6">
                        <div class="info_detail">
                            <h5>Our Vision</h5>
                            <p>
                                Committed to delivering tailored solutions with precision and care, serving as your
                                trusted partner to turn your vision into reality through construction, technology
                                utilization, and project management.
                            </p>
                        </div>
                    </div>
                    <!-- Useful Links -->
                    <div class="col-lg-2 col-md-6">
                        <div class="info_links">
                            <h5>Useful Links</h5>
                            <ul class="info_menu">
                                <li><a href="index">Home</a></li>
                                <li><a href="architecture">Architectural Gallery</a></li>
                                <li><a href="training">Training Department</a></li>
                                <li><a href="service">Our Services</a></li>
                                <li><a href="about">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Social Media Links -->
            <div class="info_social mt-4 text-center">
                <a href="https://www.instagram.com/muhizi_designing_academy/" class="me-3">
                    <i class="fa fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/muhizi-designing-and-construction-601b5633a/" class="me-3">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100064105540608" class="me-3">
                    <i class="fa fa-facebook"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- end info_section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Muhizi Construction & Design</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->


    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
</body>

</html>