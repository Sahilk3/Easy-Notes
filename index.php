<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
  <body class="d-flex 
                justify-content-center
                align-items-center
                vh-100">

                
                
                <?php
                
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
        
                  include 'partials/_config.php';

                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    //check if the email exist in the database 
                    $sql="SELECT * FROM users WHERE email = '$email'"; 
                    $res=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($res)>0) {
                      //Email exists in the database, now check the password
                      $row=mysqli_fetch_assoc($res);
                      if(password_verify($password, $row['password']))
                      {
                        $msg= "Login successfully";
                        session_start();
                        $_SESSION['email']=$row['email'];
                        $_SESSION['fname']=$row['fname'];
                        $_SESSION['lname']=$row['lname'];
                        $_SESSION['id']=$row['id'];
                        $_SESSION['loggedin']=true;
                        header("location: home.php");
                      }
                      else{
                        $msg = "Please enter correct password.";
                      }
                    }
                    else {
                      //Email does not exist in the database
                      $msg= "Email does not exist.".mysqli_error($conn);
                    }
                    //close the database connection
                    mysqli_close($conn);
                }
                ?>




    <div class="w-380 p-3 rounded shadow bg-light">
        <h4 class="text-center mb-3">Log in</h4>
        <hr>
        <p class="text-center bg-info text-dark p-1 rounded <?php echo isset($msg) ? 'd-block' : 'd-none'; ?>"><?php echo isset($msg) ? $msg  : ''; ?></p>
        <form action="/projects/notesapp/index.php" method="post">
            <div class="mb-3">
              <label for="email" >Email Address</label>
              <input type="email" class="form-control form-control-sm" name ="email" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-3">
              <label for="password" >Password</label>
                  <input type="text" class="form-control form-control-sm" name ="password" placeholder="Enter new password" required>
            </div>
            <div  class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-dark btn-sm">Log in</button>
            </div>
            <p class="text-center ">Not yet signed up? <a href="http://localhost/projects/notesapp/signup.php" class="text-decoration-none">Signup now</a></p>
          </form> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
