
<?php

session_start();
$msg="";
  if(isset($_GET['error']))
  {  if ($_GET['error']==1)
    $msg="<span style='color:red;'>Please login first</span>";
    else
      $msg="404 error";
  }
  echo $msg;
extract ($_POST);
if(isset($Signin))
{
	try{
	require('connection.php');
	$rs=$db->query("select * from users");
	$id=0;
	foreach($rs as $row)
	{
		//$id=$row[1];
		if($row[1]==$uname && $pass==$row[2])
		{
		$r=$db->query("select id from users where username='$row[1]'");
         foreach($r as $ro)
	     $id=$ro[0];
         $_SESSION['activeUser']=$id;	


		if($row[3]=='admin')
    header("Location: AdminHome.php");
		else if($row[3]=='student')
    header("Location: Home.php?stID=$row[1]");	
    else {
      header("Location: ProfessorHome.php");
    }
		}
        else 
			 $error_msg=" password or username is invalid ";
		
	}
$db=null;
}
catch(PDOException $ex)
{
	
	die($ex->getmessage());
}
}

?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="\Project\styless\loginStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Saira Condensed">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  </head>
  <body>
  <form   action="" method="post" name="lform" onsubmit="return validtion()">
    <header>
    <div class="nev">
      <img src="img/lo.png" alt="logo" name="lo">
      <h1>Registration System</h1>
    </div>
    </header>


    <main class="">
    <div class="conteiner">
      <div class="mainrow">


          <div class="picture">
              <img class="pic" src="img/UOB.jpg" alt="">
          </div>

          
          <div class="loginpnal">


          
              <div class="info">
                <h1> Login Panel </h1>
                  <p>User Name*</p>
                  <input type="text" class="ue" name="uname" placeholder="Enter Your Name" />
                      <div id="user_error">Please enter a valid username </div>
                  <p>Password*</p>
                  <input type="password" class="ue" name="pass" placeholder="Enter Your Password" /><br>
                  <div id="pass_error">Please enter a valid password </div>
                  <a href="#">Forget Your Password?</a>
                 <!--    <div id="errors" style="display: none;"><?php  echo $error_msg;  ?></div> -->
                  <br />
                  <input type="submit" class="SiginBytton" name="Signin" value="Sign In">
              </div>
              
          </div>
         

      </div>


    </div>
    </main>

      <footer>

  <p>COpyriht 2023 .Registration System. All Right Reserved</p>

      </footer>
      </form>

      <script src="Js/login.js"></script>
  </body>
</html>
