<?php 
if(!isset($_SESSION)) { 
    session_start(); 
    $_SESSION['addedit']="add";
    
  } 
require_once "../includes/header.php";
require_once "../process/function.php"; 
echo $_SESSION['validationerror'];
?>
<div class="container">
    
<form action="../process/validation.php" id="addUsers" method="POST">
<div class="form-group">
    <label for="inputEmail">Email address</label>
    <input name ="email" type="email" class="form-control" id="email" placeholder="xxxxxxxxxxx@xxxx.xxx">
  </div>
  <div class="form-group">
    <label for="inputName">Name</label>
    <input name ="name" type="name" class="form-control" id="name" placeholder="Your name">
  </div>
  <div class="row form-group">
    <div class="col">
    <label for="inputUsername">Username</label>
      <input name ="username" type="text" class="form-control" id="username" placeholder="Username">
    </div>
    <div class="col">
    <label for="inputPassword">Password</label>
      <input name ="password" type="password" class="form-control" id="password" placeholder="min-8 | max-30">
    </div>
  </div>
  <div class="row form-group">
  <div class="col">
    <label for="inputContact">Contact no.</label>
      <input name ="contact" type="contact" class="form-control" id="contact" placeholder="9XXXXXXXXX">
    </div> 
    <div class="col"> 
    Status<br/>
        <select name="status" id="status" class="form-select">
        <option value="active" >active</option>
        <option value="inactive">inactive</option>
        </select>
    </div>
  </div>  
 <br>
  <button  name = "submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../includes/node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script src="../includes/node_modules/jquery-validation/dist/localization/messages_es.js"></script>
<script src="../process/validatejs.js"></script>

<?php require_once "../includes/footer.php" ?>