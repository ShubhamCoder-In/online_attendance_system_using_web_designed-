<div class="student-container">
    <h2>Student Profile</h2>

    <?php
    // Include the MySQL configuration file
    require_once('./php_configue/mysql2.php');

    // Assuming the session contains student_key
    $student_key = $_SESSION['id'];

    $sql = "SELECT sl.student_id, sl.student_name, sl.date_of_birth, sl.gender, c.city_name AS city, s.state_name AS state, co.course_name AS course, b.branch_name AS branch, sem.semester_year AS semester_year, sl.contact, sl.email, sl.session FROM student_list sl LEFT JOIN all_cities c ON sl.city = c.city_key LEFT JOIN all_states s ON sl.state = s.state_code LEFT JOIN course_list co ON sl.course = co.course_key LEFT JOIN branch_list b ON sl.branch = b.branch_key LEFT JOIN semester sem ON sl.semester = sem.semester_key WHERE sl.student_id = '$student_key'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="personal-details">
                <div class="profile_img">
                    <img src="./image/student.png" alt="Profile Picture">
                </div>
                <div class="side_info">
                    <h3>Personal Details</h3>
                    <div class="profile-info">
                        <label>Name</label><span><?php echo $row['student_name']; ?></span>
                    </div>
                    <div class="profile-info">
                        <label>Date of Birth</label><span><?php echo $row['date_of_birth']; ?></span>
                    </div>
                    <div class="profile-info">
                        <label>Gender</label><span><?php echo $row['gender']; ?></span>
                    </div>
                    <div class="profile-info">
                        <label>City</label><span><?php echo $row['city']; ?></span>
                    </div>
                    <div class="profile-info">
                        <label>State</label><span><?php echo $row['state']; ?></span>
                    </div>
                </div>
            </div>
            <div class="contact-details">
                <h3>Contact Details</h3>
                <div class="profile-info">
                    <label>Contact</label><span><?php echo $row['contact']; ?></span>
                </div>
                <div class="profile-info">
                    <label>Email</label><span><?php echo $row['email']; ?></span>
                </div>
            </div>
            <div class="academic-details">
                <h3>Academic Details</h3>
                <div class="profile-info">
                    <label>Course</label><span><?php echo $row['course']; ?></span>
                </div>
                <div class="profile-info">
                    <label>Branch</label><span><?php echo $row['branch']; ?></span>
                </div>
                <div class="profile-info">
                    <label>Semester</label><span><?php echo $row['semester_year']; ?></span>
                </div>
                <div class="profile-info">
                    <label>Session</label><span><?php echo $row['session']; ?></span>
                </div>
            </div>
    <?php
        }
    } else {
        echo "Student not found.";
    }
    ?>

    <div class="button-container">
        <button class="button" onclick="window.location.href='?page=profile&edit=true'">Edit Profile</button>
    </div>
</div>