<section class="sect3">
    <div class="flex-row">
        <h1>attendance Record</h1>
    </div>
    <div class="work_list">
        <table class="attendance_view">
            <tr>
                <th>Course</th>
                <th>branch</th>
                <th>semester</th>
                <th>sudject</th>
                <th>student recorde</th>
            </tr>
        </table>
    </div>
</section>
<section class="sect3">

    <?php
    if (isset($_GET['value'])) {
        $_SESSION['value'] = $_GET['value'];
        echo '<div class="flex-row">
        <h1>choose list to recorde of student attendence on date </h1>
        </div>
        <div class="small_table">
        <table class="attendance-date">
        <tr>
        <th>s no</th>
        <th>recorde dates</th>
        </tr>
        </table>
        </div>
        ';
    }
    ?>
</section>