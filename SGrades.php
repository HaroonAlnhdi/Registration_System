



        <?PHP require("auth.php");?>

        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Student Grades</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

            <link rel="stylesheet" href="\Project\styless\Home.css">
            
        <!-- icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


        <link rel="stylesheet" href="styles/Hom.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira Condensed">


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

        
            <section id="form">
                <div class="m-1 p-1 border rounded">
            
                <?php
            // Start the session
            require('connection.php');
           

            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'itcs489';

            $connection = new mysqli($host, $user, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $studentID = $_GET['studentID'];
            
                    // Query the database for the grades
                    $stmt = $db->prepare("
                    SELECT 
                        sc.Student_ID, sc.FName, sc.LName, sc.CName, sc.CCode, sc.LactureTime, 
                        sc.Exame_Date, sc.instructor, g.Grade
                    FROM 
                        student_course AS sc
                        JOIN Grades AS g ON sc.Student_ID = g.StudentID AND sc.CourseID = g.CourseID
                    WHERE 
                        $studentID = :studentID
                    ");

                    // Bind the course ID parameter
                    $stmt->bindParam(':studentID', $studentID);

                    // Execute the query
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $studentName=$row['FName']."  " .$row['LName']  ;

                    echo"<h1 class='m-3'style='text-align: center;'>Student Grades</h1>";
                    echo"<hr>";
                    echo "<P2>Student Name: $studentName</p>";
                    
                    echo "<p2>Student ID: " . $row['Student_ID'] . "</p2>";
                    // Display the grades in a table
                    echo '<table>';
                    echo '<thead><tr><th>Course Name</th><th>Course Code</th><th>Instructor</th><th>Grade</th></tr></thead>';
                    echo '<tbody>';

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                   
                    echo '<td>' . htmlspecialchars($row['CName']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['CCode']) . '</td>';
                   
                    echo '<td>' . htmlspecialchars($row['instructor']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['Grade']) . '</td>';
                    echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';

                    
                    echo '<style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    th, td {
                        text-align: center;
                        padding: 8px;
                    }
                    th {
                        background-color: #f2f2f2;
                        font-weight: bold;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }

                    p2{
                        font-size: 14px;
                        font-style: normal;
                        font-family: monospace;
                        color: black;
                        
                        font-weight: bold;

                    }
                    </style>';

            ?>
                </div>


            <div class="space" style="height: 350px;">



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

            
            
            /* Table styles */
            table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            }
            th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #000;
            }
            tr:hover {
            background-color: #f5f5f5;
            }
            th {
            background-color: #4c6078;
            color: #fff;
            }
        
            h2 {
            margin-top: 0;
            }
        </style>


        </footer>





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </body>
        </html>
