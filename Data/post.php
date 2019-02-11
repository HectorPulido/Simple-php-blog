<?php
include("basic.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
  
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

  $sql = "SELECT * FROM posts WHERE id = ". $_GET['id'] ;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if(!empty($row["title"]) || !empty($row["content"]))
  {
  ?>    

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" \>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php echo $row["title"]?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">      
      <div class="d-flex justify-content-end align-items-center">
      </div>
    </div>
  </header>
<!---------Last post------------> 
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic"><?php echo $row["title"]?></h1>
    
    </div>
  </div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-12 blog-main">
    
    <p><?php echo $row["content"]?></p>
    <br><br><br>
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="index.php">&larr;</a>
        <?php 
        if(isAdmin())
        {
          ?>
          <a class="btn btn-outline-primary" href="delete.php?id=<?php echo $_GET['id']?>">delete</a>
          <?php        
        }
        ?>
      </nav>
    </div><!-- /.blog-main -->

    

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
<br><br><br>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script></body>
</html>

<?php
    }
    else {
        header("Location: index.php");
    }

} else {
    header("Location: index.php");
}

mysqli_close($conn); 
?>