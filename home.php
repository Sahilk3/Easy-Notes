<?php
session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
  header("location: index.php");
  exit;
}

include 'partials/_functions.php';

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Easy Notes</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  </head>

<body class="bg-dark">

  <!----------------- navbar  ----------------->
  <nav class="navbar navbar-dark bg-dark mb-3 sticky-top">
    <div class="container-fluid row text-center">
      <div class="col-lg-2 col-1">
        <a class="navbar-brand"  href="/projects/notesapp/home.php">eNotes</a>
      </div>
      <div class="col-lg-5 col-6">
        <div class=" border rounded-pill" role="search">
          <input class="form-control rounded-pill border-0" type="search" id="searchInput" name="searchInput" placeholder="Search your notes"
            aria-label="Search" />
          </div>
      </div>
      <div class="dropdown col-lg-2 col-1 d-flex justify-content-end">
        <button class="btn btn-outline-secondary  px-4 btn rounded-4" type="button" data-bs-toggle="dropdown" aria-expanded="false"  data-bs-auto-close="outside"><?php echo $_SESSION['fname'] ?></button>
        
        <div class="dropdown-menu dropdown-menu-dark p-3 dropdown-menu-end dropdown-menu-lg-start">
          <h4 class="dropdown-header text-center mb-3 px-5 fs-3">Account</h4>
          <h4 class="lh-1"><?php echo $_SESSION['fname'] .' '.  $_SESSION['lname']?>
          <p class="text-white-50 fs-6"><?php echo $_SESSION['email']?></p></h4>
          <hr class="dropdown-divider">
          <button class="dropdown-item text-center" type="button" onClick="location.href='logout.php'">Log out</button>
        </div>

      </div>
    </div>
  </nav>

  <!-- modal here -->
  <?php include 'partials/_modal.php';?>


  <!-- notest section -->
  <section id="result" class="container-fluid vh-100  align-item-center justify-content-center ">

  </section>




  <nav class="navbar navbar-dark bg-dark mt-3 fixed-bottom container-fluid row text-center">
    <div class="col-11 d-flex justify-content-between">
    <p class="text-secondary ms-5 my-auto fs-5 lh-1 font-monospace">Designed & Built by Sahil Kumar</p>
    <button class="btn btn-outline-secondary fs-2 rounded-4 ms-5" type="button" id="insrt" ><i class="bi bi-plus"></i></button>
    </div>
  </nav>
  
  <script src="main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>