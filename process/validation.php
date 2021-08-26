<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 
require_once "../process/function.php";

if(isset($_POST['submit'])){
    
    $email = html_entity_decode($_POST['email'], ENT_QUOTES);
    $name = html_entity_decode($_POST['name'], ENT_QUOTES);
    $username = html_entity_decode($_POST['username'], ENT_QUOTES);
    $password = html_entity_decode($_POST['password'], ENT_QUOTES);
    $contact = html_entity_decode($_POST['contact'], ENT_QUOTES);
    $status = html_entity_decode($_POST['status'], ENT_QUOTES);

    if (empty($email)) {
        $_SESSION['validationerror'] = "Email is required";
        header("Location: ../users/add.php");
      } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['validationerror'] = "Invalid email format";
        header("Location: ../users/add.php");
      }
      
    else if (empty($name)) {
        $_SESSION['validationerror'] = "Name is required";
        header("Location: ../users/add.php");
      } 
  
    else if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $_SESSION['validationerror'] = "Only letters and white space allowed";
        header("Location: ../users/add.php");
        }
    
    else if (empty($username)) {
        $_SESSION['validationerror'] = "Username is required";
        header("Location: ../users/add.php");
    } 
    else if (empty($password)) {
        $_SESSION['validationerror'] = "Password is required";
        header("Location: ../users/add.php");
    }
    else if(strlen($password)>30){
        $_SESSION['validationerror'] = "Password too large, max characters = 30";
        header("Location: ../users/add.php");
    }
    else if(strlen($password)<8){
        $_SESSION['validationerror'] = "Password too small, min characters = 8";
        header("Location: ../users/add.php");
    }
    else if (empty($contact)) {
        $_SESSION['validationerror'] = "Contact no. is required";
        header("Location: ../users/add.php");
    }
    else if ($contact<9000000000) {
        $_SESSION['validationerror'] = "Contact no. format is 9XXXXXXXXX";
        header("Location: ../users/add.php");
    }
    else if ($contact>9999999999) {
        $_SESSION['validationerror'] = "Contact no. format is 9XXXXXXXXX";
        header("Location: ../users/add.php");
    }
    else{
        $databaseFunctions = new databaseFunctions();
        $check=$databaseFunctions->validateUsername($username);
        if ($check = 1 && $_SESSION['addedit']== "add"){
            $databaseFunctions->addUsers($email,$name,$username,$password,$contact,$status);
        }
        else if ($check = 1 && $_SESSION['addedit']== "edit"){
            $databaseFunctions->editUsers($email,$name,$username,$password,$contact,$status);
        }
    }
    
}

?>