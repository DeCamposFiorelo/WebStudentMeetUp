<?php
session_start();
include('../includes/db.php');
include('includes/functions.php');

studentInformation();// function with user information

if(!isset($_SESSION["student_email"]) || !isset ($_SESSION["student_password"])){
	header("location: ../index.php");
}
if(isset($_POST['update'])){
        
        
    $studentFirstName=$_POST['studentFirstName'];
    $studentNickname= $_POST['studentNickname'];
    $studentcourse= $_POST['course'];
    $studentdescription=$_POST['studentdescription'];

    $query="UPDATE `student` SET `student_firstName`='$studentFirstName',`student_nickname`='$studentNickname',`student_course`='$studentcourse',`student_description`='$studentdescription' WHERE id_student='$id_student';";

    $create_post_query=mysqli_query($connection,$query);
    if($create_post_query){
         
    }else{
        die("query failed".mysqli_error($connection));
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
                <div  class="row">
                    <div class="col-lg-12"> 
                        <h1 class="page-header">Profile</h1>
                       

                            <?php
                                studentInformation();
                            ?>
                            
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class = "form-group">
                                <label for = "studentName"> Student First Name</label>
                             <input type="text" class="form-control" name="studentFirstName" value="<?php echo$student_firstName;?>" required>
                            </div>  
                            <div class="form-group">
                                <label for="studentNickName">Nickname</label>
                                <input type="text" class="form-control" name="studentNickname" value="<?php echo$student_nickname;?>"required>
                            </div>
                            <div class="form-group">
                                <label for="studentcourse">Course</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo$student_course;?>">
                                <div class="form-group">
                                <label for="studentcourse">Course</label>
                                <select name="course" >
                                    <option>IT</option>
                                    <option>Business</option>
                                    <option>Others</option>
                            </select>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="studentdescription">Description</label>
                                <input type="text" class="form-control" name="studentdescription" value="<?php echo$student_description;?>"required>
                            </div>
                            <div class="form-group">
                                <label for="SessionHost">Session Host</label>
                                <input type="text" class="form-control" name="SessionHost"disabled="disabled" value="<?php echo$student_sessions_created;?>"required>
                            </div>
                            <div class="form-group">
                                <label for="SessionJoined">Session Joined</label>
                                <input type="text" class="form-control" name="SessionJoined"disabled="disabled" value="<?php echo$student_sessions_joined;?>"required>
                            </div>
                            <div>
                                <button class="btn btn-mybutton"  type="submit" name="update"style="color: rgb(255,255,255);background-color: #ff8c25">Update</button>
                            </div>
                        </form>
                        <?php


                        ?>
             
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   