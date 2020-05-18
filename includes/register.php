<?php include "db.php"?>
<?php
if(isset($_POST['submit'])){
    if($_POST['registerPassword']== $_POST['repeatPassword']){

        $firstName=$_POST['firstName'];
        $nickname=$_POST['nickname'];
        $registerEmail=$_POST['registerEmail'];
        $registerPassword=$_POST['registerPassword'];
        $description=$_POST['description'];
        $course=$_POST['course'];
        

        //escaping all the data in the field. it will clean it up. keeps people from trying to inject into database
        $firstName= mysqli_real_escape_string($connection,$firstName);
        $nickname= mysqli_real_escape_string($connection, $nickname);
        $registerEmail= mysqli_real_escape_string($connection, $registerEmail);
        $registerPassword= mysqli_real_escape_string($connection, $registerPassword);
        $registerPassword = md5($registerPassword);
        $description= mysqli_real_escape_string($connection, $description);
        $course= mysqli_real_escape_string($connection, $course);

        
        

        $query = "INSERT INTO student(student_firstName,student_nickname,student_email,student_password,student_course,student_description)VALUES('$firstName','$nickname','$registerEmail','$registerPassword','$course', '$description')";
        $select_user_query=mysqli_query($connection,$query);
         //validation to check if  the query not work
        if(!$select_user_query){
            die("Query failed".mysqli_error($connection));
        }else{
            echo "Records added successfully. ";
            header("refresh:1; url=../index.php");
        }
    }else{
        echo"Password don't match";
        header("refresh:3; url=../index.php");
    }
    
}




?>