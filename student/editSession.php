<?php
session_start();
include "../includes/db.php";
include('includes/functions.php');
if(!isset($_SESSION["student_email"]) || !isset ($_SESSION["student_password"])){
    header("location: ../index.php");
       
} if(isset($_GET['edit'])){
    $session_id = $_GET['edit'];
    $query = "select * from session where id_session = {$session_id} ";
   
    $select_categories = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $session_id = $row['id_session'];
    $session_course=$row['course'];
    $session_title=$row['session_title'];
    $session_author=$row['session_admin'];
    $session_date=$row['session_date'];
    $session_time=$row['session_time'];
    $session_tags=$row['session_tags'];
    $session_location=$row['session_location'];
    $session_content=$row['session_descr'];
   
}
}
if(($_POST['editsession'] && $_POST['id'])){

    $id=$_POST['id'];
    $session_title=$_POST['session_title'];
    $session_date=$_POST['session_date'];
    $session_time=$_POST['session_time'];
    $session_tags=$_POST['session_tags'];
    $session_location=$_POST['session_location'];
    $session_content=$_POST['session_descr'];

    $query="UPDATE `session` SET `session_title`='$session_title',`session_date`='$session_date',`session_time`='$session_time',`session_location`='$session_location',`session_tags`='$session_tags',`session_descr`='$session_content' WHERE id_session='$id';";
    $create_post_query=mysqli_query($connection,$query);
    if($create_post_query){
        header("refresh:0; url=manageSession.php");
        
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
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                        <h1 class="page-header">
                          Edit Session   
                        </h1>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class = "form-group">
                                <label for = "title"> Session Title</label>
                             <input type="text" class="form-control" name="session_title"  value="<?php echo$session_title;?>">
                            </div>  

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="session_date"value="<?php echo $session_date;?>">
                            </div>

                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" name="session_time"value="<?php echo $session_time;?>">
                            </div>
  
                            <div class = "form-group">
                                <label for = "location"> Session Location</label>
                                <input type="text" class="form-control" name="session_location"value="<?php echo $session_location;?>">
                            </div>

                            <div class = "form-group">
                                <label for = "post_tags"> Session Tags</label>
                                <input type="text" class="form-control" name="session_tags"value="<?php echo $session_tags;?>">
                            </div>

                            <div class = "form-group">
                                <label for = "post_content"> Session Content</label>
                                <input rows="4" cols="50" class="form-control" name="session_descr"value="<?php echo $session_content;?>">
                                </div>

                            <div class = "form-group">
                            <input class="btn btn-mybutton" type="submit" name="editsession" value="Edit">
                                <input class="btn btn-mybutton" type="hidden" name="id" value="<?php echo $session_id;?>">
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
   