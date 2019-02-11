<?php 
    include("basic.php");
    if(isAdmin())
    { 
       
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blog";
        
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $title = $_POST["Title"];
            $content = $_POST["Content"];
            $time = time();

            $query = "INSERT INTO posts (title, content, time) VALUES ('$title', '$content', '$time')";
            if (mysqli_query($conn, $query)) {
                header ("Location: index.php");
            } else {
                $error = mysqli_error($conn);
            }
           
        }
    }
    else
    {
        header ("Location: index.php");
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/general.css">
</head>
<body class="text-center">
    <form class="form-signin" method = "post">
        <h1 class="h3 mb-3 font-weight-normal">Please write your post</h1>

        <?php 
        if(isset($error) && !empty($error))
        {?>
            <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
            </div>
        <?php
        }
        ?>

        <label for="inputEmail" class="sr-only">Title</label>
        <input name ="Title" class="form-control" required autofocus>
        <label for="inputPassword" class="sr-only">Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name ="Content" required></textarea>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
    </form>
</body>
</html>
<? php 

mysqli_close($conn); 

?>