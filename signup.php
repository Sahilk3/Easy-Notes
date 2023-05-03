<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
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

                    $fname = $_POST["fname"];
                    $lname = $_POST["lname"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $cpassword = $_POST["cpassword"];

                    $emailExist="SELECT * FROM `users` WHERE `users`.`email`='$email'"; 
                    $exist=$conn->query($emailExist);
                    if ($exist->num_rows>0){
                      $msg="Email already exist.";
                    }
                    else if (($password == $cpassword)) {
                      $hash=password_hash($password,PASSWORD_DEFAULT);
                      
                      $sql="INSERT INTO `users` (`fname`, `lname`,`email`,`password`) VALUES ('$fname', '$lname', '$email', '$hash')"; 
                      $res=mysqli_query($conn,$sql);
                      if ($res) {
                        $msg= "Account created successfully";
                      }
                      else {
                        $msg= "Oops! something went wrong.".mysqli_error($conn);
                      }
                    }
                    else {
                      $msg= "Password do not match";
                    }
                    $conn->close();
                }

                ?>

                
    <div class="p-3 rounded shadow bg-light" style="min-width: 360px;">
        <h4 class="text-center mb-3">Sign up</h4>
        <hr>
        <p class="text-center bg-info text-dark p-1 rounded <?php echo isset($msg) ? 'd-block' : 'd-none'; ?>"><?php echo isset($msg) ? $msg  : ''; ?></p>
        <form action="/projects/notesapp/signup.php" method="post">
            <div class="d-flex justify-content-between">
                <div class="mb-3 ">
                  <label for="fname" >First Name</label>
                  <input type="text" class="form-control form-control-sm" name="fname" placeholder="First name" required>
                </div>
                <div class="mb-3">
                  <label for="lname" >Last Name</label>
                  <input type="text" class="form-control form-control-sm" name="lname" placeholder="Second name" required>
                </div>
            </div>
            <div class="mb-3">
              <label for="email" >Email Address</label>
              <input type="email" class="form-control form-control-sm" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-3">
              <label for="password" >Password</label>
                  <input type="text" class="form-control form-control-sm" name="password" placeholder="Enter new password" required>
            </div>
            <div class="mb-3">
              <label for="password" >Conferm Password</label>
                  <input type="text" class="form-control form-control-sm" name="cpassword" placeholder="Conferm password" required>
            </div>
            <div  class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-dark btn-sm">Sign up</button>
            </div>
            <p class="text-center ">Already signed up? <a href="http://localhost/projects/notesapp/index.php" class="text-decoration-none">Login now</a></p>
          </form> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
