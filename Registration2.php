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

        <!--Student Form-->
      <!--Registration Form-->
      <section id="form">
        <!--Row 1 select course and section-->
        <div class="m-5 p-5 border rounded">
            <span class="h1" style="color: #25364b;">Registration</span>
            <div class="row justify-content-center align-items-center g-2 border rounded m-3 p-3">
                <div class="col-md">
                    <label for="exampleFormControlInput1" class="form-label">Course:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>select course</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md">
                    <label for="exampleFormControlInput1" class="form-label">Section:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>select section</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <!--Row 2 course info-->
                <div class="row justify-content-center align-items-center g-2">
                    <!--Instructor info-->
                    <div class="col-md">
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput"
                                placeholder="name@example.com">
                            <label for="floatingEmptyPlaintextInput">Instructor:</label>
                        </div>
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput"
                                placeholder="name@example.com" value="DR. Taher">
                            <label for="floatingPlaintextInput">Instructor name</label>
                        </div>
                    </div>
                    <!--End of Instructor info-->

                    <!--Timing info-->
                    <div class="col-md">
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput"
                                placeholder="time">
                            <label for="floatingEmptyPlaintextInput">Timing:</label>
                        </div>
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput"
                                placeholder="name@example.com" value="UTH 10:00">
                            <label for="floatingPlaintextInput">Timing</label>
                        </div>
                        <!--end of timing info-->
                    </div>
                </div>
                <!--End of Row 2-->

                <!--Row 3 Room and Cridets info-->
                <div class="row justify-content-center align-items-center g-2">
                    <!--Room info-->
                    <div class="col-md">
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput"
                                placeholder="name@example.com">
                            <label for="floatingEmptyPlaintextInput">Room:</label>
                        </div>
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput"
                                placeholder="name@example.com" value="S40-1047">
                            <label for="floatingPlaintextInput">Room no.</label>
                        </div>
                    </div>
                    <!--End of Room info-->

                    <!--Credits info-->
                    <div class="col-md ">
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput"
                                placeholder="time">
                            <label for="floatingEmptyPlaintextInput">Credits:</label>
                        </div>
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput"
                                placeholder="name@example.com" value="3">
                            <label for="floatingPlaintextInput">Credits no.</label>
                        </div>
                        <!--end of Credits info-->
                    </div>
                </div>
                <!--End of Row 3-->

                <!--Row 4 Exam info-->
                <div class="row justify-content-center align-items-center g-2">
                    <!--Edam date info-->
                    <div class="col-md ">
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput"
                                placeholder="name@example.com">
                            <label for="floatingEmptyPlaintextInput">Exam Date & Timing:</label>
                        </div>
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput"
                                placeholder="name@example.com" value="10-06-2023  13:00">
                            <label for="floatingPlaintextInput">Date & Timing</label>
                        </div>
                    </div>
                    <!--End of Exam info-->

                    <!--Exam Room info-->
                    <div class="col-md">
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput"
                                placeholder="time">
                            <label for="floatingEmptyPlaintextInput">Exam Room:</label>
                        </div>
                        <div class="form-floating m-0">
                            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput"
                                placeholder="name@example.com" value="S18">
                            <label for="floatingPlaintextInput">Room</label>
                        </div>
                        <!--end of Exam Room info-->
                    </div>
                    
                </div>
                
                <!--End of Registration Form-->
            </div>
            
            <div class="col-12 m-2  " style="padding:0px 0px 0px 400px;">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>

            <!--Schedual Table-->
            <span class="h1" style="color: #25364b;">Schedual</span>
            <div class="row border rounded m-3 p-5">
                <table class="table">
                    <!--Table Header-->
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Section</th>
                            <th>Cridets</th>
                            <th>Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Table Rows and data-->
                        <tr>
                            <td scope="row">ITCS389</td>
                            <td>01</td>
                            <td>3</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--More detais offcanvas Table-->

            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#Id1"
                aria-controls="Id1">More details</button>
            <div class="offcanvas offcanvas-bottom border rounded m-2 p-1" data-bs-scroll="true" tabindex="-1" id="Id1"
                aria-labelledby="Enable both scrolling & backdrop">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="Enable both scrolling & backdrop">Schedual details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Titel</th>
                                <th>Instructor</th>
                                <th>Timing</th>
                                <th>Exam Timing</th>
                                <th>Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Software Engineering I</td>
                                <td>Dr. Taher</td>
                                <td>UTH</td>
                                <td>10-06-2023</td>
                                <td>24 BHD</td>
                            </tr>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--End of Details offcanves Table-->
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
  </body>
</html>
