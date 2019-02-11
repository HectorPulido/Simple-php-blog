<?php
include("basic.php");
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

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

/*
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div>
            <h2><a href="post.php?id=<?php echo $row["id"]?>"><?php echo $row["title"]?></a></h2>
            <p><?php echo $row["content"]?></p>
        </div>
        <?php
    }
} 

*/
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" \>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Blog Template · Bootstrap</title>

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
      <?php 
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result)
        //substr($string,0,10).'...';
        ?>
        <h1 class="display-4 font-italic"><?php echo $row["title"]?></h1>
        <p class="lead my-3"><?php echo substr($row["content"],0,200).'...' ?></p>      
        <p class="lead mb-0"><a href="post.php?id=<?php echo $row["id"] ?>" class="text-white font-weight-bold">Continue reading...</a></p>
      <?php } ?>
    
    </div>
  </div>
<!---------Other 2 posts------------> 
  <div class="row mb-2">
  <!---------posts 1------------> 
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
        
        <?php 
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result)
                //substr($string,0,10).'...';
                ?>
                <h3 class="mb-0">
                    <a class="text-dark" href="#"><?php echo $row["title"]?></a>
                </h3>  
                <p class="card-text mb-auto"><?php echo substr($row["content"],0,150).'...' ?></p>
                <a href="post.php?id= <?php echo $row["id"] ?>" class="font-weight-bold">Continue reading</a>
            <?php } ?>         
        </div>
        <svg class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg>
      </div>
    </div>
     <!---------posts 2------------> 
    <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
            <?php 
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result)
                //substr($string,0,10).'...';
                ?>
                <h3 class="mb-0">
                    <a class="text-dark" href="#"><?php echo $row["title"]?></a>
                </h3>  
                <p class="card-text mb-auto"><?php echo substr($row["content"],0,150).'...' ?></p>
                <a href="post.php?id= <?php echo $row["id"] ?>" class="font-weight-bold">Continue reading</a>
            <?php } ?>      
        </div>
        <svg class="bd-placeholder-img card-img-right flex-auto d-none d-lg-block" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect fill="#55595c" width="100%" height="100%"/><text fill="#eceeef" dy=".3em" x="50%" y="50%">Thumbnail</text></svg>
      </div>
    </div>
  </div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-12 blog-main">
    
    <?php 
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <br>
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?php echo $row["title"] ?> </h2>
                        <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                        <p><?php echo substr($row["content"],0,600).'...' ?></p>
                        <a href="post.php?id= <?php echo $row["id"] ?>" class="font-weight-bold">Continue reading</a>
                    </div><!-- /.blog-post -->
                    <br>
                <?php
            }
        } ?> 
        <br>
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>

        <?php 
        if(!isConnected())
        {
          ?>
          <a class="btn btn-outline-primary" href="login.php">Login</a>
          <?php  
        }
        else
        {
          ?>
          <a class="btn btn-outline-primary" href="logout.php">Logout</a>
          <?php  
        }


        if(isAdmin())
        {
          ?>
          <a class="btn btn-outline-primary" href="newpost.php">create new post</a>
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
mysqli_close($conn); 
?>