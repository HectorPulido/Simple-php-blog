<?php
    session_start();

    if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
    {
        header("Location: index.php");
    }
    else
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


            $loginUser = $_POST["Username"];
            $loginPassword = $_POST["Password"];
    
            $query = "SELECT * FROM users WHERE username = '$loginUser' AND password = '$loginPassword'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            if($count === 1)
            {
                $_SESSION['login_user'] = $row["username"];
                $_SESSION['admin'] = $row["admin"];
                header("location: index.php");
            }
            else
            {
                $error = "User or Password was invalid";
            }

            ?>
           
            <?php
        }
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
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <?php 
        if(isset($error) && !empty($error))
        {?>
            <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
            </div>
        <?php
        }
        ?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name ="Username" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name ="Password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</body>
</html>
<?php
if(isset($conn))    
{
    mysqli_close($conn); 
}
?>