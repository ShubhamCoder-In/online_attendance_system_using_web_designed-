<?php
require_once('./php_configue/mysql2.php');
require_once("./php_function/fun.php");

if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $input_roll_number = $_POST['roll_number'];
    // Fetch student data based on the roll number provided by the user
    $sql_student = "SELECT * FROM `student_records` WHERE roll_number = ? OR enrollment = ?";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("ss", $input_roll_number, $input_roll_number);
    $stmt_student->execute();
    $result_student = $stmt_student->get_result();
    // Check if any student data is found
    if ($result_student->num_rows > 0) {
        $student_data = $result_student->fetch_assoc();
        $student_id = $student_data['student_key']; // Get student_id
    } else {
        $error_message = "Student not found. Please check the roll number.";
    }

    // Fetch available subjects for the selected student
    if (isset($student_id)) {
        $sql_subjects = "SELECT DISTINCT ad.subject_id, sl.subject_name FROM `attendance_records` ar LEFT JOIN attendance_data ad ON ar.register_date = ad.marking_id LEFT JOIN subject_list sl ON sl.subject_key = ad.subject_id WHERE ar.student_name = $student_id";
        $result_subjects = isfetch($sql_subjects, $conn);
    }
}
if (isset($_POST['view_attendence']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = $_POST['subject'];
    $search_id = $_GET['search'];
    $sql_attendence = " SELECT sr.name as `student_name`, sr.name,tl.name,sl.subject_name,ad.date,ar.attendance_status FROM `attendance_records` ar LEFT JOIN attendance_data ad ON ar.register_date = ad.marking_id left join teacher_list tl on ad.teacher_id = tl.teacher_key left join student_records sr on ar.student_name = sr.student_key left join subject_list sl on ad.subject_id = sl.subject_key WHERE ar.student_name = $search_id and ad.subject_id = $subject_id";
    $attendence = isfetch($sql_attendence, $conn);
}
?>

<div class="attendance-container">
    <h1>View Attendance</h1>

    <form action="" method="POST">
        <div class="flex-column">
            <label for="roll_number">Enter Roll Number or Enrollment ID:</label>
            <input type="text" name="roll_number" id="roll_number" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php if (isset($student_id)) { ?>
        <form action="<?php echo "?page=attendance%20record&search=" . $student_id; ?>" method="POST">
        <div class="flex-column">
            <label for="subject">Select Subject:</label>
            <select name="subject" id="subject">
                <?php foreach ($result_subjects as $subject) { ?>
                    <option value="<?php echo $subject['subject_id']; ?>"><?php echo $subject['subject_name']; ?></option>
                <?php } ?>
            </select>
        </div>
            <button type="submit" name="view_attendence">View Attendance</button>
        </form>
    <?php } ?>

    <?php if (!empty($attendence)) {
        $student_name = $attendence[0]['student_name'];
        $subject_name = $attendence[0]['subject_name'];

        echo "<span><b> student name  :</b> $student_name </span>"; 
        echo "<span><b> subject name  :</b>  $subject_name </span>"; 
    ?>
        <table>
            <thead>
                <tr>
                    <th>teacher Name</th>
                    <th>Date</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attendence as $record) { ?>
                    <tr>
                        <td><?php echo $record['name']; ?></td>
                        <td><?php echo $record['date']; ?></td>
                        <td><?php echo $record['attendance_status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No attendance records found.</p>
    <?php } ?>
</div>