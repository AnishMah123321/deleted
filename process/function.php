<?php
if(!isset($_SESSION)) { 
    session_start(); 
  } 

class databaseFunctions{
    
    function getUsers(){
        require_once "connection.php";
        $stmt = "SELECT * FROM USERS"; 
        $qry = mysqli_query($conn,$stmt);
        return $qry;
    }

    function addUsers($email,$name,$username,$password,$contact,$status){
        require "connection.php";
        $stmt = "INSERT INTO `users` (`sno`, `name`, `username`, `password`, `email`, `mobileNumber`, `status`, `createdDate`) VALUES (NULL, '$name', '$username', '$password', '$email', '$contact', '$status', current_timestamp());"; 
        $qry = mysqli_query($conn,$stmt);
        header("Location: ../users/list.php");
    }
    
    function validateUsername($username) {
        require_once "connection.php";
        $stmt = "SELECT * FROM USERS"; 
        $qry = mysqli_query($conn,$stmt);

        if ($qry->num_rows > 0 && $_SESSION['addedit']== "add") {
            while($row = $qry->fetch_assoc()) {
                if($row["username"] == $username){
                    $_SESSION['validationerror'] = "Username already taken";
                    header("Location: ../users/add.php");
                    return 0;
                }
            }
        }
        else if ($qry->num_rows > 0 && $_SESSION['addedit']== "edit") {
            $sessid=$_SESSION['editid'];
            while($row = $qry->fetch_assoc()) {
                if ($row['sno'] != $sessid){
                if($row["username"] == $username){

                    $_SESSION['validationerror'] = "Username already taken";
                    header("Location: ../users/edit.php?sno=$sessid");
                    return 0;
                }
            }
            }
        }
        return 1;

    }

    function editUsers($email,$name,$username,$password,$contact,$status){
        require "connection.php";
        $sessid=$_SESSION['editid'];
        $stmt = "UPDATE `users` SET `name` = '$name', `username` = '$username', `password` = '$password', `email` = '$email', `mobileNumber` = '$contact', `status` = '$status' WHERE `users`.`sno` = $sessid;"; 
        $qry = mysqli_query($conn,$stmt);
        header("Location: ../users/list.php");

    }

    function deleteUser($delid){

        require "connection.php";
        $stmt = "DELETE FROM `users` WHERE `users`.`sno` = $delid"; 
        $qry = mysqli_query($conn,$stmt);
    }
}
?>