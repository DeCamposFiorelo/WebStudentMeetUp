<?php
session_start();
include('../includes/db.php');
include('includes/functions.php');
studentInformation();

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
                           Manage  you created!
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
                                    <th>Edit</th>
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
                               echo"<td><button class='btn btn-mybutton'><a style='color:white'href='editSession.php?edit={$row['id_session']}'>Edit</a></button></td>";
                               echo"<td><button class='btn btn-danger'><a style='color:white'href='deleteSession.php?delete={$row['id_session']}'>Delete</a></td>";
                               echo"</tr>";
                             }
	                     
	                    ?>
                        </tbody>
                        </table>   
                        
                        <h1 class="page-header">
                           Sessions you are In!
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
                                    <th>Leave Session</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                      
                             studentInformation();//method to get the admin information
                             global $connection;//global connectin
                             global  $id_student;
                             global $session_id;
                             $query = "SELECT id_session, course, session_title, session_id_admin,
                                session_admin, session_date, session_time, session_location, session_tags, session_descr
                                FROM session 
                                INNER JOIN session_student 
                                ON session_student.session_id = session.id_session 
                                WHERE session_student.student_id='$id_student'";

                             $records= mysqli_query($connection,$query);
                             while($row = mysqli_fetch_array($records)){
                             $session_id= $row['id_session'];
                               echo "<tr>";
                               
                               echo"<td>".$row['id_session']."</td>";
                               echo"<td>".$row['course']."</td>";
                               echo"<td>".$row['session_title']."</td>";
                               echo"<td>".$row['session_admin']."</td>";
                               echo"<td>".$row['session_date']."</td>";
                               echo"<td>".$row['session_time']."</td>";
                               echo"<td>".$row['session_location']."</td>";
                               echo"<td>".$row['session_descr']."</td>";?>
                               <form class="custom-form" action=""method="post">
                               <td><button class="btn btn-danger" name="leaveSession" value="<?php echo$session_id?>">Leave Session</button></p>
                           </form>
                           <?php
                               echo"</tr>";
                             }
                             if(isset($_POST['leaveSession'])){
                                $query = "DELETE FROM session_student WHERE session_id ='$session_id' AND student_id = '$id_student'";
                                $select_categories = mysqli_query($connection,$query);  
                            
                                if($select_categories){
                                    echo"<p style='color:red'>You left the Session";
                                    
                                   
                                    }
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
   