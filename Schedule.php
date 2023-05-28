
<?php

require("auth.php"); ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STUDENT HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="\Project\styless\Home.css">
    <link rel="stylesheet" href="\Project\styless\Home2.css">
  <!-- icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<link rel="stylesheet" href="styles/Hom.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira Condensed">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

      <nav class="navbar  navbar-expand-sm navbar-dark ">
      <a href="Home.php"
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
                 <li><a href="https://uobhomesiteprod.s3.me-south-1.amazonaws.com/site-prod/uploads/Academic-Year-2023-2024.pdf">Academic Plan</a></li>
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
                 <li ><a href="STranscript.php">Transcript</a></li>
               </ul>

             </ul>


          </li>
          <li class="nav-item active ">
            <a href="Home.php" class="nav-link active ">
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


      <hr style="border: solid; color: black; width: 100%; text-align:center; "/>
      <p style=" color:#25364b; font-size:25px; text-align: center ">  Student Schedule</p>
      <!--Crads-->
      <section id="form">
        <div class="m-1 p-1 border rounded">


                                    <?php

                            

                            $host = 'localhost';
                            $user = 'root';
                            $password = '';
                            $database = 'itcs489';

                            $connection = new mysqli($host, $user, $password, $database);

                            if ($connection->connect_error) {
                                die("Connection failed: " . $connection->connect_error);
                            }


                            $studentID = $_GET['studentID'];


                            $sql = "SELECT `Student_ID`,`CourseID`, `FName`, `LName`, `CName`, `CCode`, `Credits`, `LactureTime`, `Exame_Date`, `instructor`, `Section_ID` FROM `student_course` WHERE Student_ID = $studentID";


                            $result = $connection->query($sql);


                            if ($result->num_rows > 0) {

                                
                                echo "<table><tr><th>Student ID</th><<th>First Name</th><th>Last Name</th><th>Course Name</th><th>Course Code</th><th>Credits</th><th>Lecture Time</th><th>Exam Date</th><th>Instructor</th><th>Section ID</th></tr>";

                                
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["Student_ID"]. "</td><td>" . $row["FName"]. "</td><td>" . $row["LName"]. "</td><td>" . $row["CName"]. "</td><td>" . $row["CCode"]. "</td><td>" . $row["Credits"]. "</td><td>" . $row["LactureTime"]. "</td><td>" . $row["Exame_Date"]. "</td><td>" . $row["instructor"]. "</td><td>" . $row["Section_ID"]. "</td></tr>";
                                }
                                echo "</table>";

                            } else {
                                echo "No results found for student ID: " . $studentID;
                            }


                            echo "<style>
                            table {
                            font-family: Arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                            }

                            td, th {
                            border: 1px solid #ddd;
                            padding: 8px;
                            }

                            th {
                            background-color: #4CAF50;
                            color: white;
                            }

                            tr:nth-child(even) {
                            background-color: #f2f2f2;
                            }
                            </style>";

                            ?>

          </div>
        
          </section>

  </main>

<!-- end main  -->

<!-- start footer  -->

<footer>

<div class="footer-content">
  <h3></h3>

      <ul class="footerHelp">
        <li>
          <a href="https://www.uob.edu.bh/contact/">contact us</a>
          <i class=" fas fa-solid fa-phone"></i>
        </li>

        <li>
          <a href="aboutUs.php">About Us</a>
          <i class="fas fa-regular fa-address-card"></i>
        </li>

        <li>
          <a href="Help.php">Help</a>
          <i class="fas fa-question"></i>
        </li>
      </ul>

      <div class="footer-bottom">
        <p>COpyriht 2023 .Registration System. All Right Reserved</p>
      </div>


</div>

<style>


</style>


</footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
