
<?php 

require('auth.php');
require('connection.php');
extract($_REQUEST);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GPA Calculator</title>

    <link rel="stylesheet" type="text/css" href="styless\GPACalstyle.css">

	
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="\Project\styless\Home.css">
    <link rel="stylesheet" href="\Project\styless\Home2.css">
  <!-- icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


<link rel="stylesheet" href="styles/Hom.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira Condensed">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


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
            <a href="Help.php" class="nav-link " >
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
  <main>
  <div class="container">
  <h1>GPA Calculator</h1>
		<form>
			<div class="row">
				<div class="course">
					<label>Course 1:</label>
					<input type="text" name="course1" placeholder="Course Code">
					<input type="number" name="credit1" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade1">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
				<div class="course">
					<label>Course 2:</label>
					<input type="text" name="course2" placeholder="Course Code">
					<input type="number" name="credit2" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade2">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
				<div class="course">
					<label>Course 3:</label>
					<input type="text" name="course3" placeholder="Course Code">
					<input type="number" name="credit3" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade3">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
				<div class="course">
					<label>Course 4:</label>
					<input type="text" name="course4" placeholder="Course Code">
					<input type="number" name="credit4" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade4">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
				<div class="course">
					<label>Course 5:</label>
					<input type="text" name="course5" placeholder="Course Code">
					<input type="number" name="credit5" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade5">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
                <br>
                <div class="course">
					<label>Course 6:</label>
					<input type="text" name="course6" placeholder="Course Code">
					<input type="number" name="credit6" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade6">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
                <div class="course">
					<label>Course 7:</label>
					<input type="text" name="course7" placeholder="Course Code">
					<input type="number" name="credit7" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade7">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
                <div class="course">
					<label>Course 8:</label>
					<input type="text" name="course8" placeholder="Course Code">
					<input type="number" name="credit8" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade8">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
                <div class="course">
					<label>Course 9:</label>
					<input type="text" name="course9" placeholder="Course Code">
					<input type="number" name="credit9" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade9">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
                <div class="course">
					<label>Course 10:</label>
					<input type="text" name="course10" placeholder="Course Code">
					<input type="number" name="credit10" min="2" max="4" step="0.01" placeholder="Credit">
					<select name="grade10">
						<option value="" selected>(Grade)</option>
						<option value="4.00">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3.00">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2.00">C</option>
						<option value="1.67">C-</option>
						<option value="1.33">D+</option>
						<option value="1.00">D</option>
						<option value="0.00">F</option>
					</select>
				</div>
			</div>
			<button type="button" onclick="calculateGPA()">Calculate GPA</button>
			<button type="button" onclick="clearInputs()">Clear</button>
		</form>
		<div id="result"></div>
	</div>
    <br>
    <div class="container">
        <table>
            <thead>
              <tr>
                <th>A</th>
                <th>A-</th>
                <th>B+</th>
                <th>B</th>
                <th>B-</th>
                <th>C+</th>
                <th>C</th>
                <th>C-</th>
                <th>D+</th>
                <th>D</th>
                <th>F</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>4.00</td>
                <td>3.67</td>
                <td>3.33</td>
                <td>3.00</td>
                <td>2.67</td>
                <td>2.33</td>
                <td>2.00</td>
                <td>1.67</td>
                <td>1.33</td>
                <td>1.0</td>
                <td>0</td>
              </tr>
            </tbody>
          </table>
    </div>
      

      <style>
/* Style for the container */
.container {
  max-width: 800px;
  margin: 0 auto;
}

/* Style for the header */
header {
  text-align: center;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Style for the form */
form {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-bottom: 20px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-bottom: 10px;
  width: 100%;
}

.course {
  display: flex;
  flex-direction: column;
  width: calc(33.33% - 10px);
}

label {
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select {
  padding: 10px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 5px;
}

select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('https://cdn4.iconfinder.com/data/icons/scripting-and-programming-languages/512/html-512.png');
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 20px;
}

button {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  margin-right: 10px;
}

button:hover {
  background-color: #0069d9;
}

/* Style for the result */
#result {
  font-size: 24px;
  font-weight: 700;
  text-align: center;
  margin-bottom: 20px;
}

/* Style for the table */
table {
  width: 100%;
  border-collapse: collapse;
}

th,
td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ccc;
}

th {
  background-color: #f2f2f2;
  font-weight: 700;
}

@media screen and (max-width: 768px) {
  .course {
    width: 100%;
    margin-bottom: 10px;
  }

  button {
    width: 100%;
    margin-bottom: 10px;
  }
}
</style>

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




    <script src="Js/GPACalscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
