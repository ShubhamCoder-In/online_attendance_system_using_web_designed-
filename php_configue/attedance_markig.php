<section class="sect1">
<div class="flex-row">
        <h1>studnet class schedule </h1>
    </div>
    <div class="work_list">
        <table class="list_subject">
            <tr>
                <th>Course</th>
                <th>branch</th>
                <th>semester</th>
                <th>sudject</th>
                <th>mark attendance</th>
            </tr>
        </table>
    </div>
</section>
<section class="student_list_sect sect1">
    <div class="work_list">
        <form action="./php_configue/state2.php?attendance=true" method="post">
            <?php
            if (isset($_GET['value'])) {
                $_SESSION['value'] = $_GET['value'];
                echo '
                <div class="row-div">
                    <div class="column-div">
                       student attendance marking
                    </div>
                    <div class="column-div">
                        <label for="date">date</label>
                        <input type="date" name="date" id="date" required>
                    </div>
                </div>
        <table class="make_attendance">
            <tr>
            <th>name</th>
            <th>roll number</th>
            <th>banch</th>
            <th>enrollment id</th>
            <th>mark attendance</th>
            </tr>
        </table>
        <div class="">
            <div class="flex-column">
                <div class="btn-group">
                    <button type="reset">cancal</button>
                    <button type="submit">submit</button>
                </div>
            </div>
            ';
                } ?>
            </div>
        </form>
    </div>

</section>
