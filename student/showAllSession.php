<?php
session_start();
include('../includes/db.php');
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
                            Session Available
                           
                            
                        </h1>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Course</th>
                                    <th>Session Title</th>
                                    <th>Session author</th>
                                    <th>Session Date</th>
                                    <th>Session time</th>
                                    <th>Session Location</th>
                                    <th>Session Content</th>
                                    <th>Join Session </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                        <?php
	                       showAllSession();

	                    ?>
                        </tbody>
                        </table>
                  
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   