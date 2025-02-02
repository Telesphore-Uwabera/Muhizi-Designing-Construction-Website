<?php
 session_start();
 include('includes/config.php');
 ini_set("display_errors", "1");
 error_reporting(E_ALL);
if (isset($_POST['update'])) {
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];

    // Retrieve the user's current password from the database
    $userId = $_SESSION['login'];
    $selectSql = "SELECT AdminPassword FROM tbladmin WHERE AdminUserName = 'Admin'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentPassword = $row['AdminPassword'];

        // Compare the entered old password with the current password
        if (password_verify($oldPassword, $currentPassword)) {
            // Old password matches, proceed with updating the password

            // Validate the new password
            if (validatePassword($newPassword)) {
                // Hash the new password
                $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

                // Query to update the user's password
                $updateSql = "UPDATE tbladmin SET AdminPassword = '$hashedNewPassword' WHERE AdminUserName = 'Admin'";
   
                // TODO: Handle success/error messages or redirects after password update
                if ($conn->query($updateSql) === TRUE) {
                    // Password updated successfully
                    echo "<script>alert('Password updated successfully!')</script>";
                    echo "<script>window.location.href = 'view-users.php';</script>";
                    exit;
                } else {
                    // Error updating password
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                // New password does not meet the requirements
                echo "<script>alert('New password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.')</script>";
                echo "<script>window.location.href = 'change-password.php';</script>";
                exit;
            }
        } else {
            // Old password does not match
            echo "<script>alert('Incorrect old password. Please try again.')</script>";
            echo "<script>window.location.href = 'change-password.php';</script>";
            exit;
        }
    } else {
        // User not found
        echo "User not found.";
        exit;
    }
}

/**
 * Validate the password against the specified requirements.
 *
 * @param string $password The password to validate
 * @return bool True if the password is valid, false otherwise
 */
function validatePassword($password)
{
    // Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character
    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
    return preg_match($pattern, $password);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Update Password | Muhizi Designing and Construction Company</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Welcome To MES Ltd</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="change-password.php">
                                <i class="bi bi-gear"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-sidebar"></i><span>Posts</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="add-news-events.php">
                            <i class="bi bi-circle"></i><span>Add News & Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage-news-events.php">
                            <i class="bi bi-circle"></i><span>Manage News & Events</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#portifolio-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-sidebar"></i><span>Portfolio</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="portifolio-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="add-projects.php">
                            <i class="bi bi-circle"></i><span>Add Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage-projects.php">
                            <i class="bi bi-circle"></i><span>Manage Projects</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="comments.php" class="nav-link">
                    <i class="bi bi-whatsapp"></i><span>Comments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <i class="bi bi-box-arrow-right"></i><span>Logout</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Update Password</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="oldpassword">Old Password</label>
                                    <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">New Password</label>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            ©2023 Muhizi Company, Powered by <a href="">ByteGenius</a>.
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>