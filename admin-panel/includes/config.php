<?php
// Database configuration
define('DB_SERVER', 'localhost'); 
define('DB_USER', 'root');        
define('DB_PASS', '');            
define('DB_NAME', 'muhizi');     

// Create a connection
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check the connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit; 
}

// Optional: Use UTF-8 encoding for the database connection
mysqli_set_charset($conn, "utf8");

?>