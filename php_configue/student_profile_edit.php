<div class="student-container">
    <h2>Student Profile</h2>
    <form method="post">
        <?php

        // Include the MySQL configuration file
        require_once('./php_configue/mysql2.php');

        // Assuming the session contains student_key
        $student_key = $_SESSION['id'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle form submission
            $newName = $_POST['name'];
            $newDOB = $_POST['dob'];
            $newGender = $_POST['gender'];
            $newContact = $_POST['contact'];

            $sql = "UPDATE student_list SET student_name='$newName', date_of_birth='$newDOB', gender='$newGender',contact='$newContact' WHERE student_id='$student_key'";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Profile updated successfully!</p>";
            } else {
                echo "Error updating profile: " . $conn->error;
            }
        }

        $sql = "SELECT sl.student_name, sl.date_of_birth, sl.gender, c.city_name AS city, s.state_name AS state, sl.contact, sl.email, co.course_name AS course, b.branch_name AS branch, sem.semester_year AS semester_year,sl.session FROM student_list sl LEFT JOIN all_cities c ON sl.city = c.city_key LEFT JOIN all_states s ON sl.state = s.state_code LEFT JOIN course_list co ON sl.course = co.course_key LEFT JOIN branch_list b ON sl.branch = b.branch_key LEFT JOIN semester sem ON sl.semester = sem.semester_key WHERE sl.student_id = '$student_key'";
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
                            <label>Name</label>
                            <input type="text" id="name" name="name" value="<?php echo $row['student_name']; ?>" <?php echo ($row['student_name'] == 'John Doe') ? '' : ''; ?>>
                        </div>
                        <div class="profile-info">
                            <label>Date of Birth</label>
                            <input type="text" id="dob" name="dob" value="<?php echo $row['date_of_birth']; ?>" <?php echo ($row['date_of_birth'] == '2000-01-01') ? '' : ''; ?>>
                        </div>
                        <div class="profile-info">
                            <label>Gender</label>
                            <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>">
                        </div>
                        <div class="profile-info">
                            <label>City</label>
                            <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" <?php echo ($row['city'] == 'New York') ? '' : 'disabled'; ?>>
                        </div>
                        <div class="profile-info">
                            <label>State</label>
                            <input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" <?php echo ($row['state'] == 'NY') ? '' : 'disabled'; ?>>
                        </div>
                    </div>
                </div>
                <div class="contact-details">
                    <h3>Contact Details</h3>
                    <div class="profile-info">
                        <label>Contact</label>
                        <input type="text" id="contact" name="contact" value="<?php echo $row['contact']; ?>">
                    </div>
                    <div class="profile-info">
                        <label>Email</label>
                        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" <?php echo ($row['email'] == 'john@example.com') ? '' : 'disabled'; ?>>
                    </div>
                </div>
                <div class="academic-details">
                    <h3>Academic Details</h3>
                    <div class="profile-info">
                        <label>Course</label>
                        <input type="text" id="course" name="course" value="<?php echo $row['course']; ?>" disabled>
                    </div>
                    <div class="profile-info">
                        <label>Branch</label>
                        <input type="text" id="branch" name="branch" value="<?php echo $row['branch']; ?>" disabled>
                    </div>
                    <div class="profile-info">
                        <label>Semester</label>
                        <input type="text" id="semester" name="semester" value="<?php echo $row['semester_year']; ?>" disabled>
                    </div>
                    <div class="profile-info">
                        <label>Session</label><span><?php echo $row['session']; ?></span>
                    </div>
                </div>
                <div class="button-container">
                    <button type="button" id="edit-btn" class="button">Edit</button>
                    <button type="submit" id="save-btn" class="button" style="display: none;">Save Changes</button>
                    <button type='button' onclick="window.location.href='?page=profile'" class="button">Go Back</button>
                </div>
        <?php
            }
        } else {
            echo "Student not found.";
        }
        ?>
    </form>
</div>
<script>
    document.getElementById('edit-btn').addEventListener('click', function() {
        var inputs = document.querySelectorAll('input[readonly]');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].removeAttribute('readonly');
        }
        document.getElementById('edit-btn').style.display = 'none';
        document.getElementById('save-btn').style.display = 'block';
    });
</script>