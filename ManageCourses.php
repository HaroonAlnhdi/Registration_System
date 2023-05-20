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
            $CName = validate($CName);
            $CourseCode = validate($CourseCode);
            $CCredits =validate($CCredits);
            $Time = validate($Time);
            $ExamDate = validate($ExamDate);
            $Instructors = validate($Instructors);
            $CSections = validate($CSections);
            
            $Rooms = validate($Rooms);
            $ExamTime = validate($ExamTime);
            $ExamRooms = validate($ExamRooms);
            $Department = validate($Department);
            $DepNumber = validate($DepNumber);
            $Description = validate($Description);
           
          }
            if (empty($CID) || empty($CName) || empty($CourseCode) || empty($CSections) ||  empty($Time) || empty($ExamDate) ||   empty($ExamTime) || empty($ExamRooms)  || empty($Instructors) ) 
            {
                $error = true;
            } else {
                try {
                    require('connection.php');
                    $db->beginTransaction();



                       $stmt = $db->prepare(" insert into courses (CourseID, CourseName, Code, CCredits, Time, Exame_Date, 
                       Instructors, CSections, Rooms, ExamTime, ExamRooms, Department,
                        DepNumber, Description) 
                        VALUES (:CourseID, :CourseName, :Code, :CCredits, :Time,:ExamDate, :Instructors, :CSections, :Rooms, :ExamTime, :ExamRooms, :Department, :DepNumber, :Description)");


                        $stmt->bindParam(':CourseID', $CID);
                        $stmt->bindParam(':CourseName', $CName);
                        $stmt->bindParam(':Code', $CourseCode);
                        $stmt->bindParam(':CCredits', $CCredits);
                        $stmt->bindParam(':Time', $Time);
                        $stmt->bindParam(':ExamDate', $ExamDate);
                        $stmt->bindParam(':Instructors',$Instructors);
                        $stmt->bindParam(':CSections', $CSections);
                        $stmt->bindParam(':Rooms', $Rooms);
                        $stmt->bindParam(':ExamTime', $ExamTime);
                        $stmt->bindParam(':ExamRooms', $ExamRooms);
                        $stmt->bindParam(':Department', $Department);
                        $stmt->bindParam(':DepNumber', $DepNumber);
                        $stmt->bindParam(':Description', $Description);
                        // Execute the SQL statement
                        $stmt->execute();

                             // insert into section table
                             $stmts = $db->prepare("insert into section (  CName, LactureTime, Instructor, CCode) 
                                VALUES (  :CName, :LectureTime, :Instructors, :CCode)");
        
                                $stmts->bindParam(':CName', $CID);
                                $stmts->bindParam(':LectureTime', $Time);
                                $stmts->bindParam(':Instructors', $Instructors);
                                $stmts->bindParam(':CCode', $CourseCode);
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
    <title>Add Courses</title>
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
          <p style=" color:#25364b; font-size:30px; ">Add Courses</p>
            <!-- ID & Name-->
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
                        <span class="input-group-text" id="basic-addon1">CN</span>
                        <input name="CName" type="text" class="form-control" placeholder="Course Name" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <span>Course Code:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Code</span>
                        <input name="CourseCode" type="text" class="form-control" placeholder="ITCSxxx " aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="row">
                <div class="col">
                <span>Sections :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Section</span>
                        <input name="CSections" type="text" class="form-control" placeholder=" " aria-label="Username"
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
              
                
                
            </div>

            <div class="row">
            <div class="col">
                    <span>Credits :</span>
                    <select name="CCredits" class="form-select" aria-label="Default select example">
                        <option selected value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="col">
                <span>Time :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Time</span>
                        <input name="Time" type="Time" class="form-control" placeholder=" HH:MM" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    
                </div>
            </div>

            <div class="row">
            <div class="col">
            <span>Exam Date :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Exam Date</span>
                        <input name="ExamDate" type="date" class="form-control" placeholder=" :MM" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                <span>Exam Time :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Exam Time</span>
                        <input name="ExamTime" type="Time" class="form-control" placeholder=" HH:MM" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    
                </div>

                <div class="col">
                    <span>Exam Room :</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Exam Room</span>
                        <input name="ExamRooms" type="text" class="form-control" placeholder=" " aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="row">
                <!--Collage-->
                <div class="col">
                    <span>Department:</span>
                    <select name="Department" class="form-select" aria-label="Default select example">
                    <option value="Information Technology" selected>Information Technology</option>
                        <option value="Department of Applied Studies">Department of Applied Studies</option>
                        <option value="Department of Arts Bahrain">Department of Arts Bahrain</option>
                    </select>
                </div>
                <!--Collage No. -->
                <div class="col">
                    <span>Department Number:</span>
                    <select name="DepNumber" class="form-select" aria-label="Default select example">
                        <option selected>CS</option>
                        <option value="Cs">CE</option>
                        <option value="IS">IS</option>
                        <option value="CE">LABS</option>
                    </select>
                </div>
                
                
            </div>
            <div class="col-md-4">
                    <label for="inputCredit" class="form-label">Instructors :</label>
                    <input name="Instructors" type="text" class="form-control" id="inputCredit">
                    </div>

            <form class="row g-3">
                
                      <hr style="border: 2px solid #25364b ;">

                   <div class="row">
                      
                <div class="col-md-4">
                    <label for="inputCredit" class="form-label">Description :</label>
                    <input name="Description" type="text" class="form-control" id="inputCredit">
                    </div>
                  
                    

                    
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
</html>
