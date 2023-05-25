
<?php
require('connection.php');

$gradesW = [
    "A" => 4.0,
    "A-" => 3.67,
    "B+" => 3.33,
    "B" => 3.0,
    "B-" => 2.67,
    "C+" => 2.33,
    "C" => 2.0,
    "C-" => 1.67,
    "D+" => 1.33,
    "D-" => 1.0,
    "F" => 0.0,
];

function selectGrade()
{
    global $gradesW;
    foreach ($gradesW as $grade => $weight) {
        echo '<option value="' . $weight . '">' . $grade . ' </option>';
    }
}

function getCourses()
{
    global $db;
    $stmt = $db->query( "SELECT CourseID, CourseName FROM Professor_course");
    return $stmt->fetchAll(pdo::FETCH_ASSOC);
}

function getStudents($courseID, $sectionID)
{
    global $db;
    $stmt = $db->prepare("SELECT Student_ID, FName, LName FROM student_course WHERE CourseID = :courseID AND Section_ID = :sectionID");
    $stmt->execute(['courseID' => $courseID, 'sectionID' => $sectionID]);
    return $stmt->fetchAll(pdo::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseID = $_POST['course'];
    $sectionID = $_POST['section'];
    $studentID = $_POST['student'];
    $gradeWeight = $_POST['grade'];

    $stmt = $db->prepare("INSERT INTO Grades (StudentID, CourseID, Grade) VALUES (:studentID, :courseID, :gradeWeight)");
    $stmt->execute(['studentID' => $studentID, 'courseID' => $courseID, 'gradeWeight' => $gradeWeight]);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

$courses = getCourses();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['course']) && isset($_GET['section'])) {
    $courseID = $_GET['course'];
    $sectionID = $_GET['section'];
    $students = getStudents($courseID, $sectionID);
}
?>













<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Students Grades </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    
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


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="\Project\styless\PGrades.css">


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
    <div class="container" style="">
    

    

<h1 class="px-4 py-4 ">Course Grading</h1>
<div class="grading lg-px-5 lg-py-4 " >
    <form action="" method="get">
        <div class="row row-col-2">
            <div class="col">
                <div class="row ms-1">
                    <select name="course" class="form-select border-secondary-subtle w-75 me-1" aria-label="Default select example">
                        <option selected>Course</option>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course['CourseID']; ?>"><?php echo $course['CourseName']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select name="section" class="form-select border-secondary-subtle" style="width: 20%" aria-label="Default select example">
                        <option selected>Section</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                    </select>
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-outline-primary m-2" >View Students</button>
    </form>
</div>

<?php if (isset($students) && !empty($students)): ?>
    <div class="student-list lg-mx-4 my-4" style="background-color: #819abe" style="width:85%">
        <form action="" method="post">
            <input type="hidden" name="course" value="<?php echo $courseID; ?>">
            <input type="hidden" name="section" value="<?php echo $sectionID; ?>">
            <table class="table table-borderless">
                <tr>
                    <th style="width: 8%">ID</th>
                    <th style="width: 10%">Name</th>
                    <th class="w-25">Grade</th>
                </tr>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?php echo $student['Student_ID']; ?></td>
                        <td><?php echo $student['FName'] . ' ' . $student['LName']; ?></td>
                        <td>
                            <input type="hidden" name="student" value="<?php echo $student['Student_ID']; ?>">
                            <select name="grade" class="form-select border-secondary-subtle" style="width: 10%" aria-label="Default select example">
                                <option selected></option>
                                <?php selectGrade(); ?>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit"class="btn btn-success m-2" >Save Grades</button>
        </form>
    </div>
<?php endif; ?>

</div>
     
     <style>

        table{

            border: 2px solid #000;
        }
     </style>


        
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
