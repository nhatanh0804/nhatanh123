<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
</head>

<body>
  <?php 
session_start();
 ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Index.php">Soundcloud</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="WebsiteLayout/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Dangnhap.php">Sing In</a>
          <a class="dropdown-item" href="Dangky.php">Sing Up</a>
        
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
 <div class="container">
 <div class="row justify-content-between">
    <?php 
            $conn = mysqli_connect('localhost','root','','asm2');
           if(isset($_GET['search'])){ 
         echo "<script>alert('ok)</script>";
          $search =$_GET['Search'];
         $result= mysqli_query($conn,"select * from song where SongName like '%$search%'");
         $row=mysqli_fetch_array($result);
         $Image=$row['SongImage'];
         $name=$row['SongName'];
         $ida=$row['SongID'];
         echo "<div class='card border-success mb-3 style=' max-width: 33%;'>
         <div class='card-header bg-transparent boder-success'>$name</div>
         <div class='card-body text-success'>
         <img src='img/$Image' alt='' style='height: 20rem;width:50%'>
         </div>
         <div class='card-footer bg-transparent border-success'>
           <a class='btn btn-primary' href='Detail.php?id=$ida'>Details</a>
         <a class='btn btn-danger' href='cart.php?id=$ida'>Add to cart</a></div>
         </div>";
       }
           
        
    
          ?>
</body>
</html>
