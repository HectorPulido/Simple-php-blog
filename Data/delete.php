<?php
    include("basic.php");

    if(isAdmin())
    {       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $id = $_GET['id'];
        $query = "DELETE FROM posts WHERE id = '$id'";
        if (mysqli_query($conn, $query)) {
            header ("Location: index.php");
        } else {
            echo mysqli_error($conn);
        }
    }
    else
    {
        header ("Location: index.php");
    }

?>