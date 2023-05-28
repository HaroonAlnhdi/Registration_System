<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Take Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="\Project\styless\Home.css">
    <link rel="stylesheet" href="\Project\styless\Home222.css">
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




<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira Condensed">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>

      <nav class="navbar  navbar-expand-sm navbar-dark ">
      <a href="ProfessorHome.php"
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
                 <li><a href="AcademicPlan.php">Academic Plan</a></li>
                 <li><a href="PAttendance.php">Attendance</a></li>
                 <li><a href="Schedule.php">Schedule</a></li>
                 <li><a href="Inbox.php">Inbox</a></li>
               </ul>

               <li style="font-weight: bold;">evaluate:</li>
               <ul>
                 <li><a href="Evaluation.php">Course Evaluation</a></li>
               </ul>

               <li style="font-weight: bold;" >Manage:</li>
               <ul>
                 <li ><a href="PCourses.php">Courses</a></li>
                 <li ><a href="PGrads.php">Student Marks</a></li>
                 <li ><a href="PAttendance.php"> Attendance</a></li>
                
               </ul>

             </ul>


          </li>
          <li class="nav-item active ">
            <a href="ProfessorHome.php" class="nav-link active ">
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
            <a href="help.php" class="nav-link " >
          <i class="fas fa-question"></i>
              Help
            </a>
          </li>

          <li class="nav-item active ">
            <a href="account.php" class="nav-link">
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
                        <main style="height:auto;">
                        <section id="form">
                              <div class="m-5 p-5 border rounded">
                              <p style="  font-weight: bold; color:#25364b;  font-size:25px; text-align: center; ">Student Attendance</p>
                              <hr style="border: #25364b solid 2px;">
                              <?php

                      $host = 'localhost';
                      $user = 'root';
                      $password = ' ';
                      $database = 'itcs489';

                      $connection = new mysqli($host, $user, $password, $database);

                      // Check if the connection was successful
                      if ($connection->connect_error) {
                          die("Connection failed: " . $connection->connect_error);
                      }

                      // Display the attendance form for the professor
                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          // Retrieve the selected course ID
                          $courseID = $_POST['courseID'];
                          displayAttendanceForm($connection, $courseID);
                      } else {
                          // Retrieve the courses available for the professor
                          $query = "SELECT * FROM professor_course WHERE PID = '202008888'"; // Replace '202008888' with the actual professor ID
                          $result = mysqli_query($connection, $query);

                          if (mysqli_num_rows($result) > 0) {
                              
                              echo "<form method='POST' action=''>";
                              echo "<P class='pp'>Select a course:</p> ";
                              echo "<select name='courseID'>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                  $courseID = $row['CourseID'];
                                  $courseName = $row['CourseName'];
                                  echo "<option value='$courseID'>$courseName</option>";
                              }
                              echo "</select><br><br>";
                              echo "<input type='submit' class='btn btn-primary' value='Select Course'>";
                              echo "</form>";
                          } else {
                              echo "No courses available for the professor.";
                          }
                      }

                      // Display the attendance form for the selected course
                      function displayAttendanceForm($connection, $courseID)
                      {
                          // Retrieve the students enrolled in the course from the database
                          $query = "SELECT * FROM student_course WHERE CourseID = '$courseID'";
                          $result = mysqli_query($connection, $query);

                          if (mysqli_num_rows($result) > 0) {
                              // Display the table
                              echo "<table>";
                              echo "<thead>";
                              echo "<tr>";
                              echo "<th>Student ID</th>";
                              echo "<th>Student Name</th>";
                              echo "<th>Status</th>";
                              echo "</tr>";
                              echo "</thead>";
                              echo "<tbody>";

                              // Display rows for each student
                              while ($row = mysqli_fetch_assoc($result)) {
                                  $studentID = $row['Student_ID'];
                                  $studentName = $row['FName'] . ' ' . $row['LName'];

                                  echo "<tr>";
                                  echo "<td>$studentID</td>";
                                  echo "<td>$studentName</td>";
                                  echo "<td><input type='checkbox' name='attendance[$studentID]' value='Present'></td>";
                                  echo "</tr>";
                              }

                              echo "</tbody>";
                              echo "</table>";

                              // Display the form submit button
                              echo "<br><input type='submit' class='btn btn-success' value='Submit Attendance'>";
                              echo "</form>";
                          } else {
                              echo "No students enrolled in the course.";
                          }
                      }
                      ?>
                      <div class="space" style="height: 83px;">



                      </div>

                      <!-- Add the following style to the head section -->
                      <style>
                          
                          select {
                            font-size: 16px;
                            padding: 8px 16px;
                            border-radius: 4px;
                            border: 1px solid #ccc;
                            width: 100%;
                            max-width: 400px;
                            box-sizing: border-box;
                            margin-bottom: 16px;
                          }


                              .pp{
                                      
                                      color: #25364b;
                                      font-size: 20px;
                                      font-weight: bold;
                              }

                          table {
                              border-collapse: collapse;
                              width: 100%;
                          }

                          th, td {
                              text-align: left;
                              padding: 8px;
                              border-bottom: 1px solid #ddd;
                          }

                          th {
                              background-color: #4CAF50;
                              color: white;
                          }

                          tr:nth-child(even) {
                              background-color: #f2f2f2;
                          }
                      </style>


                              </div>
                        </section>

                        </main>

<!-- end main  -->

<!-- start footer  -->

<footer>

<div class="footer-content" >
  <h3></h3>

      <ul class="footerHelp">
        <li>
          <a href="https://www.uob.edu.bh/contact/">contact us</a>
          <i class=" fas fa-solid fa-phone"></i>
        </li>

        <li>
          <a href="About.php">About Us</a>
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


</footer>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
