<!DOCTYPE html>

<?php
include '_config.php';

if (isset($_POST['id'])) {
  if ($_POST['id'] == NULL) {
  
    
      // insert a note
      if((isset($_POST['title']) || isset($_POST['note']) ) && isset($_POST['id']))
      {
        $title = $_POST["title"];           
        $note = $_POST["note"];
        $user_id = $_SESSION['id'];
        $insert="INSERT INTO `notes` (`id`, `user_id`,`title`, `note`) VALUES ('NULL', '$user_id', '$title', '$note')"; 
        $res=$conn->query($insert);
        if ($res==TRUE) 
        {
          $msg= "Content saved successfully";
          header("location: home.php");
        }
        else 
        {
          $msg= "Oops! something went wrong.".$conn->error;
        }
      }
  }
    else {
      
      // update a note
      if((isset($_POST['title']) || isset($_POST['note']) ) && isset($_POST['id']))
      {
        $title = $_POST["title"];           
        $note = $_POST["note"];
        $id = $_POST["id"];
        $update="UPDATE `notes` SET `title` = '$title', `note` = '$note' WHERE `notes`.`id` = $id "; 
        $res=$conn->query($update);
        if ($res==TRUE) 
        {
          $msg= "Content saved successfully";
          header("location: home.php");
        }
        else 
        {
          $msg= "Oops! something went wrong.".$conn->error;
        }
      }
    }
}


// delete a note
if(isset($_POST['delete']) && isset($_POST['id']) ) 
{
  // delete($_POST['id']);
  $id = $_POST['id'];
  
  // sql to delete a record
  $del = "DELETE FROM `notes` WHERE `notes`.`id` =$id";   
  
  if ($conn->query($del) === TRUE) 
  {
    $msg= "Record deleted successfully";
    header("location: home.php");
  } 
  else 
  {
    echo "Error deleting record: " . $conn->error;
  }
}

// code to show and edit a existing note 
if(isset($_POST['edit']) && isset($_POST['id']) ) 
{
  $id= $_POST['id'];
  $sql="SELECT * FROM `notes` WHERE `notes`.`id`=$id"; 
  $res=$conn->query($sql);
  if ($res->num_rows>0) {
    if($row = $res->fetch_assoc())
    {
      $title=$row["title"];
      $note=$row["note"];
      $note=str_replace(array("\r","\n"),'',$note);
?>
      <script>
          document.addEventListener("DOMContentLoaded", () => {
            
          document.getElementById('id').value="<?php echo $id ?>"
          document.getElementById('title').value="<?php echo $title ?>"
          document.getElementById('note').value="<?php echo $note ?>"
          var myModal = new bootstrap.Modal(document.getElementById('insertModal'))
          myModal.toggle()
        });
        

      </script>
<?php

    }
  }
}


// Close the database connection
mysqli_close($conn);

?>
