<?php

require_once("./php_function/fun.php");
require_once("./php_configue/mysql2.php");
$sql_course = "SELECT course_key as id, course_name as name FROM course_list";
$sql_semester = "SELECT semester_key as id, semester_year as name FROM semester";
$sql_branch = "SELECT branch_key as id, branch_name as name FROM branch_list";
if (isset($_GET['edit'])) {
    $value = $_GET['edit'];
    $sql_row_subject = "SELECT s.subject_name AS 'Subject Name',t.name as'teacher name', s.course AS 'Course', s.branch AS 'Branch', s.semester AS 'Semester' FROM subject_list s JOIN teacher_list t ON s.teacher_name = t.teacher_key where s.subject_key = $value";
    $row = fetch_data($sql_row_subject, $conn);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject_id = $_GET['edit'];
    $subject_name = $_POST['subject_name'];
    $course = $_POST['Course'];
    $branch = $_POST['Branch'];
    $semester = $_POST['Semester'];
    $sql_update = "UPDATE subject_list SET subject_name = '$subject_name', course = '$course', branch = '$branch', semester = '$semester' WHERE subject_key = '$subject_id'";
    $result = mysqli_query($conn, $sql_update);
    if ($result) {
        $_SESSION['alert'] ='update succefully !!';
    } else {
        $_SESSION ='something worng try again !! ';
    }
}
?>
<div class="container-customize">
    <div class="flex-row">
        <h2>Subject List</h2>
    </div>
    <?php
    $teacher = $_SESSION['id'];
    $sql = "SELECT s.subject_name AS 'Subject Name', c.course_name AS 'Course', b.branch_name AS 'Branch', sem.semester_year AS 'Semester', s.subject_key as id FROM subject_list s JOIN course_list c ON s.course = c.course_key JOIN branch_list b ON s.branch = b.branch_key JOIN semester sem ON s.semester = sem.semester_key where s.teacher_name = 3";

    // Define table headers
    $tableHeaders = "<tr><th>Subject Name</th><th>Course</th><th>Branch</th><th>Semester</th><th> update</th></tr>";

    // Call the function to display the table
    showTable($conn, $sql, $tableHeaders);
    ?>
    <?php if(isset($_GET['edit'])) {
    ?>   <div class="flex-row">
        <h1>Subject Details Customization</h1>
        </div>
        
        <form class="flex-row" action="<?php echo '?page=customization&edit=' . $_GET['edit']; ?>" method="post">
            <div class="flex-column">
                <label for="subject_name">Subject Name:</label>
                <input type="text" id="subject_name" name="subject_name" value="<?php echo $row['Subject Name']; ?>" required>
            </div>
            <div class="flex-column">
                <label for="course">Course:</label>
                <select name="Course" id="Course" class="Course">
                    <?php dropdwn($sql_course, $conn, $row['Course']); ?>
                </select>
            </div>
            <div class="flex-column">
                <label for="branch">Branch:</label>
                <select name="Branch" id="Branch" class="Branch">
                    <?php dropdwn($sql_branch, $conn, $row['Branch']); ?>
                </select>
            </div>
            <div class="flex-column">
                <label for="semester">Semester:</label>
                <select name="Semester" id="Semester" class="Semester">
                    <?php dropdwn($sql_semester, $conn, $row['Semester']); ?>
                </select>
            </div>
            <div class="flex-column">
                <button type="submit">Submit</button>
            </div>
        </form>
    <?php } ?>
</div>