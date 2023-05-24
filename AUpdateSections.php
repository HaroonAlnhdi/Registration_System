<?php
    $error = false;
    $success = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        extract($_POST);

        if (isset($save)) {
            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            
            $CID = validate($CID);
            $Rooms = validate($Rooms);
            $Time = validate($Time);
            $ETime = validate($ETime);
            $Seats = validate($Seats);
            $CName = validate($CName);
            $Instructors = validate($Instructors);
           
        }

            if ( empty($CID)  ||empty($CName) || empty($Rooms) || empty($Time) ||empty($ETime) ||empty($Seats) ||empty($Instructors)  ) 
            {
                $error = true;
            } else 
            {
                try  { 
               require('connection.php');
                $db->beginTransaction();


                $stmts = $db->prepare("UPDATE section SET CName=:CName,  LactureTime=:Time, Instructor=:Instructors, Rooms=:Rooms, ETime=:ETime ,Seats=:Seats
                 WHERE CourseID=:CourseID");

                $stmts->bindParam(':CourseID', $CID);
                $stmts->bindParam(':CName', $CName);
                $stmts->bindParam(':Rooms', $Rooms);
                $stmts->bindParam(':Time', $Time);
                $stmts->bindParam(':ETime', $ETime);
                $stmts->bindParam(':Seats', $Seats);
                $stmts->bindParam(':Instructors', $Instructors);
               
                $stmts->execute();

                $db->commit();
                $db = null;
                $success = true;
            } catch (PDOException $ex) {
                $db->rollBack();
                die($ex->getMessage());
            }
        }
    }
?>







<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Section</title>
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


    <!--Font Awesome-->

  </head>
  <body>
  <form action="" method="post">
      <nav class="navbar  navbar-expand-sm navbar-dark ">
      <a href="AdminHome.php"
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
            <a href="AdminHome.php" class="nav-link active ">
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
            <a href="Help.php" class="nav-link " >
          <i class="fas fa-question"></i>
              Help
            </a>
          </li>

          <li class="nav-item active ">
            <a href="Account.php" class="nav-link">
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
      

        <!--Student Form-->
    <section id="form">
        <div class="m-5 p-5 border rounded">
          <p style=" color:#25364b; font-size:30px; ">Update Section</p>
            <p style="color: red;">*Note: The update will depend on the Course ID.</p>
            <div class="row">
                <div class="col">
                    <span>Course ID:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input name="CID" type="text" class="form-control" placeholder="CourseName#Section" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <span>Course Name:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Course Name</span>
                        <input name="CName" type="text" class="form-control" placeholder="CourseName#Section" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
               

                
               
                <div class="col">
                    <span>Rooms :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Rooms</span>
                        <input name="Rooms" type="text" class="form-control" placeholder=" " aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                
            </div>

            <div class="row">
            
                <div class="col">
                <span>From Time :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Starr Lecture Time</span>
                        <input name="Time" type="Time" class="form-control" placeholder=" HH:MM" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    
                </div>

                <div class="col">
                <span>To Time :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">End Lecture Time</span>
                        <input name="ETime" type="Time" class="form-control" placeholder=" HH:MM" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    
                </div>
                <div class="col">
                    <span>Section Seats :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Seats</span>
                        <input name="Seats" type="text" class="form-control" placeholder=" " aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

    
            <div class="col-md-4">
                    <label for="inputCredit" class="form-label">Instructors :</label>
                    <input name="Instructors" type="text" class="form-control" id="inputCredit">
                    </div>

            <form class="row g-3">
                
                      <hr style="border: 2px solid #25364b ;">

                   <div class="row">
                    
                    </div>
                
                <div class="col-5 m-2">
                    
                </div>
                <div class="col-6">
                <button name="save" onclick="Message()" type="submit" class="btn btn-primary">Save</button>
                    <button name="cancel" type="reset" class="btn btn-danger">Cancel</button>
                </div>
                <div class="col-6 m-2">
                      
                 <?php if ($error) { ?>
                  <div class="danger" style="font-size:20px; color:red; position:absolute;">Fields Can't be Empty!</div>
          <?php } else if ($success) { ?>
            <div class="success" style="font-size:20px; color:green; position:absolute;">Form submitted successfully!</div>
            <?php } ?>

                </div>

                
            </form>
        </div>
    </section>

    </div>
          </form>
  </main>

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

<style>
        span{

            color:red;
        }
    </style>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
