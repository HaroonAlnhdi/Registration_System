<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROFESSOR HOME</title>
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
                 <li><a href="Attendance.php">Attendance</a></li>
                 <li><a href="Schedule.php">Schedule</a></li>
                 <li><a href="Inbox.php">Inbox</a></li>
               </ul>

               <li style="font-weight: bold;">evaluate:</li>
               <ul>
                 <li><a href="Evaluation.php">Course Evaluation</a></li>
               </ul>

               <li style="font-weight: bold;" >Manage:</li>
               <ul>
                 <li ><a href="Courses.php">Courses</a></li>
                 <li ><a href="Grads.php">Student Marks</a></li>
                 <li ><a href="Attendance.php"> Attendance</a></li>
                
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
    <div class="container">
      <!-- Enter your code here  -->

      <!--Alert-->
      <div class="alert bg-secondary m-5">
        <div class="row">
          <div class="col-sm-1 d-flex"><img src="img/email.png" alt=""></div>
          <div class="col-sm-11"><p ><span style="color:#ffffff;font-weight:bold">Welcome</span></p></div>
        </div>
      </div>

      <hr style="border: solid; color: black; width: 100%; text-align:center; "/>

      <!--Crads-->
      <section id="form">
        <div class="m-1 p-1 border rounded">
      <div class="cards">
        <div class="row ">
            <a  href="StudentInfo.php">
          <div  class="col ">
          <a  href="Attendance.php">
            <p>Attendance</p></a>
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>

          <div  class="col ">
          <a  href="Grads.php">
            <p>Student Grads</p></a>
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>
          <div  class="col ">
          <a  href="Courses.php">
            <p> Courses</p></a>
            <i class="fa fa-book" aria-hidden="true"></i>
          </div>
          
        </div>

      

       
        
      </div>

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
