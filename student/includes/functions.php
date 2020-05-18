
<?php

// this function it ill take all user information and save in the global variable
function studentInformation(){
    global $connection;//global connectin
    $email=( $_SESSION['student_email']);
    $query="SELECT * FROM student WHERE student_email='$email'";//query
    $select_post= mysqli_query($connection,$query);
    //global variable
    global $id_student;
    global $student_firstName;  
    global $student_nickname;
    global $student_email;
    global $student_course;
    global $student_description;
    global $student_foto;

                           
     while($row = mysqli_fetch_assoc( $select_post)){
        $id_student= $row['id_student'];
        $student_firstName=$row['student_firstName'];
        $student_nickname=$row['student_nickname'];
        $student_email=$row['student_email'];
        $student_course=$row['student_course'];
        $student_description=$row['student_description'];
       
    }

}
//=================================================================================================================
function createSession(){// this function it will create a session
    studentInformation();//method to get the admin information

    global $student_course;
    global $student_nickname;
    global  $id_student;
    global $connection;//global connectin
    if(isset($_POST['create_post'])){
        
        
        $session_title=$_POST['session_title'];
        $session_date= $_POST['session_date'];
        $session_time= $_POST['session_time'];
        $session_location= $_POST['session_location'];
        $session_tags=$_POST['session_tags'];
        $session_content=$_POST['session_descr'];
        
       
        $query="INSERT INTO `session`(`course`,`session_title`,`session_id_admin`,`session_admin`, `session_date`, `session_time`, `session_location`, `session_tags`, `session_descr`) VALUES ('$student_course',' $session_title','$id_student',' $student_nickname','$session_date','$session_time','$session_location','$session_tags','$session_content')";
    
        $create_post_query=mysqli_query($connection,$query);
        if($create_post_query){
            echo"Created";
            
        }else{
            die("query failed".mysqli_error($connection));
        }
    
    
}  
}
//======================================================================================================================
function showAllSession(){// it will show all the session available for the student join
    studentInformation();//method to get the admin information
    global $connection;//global connectin
    global $student_course;
    global $id_student;
    $query="SELECT * from session WHERE course='$student_course'  ";
    $select_post= mysqli_query($connection,$query);

      
     while($row = mysqli_fetch_assoc( $select_post)){
        $session_id=$row['id_session'];
        $session_course=$row['course'];
        $session_title=$row['session_title'];
        $session_author=$row['session_admin'];
        $session_date=$row['session_date'];
        $session_time=$row['session_time'];
        $session_location=$row['session_location'];
        $session_content=$row['session_descr'];

        echo"<tr>";
        echo "<td>$session_id</td>";
        echo "<td>$session_course</td>";
        echo "<td>$session_title</td>";
        echo "<td>$session_author</td>";
        echo "<td>$session_date</td>";
        echo "<td>$session_time</td>";
        echo "<td>$session_location</td>";
        echo "<td>$session_content</td>";
        echo"<td><button class='btn btn-mybutton'><a style='color:white' href='joinSession.php?join={$session_id}'>Join</a></button></td>";


        echo"</tr>";
        
     }
}
//======================================================================================================================
function updateProfile(){// this function it will create a session
    studentInformation();//method to get the admin information

    global $id_student;
    global $connection;//global connectin
    if(isset($_POST['update'])){
        
        
        $studentFirstName=$_POST['studentFirstName'];
        $studentNickname= $_POST['studentNickname'];
        $studentemail= $_POST['studentemail'];
        $studentcourse= $_POST['studentcourse'];
        $studentdescription=$_POST['studentdescription'];
        
        
       
        $query="UPDATE `student` SET `student_firstName`='$studentFirstName',`student_nickname`='$studentNickname',`student_email`='$studentemail',`student_course`='$studentcourse',`student_description`='$studentdescription' WHERE id_student='$id_student';";
    
        $create_post_query=mysqli_query($connection,$query);
        if($create_post_query){
            echo"<p style='color:#FF0000'>user updated</p>";
            
        }else{
            die("query failed".mysqli_error($connection));
        }
    
    
}  
}
?>