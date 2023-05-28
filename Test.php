
<?php
require('connection.php');


$host = "localhost";
$user = "root";
$password = " ";
$database = "itcs489";

$connection = new mysqli($host, $user, $password, $database);
extract ($_POST);


// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

// Select data from courses table
$sql = "SELECT * FROM courses";
$result = mysqli_query($connection, $sql);

// Create select element with options
  echo '<form action="" method="post"> ';
echo '<select name="CourseID">';
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row["Code"] . '"    >' . $row["CourseName"] . '</option>';
  }
  
} else {
  echo '<option value="">No courses found</option>';
}
echo "<input type='submit'name='selected' value='Select'></input>";
echo '</select>';
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  extract ($_POST);
  $Code ='Code';
  $selected_course_id = $_POST['CourseID'];
  if(isset($selected)){

     
    try{
      require('connection.php');
      $rs = $db->query("select * from courses WHERE Code = '$selected_course_id'  ");
      
      foreach($rs as $row)
      {
        echo $row[7];
        echo"<br>";
        echo $row[2];
        echo $row[3];
        echo $row[4];

        
      }

      


      $db=null;
    }
    
    catch(PDOException $ex)
{

	die($ex->getmessage());
}


  }
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

        

</body>
</html>