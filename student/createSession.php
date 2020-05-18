<?php
session_start();
include "../includes/db.php";
include('includes/functions.php');
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
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                        <h1 class="page-header">
                           Create Session   
                        </h1>
                        <?php createSession(); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class = "form-group">
                                <label for = "title"> Session Title</label>
                             <input type="text" class="form-control" name="session_title" required>
                            </div>  

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="session_date"required>
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" name="session_time"required>
                            </div>
  
                            <div class = "form-group">
                                <label for = "location"> Session Location</label>
                                <input type="text" class="form-control" name="session_location"required>
                            </div>

                            <div class = "form-group">
                                <label for = "post_tags"> Session Tags</label>
                                <input type="text" class="form-control" name="session_tags"required>
                            </div>

                            <div class = "form-group">
                                <label for = "post_content"> Session Content</label>
                                <textarea rows="4" cols="50" class="form-control" name="session_descr"required></textarea>
                                </div>

                            <div class = "form-group">
                                <input class="btn btn-mybutton" type="submit" name="create_post" value="Create Session">
                            </div>
                        </form>
     
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   