<?php
session_start();
include('../includes/db.php');
include('includes/functions.php');

studentInformation();// function with user information

if(!isset($_SESSION["student_email"]) || !isset ($_SESSION["student_password"])){// if the user is not login, it will send him to the homepage again
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
                            Welcome
                            <?php
                             echo"<small> $student_nickname</small>";
	                        ?>
                            
                        </h1>
                  
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   