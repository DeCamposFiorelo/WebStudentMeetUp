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
                <div class="row">
                    <div class="col-lg-12"> 
                        <h1 class="page-header">Search for User</h1>
                        <form class="custom-form" action=""method="post">
                                <label>Student User Name:</label>
                                <input class="form" type="text" name="username" required="required" placeholder="Username">
                                <button class="btn btn-success " type="submit" name="submit" >Search</button>
                            </form>
                            <?php
                            
                                if(isset($_POST['submit'])){
                                    
                                    $searchUsername = $_POST['username'];
                                    
                                    $query = "select * from student where student_nickname = '$searchUsername'";
                                    $select_categories = mysqli_query($connection,$query);  
                                    $searchUserName_id ;
                                    if($select_categories->num_rows>0){
                                    
                                    while($row = mysqli_fetch_assoc($select_categories)) {
                                       
                                         $searchUserName_id = $row['id_student'];
                                         $searchUsername_name=  $row['student_nickname'];echo"<br>";
                                         $searchUsername_course=  $row['student_course'];echo"<br>";
                                         $searchUsername_description=  $row['student_description'];echo"<br>";
                                         $searchUsername_foto=  $row['student_foto'];
                                         echo"<p><span class='glyphicon glyphicon-list'></span> Username ID:  $searchUserName_id </p>";
                                         echo"<p> <span class='glyphicon glyphicon-user'></span>Username:  $searchUsername_name</p>";
                                         echo"<p><span class='glyphicon glyphicon-education'></span> Course:  $searchUsername_course</p>";
                                         echo"<p><span class='glyphicon glyphicon-comment'></span> Description:  $searchUsername_description</p>";
                                         echo"<p><span class='glyphicon glyphicon-calendar'></span> Picture:  $searchUsername_foto</p>";
                                         echo"<form action='' method='post'>";
                                         echo"<label>Report User</label>";
                                         echo"<select name='report-user'>";
                                         echo"<option value=''>Select</option>";
                                         echo"<option value='abusive'>Abusive</option>";
                                         echo"<option value='spamming_bot''>Spamming_bot'</option>";
                                         echo"</select>";   
                                         echo"<input type='hidden' name='id_student_reported' value='$searchUserName_id'>";
                                         echo"<input class='form' type=text' name='reason' placeholder='Reason'>";
                                         echo"<button type='submit' name='reportUser'class='btn btn-danger'>Report User</button>";
                                        echo"</form>";
                                    }

                                }else{
                                    echo"<p style='color:#FF0000'>There is no user with that username";
                                }      
                                }
                                if(isset($_POST['reportUser'])){
                                    studentInformation();
                                    $reasonReported = $_POST['reason'];
                                    $reasonEnum = $_POST['report-user'];
                                    $id_student_reported=$_POST['id_student_reported'];
                                    date_default_timezone_set('Europe/Dublin');
                                    $date= date('Y-m-d H:i:s');
                                    $query="INSERT INTO `report`(`id_student_reported`,`id_student_reportee`,`reason`, `desc_reason`, `date`) VALUES ('$id_student_reported',' $id_student','$reasonEnum',' $reasonReported',' $date')";
    
                                    $create_post_query=mysqli_query($connection,$query);
                                    if($create_post_query){
                                        echo"reported";
                                        
                                    }else{
                                        die("query failed".mysqli_error($connection));
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
   