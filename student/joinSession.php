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
    $queryJoined = "INSERT INTO session_student(student_id,session_id)VALUES('$id_student','$session_id');";
    $select_categories_Joined = mysqli_query($connection,$queryJoined);

    $queryUpdate = "UPDATE student SET sessions_joined = sessions_joined + 1  WHERE id_student = '$id_student';";
    $select_categories_Joined2 = mysqli_query($connection,$queryUpdate);

    if($select_categories_Joined){
        echo"Joined";
        
    }elseif($select_categories_Joined2){
        echo"update";

    }


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

if(isset($_POST['leaveSession'])){
    $query = "DELETE FROM session_student WHERE session_id ='$session_id' AND student_id = '$id_student'";
    $select_categories = mysqli_query($connection,$query);  

    if($select_categories){
        header("refresh:1; url=welcome.php");
       
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
                        <?php  echo"<p><button type='button' class='btn'style='color: rgb(255,255,255);background-color: #ff8c25'><a style='color:white'href='http://localhost:3000/chat.html?userName={$student_nickname}&roomName={$session_title}'>ChatRoom</a></button></p>";?>
                        <form class="custom-form" action=""method="post">
                            <button class="btn btn-danger" name="leaveSession" value="<?php echo$session_id?>">Leave Session</button></p>
                        </form>
                        
                             
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   