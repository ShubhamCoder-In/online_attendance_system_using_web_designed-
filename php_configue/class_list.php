<br>
<div class="flex-row">
        <h1> Add new course on list</h1>
    </div>
<form action="./php_configue/state2.php?teacher_id=true" method="post">
    <div class="flex-row">
        <div class="flex-column">
            <label for="course">course</label>
            <select name="course" id="course" required></select>
        </div>
        <div class="flex-column">
            <label for="branch">branch</label>
            <select name="branch" id="branch" required></select>
        </div>
        <div class="flex-column">
            <label for="semester">semester</label>
            <select name="semester" id="semester" required></select>
        </div>
        <div class="flex-column">
            <label for="subject">subject</label>
            <input type="text" name="subject" id="suject" required>
        </div>
        <div class="flex-column">
            <div class="btn-group">
                <button type="reset">cancal</button>
                <button type="submit">Add</button>
            </div>
        </div>
    </div>
</form>
<section class="sect2">
    <br>
<div class="flex-row">
        <h1> register courses table </h1>
    </div>
    <div class="work_list">
        <table class="subject_list">
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