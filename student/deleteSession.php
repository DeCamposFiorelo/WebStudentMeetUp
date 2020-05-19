<?php
session_start();
include('../includes/db.php');


if(!isset($_SESSION["student_email"]) || !isset ($_SESSION["student_password"])){
	header("location: ../index.php");
}

    if(isset($_GET['delete'])){
    $session_id = $_GET['delete'];
    $query = "DELETE from session where id_session = {$session_id} ";
   
    $select_categories = mysqli_query($connection,$query);  

    if($select_categories){
        header("refresh:0; url=manageSession.php");
		
    }
  
 



}

?>