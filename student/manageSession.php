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
                           Manage Sessions

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
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                             studentInformation();//method to get the admin information
                             global $connection;//global connectin
                             global  $id_student;
                             $query="SELECT * from session WHERE session_id_admin=' $id_student'";
                             $records= mysqli_query($connection,$query);
                             while($row = mysqli_fetch_array($records)){
                               echo "<tr>";
                              
                               echo"<td>".$row['id_session']."</td>";
                               echo"<td>".$row['course']."</td>";
                               echo"<td>".$row['session_title']."</td>";
                               echo"<td>".$row['session_admin']."</td>";
                               echo"<td>".$row['session_date']."</td>";
                               echo"<td>".$row['session_time']."</td>";
                               echo"<td>".$row['session_location']."</td>";
                               echo"<td>".$row['session_descr']."</td>";
                               echo"<td><a href='editSession.php?delete={$row['id_session']}'>Delete</a></td>";
                               echo"</tr>";
                             }
	                     
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
   