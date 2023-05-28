
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

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="styless/StudentInfo.css">
  <!-- icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <!--Font Awosome-->

  </head>
  <body>
    <form action="" method="post">
      <nav class="navbar  navbar-expand-sm navbar-dark ">
      <a href="#"
      class="navbar-brand mb-0 h1" >
      <img class="d-inline-block align-center p-1" src="img/lo.png" width="90" height="90"/>
      University Of Bahrain
      </a>

      <div class="collapes navbar-collapes" id="nevbarNav">
        <ul class="navbar-nav">


          <li class="nav-item active ">
            <a href="#" class="nav-link active ">
              <i class="fas fa-list">
             </i></a>
             <ul class="dropdown">
               <li style="font-weight: bold;">Viewing:</li>
               <ul>
                 <li><a href="acadmicPlan.php">Academic Plan</a></li>
                 <li><a href="Attendance.php">Attendance</a></li>
                 <li><a href="Schedule.php">Schedule</a></li>
                 <li><a href="Financial.php">Financial Information</a></li>
                 <li><a href="Inbox.php">Inbox</a></li>
               </ul>


               <li style="font-weight: bold;">evaluate:</li>
               <ul>
                 <li><a href="Evaluation.php">Course Evaluation</a></li>
               </ul>


               <li style="font-weight: bold;" >Reports:</li>
               <ul>
                 <li><a href="Transcript.php">Transcript</a></li>
               </ul>

             </ul>


          </li>
          <li class="nav-item active ">
            <a href="main.php" class="nav-link active ">
              <i class="fas fa-home">
             </i>
              Home
            </a>
          </li>

          <li class="nav-item active ">
            <a href="#" class="nav-link">
          <i class="fas fa-solid fa-envelope"></i>
              Message
            </a>

          </li>

          <li class="nav-item active ">
            <a href="#" class="nav-link " >
          <i class="fas fa-question"></i>
              Help
            </a>
          </li>

          <li class="nav-item active ">
            <a href="#" class="nav-link">
              <i class="fas fa-user"></i>
              account
            </a>
          </li>

      </ul>

      </div>

      <p style="color:#ffffff;">Registration System</p>

      <div class="information">

      


      <ul class=" log navbar-nav">
      <li class="nav-item active ">
        <a href="login.php" class="nav-link active ">
      <i class="fas fa-solid fa-arrow-right"></i>

          Logout
        </a>
      </li>
      </ul>
      </div>
    </nav>

<!-- end navigation -->

<!-- start main  -->
  <main>
    <div class="container">
      <!-- Enter your code here  -->

       
    <form action="" method="post">
      <!--Registration Form-->
      <section id="form">
        <!--Row 1 select course and section-->
        <div class="m-5 p-5 border rounded">
            <span class="h1" style="color: #25364b;">Registration</span>
            <div class="row justify-content-center align-items-center g-2 border rounded m-3 p-3">
                <div class="col-md">
                    <label for="exampleFormControlInput1" class="form-label">Course:</label>
                    <select class="form-select" name="CourseID" aria-label="Default select example">
                       <?php 
                       if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="' . $row["Code"] . '"    >' . $row["CourseName"] . '</option>';
                        }
                        
                      } else {
                        echo '<option value="">No courses found</option>';
                      }
                      echo "<input class='m-3 btn btn-primary ' type='submit'name='selected' value='Select'></input>";
                       ?>

                    </select>
                    </form>
                  
                </div>
                
                       
                </form>
                <?php
                     
                     
                     ?> 
                          <!--Row 2 course info-->
                          <?php

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


          echo '<div class="row justify-content-center align-items-center g-2">';

          echo '<div class="col-md">';
          
          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">';
          echo '<label for="floatingEmptyPlaintextInput">Course:</label>';
          echo " <P>$row[2]</p>";
          echo '</div>';
          
          


          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">';
          echo '<label for="floatingEmptyPlaintextInput">Instructor:</label>';
          echo " <P>$row[7]</p>";
          echo '</div>';
           
          
          

          echo '</div>';
          
          echo '<div class="col-md">';

          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">';
          echo '<label for="floatingEmptyPlaintextInput">CourseName:</label>';
          echo " <P>$row[1]</p>";
          echo '</div>';        

          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">';
          echo '<label for="floatingEmptyPlaintextInput">Section:</label>';
          echo " <P>$row[8]</p>";
          echo '</div>';  

          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="time">';
          echo '<label for="floatingEmptyPlaintextInput">Timing:</label>';
          echo " <P> $row[4]   To   $row[5] </p>";
          echo '</div>';

          
          echo '</div>';
          echo '</div>';

          echo '<div class="row justify-content-center align-items-center g-2">';
          echo '<div class="col-md">';

          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">';
          echo '<label for="floatingEmptyPlaintextInput">Room:</label>';
          echo " <P>$row[9]</p>";
          echo '</div>';


        
          echo '</div>';


          echo '<div class="col-md">';
          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="time">';
          echo '<label for="floatingEmptyPlaintextInput">Credits:</label>';
          echo " <P>$row[3]</p>";
          echo '</div>';


    
          echo '</div>';
          echo '</div>';

          echo '<div class="row justify-content-center align-items-center g-2">';
          echo '<div class="col-md">';

          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com">';
          echo '<label for="floatingEmptyPlaintextInput">Exam Date & Timing:</label>';
          echo " <P>$row[6] Time : $row[10] </p>";
          echo '</div>';

          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput" placeholder="name@example.com" ">';
          echo '<label for="floatingPlaintextInput">Days</label>';
          echo " <P>U-T-H </p>";
          echo '</div>';

          


          echo '</div>';

          echo '<div class="col-md">';
          echo '<div class="form-floating m-0">';
          echo '<input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="time">';
          echo '<label for="floatingEmptyPlaintextInput">Exam Room:</label>';
          echo " <P>$row[11]</p>";
          echo '</div>';
       
          echo '</div>';
          echo '</div>';

          $db=null;
                }
               echo " </div>";
                echo "<input class='m-3 btn btn-success ' type='submit' name='save' value='Save'></input>";

              }catch(PDOException $ex)
              {
              
                die($ex->getmessage());
              }

            }
          }
          mysqli_close($connection);
          ?>
                
                <!--End of Registration Form-->
            
          
            <!--End of Details offcanves Table-->
    


    
    

  </main>
<style>

          p{

              font-size: 16px;
              color: #25364b;
              font-weight: bold;
              align-items: center;
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
          }

</style>
<!-- end main  -->

<!-- start footer  -->

<footer>

<div class="footer-content">
  <h3></h3>

      <ul class="footerHelp">
        <li>
          <a href="#">contact us</a>
          <i class=" fas fa-solid fa-phone"></i>
        </li>

        <li>
          <a href="#">About Us</a>
          <i class="fas fa-regular fa-address-card"></i>
        </li>

        <li>
          <a href="#">Help</a>
          <i class="fas fa-question"></i>
        </li>
      </ul>

      <div class="footer-bottom">
        <p>COpyriht 2023 .Registration System. All Right Reserved</p>
      </div>


</div>


</footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
