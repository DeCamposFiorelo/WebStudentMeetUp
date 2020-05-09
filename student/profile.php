<?php
session_start();
include('../includes/db.php');
include('includes/functions.php');

studentInformation();// function with user information

if(!isset($_SESSION["student_email"]) || !isset ($_SESSION["student_password"])){
	header("location: ../index.php");
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
                            updateProfile();?>
                            <script>
                            function myFunction() {
                            alert("Too see the update you have to logout and login again");
                            }
                            </script>
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
                                <label for="studentemail">Email</label>
                                <input type="text" class="form-control" name="studentemail" value="<?php echo$student_email;?>"required>
                            </div>
                            <div class="form-group">
                                <label for="studentcourse">Course</label>
                                <input type="text" class="form-control" name="studentcourse" value="<?php echo$student_course;?>"required>
                            </div>
                            <div class="form-group">
                                <label for="studentdescription">Description</label>
                                <input type="text" class="form-control" name="studentdescription" value="<?php echo$student_description;?>"required>
                            </div>
                            <div>
                                <button class="btn btn-success" type="submit" onclick="myFunction()"name="update"style="color: rgb(255,255,255);background-color: #ff8c25">Update</button>
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
   