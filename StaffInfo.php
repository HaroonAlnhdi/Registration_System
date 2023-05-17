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

            $PID = validate($PID);
            $CPR = validate($CPR);
            $first_name = validate($first_name);
            $last_name = validate($last_name);
            $Department = validate($Department);
            $DepNumber = validate($DepNumber);
            $gender = validate($gender);
            $email = validate($email);
            $address = validate($address);
            $contact_phone = validate($contact_phone);
            $Salary = validate($Salary);
          }
            if (empty($first_name) || empty($last_name) || empty($PID) || empty($CPR) || empty($Department) || empty($DepNumber) || empty($gender) || empty($email) ) 
            {
                $error = true;
            } else {
                try {
                    require('connection.php');
                    $db->beginTransaction();

                    $stmts = $db->prepare(" insert into professor (PID, CPR, Fname, Lname, Department, OfficeNo, Contact_inf, email, gender, address, salary)
                                                           values (:PID, :CPR, :first_name, :last_name, :Department, :DepNumber, :contact_phone, :email, :gender, :Address, :Salary)");

                    $stmts->bindParam(':PID', $PID);
                    $stmts->bindParam(':CPR', $CPR);
                    $stmts->bindParam(':first_name', $first_name);
                    $stmts->bindParam(':last_name', $last_name);
                    $stmts->bindParam(':Department', $Department);
                    $stmts->bindParam(':DepNumber', $DepNumber);
                    $stmts->bindParam(':email', $email);
                    $stmts->bindParam(':gender', $gender);
                    $stmts->bindParam(':contact_phone', $contact_phone);
                    $stmts->bindParam(':Address', $Address); 
                    $stmts->bindParam(':Salary', $Salary); 

                    $stmts->execute();
                    // Insert data into users table
                    $stmtu = $db->prepare("insert into users (username, password,usertype) values (:PID, :CPR, 'Professor')");
                    $stmtu->bindParam(':PID', $PID);
                    $stmtu->bindParam(':CPR', $CPR);
                    $stmtu->execute();

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
    <title>Staff Information</title>
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
      

        <!--Student Form-->
    <section id="form">
        <div class="m-5 p-5 border rounded">
          <p style=" color:#25364b; font-size:30px; ">Staff Information</p>
            <!-- ID & Name-->
            <div class="row">
                <div class="col">
                    <span>Staff ID:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input name="PID" type="text" class="form-control" placeholder="Staff ID" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <span>Staff CPR:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">CPR</span>
                        <input name="CPR" type="text" class="form-control" placeholder="CPR" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <span>First Name:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input name="first_name" type="text" class="form-control" placeholder="Staff Name " aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col">
                    <span>Last Name:</span>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input name="last_name" type="text" class="form-control" placeholder="Last Name" aria-label="Username"
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
                <!--Gender-->
                <div class="col">
                    <span>Gender:</span>
                    <!--Male-->
                    <div class="form-check">
                        <input class="form-check-input"  value="Male" checked type="radio"  name="gender" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <!--Femail-->
                    <div class="form-check">
                        <input value="Female" class="form-check-input" type="radio" name="gender" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Female
                        </label>
                    </div>
                </div>
            </div>

            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name="email"  class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputiphone" class="form-label">Iphone</label>
                    <input type="number" name="contact_phone" class="form-control" id="inputiphone">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input name="address" type="text" class="form-control" id="inputAddress" placeholder="City-Block-Building-apartment-street">
                </div>
                      <hr style="border: 2px solid #25364b ;">

                   <div class="row">
                      
                <div class="col-md-4">
                    <label for="inputCredit" class="form-label">Salary :</label>
                    <input name="Salary" type="text" class="form-control" id="inputCredit">
                    </div>
                    

                    
                    </div>
                
                <div class="col-5 m-2">
                    
                </div>
                <div class="col-6">
                    <button name="save" onclick="Message() type="submit" class="btn btn-primary">Save</button>
                    <button name="cancle" type="submit" class="btn btn-danger">Cancel</button>
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
