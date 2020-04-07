
<?php
      // START A SESSION
      session_start();
      include('db.php');

      $email =$_POST['email'];
      $password=$_POST['password'];

      //escaping all the data in the field. it will clean it up. keeps people from trying to inject into database
      $email= mysqli_real_escape_string($connection,$email);
      $password= mysqli_real_escape_string($connection, $password);
    
	//query
      $query = mysqli_query($connection,"SELECT * FROM student WHERE student_email='$email' and student_password = '$password'");

      $row = mysqli_num_rows($query);

      if($row>0){
            $_SESSION['student_email']= $_POST['email'];
            $_SESSION['student_password']=$_POST['password'];

            header('Location:../student/welcome.php');
            }else {
            die("Your password or your email its wrong, Please Try again!");  
      }
     
      ?> 