<?php
if(isset($_GET['edit'])){
    echo'
    <br>
    <div class="flex-row">
    <h1>Add New student in class </h1>
    </div>
    <form action="./php_configue/state2.php?subject=true" method="post">
    <div class="flex-row">
    <div class="flex-column">
    <label for="course">roll number</label>
    <input type="text" name="student_id" id="student_id" required>
    </div>
    <div class="flex-column">
    <label for="student_name">name</label>
    <input type="text" name="student_name" id="student_name" required>
    </div>
    <div class="flex-column">
    <label for="batch">batch</label>
    <input type="text" name="batch" id="batch" required>
    </div>
    <div class="flex-column">
    <label for="subject">enrollement id</label>
    <input type="text" name="enrollment_id" id="Enrollment_id" required>
    </div>
    <div class="flex-column">
    <div class="btn-group">
    <button type="reset">cancal</button>
    <button type="submit">Add</button>
    </div>
    </div>
    </div>
    </form>
    ';
}

?>
<br>
<section class="sect4">
    <div class="flex-row">
        <h1>register student detail in class </h1>
    </div>
    <div class="work_list">
        <table class="student_list">
            <tr>
                <th>roll number</th>
                <th>student name </th>
                <th>batch</th>
                <th>enrollement id</th>
                <th>action</th>
            </tr>
        </table>
    </div>
</section>