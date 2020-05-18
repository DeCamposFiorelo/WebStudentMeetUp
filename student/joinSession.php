<?php
session_start();
include('../includes/db.php');
include('includes/functions.php');
studentInformation();



if(!isset($_SESSION["student_email"]) || !isset ($_SESSION["student_password"])){
	header("location: ../index.php");
}


    if(isset($_GET['join'])){
    $session_id = $_GET['join'];
    $query = "select * from session where id_session = {$session_id} ";
   
    $select_categories = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $session_id = $row['id_session'];
    $session_course=$row['course'];
    $session_title=$row['session_title'];
    $session_author=$row['session_admin'];
    $session_date=$row['session_date'];
    $session_time=$row['session_time'];
    $session_location=$row['session_location'];
    $session_content=$row['session_descr'];
   
}
}

?>

<?php include "includes/header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                          
                        <h1 class="page-header">
                             <?php echo "<td>{$session_id}-{$session_title}</td>";?>
                            
                        </h1>
                        <p><?php echo $session_content ?></p>
                        <p> <span class="glyphicon glyphicon-user"></span> Author: <?php echo $session_author ?></p>
                        <p><span class="glyphicon glyphicon-calendar"></span> Date:  <?php echo $session_date ?></p>
                        <p><span class="glyphicon glyphicon-time"></span> Time:  <?php echo $session_time ?></p>
                        <p><span class="glyphicon glyphicon-globe"></span> Location:  <?php echo $session_location ?></p>
<<<<<<< HEAD
                        <?php  echo"<td><button type='button' class='btn'style='color: rgb(255,255,255);background-color: #ff8c25'><a style='color:white'href='http://localhost:3000/chat.html?userName={$student_nickname}&roomName={$session_title}'>Chat</a></td>";?>
=======
                        <?php  echo"<td><button type='button' class='btn'style='color: rgb(255,255,255);background-color: #ff8c25'><a href='http://localhost:3000/chat.html?userName={$student_nickname}&roomName={$session_title}'>Chat</a></td>";?>
>>>>>>> 7d014251e2b63e0b73ac4bb4792b7e67807f6d03
                        
                             
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   