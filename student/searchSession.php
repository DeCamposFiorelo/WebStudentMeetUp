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
                        <h1 class="page-header"> Search for Session</h1>
                        
                        <div>
                            <form action="" method="POST">
                            <label>Search for Session: </label>
                            <input class="form" type="text" name="searchsession" required="required" placeholder="session tags">
                            <button class="btn btn-mybutton"  type="submit" name="submit" >Search</button>
                            </form>
                        </div>
                        <?php
                          if(isset($_POST['submit'])){
                                    
                            $searchsession = $_POST['searchsession'];
                            
                            $query = "select * from session where CONCAT(',', session_tags, ',') like '%,$searchsession,%'";
                            $select_categories = mysqli_query($connection,$query);  
                            if($select_categories->num_rows>0){
                            
                            while($row = mysqli_fetch_assoc($select_categories)) {
                               
                                $session_id=$row['id_session'];
                                $session_course=$row['course'];
                                $session_title=$row['session_title'];
                                $session_author=$row['session_admin'];
                                $session_date=$row['session_date'];
                                $session_time=$row['session_time'];
                                $session_location=$row['session_location'];
                                $session_content=$row['session_descr'];?>
                                <table class="table table-bordered table-hover">
                                <br>
                                    <thead>
                                        
                                            <th>Id</th>
                                            <th>Course</th>
                                            <th>Session Title</th>
                                            <th>Session author</th>
                                            <th>Session Date</th>
                                            <th>Session time</th>
                                            <th>Session Location</th>
                                            <th>Session Content</th>
                                            <th>Join Session </th>
                                            
                                      
                                    </thead>
                                    <tbody>
                                
                                <?php
                           
                                    echo"<tr>";
                                    echo "<td>$session_id</td>";
                                    echo "<td>$session_course</td>";
                                    echo "<td>$session_title</td>";
                                    echo "<td>$session_author</td>";
                                    echo "<td>$session_date</td>";
                                    echo "<td>$session_time</td>";
                                    echo "<td>$session_location</td>";
                                    echo "<td>$session_content</td>";
                                    echo"<td><button class='btn btn-mybutton'><a style='color:white' href='joinSession.php?join={$session_id}'>Join</a></td></button>";
                                    echo"</tr>";
                            }?>
                            </tbody>
                            </table>
                            <?php

                        }else{
                            echo"<p style='color:#FF0000'>There is session with that tags";
                        }      
                    }
                        ?>
                            
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
   