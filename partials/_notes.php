<?php  

session_start();
if (!isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) != true) {
  header("location: index.php");
  exit;
}


include '_config.php';
// show notes
$user_id = $_SESSION['id'];
if (isset($_GET['query'])) {
  // search a note

  // Get the search query from the URL parameter
  $query = $_GET['query'];
  $sql = "SELECT * FROM `notes` WHERE (`notes`.`title` like '%".$query."%' OR `notes`.`note` like '%".$query."%') AND `notes`.`user_id`=$user_id ORDER BY id DESC";

}
else {
  // show all notes
  $sql="SELECT * FROM `notes` WHERE `notes`.`user_id`=$user_id ORDER BY id DESC"; 
}
$res=$conn->query($sql);

if ($res->num_rows>0) {
  while($row = $res->fetch_assoc()) 
  {
      $title=$row["title"];
      $note=$row["note"];
      $dt=$row["dt"];
      $GLOBALS['id']=$row["id"];
      
        
      
      // notes cards
      echo '<div class="btn btn-outline-secondary py-2 ps-2 pe-5 m-4 rounded-3 border border-secondary position-relative">
      <div class="vr position-absolute top-0 start-0 text-warning mt-2 ps-1 display-5 rounded-5"></div>
      <div class="dropdown pt-1 position-absolute top-0 end-0">
      <button class="btn btn-outline-info border-0 rounded-4 " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>

        <form method="post">
        <ul class="dropdown-menu dropdown-menu-dark">
        <input type="hidden" name="id" value="'.$id.'">
        <li>
        <button class="dropdown-item" type="submit" name="delete" value="delete">Delete</button>
        </li>
        </ul>
        </form>
        
        </div>
        
        <form method="post">
        <button class="nt border-0 bg-transparent text-start overflow-hidden h-100" type="submit" id="edit" name="edit" value="submit">
        <input id="hidden" type="hidden" name="id" value="'.$id.'">
        <div class="lh-1">
        <h5 class="title text-light">'.$title.'</h5>
        <p class="text-info-emphasis">'.$dt.'</p>
        </div>
        <p class="note text-white-50 lh-sm">'.$note.'</p>
        </button>
        </form>
    </div>';

  }
}
else {
  echo '<p class="my-5 mx-auto py-5 text-center text-white-50">Empty ! <br>Your notes appear here once you add.</p>';
}


// Close the database connection
mysqli_close($conn);

?>
