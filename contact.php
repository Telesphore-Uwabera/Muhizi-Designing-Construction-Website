<?php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include('admin-panel/includes/config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address. Please provide a valid email.');</script>";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        // Send email notification
        $to = "samshakul@gmail.com";
        $subjectMail = "New Contact Form Submission from " . $name;
        $body = "
            <h3>New Contact Form Submission</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@muhizi.com" . "\r\n"; 

        if (mail($to, $subjectMail, $body, $headers)) {
            echo "<script>alert('Your message has been submitted successfully. A notification email has been sent.');</script>";
        } else {
            echo "<script>alert('Your message was submitted, but the notification email failed to send.');</script>";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close resources
    $stmt->close();
    $conn->close();
}
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
    <link rel="shortcut icon" href="images/logo.p//m 89mj;lhxr 56o9mng" type="image/x-icon">
    <title>Contact | Muhizi Construction & Design</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- Libraries Stylesheet -->
    <link href="test/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="test/css/style.css" rel="stylesheet">
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

<body>
    <div class="hero_area">
        <div class="hero_bg_box">
            <!-- Hero Background Image will be applied to the header section via CSS -->
        </div>
        <!-- header section starts -->
        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid header_top_container">
                    <div class="contact_nav fon">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>Nyamirambo, KN 2 AVE</span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Call : +250 780 620 735</span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>muhizidesigningacademy@gmail.com</span>
                        </a>
                        <a href="">
                            <i class="bi bi-clock" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-clock" viewBox="0 0 16 16">
                                    <path
                                        d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                </svg>
                            </i>
                            <span>Mon - Fri 09:00-17:30</span>
                        </a>
                    </div>
                    <div class="social_box">
                        <!-- Social icons can go here if needed -->
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

        <!-- about section -->

        <!-- about section ends -->

        <!-- Contact Start -->
        <div class="contact wow fadeInUp" id="contact">
            <div class="container">
                <div class="section-header text-center">
                    <h3 style="color: #004445">Get In Touch</h3>
                    <h2>For Any Query</h2>
                </div>
                <div class="row">
                    <div class="col-md-6" style="background-color: #004445;">
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="flaticon-address"></i>
                                <div class="contact-text">
                                    <h2 style="color: #ffffff;">Location</h2>
                                    <p>Nyamirambo, KN 2 AVE, Kigali - Rwanda</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="flaticon-call"></i>
                                <div class="contact-text">
                                    <h2 style="color: #ffffff;">Phone</h2>
                                    <p>Call : +250 780 620 735</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <i class="flaticon-send-mail"></i>
                                <div class="contact-text">
                                    <h2 style="color: #ffffff;">Email</h2>
                                    <p>muhizidesigningacademy@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name"
                                        required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email"
                                        required="required"
                                        data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject"
                                        required="required" data-validation-required-message="Please enter a subject" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" id="message" placeholder="Message"
                                        required="required"
                                        data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn" type="submit" id="sendMessageButton"
                                        style="background-color: #004445; color: #ffffff;">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
        <br>

        <!-- FAQs Start -->
        <div class="faqs" id="training">
            <div class="container">
                <div class="section-header text-center">
                    <h1 style="color: #004445;">Visit Our</h1>
                    <h2><strong style="color:#004445;">Training Department</strong></h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div id="accordion-1">
                            <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                        Architectural & Built Environment
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        The Architectural and Built Environment Department is integral for academia and
                                        organizations, offering education and training in architecture, urban design,
                                        and construction management, equipping students and professionals with skills
                                        for sustainable development and urban planning. Through innovative programs and
                                        research, it prepares individuals to address modern urban challenges and promote
                                        resilient, inclusive built environments
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
                                        Highway & Public Infrastructure
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        The Highway and Public Infrastructure Department is instrumental in planning,
                                        designing, and maintaining transportation networks and public infrastructure,
                                        comprising diverse professionals collaborating on projects to enhance safety and
                                        sustainability. Through feasibility studies, traffic analyses, and strategic
                                        investments, they develop resilient transportation systems, fostering economic
                                        growth and improving quality of life for communities.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
                                        Structural Analysis Department
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        The Structural Analysis Department, pivotal in engineering firms and academic
                                        institutions, employs advanced computational tools to assess structural
                                        performance, ensuring safety and efficiency in buildings, bridges, and
                                        infrastructure projects. Their focus on research and innovation contributes to
                                        the development of resilient, sustainable, and cost-effective structural
                                        solutions addressing evolving societal needs.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="accordion-2">
                            <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
                                        Interior Design
                                    </a>
                                </div>
                                <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                                    <div class="card-body">
                                        The Interior Design Department collaborates to create functional and
                                        aesthetically pleasing interior spaces, employing design principles and industry
                                        trends to enhance user experiences for various projects. Their work contributes
                                        to environments promoting well-being, productivity, and cultural expression
                                        through creativity and technical expertise.
                                    </div>
                                </div>
                            </div>
                            <div class="card wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
                                        GIS and Remote Sensing
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                    <div class="card-body">
                                        The GIS and Remote Sensing Department is a crucial center for spatial data
                                        analysis, utilizing advanced technologies to collect and interpret geospatial
                                        data. Through integrating GIS with remote sensing, it provides insights for
                                        addressing spatial challenges and driving sustainable development across sectors
                                        like urban planning and environmental conservation.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQs End -->

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
                                        <a class="nav-link text-white" href="https://wa.me/message/PG4P52HZ36YKP1">Chat
                                            With Us</a>
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

            <!-- footer section -->

            <!-- jQery -->
            <script src="js/jquery-3.4.1.min.js"></script>
            <!-- popper js -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <!-- bootstrap js -->
            <script src="js/bootstrap.js"></script>
            <!-- jQuery and Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <!-- owl slider -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
            <!-- nice select -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
                integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
            <!-- custom js -->
            <script src="js/custom.js"></script>
            <!-- Google Map -->
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
            </script>
            <!-- End Google Map -->
            <script src="test/js/main.js"></script>
</body>

</html>