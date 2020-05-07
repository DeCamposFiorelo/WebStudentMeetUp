
  <?php
  session_start();
  include('../../includes/db.php');
  include('../includes/functions.php');
  studentInformation();
  $phpToJsVars = [
    'value1' => $student_nickname,
    'value2' => 'foo2'    
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./_css/style.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Simple Chat App </title>
  <script defer src="http://localhost:3000/socket.io/socket.io.js"></script>
  <script defer src="script.js"></script>

 <script type="text/javascript">
var phpVars = { 
<?php 
  foreach ($phpToJsVars as $key => $value) {
    echo '  ' . $key . ': ' . '"' . $value . '",' . "\n";  
  }
?>
};
</script>
  
  
  </head>
  <body>
    <div id="message-container"></div>
    <form id="send-container">
      <input type="text" id="message-input">
      <button type="submit" id="send-button">Send</button>

    </form>
  </body>