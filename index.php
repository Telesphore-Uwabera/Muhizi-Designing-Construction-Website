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
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Home | Muhizi Construction & Design</title>

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
            <style>
            .trainings {
                margin: 50px 0;
            }

            /* Training Card Styles */
            .training-card {
                position: relative;
                border: 2px solid #004445;
                border-radius: 10px;
                overflow: hidden;
                text-align: center;
                margin-bottom: 30px;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .training-card:hover {
                transform: translateY(-10px);
                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            }

            /* Image Styling */
            .card-img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            /* Title Styling */
            .card-title {
                font-size: 18px;
                font-weight: bold;
                color: #004445;
                margin: 15px 0;
            }

            /* Card Content Styling */
            .card-content {
                display: none;
                padding: 15px;
                background-color: #f8f8f8;
                border-top: 2px solid #004445;
                font-size: 14px;
                color: #333;
            }

            /* Display Content on Click */
            .training-card.active .card-content {
                display: block;
            }

            /* Add Hover Effect to Title */
            .card-title:hover {
                color: #006a5c;
                text-decoration: underline;
            }
            </style>
        </header>

        <!-- end header section -->
        <div class="wrapper">
            <!-- Carousel Start -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="carousel-img" src="img/1.jpg" alt="Carousel Image">
                        <div class="carousel-caption">
                            <h4 class="animated fadeInRight outline-text1">Join us in shaping the skylines of tomorrow
                                with innovation and precision.</h4>
                            <h1 class="animated fadeInLeft outline-text">For Your Dream Project</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="carousel-img" src="img/2.jpg" alt="Carousel Image">
                        <div class="carousel-caption">
                            <h4 class="animated fadeInRight outline-text1">Step into the realm of possibilities as we
                                build your dreams from blueprint to reality</h4>
                            <h1 class="animated fadeInLeft outline-text">We Build Your Home</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="carousel-img" src="img/3.jpg" alt="Carousel Image">
                        <div class="carousel-caption">
                            <h4 class="animated fadeInRight outline-text1">Welcome to a platform where visionary designs
                                meet impeccable craftsmanship</h4>
                            <h1 class="animated fadeInLeft outline-text">For Your Dream Home</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="carousel-img" src="img/4.jpg" alt="Carousel Image">
                        <div class="carousel-caption">
                            <h4 class="animated fadeInRight outline-text1">Embark on a journey of architectural
                                excellence tailored to your aspirations</h4>
                            <h1 class="animated fadeInLeft outline-text">For Your Dream Home</h1>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- service section -->

        <section class="service_section layout_padding">
            <div class="container">
                <!-- <div class="heading_container heading_center ">
        <h2 class="">
          Our Services
        </h2>
        <p class="col-lg-8 px-0">
          If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
        </p>
      </div> -->
                <div class="service_container">
                    <div class="carousel-wrap ">
                        <div class="service_owl-carousel owl-carousel">
                            <div class="item">
                                <div class="box ">
                                    <div class="detail-box">
                                        <h5>
                                            Who we are
                                        </h5>
                                        <p>
                                            MUHIZI DESIGNING AND CONSTRUCTION customizes solutions for each project,
                                            prioritizing precision and care. With our motto, "Our success is to serve
                                            your needs promptly," we're committed to being your reliable partner,
                                            delivering on diverse needs from construction to project management with
                                            expertise.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box ">
                                    <div class="detail-box">
                                        <h5>
                                            Vision
                                        </h5>
                                        <p>
                                            To be the premier construction company known for our relentless pursuit of
                                            innovation, quality craftsmanship, and client satisfaction. We envision a
                                            future where our diverse range of services, coupled with our commitment to
                                            excellence, sets the standard for excellence in the construction industry.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box ">
                                    <div class="detail-box">
                                        <h5>
                                            Mission
                                        </h5>
                                        <p>
                                            MUHIZI DESIGNING AND CONSTRUCTION is dedicated to surpassing expectations
                                            with integrity, collaboration, and sustainability at the forefront. Our
                                            expertise spans construction, structural analysis, GIS, interior design, and
                                            more, aiming to empower clients and enhance communities while delivering
                                            enduring value.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box ">
                                    <div class="detail-box">
                                        <h5>
                                            Objectives
                                        </h5>
                                        <p>
                                            MUHIZI DESIGNING AND CONSTRUCTION embodies a client-centric ethos, leading
                                            with innovation and technology while maintaining excellence in design and
                                            construction, sustainability practices, and continuous learning and
                                            development for their team to deliver exceptional results aligned with
                                            industry standards
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- service section ends -->

        <!-- about section -->

        <section class="about_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <div class="detail-box pr-md-2">
                            <div class="heading_container">
                                <h2><strong style="color:#004445;">CEO Remarks</strong></h2>
                            </div>
                            <p class="detail_p_mt">
                                As the CEO and Founder of MUHIZI DESIGNING AND CONSTRUCTION, I warmly invite you to
                                explore our innovative projects, which embody craftsmanship, integrity, and client
                                satisfaction. We are reshaping the construction industry with a steadfast commitment to
                                quality, innovation, and sustainability. Our dedicated team executes each project with
                                precision and care, guided by our values of excellence, collaboration, and integrity. We
                                prioritize fostering relationships and community service in all our endeavors, ensuring
                                a positive impact beyond construction. Join us in building a better future together.
                                <br>
                                <strong style="color: #004445;">Eng. UWIMANA PAPIAS
                                    CEO and Founder, <br>
                                    MUHIZI DESIGNING AND CONSTRUCTION
                                </strong>

                            </p>

                        </div>
                    </div>
                    <div class="col-md-1 px-0">
                        <div class="img-box">

                        </div>
                    </div>
                    <div class="col-md-2 px-0">
                        <div class="img-box">
                            <img src="images/5.jpg" class="rounded-circle shadow-sm p-3 mb-5 bg-white" alt="about img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- about section ends -->
        <!-- Trainings Start -->
        <div class="trainings" id="Training">
            <div class="container">
                <div class="section-header text-center">
                    <h1 style="color: #004445;">Visit Our</h1>
                    <h2><strong style="color:#004445;">Training Department</strong></h2>
                </div>
                <div class="row">
                    <!-- Training Cards -->
                    <div class="col-md-4">
                        <div class="training-card">
                            <img src="asseta/images/architecture.jpg" alt="Architecture" class="card-img">
                            <h4 class="card-title">Architectural & Built Environment</h4>
                            <div class="card-content">
                                <p>The Architectural and Built Environment Department offers education and training in
                                    architecture, urban design, and construction management. It equips students and
                                    professionals with skills for sustainable development and urban planning, preparing
                                    them to address modern challenges.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="training-card">
                            <img src="asseta/images/highway.jpg" alt="Highway" class="card-img">
                            <h4 class="card-title">Highway & Public Infrastructure</h4>
                            <div class="card-content">
                                <p>The Highway and Public Infrastructure Department focuses on planning, designing, and
                                    maintaining transportation networks and public infrastructure to enhance safety and
                                    sustainability, fostering economic growth and improving communities' quality of
                                    life.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="training-card">
                            <img src="asseta/images/structural.jpg" alt="Structural Analysis" class="card-img">
                            <h4 class="card-title">Structural Analysis Department</h4>
                            <div class="card-content">
                                <p>The Structural Analysis Department employs advanced computational tools to ensure
                                    safety and efficiency in buildings, bridges, and infrastructure projects,
                                    contributing to resilient and cost-effective structural solutions.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="training-card">
                            <img src="asseta/images/interior.jpg" alt="Interior Design" class="card-img">
                            <h4 class="card-title">Interior Design</h4>
                            <div class="card-content">
                                <p>The Interior Design Department creates functional and aesthetically pleasing spaces,
                                    using design principles and trends to enhance user experiences while promoting
                                    well-being and productivity.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="training-card">
                            <img src="asseta/images/gis.jpg" alt="GIS" class="card-img">
                            <h4 class="card-title">GIS and Remote Sensing</h4>
                            <div class="card-content">
                                <p>The GIS and Remote Sensing Department integrates spatial data analysis with advanced
                                    technologies to address spatial challenges and drive sustainable development across
                                    sectors like urban planning and environmental conservation.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="training-card">
                            <img src="asseta/images/gis.jpg" alt="GIS" class="card-img">
                            <h4 class="card-title">GIS and Remote Sensing</h4>
                            <div class="card-content">
                                <p>The GIS and Remote Sensing Department integrates spatial data analysis with advanced
                                    technologies to address spatial challenges and drive sustainable development across
                                    sectors like urban planning and environmental conservation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trainings End -->


        <!-- Featured News Slider Start -->
        <div class="container-fluid pt-5 mb-3">
            <div class="container">
                <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <img class="img-fluid custom-img" src="test/img/tr1.jpg" alt="Image Description">
                        <div class="overlay">

                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""></a>
                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <img class="img-fluid h-100" src="test/img/tr2.jpg" style="object-fit: cover;">
                        <div class="overlay">

                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <img class="img-fluid h-100" src="test/img/tr3.jpg" style="object-fit: cover;">
                        <div class="overlay">

                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <img class="img-fluid h-100" src="test/img/tr4.jpg" style="object-fit: cover;">
                        <div class="overlay">

                        </div>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 400px;">
                        <img class="img-fluid h-100" src="test/img/tr5.jpg" style="object-fit: cover;">
                        <div class="overlay">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured News Slider End -->
        <!-- About section -->
        <section class="contact_section ">
            <div class="text-center">
                <h2><strong style="color:#004445;">About Us</strong></h2>
            </div>
            <div class="container-fluid" id="about">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <div class="img-box ">
                            <img class="img-fluid custom-img" src="images/abouta.jpg" alt="Image Description">

                        </div>
                    </div>
                    <div class="col-md-5 mx-auto">
                        <p class="detail_p_mt">
                            Welcome to MUHIZI DESIGNING AND CONSTRUCTION, where our dedication to serving your needs
                            promptly and precisely defines our success. With a rich heritage in the construction
                            industry, we excel in a wide spectrum of services, ranging from the construction of
                            buildings and infrastructure to specialized areas such as structural analysis, GIS, and
                            remote sensing. Our expertise extends beyond traditional construction to encompass interior
                            design and landscape architecture, where we blend creativity with functionality to create
                            captivating spaces. At MUHIZI DESIGNING AND CONSTRUCTION, we pride ourselves on our
                            comprehensive approach, offering project management and site supervision services to ensure
                            every aspect of your project is meticulously executed. Additionally, we understand the
                            importance of staying at the forefront of technology, which is why we provide training in
                            engineering software relevant to the construction industry. Whether you're envisioning a new
                            project, seeking expert guidance, or looking to enhance your skills, trust MUHIZI DESIGNING
                            AND CONSTRUCTION to deliver tailored solutions that exceed your expectations. Explore our
                            website to learn more about our services and discover how we can help bring your vision to
                            life.

                        </p>

                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- end about section -->
    <br>
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
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder="Message" required="required"
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

        <!-- footer section -->
        <script>
        // JavaScript to toggle card content visibility
        document.querySelectorAll('.training-card').forEach(card => {
            card.addEventListener('click', () => {
                // Hide content of other cards
                document.querySelectorAll('.training-card').forEach(otherCard => {
                    if (otherCard !== card) {
                        otherCard.classList.remove('active');
                    }
                });
                // Toggle current card content
                card.classList.toggle('active');
            });
        });
        </script>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
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