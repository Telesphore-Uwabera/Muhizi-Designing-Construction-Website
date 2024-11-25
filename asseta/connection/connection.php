<?php 
    $server="localhost";
    $user="root";
    $pass="";
    $db="stock";
    # Connection...
    $con=mysqli_connect($server,$user,$pass,$db);
    if (!$con) {
        ?>
        <script type="text/javascript">
            alert("Not Connected to server");
        </script>
        <?php
    }
?>