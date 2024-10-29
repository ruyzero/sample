<?php
    include("connection.php");
    if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "select * from users where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   
    $count = mysqli_num_rows($result);
    if ($count==1) {
        header("Location:home.php");
    }
    else {
        echo `<script>
                window.location.href = "index.php";
                alert("Login failed. Invalid username or password")
              </script>`;    
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="index.css">


  </head>
  <body style="background: rgb(121,168,191);
background: radial-gradient(circle, rgba(121,168,191,1) 0%, rgba(121,168,191,1) 100%);
">


    

    <div class="container-fluid">
      
      <div class="row">
        <div class="col-3 "></div>
        <div class="col-6 mt-5 d-flex justify-content-center">
          
          <div class="container" id="containerA">
            <div class="heading">Sign In</div>
            <form action="index.php" class="form" method="post" >
              <input required="" class="input" type="text" name="username" id="username" placeholder="Username">
              <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
              <form action="home.php" method="post">
                <button class="login-button" name="submit" ">Sign In</button> 
              </form>
            </form>
          </div> 
        </div>
        <div class="col-3 "></div>
      </div>
    </div>
    
 

    
  </body>
</html>
