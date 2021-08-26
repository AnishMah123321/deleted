<?php 
if(!isset($_SESSION)) { 
    session_start(); 
    $_SESSION['addedit']="edit";

  } 
$id=$_GET['sno'];
require_once "../includes/header.php";
require_once "../process/function.php"; 
?>
<?php
$databaseFunctions= new databaseFunctions(); 
$users = $databaseFunctions->getUsers();
if ($users->num_rows > 0) {
  
  while($row = $users->fetch_assoc()) {
    if($row['sno'] == $id){
        $sno=$row['sno'] ;
        $name=$row['name'] ;
        $username=$row['username'] ;
        $password=$row['password'] ;
        $email=$row['email'] ;
        $contact=$row['mobileNumber'] ;
        $_SESSION['editid']=$sno;
    }
  }
}
// echo $_SESSION['validationerror'];
?>


<div class="container">
    
<form action="../process/validation.php" id="addUsers" method="POST">
<div class="form-group">
    <label for="inputEmail">Email address</label>
    <input name ="email" type="email" class="form-control" id="email" placeholder="xxxxxxxxxxx@xxxx.xxx" value="<?php echo $email ?>">
  </div>
  <div class="form-group">
    <label for="inputName">Name</label>
    <input name ="name" type="name" class="form-control" id="name" placeholder="Your name" value="<?php echo $name?>">
  </div>
  <div class="row form-group">
    <div class="col">
    <label for="inputUsername">Username</label>
      <input name ="username" type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $username?>">
    </div>
    <div class="col">
    <label for="inputPassword">Password</label>
      <input name ="password" type="password" class="form-control" id="password" placeholder="min-8 | max-30" value="<?php echo $password?>">
    </div>
  </div>
  <div class="row form-group">
  <div class="col">
    <label for="inputContact">Contact no.</label>
      <input name ="contact" type="contact" class="form-control" id="contact" placeholder="9XXXXXXXXX" value="<?php echo $contact?>">
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
<script>
    $("#addUsers").validate( {
        rules:{
            email: {
                required: true,
                email: true,
            },
            name: "required",
            username: "required",
            password:{
                required : true,
                minlength: 8,
                maxlength :30,
            },
            contact:{
                required : true,
                digits : true,
                min: 9000000000,
                max : 9999999999,
            },
           
    },
    messages:{
        email:{
            required:"Please enter email",
            email:"plese enter valid email",
        },
        name:"Please enter your name",
        username:"Please enter username",
        password:{
            required : "Pleses enter password",
            minlength: "Minimum password required = 8",
            maxlength: "Maximum password supported = 30",
        },
        contact:{
                required : "Please enter your contact no.",
                digits : "Incorrect Mobile no. (only numbers) Format: 9XXXXXXXXX",
                min: "Incorrect Mobile no. Format: 9XXXXXXXXX",
                max: "Incorrect Mobile no. Format: 9XXXXXXXXX",
            }
    }
});
</script>

<?php require_once "../includes/footer.php" ?>
