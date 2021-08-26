<?php 
if(!isset($_SESSION)) { 
  session_start(); 
  $_SESSION['validationerror']=null;
} 

require_once "../includes/header.php";
require_once "../process/function.php"; 
?>
<div class="container">
  <a href="add.php">
<button class="btn btn-outline-secondary btn-sm" type="add" id="add" >Add User</button></a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">S.NO.</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Contact no.</th>
      <th scope="col">Status</th>
      <th scope="col">Created Date</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
 
  <!-- getting users from database -->
    <?php 
    $databaseFunctions= new databaseFunctions(); 
    $users = $databaseFunctions->getUsers();
    if ($users->num_rows > 0) {
      
      while($row = $users->fetch_assoc()) {
    ?>
    <tr class="actionHere">
      <th scope="row"><?php echo $row["sno"] ?></th>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["username"] ?></td>
      <td><?php echo $row["email"] ?></td>
      <td><?php echo $row["mobileNumber"] ?></td>
      <td><?php echo $row["status"] ?></td>
      <td><?php echo $row["createdDate"] ?></td>
      <td>
      <a href="edit.php?sno=<?php echo $row['sno']?>">
      <button class="btn btn-outline-secondary btn-sm edit" type="edit" name="edit<?php echo $row['sno']?>" id="edit<?php echo $row['sno']?>">Edit</button>
      </a>
      <button class="btn btn-outline-secondary btn-sm delete<?php echo $row['sno']?>" type="delete" name="delete<?php echo $row['sno']?>" id="delete<?php echo $row['sno']?>">Delete</button>
     <script>
       document.getElementById("delete<?php echo $row['sno']?>").onclick = function () {
        deleteUser("<?php echo $row['sno']?>");
    }
      </script>
      </td>
    </tr>
    <?php
        }
      } else {
        ?>
      
      <th scope="row"></th>
      <td colspan="7"><center><b>No data found.</b></center></td>
<?php
        
      }
    ?>

</tbody>

</div>
<script type="text/javascript"  src="../process/api.js"></script>
<?php require_once "../includes/footer.php" ?>