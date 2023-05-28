
<?php 
session_start();

   // if(!isset($_SESSION['activeUser'])){
       // header('Location: login.php');
      //  exit();
   // }

var_dump($_POST);
//print_r( $_SESSION['activeUser']) ;
// page should only be accessed betweeen modifyStart and end (use js popup and date), i can use the semester id from modifyStart and end
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Course Registration</title><link rel="stylesheet" href="css/courseReg.css">
    <script src="https://kit.fontawesome.com/8f65530edf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="generalstyling.css">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#selectcourse').on('change',function(){
                var cID=$(this).val();
                if(cID){
                    $.ajax({
                        type:'POST',
                        url:'ajaxSections.php',
                        data:'ID='+cID,
                        success:function(html){
                            $('#selectSection').html(html);
                        }
                    });
                }else{
                    $('#selectSection').html('<option hidden disabled selected value> Select a section first </option>')

                }
            });
        });

        $(document).ready(function (){
            $(document).on('click', '.section-button', function() {
                event.preventDefault();
                var sectionId = $(this).data('section-id');
                $.ajax({
                    url: 'ajaxsectionDetails.php',
                    method: 'POST',
                    data: {sectionId: sectionId},
                    success: function(response) {
                        var sectionDetails = JSON.parse(response);
                        $('#c-info .st-info:nth-child(1) .st-info-lb:nth-child(1)').html('<label>Instructor Name: ' + sectionDetails.fullName + '</label>');
                        $('#c-info .st-info:nth-child(1) .st-info-lb:nth-child(2)').html('<label>Lecture Timing: ' + sectionDetails.startTime +' - '+sectionDetails.endTime + '</label>');
                        $('#c-info .st-info:nth-child(1) .st-info-lb:nth-child(3)').html('<label>Available Seats: ' + sectionDetails.availableSeats + '</label>');
                        $('#c-info .st-info:nth-child(1) .st-info-lb:nth-child(4)').html('<label>Pre-requisite: ' + sectionDetails.preRequisites + '</label>');
                        $('#c-info .st-info:nth-child(1) .st-info-lb:nth-child(5)').html('<label>Final Exam Date: ' + sectionDetails.finalDate + '</label>');
                        $('#c-info').show();
                        $('#selectedSectioninfo').val(sectionDetails.sectionNumber + ' | ' + sectionDetails.days + ' | ' + sectionDetails.room + ' | ' + sectionDetails.fullName + ' | '+ sectionDetails.startTime + ' | ' + sectionDetails.endTime +' | '+ sectionDetails.availableSeats+' | '+sectionDetails.ID+' | '+sectionDetails.finalDate+' | '+sectionDetails.courseCode);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        
                    }
                });
            });
        });

        
        
        
    </script>
    
</head>
<body>

        
    <div class="wrapper">
        <div class="sidebar-wrapper">
           
        </div>
        <?php 
            # to grab logged in student ID
            try{
                require('connection.php');
                //print_r( $_SESSION['activeUser']) ;
                //$keys = array_keys($_SESSION['activeUser']);
                 $ID = $_GET['studentID'];
                //echo $ID;
                $stInfo = "SELECT students.*, programs.name, programs.year, programs.departmentID, programs.PID FROM students JOIN programs ON students.studyProgram=programs.PID where students.studentID=$ID ";
                $enrolled_sections="SELECT course_sections.*, enrollments.* from course_sections Join enrollments on course_sections.ID = enrollments.sectionID";
                $studentRec = $db->query($stInfo);
                $row=$studentRec->fetch();
                $semesterInfo="SELECT * from semester where now() BETWEEN semester.modifyStart and semester.modifyEnd";
                $semester =$db->query($semesterInfo);
                $sem=$semester->fetch();
                $sql_courses = "SELECT courses.*, course_sections.semesterID FROM courses JOIN program_courses ON courses.ID = program_courses.courseID JOIN programs ON program_courses.programID = programs.PID JOIN course_sections on course_sections.ID = courses.ID WHERE programs.PID=".$row['PID']." and course_sections.semesterID=".$sem['ID'];
                $programCourses=$db->query($sql_courses);
                $courses=$programCourses->fetch(PDO::FETCH_ASSOC);
                //$courses = array();    
                //print_r($courses);
                //echo $row['ID'];
                $prevenrolled_sectionsrec="SELECT course_sections.*, enrollments.grade, enrollments.paid, enrollments.studentID from course_sections Join enrollments on course_sections.ID = enrollments.sectionID where enrollments.studentID=".$row['ID'];
                $prevEnrolled_sections=$db->query($prevenrolled_sectionsrec);
                $passedCourses=$prevEnrolled_sections->fetch();
                //print_r($passedCourses); 
                $sql_coursesInCurrentSem="SELECT distinct c.* FROM courses c JOIN course_sections cs ON c.ID = cs.courseID JOIN semester s ON cs.semesterID = s.ID WHERE s.year=".date('Y');
                $coursesInCurrentSemrec=$db->query($sql_coursesInCurrentSem);
                $coursesCurrentSem=$coursesInCurrentSemrec->fetch(PDO::FETCH_ASSOC);
                $currentYear= date('Y');
                
            }
            catch(PDOException $e){
                die($e->getMessage());
                }
        ?>
        <div class="pagecontent-wrapper" id="main">
            <div class="title" >
                <h1>Course Registeration</h1> 
            </div>
            <div class="" id="student-info">
            <?php  
                try{
                     if($row){
                            // need to calculate credit hours, add cgpa maybe?
                        echo "<div class=''>Student Name: ".$row['fullName']." </div>
                            <div class=''>Major: ".$row['name']."</div>
                            <div class=''>Credit Hours:".$row['creditsPassed']."</div>";
                            if ($sem){
                                $currentY=$sem['year'];
                                $nextY=$currentY + 1;
                                echo "<div class=''>Semester: ".$currentY."/".$nextY."</div>";
                            }
                        }
                        
                }
                catch(PDOException $e){
                    die($e->getMessage());
                }

            ?>
            </div>
            <div class="3 " id="course-section">
                <form method="post" > 
                     <div class="select-cs" id="select-container">
                      <?php
                        try{ 
                            // display courses offered to student via student program 
                            echo "<label>Course: </label>";
                            echo "<select class='select' id='selectcourse' name='selectC'>
                                <option hidden disabled selected value> Select a course </option>";
                                // display courses offered this SEM that have NOT been already enrolled
                                while ($courses=$programCourses->fetch(PDO::FETCH_ASSOC)) {
                                    $enrolled=false;
                                    //echo " courses: ".$courses['ID'];
                                    $prevEnrolled_sections->execute(); 
                                    while($passedCourses=$prevEnrolled_sections->fetch(PDO::FETCH_ASSOC)){
                                            if ($courses['ID'] == $passedCourses['courseID'] ){
                                                $enrolled=true;
                                                break;
                                            }
                                        //echo $passedCourses['courseID'];
                                    } 
                                    if (!$enrolled){
                                        echo "<option  value='".$courses['ID']."'>".$courses['courseCode']." | ".$courses['courseName']."</option>  ";
                                    } 
                                }  
                             echo "</select> 
                                </div>
                             <div class='select-cs' id='selectSection' name='selectS'>
                                 <label>Section: </label>
                             </div>
                             <input type='hidden' id='selectedSectioninfo' name='selectedSection'>
                             ";
                        }catch(PDOException $e){
                            die($e->getMessage());
                        }   
                      ?> 
                    </div>
                <div id="course-manage">
                    <div class="container" id="c-info"> 
                        <div class="st-info"> 
                            <div class="st-info-lb"><label> Instructor Name:</label></div> 
                            <div class="st-info-lb"><label>Lecture Timing: </label></div>
                            <div class="st-info-lb"><label>Available Seats: </label></div>
                            <div class="st-info-lb"><label>Pre-requisite: </label></div>
                            <div class="st-info-lb"><label>Final Exam Date: </label> </div>
                        </div>
                        <div class="st-info" id="conflict">
                            <div class="st-info-lb"><label>Lecture Conflict: </label></div>
                            <div class="st-info-lb"><label>Final Conflict:</label></div>
                        </div>
                    </div>
                    <div class="container" id="course-toolb">
                        <div> <button id="addS" name="addcourse" type="submit"> <i class="fa-regular fa-plus" ></i> </button> </div>
                        <div> <button id="switchS" name="switchsection" ><i class="fa-solid fa-rotate" ></i> </button> </div>
                        <div> <button id="dropS" name="dropcourse" type="submit"><i class="fa-solid fa-trash"  ></i> </button> </div>
                    </div>
                </form>
                </div>
                   
                    

            <?php 

                try{
                    $stID=$_SESSION['activeUser']['ID'];
                    
                    $ID = $_SESSION['activeUser']['username'];
                    $db->beginTransaction();
                    $currentTime=date('Y-m-d');
                    $semesterInfo="SELECT* from semester where now() BETWEEN semester.modifyStart and semester.modifyEnd";
                    $semester =$db->query($semesterInfo);
                    $semm=$semester->fetch();

                    $stInfo = "SELECT students.*, programs.name, programs.year, programs.departmentID, programs.PID FROM students JOIN programs ON students.studyProgram=programs.PID where students.studentID=$ID ";
                    $studentRec = $db->query($stInfo);
                    $row=$studentRec->fetch();

                    $prevenrolled_sectionsrec="SELECT course_sections.*, enrollments.grade, enrollments.paid, enrollments.studentID, courses.courseCode from course_sections Join enrollments on course_sections.ID = enrollments.sectionID join courses on courses.ID=course_sections.courseID where enrollments.studentID=".$row['ID'];
                    $prevEnrolled_sections=$db->query($prevenrolled_sectionsrec);
                    $passedCourses=$prevEnrolled_sections->fetch();

                    $sql_stEnrollID="SELECT students.ID from students where studentID=$ID";
                                $stEnrollIDrec=$db->query($sql_stEnrollID);
                                $stEnrollID=$stEnrollIDrec->fetch();
                                

                    $enrolledSectionsthisSem=$db->prepare("SELECT enrollments.* , course_sections.*, semester.* from enrollments join course_sections on enrollments.sectionID=course_sections.ID join semester on course_sections.semesterID=semester.ID where semester.ID=:sID and enrollments.studentID=:stID");
                    $enrolledSectionsthisSem->bindParam(':sID', $semm['ID']);
                    $enrolledSectionsthisSem->bindParam(':stID', $stID);
                    $enrolledSectionsthisSem->execute();
                    
                    $enrollsectSemALL=$enrolledSectionsthisSem->fetchAll(PDO::FETCH_ASSOC);
                    $checkCourse=$db->prepare("SELECT * FROM courses where ID=:courID");
                    //print_r($enrollsectSemALL);

                    
                    
                    $updateAvailbSeats=$db->prepare("UPDATE course_sections set availableSeats=:seats where ID=:secID ");
                    // ************************* ADD COURSE ***************************

                     if(isset($_POST['addcourse'])&& isset($_POST['selectC']) && isset($_POST['selectedSection']) && !empty($_POST['selectedSection'])){
                        $selectedCour=$_POST['selectC'];
                        $selectedSecInfo=$_POST['selectedSection'];
                        $selectedSecDetails=explode(' | ',$selectedSecInfo);
                        //print_r($selectedSecDetails);
                        
                        $checkCourse->bindParam(':courID',$selectedCour);
                        $checkCourse->execute();
                        $checkThisCourse=$checkCourse->fetch();
                        //print_r($checkThisCourse);
                        $preReqs=$checkThisCourse['preRequisites'];

                        $lectureConflictsrec=$db->query("SELECT enrollments.ID, enrollments.sectionID, COUNT(*) as num FROM enrollments join course_sections on enrollments.sectionID=course_sections.ID WHERE startTime<='$selectedSecDetails[5]' AND endTime>='$selectedSecDetails[4]' AND days='$selectedSecDetails[1]' AND semesterID=".$semm['ID']." and enrollments.studentID=$stID");
                        
                        // $lectureConflictsrec->bindParam(':sTime',$selectedSecDetails[5]);
                        // $lectureConflictsrec->bindParam(':eTime',$selectedSecDetails[4]);
                        // $lectureConflictsrec->bindParam(':days',$selectedSecDetails[1]);
                        // $lectureConflictsrec->bindParam(':smID',$semm['ID']);
                        // $lectureConflictsrec->bindParam(':stID',$stID);
                        // $lectureConflictsrec->execute();
                        //$lectureConflictsrec-> execute(array($selectedSecDetails[5], $selectedSecDetails[4], $selectedSecDetails[1], $semm['ID'], $stEnrollID['ID']));
                        $lectureConf=$lectureConflictsrec->fetch()['num'];

                        $finalConflictrec=$db->query(" SELECT enrollments.ID, enrollments.sectionID, COUNT(*) as num FROM enrollments join course_sections on enrollments.sectionID=course_sections.ID WHERE course_sections.finalDate=$selectedSecDetails[8] AND  course_sections.semesterID=".$semm['ID']." AND enrollments.studentID=$stID");
                        // $finalConflictrec->bindParam(':fD',$selectedSecDetails[8]);
                        // $finalConflictrec->bindParam(':sID',$semm['ID']);
                        // $finalConflictrec->bindParam(':stID',$stID);
                        // $finalConflictrec->execute();
                        //$finalConflictrec->execute(array($selectedSecDetails[8], $semm['ID'], $stEnrollID['ID']));
                        $finalConf=$finalConflictrec->fetch()['num'];
                        
                        $enrolled=true;
                        $preReqC=0; 
                                // Check if enrolled sections are 6 or less, then check if there are available seats, then check for conflicts, then check prerequisites       
                                
                                if(count($enrollsectSemALL)<7){  
                                    if($selectedSecDetails[6]>=1){
                                        if( $finalConf <1 || $lectureConf<1){
                                            while($passedCourses=$prevEnrolled_sections->fetch()){
                                                $preReq= explode(',',$preReqs);
                                                //print_r($preReq);
                                                for($i=0; $i<count($preReq); $i++){
                                                    if($passedCourses['courseCode']==$preReq[$i]){
                                                        $preReqC++;}   
                                                }     
                                            }
                                        }
                                        else{

                                            //pop up

                                            $enrolled=false;
                                        }
                                    }else{
                                        //pop up
                                        $enrolled=false;
                                    }
                                }else{
                                    //pop up
                                    $enrolled=false;
                                }

                                //make sure the section is not added again
                                foreach($enrollsectSemALL as $enrollS){
                                    if($selectedSecDetails[7]==$enrollS['sectionID']){
                                        $enrolled=false;
                                    }
                                }

                                $ID = $_SESSION['activeUser']['username'];
 
                                $addSectionEnroll=$db->prepare("INSERT into enrollments ( studentID, sectionID) values ( :studentID, :sectionID) ");
                                
                                $addSectionEnroll->bindParam(':studentID', $stID);
                                $addSectionEnroll->bindParam(':sectionID', $selectedSecDetails[7]);
                                
                                

                                if($enrolled && count($preReq)==$preReqC){
                                    
                                    $addSectionEnroll->execute();
                                    $selectedSecDetails[6]=$selectedSecDetails[6]-1;
                                    
                                    $updateAvailbSeats->bindParam(':seats',$selectedSecDetails[6]);
                                    $updateAvailbSeats->bindParam(':secID',$selectedSecDetails[7]);
                                    $updateAvailbSeats->execute();
                                    //$updateAvailbSeats->execute(array($selectedSecDetails[6], $selectedSecDetails[7]));
                                    echo "<h5>added seat successfully! </h5>
                                    ";
                                    
                                }
                                else{
                                    echo "<h5>course has not been added </h5>
                                     ";
                                }

                                unset($_POST);

                    }elseif(isset($_POST['addcourse'])&& isset($_POST['selectC'])){
                        //popup -> must select course section ?>

                     <script>swal("select a section!", "you didint select any section !", "error");</script>

                    <?php    echo "select course section before adding";
                    }elseif(isset($_POST['addcourse'])){
                        // popup-> must select course?>
                        <script>swal("select a  course !", "you  didn't select any course !", "error");</script>
                     <?php   echo "select course section before adding";
                        unset($_POST);
                    } 
                    

                    // ************************* SWITCH COURSE ***************************
                    $switchSectionEnroll=$db->prepare("UPDATE  enrollments set sectionID=? where ID=? ");
                    $sql_coursesSec = "SELECT courses.*, course_sections.* FROM courses JOIN program_courses ON courses.ID = program_courses.courseID JOIN programs ON program_courses.programID = programs.PID JOIN course_sections on course_sections.ID = courses.ID WHERE programs.PID=".$row['PID']." and course_sections.semesterID=".$semm['ID'];
                    $programCoursesSec=$db->query($sql_coursesSec);

                    $sectionInf=$db->prepare("SELECT course_sections.*, courses.preRequisites, courses.courseCode FROM course_sections join courses on course_sections.courseID=courses.ID where course_sections.ID=?");
                
                    if(isset($_POST['switchsection'])){

                       
                        echo "
                            <div class='container' id='popup'>
                            
                            ";
                                    // $selectedSecInfo=$_POST['selectedSection'];
                                    // $selectedSecDetails=explode(' | ',$selectedSecInfo);

                                echo" 
                                <form method='post'> 
                                <div> <label>Section: </label>
                                
                                   <select name='selectSwC'>";

                                    foreach($enrollsectSemALL as $section){
                                        $sectionInf->execute(array($section['sectionID']));
                                        $currSec=$sectionInf->fetch();
                                        echo"   <option selected value=".$section['sectionID']."> ".$currSec['courseCode']." | ".$section['sectionNumber']." </option>";
                                    }
                                    
                            echo"   </select> 
                                </div>
                                <div> <label>Section To Swap: </label>
                                <select name='selectToSwC'>
                                <option hidden disabled selected value> Select a course and section </option>";
                                while ($courses=$programCoursesSec->fetch(PDO::FETCH_ASSOC)) {
                                    $enrolled=false;
                                    $prevEnrolled_sections->execute(); 
                                    while($passedCourses=$prevEnrolled_sections->fetch(PDO::FETCH_ASSOC)){
                                            if ($courses['ID'] == $passedCourses['courseID'] ){
                                                //$sectionInf->execute(array($courses['ID']));
                                                //$selectSwap=$sectionInf->fetch();
                                                // get section number from course id for this SEMESTER
                                                $enrolled=true;
                                                break;
                                            }
                                    } 
                                    if (!$enrolled){
                                        $sql_currentSections="SELECT * FROM course_sections join courses on course_sections.courseID=courses.ID WHERE courseID=".$courses['ID']." and semesterID=".$semm['ID'];
                                        $currentSectionsrec=$db->query($sql_currentSections);
                                        $currentSections=$currentSectionsrec->fetch(PDO::FETCH_ASSOC);
                                        if($currentSections){
                                            echo "<option  value='".$currentSections['ID']."'>".$currentSections['courseCode']." | ".$currentSections['sectionNumber']."</option>  ";
                                        }
                                        
                                    } 
                                }  
                                echo"</select>
                                </div>
                                <div>
                                <button id='close-popup'>Cancel</button> 
                                <button type='submit' name='swapSections'>Swap</button>
                                </div>
                            </form>
                            </div>";
                        

                            if(isset($_POST['selectSwC']) && isset($_POST['selectToSwC']) && isset($_POST['swapSections'])){
                                $oldSID=$_POST['selectSwC'];
                                $newSID=$_POST['selectToSwC'];
                                //check for seats, preReqs and conflicts again 

                                $enrollID=$db->prepare("SELECT ID from enrollments where sectionID=? and studentID=?");
                                $enrollID->execute(array($oldSID, $row['ID']));
                                $eID->fetch()['ID'];

                                $sectionInf->execute(array($newSID));
                                $newSect=$sectionInf->fetch();
                                
                                $preReqs=$newSect['preRequisites'];
                                $lectureConflictsrec=$db->query("SELECT enrollments.ID, enrollments.sectionID, COUNT(*) as num FROM enrollments join course_sections on enrollments.sectionID=course_sections.ID WHERE startTime<='".$newSect['startTime']."' AND endTime>='".$newSect['endTime']."' AND days='".$newSect['days']."' AND semesterID=".$semm['ID']." and enrollments.studentID=$stID");
                                // $lectureConflictsrec->bindParam(':sTime',$newSect['startTime']);
                                // $lectureConflictsrec->bindParam(':eTime',$newSect['endTime']);
                                // $lectureConflictsrec->bindParam(':days',$newSect['days']);
                                // $lectureConflictsrec->bindParam(':smID',$semm['ID']);
                                // $lectureConflictsrec->bindParam(':stID',$stEnrollID['ID']);
                                // $lectureConflictsrec->execute();
                                //$lectureConflictsrec-> execute(array($newSect['startTime'], $newSect['endTime'],$newSect['days'], $semm['ID'], $stEnrollID['ID']));
                                $lectureConf=$lectureConflictsrec->fetch()['num'];

                                $finalConflictrec=$db->query(" SELECT enrollments.ID, enrollments.sectionID, COUNT(*) as num FROM enrollments join course_sections on enrollments.sectionID=course_sections.ID WHERE course_sections.finalDate=".$newSect['finalDate']." AND  course_sections.semesterID=".$semm['ID']." AND enrollments.studentID=$stID");
                                // $finalConflictrec->bindParam(':fD',$newSect['finalDate']);
                                // $finalConflictrec->bindParam(':sID',$semm['ID']);
                                // $finalConflictrec->bindParam(':stID',$stEnrollID['ID']);
                                // $finalConflictrec->execute();
                                //$finalConflictrec->execute(array($newSect['finalDate'],$semm['ID'],$stEnrollID['ID']));
                                $finalConf=$finalConflictrec->fetch()['num'];
                                $enrolled=true;
                                $preReqC=0;
                                    if($newSect['availableSeats']>=1){
                                        if( $finalConf <1 || $lectureConf<1){
                                            while($passedCourses=$prevEnrolled_sections->fetch()){
                                                $preReq= explode(',',$preReqs);
                                                //print_r($preReq);
                                                for($i=0; $i<count($preReq); $i++){
                                                    if($passedCourses['courseCode']==$preReq[$i]){
                                                        $preReqC++;}   
                                                }     
                                            }
                                        }
                                        else{
                                            //pop up
                                            $enrolled=false;
                                        }
                                    }else{
                                        //pop up
                                        $enrolled=false;
                                    }

                                    if($enrolled && count($preReq)==$preReqC){
                                    
                                        $switchSectionEnroll->execute(array($newSID, $eID));
                                        $newSect['availableSeats']=$newSect['availableSeats']-1; 
                                        $updateAvailbSeats->bindParam(':seats',$newSect['availableSeats']);
                                        $updateAvailbSeats->bindParam(':secID',$newSID);
                                        $updateAvailbSeats->execute();

                                        //$updateAvailbSeats->execute(array($newSect['availableSeats'], $newSID));
                                        $sectionInf->execute(array($oldSID));
                                        $oldSect=$sectionInf->fetch();
                                        $oldSect['availableSeats']=$oldSect['availableSeats']+1;
                                       
                                        $updateAvailbSeats->bindParam(':seats',$oldSect['availableSeats']);
                                        $updateAvailbSeats->bindParam(':secID',$oldSID);
                                        $updateAvailbSeats->execute();
                                        //$updateAvailbSeats->execute(array($oldSect['availableSeats'],$oldSID));
                                        echo "<h5>switched seat successfully! </h5>
                                        ";
                                    }
                                    else{
                                        echo "<h5>course has not been switched </h5>
                                         ";
                                    }
                                

                            }elseif(isset($_POST['swapSections'])){
                                echo "<h5> select a section to switch with </h5>";
                            }
                       
                        //echo "<h5>switched seat successfully! </h5>";
                        
                        unset($_POST);
                    
                    }
                   
                    // ************************* DROP COURSE ***************************
                    
                    $deleteEnroll=$db->prepare("DELETE FROM enrollments WHERE sectionID=:sID and studentID=:stID");

                    // $updateAvailbSeats=$db->prepare("UPDATE course_sections set availableSeats=? where sectionID=? ");
                                
                    if(isset($_POST['dropcourse'])&&  isset($_POST['selectedSection'])){
                        
                       
                        $selectedSecInfo=$_POST['selectedSection'];
                        $selectedSecDetails=explode(' | ',$selectedSecInfo);
                        
                        if(count($enrollsectSemALL)<=3){
                            echo "you cannot have less than 3 courses ";

                        }else{
                            $deleteEnroll->bindParam(':sID', $selectedSecDetails[7]);
                            $deleteEnroll->bindParam(':stID', $stEnrollID['ID']);
                            $deleteEnroll->execute();
                            //$deleteEnroll->execute(array($selectedSecDetails[7], $stEnrollID['ID']));
                            $selectedSecDetails[6]=$selectedSecDetails[6]+1;
                            $updateAvailbSeats->bindParam(':seats',$selectedSecDetails[6]);
                            $updateAvailbSeats->bindParam(':secID',$selectedSecDetails[7]);
                            $updateAvailbSeats->execute();
                            //$updateAvailbSeats->execute(array($selectedSecDetails[6],$selectedSecDetails[7]));
                            echo "<h5>removed seat successfully! </h5>";
                        };

                        unset($_POST);
                    }elseif(isset($_POST['dropcourse'])){
                        // popup-> must select course
                        echo "select course before dropping";
                        unset($_POST);
                    } 

                    
                    $db->commit();
                    $db=null;

                }catch (PDOException $e) {
                    // rollback transaction in case of errors
                    $db->rollBack();
                    die("Error: " . $e->getMessage());
                }
                
              
            ?>
                <div  id='display-sched'>
                                        <div class='container' id='sched'>
                                            <?php 
                                            require('schedule.php');
                                            

                                            yourSched($enrollsectSemALL);

                                            ?>
                                        </div>
                
            </div>
       

            
        </div>
    </div>
    <!-- Javascript file -->
    <script src="js/sidenav.js"></script>
    <script>


        // Get references to button and pop up elements
       var openButton = document.getElementById('switchS');
       var swap =document.getElementById('sW');
        var popup = document.getElementById('popup');
        var popup2=document.getElementById('popup2');
        var closeButton = document.getElementById('close-popup');

        // Add an event listener to open button to show the pop up
        
        openButton.addEventListener('click', function() {
        //event.preventDefault();
        popup.style.display = 'block';
        });

        swap.addEventListener('click', function() {
        //event.preventDefault();
        popup.style.display = 'block';
        });


        // Add an event listener to the close button to hide the pop up
        closeButton.addEventListener('click', function() {
        popup2.style.display = 'none';
        });



    </script>
</body>


</html>