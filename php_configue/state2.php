<?php
require_once("../php_configue/mysql2.php");
require_once("../php_function/fun.php");
if (isset($_GET['country'])) {
    $country = $_GET['country'];
    $sql5 = "select state_code as code, state_name as name from all_states where country_code like '+91'";
    $res3 = isfetch($sql5, $conn);
    echo json_encode($res3);
}
if (isset($_GET['state']) && $_GET['state'] != NULL) {
    $state = $_GET['state'];
    // call required file
    // implement sql query for required data
    $sql1 = "select city_name as city, city_key as code from all_cities where state_code like " . $state;
    $sql2 = " select course_key as id , course_name as name from course_list";
    $sql3 = " select branch_key as id , branch_name as name from branch_list";
    $sql4 = " select semester_key as id , semester_year as year from semester";
    $res1 = isfetch($sql1, $conn);
    if (isset($_GET['course']) && $_GET['course'] != NULL){
    $res2 = [isfetch($sql1, $conn), isfetch($sql2, $conn), isfetch($sql3, $conn), isfetch($sql4, $conn)];
        echo json_encode($res2);}
    else{
        echo json_encode($res1);
    }
}
else if (isset($_GET['course']) && $_GET['course'] == true) {
    $sql2 = " select course_key as id , course_name as name from course_list";
    $sql3 = " select branch_key as id , branch_name as name from branch_list";
    $sql4 = " select semester_key as id , semester_year as year from semester";
    $res4 = [isfetch($sql2, $conn), isfetch($sql3, $conn), isfetch($sql4, $conn)];
    echo json_encode($res4);
}
if (isset($_GET['teacher_id']) && $_GET['teacher_id'] == true) {
    session_start();
    // var_dump($_SESSION);
    $name = $_SESSION['user'];
    $email = $_SESSION['email'];
    $sql6 = "select teacher_key as 'key' from teacher_list where name like '$name' and email = '$email'";
    $teacher = isfetch($sql6, $conn);
    $key = $teacher[0]['key'];
    if (!isset($_SESSION['id'])) $_SESSION['id'] = $key;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($teacher)) {
        $subject = $_POST['subject'];
        $course = $_POST['course'];
        $branch = $_POST['branch'];
        $semester = $_POST['semester'];
        $sql7 = "INSERT INTO `subject_list` VALUES (NULL,'$subject','$key', '$course', '$branch', '$semester')";
        $result3 = mysqli_query($conn, $sql7);
        if ($result3) {
            header("location: ../teacher_panel.php?page=course%20and%20class");
        }
    }
    if (isset($_GET['subject'])) {
        $sql8 = "select `course_name` as `course`,`branch_name` as `branch`,`semester_year` as `semester`,`subject_name` as `subject` , `subject_key` as `key` from `subject_list` INNER JOIN `teacher_list` ON `subject_list`.`teacher_name` = `teacher_list`.`teacher_key` INNER JOIN `course_list` ON `subject_list`.`course` = `course_list`.`course_key` INNER JOIN `branch_list` ON `subject_list`.`branch`= `branch_list`.`branch_key` INNER JOIN `semester` ON `subject_list`.`semester` = `semester`.`semester_key` where `teacher_name` = '$key'";
        echo json_encode(isfetch($sql8, $conn));
    }
}
else if(isset($_GET['subject']) || (isset($_GET['attendance']))) {
    session_start();
    if ($_SESSION['value'] != null) {
        $subject = $_SESSION['value'];
        $sql9 = "SELECT subject_key as `subject`, semester FROM `subject_list` WHERE subject_key = '$subject'";
        $res = isfetch($sql9, $conn);
        $subject_key = $res[0]['subject'];
        $semester = $res[0]['semester'];
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST" && !isset($_GET['attendance'])) {
        $id = $_POST['student_id'];
        $name = $_POST['student_name'];
        $batch = $_POST['batch'];
        $enrollment = $_POST['enrollment_id'];
        $teacher_id = $_SESSION['id'];
        $sql10 = "INSERT INTO `student_records` VALUES (NULL, '$id', '$name', '$batch', '$enrollment', '$semester', '$subject_key','$teacher_id')";
        $result4 = mysqli_query($conn, $sql10);
        if ($result4) {
            header("location: ../teacher_panel.php?page=student%20recorde");
        }
    }
    if (isset($_GET['student'])) {
        $sql11 = "SELECT * FROM `student_records` WHERE `semester` = '$semester' AND `subject` = '$subject_key'";
        echo json_encode(isfetch($sql11, $conn));
    }
    if (isset($_GET['delete']) && $_SESSION['user_type'] == "teacher") {
        $key = $_GET['delete'];
        $sql12 = "delete from student_records where student_key = '$key'";
        $result5 = mysqli_query($conn, $sql12);
        if ($result5) {
            header("location: ../teacher_panel.php?page=student%20recorde");
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['attendance'])) {

        $sql13 = "SELECT student_key as 'id'  FROM `student_records` WHERE `semester` = '$semester' AND `subject` = '$subject_key'";
        $bool = false;
        $student_detail = isfetch($sql13, $conn);
        $date = $_POST['date'];
        $user_id = $_SESSION['id'];
        $sql14 = "INSERT INTO `attendance_data` VALUES (NULL, '$subject_key', '$date', '$user_id')";
        $result6 = mysqli_query($conn, $sql14);
        if ($result6) {
            $sql15 = "SELECT marking_id as id  FROM `attendance_data` WHERE `subject_id` = '$subject_key' AND `date` = '$date' AND `teacher_id` = '$user_id'";
            $register = isfetch($sql15, $conn);
            $register_date =  $register[0]['id'];
            echo $register_date;
        }
        for ($i = 0; $i < sizeof($student_detail); $i++) {
            $id = $student_detail[$i]['id'];
            $status = $_POST['attendance'][$i];
            $sql16 = " INSERT INTO `attendance_records` VALUES (NULL, '$id','$register_date', '$status')";
            $result6 = mysqli_query($conn, $sql16);
            if ($result6) {
                $bool = true;
            } else {
                $bool = false;
            }
        }
        if ($bool) {
            $_SESSION['alert'] = "attendance save successfuly";
            header("location: ../teacher_panel.php?page=marking%20attendence");
        }
    }
    if (isset($_GET['subject']) && $_SESSION['value'] != null && !isset($_GET['student'])) {
        $user_id = $_SESSION['id'];
        $sql17 = "SELECT attendance_data.marking_id as id, attendance_data.date FROM `attendance_data` INNER JOIN subject_list ON attendance_data.subject_id = subject_list.subject_key INNER JOIN branch_list ON subject_list.branch = branch_list.branch_key INNER JOIN semester ON subject_list.semester = semester.semester_key WHERE attendance_data.teacher_id = $user_id  and attendance_data.subject_id = $subject_key";
        echo json_encode(isfetch($sql17, $conn));
    }
}
if (isset($_GET['attendance_view']) && $_GET['attendance_view'] == true) {
    session_start();
    // var_dump($_SESSION);
    if (isset($_SESSION['ViewAttendance'])) {
        $register_key = $_SESSION['ViewAttendance'];
        $sql18 = "SELECT attendance_records.attendance_key as id, roll_number, name, batch, enrollment, attendance_status as `status`, date , register_date FROM `attendance_records` INNER JOIN student_records ON attendance_records.student_name = student_records.student_key INNER JOIN attendance_data ON attendance_data.marking_id = attendance_records.register_date WHERE attendance_records.register_date = $register_key ORDER BY attendance_data.date DESC";
        echo json_encode(isfetch($sql18, $conn));
    }
}

if(isset($_GET['attenenceUpdate']) && isset($_GET['edit'])!=null && isset($_GET['status'])){
session_start();
if($_SESSION['user_type']='teacher' && isset($_SESSION['ViewAttendance'])){
    $key = $_GET['edit'];
    if(isset($_GET['status']) && $_GET['status'] =='true'){
      $Sql19 = "UPDATE `attendance_records` SET `attendance_status` = 'present' WHERE `attendance_records`.`attendance_key` = $key";
      $result11 = mysqli_query($conn, $Sql19);
      if ($result11) {
          $_SESSION['alert'] = "attendence update to 'present' sccessfully";
          header("location: ../teacher_panel.php?page=attendance%20record&show=".$_SESSION['ViewAttendance']);
        }
    }
    else{
        $sql20 = "UPDATE `attendance_records` SET `attendance_status` = 'absent' WHERE `attendance_records`.`attendance_key` = $key";
        $result12 = mysqli_query($conn, $sql20);
    if ($result12) {
         $_SESSION['alert'] = "attendence update to 'absent' sccessfully";
        header("location: ../teacher_panel.php?page=attendance%20record&show=".$_SESSION['ViewAttendance']);
    }
  }
}

}