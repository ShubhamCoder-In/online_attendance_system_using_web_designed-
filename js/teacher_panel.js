var request = [
  "./php_configue/state2.php?course=true",
  "./php_configue/state2.php?subject=true&student=true",
  "./php_configue/state2.php?teacher_id=true&subject=true",
  "./php_configue/state2.php?subject=true&student=true",
  "./php_configue/state2.php?attendance=true&subject=true",
  "./php_configue/state2.php?attendance_view=true",
];
var subject_id;
var register_id;
// function experiesen
function fetch_qurrey(url, request = () => null) {
  const res = fetch(url)
    .then((response) => {
      if (!response.ok) {
        throw new Error("network response not ok");
      }
      return response.json();
    })
    .then(request)
    .catch((err) => {
      // console.log(err);
    });
}

let selectsubject = (data) => {
  var courseselect = document.getElementById("course");
  var branchselect = document.getElementById("branch");
  var semesterselect = document.getElementById("semester");

  // course detail of list
  data[0].forEach((course) => {
    var option = document.createElement("option");
    option.text = course.name;
    option.setAttribute("value", course.id);
    courseselect.add(option);
  });

  // branch detail of list
  data[1].forEach((branch) => {
    var option = document.createElement("option");
    option.text = branch.name;
    option.setAttribute("value", branch.id);
    branchselect.add(option);
  });

  // semester year of list
  data[2].forEach((semester) => {
    var option = document.createElement("option");
    option.text = semester.year;
    option.setAttribute("value", semester.id);
    semesterselect.add(option);
  });
};

let subjectList = (data) => {
  var tables1 = document.getElementsByClassName("subject_list");
  var tbody = tables1[0].children;
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var btn = document.createElement("a");
    btn.setAttribute(
      "href",
      "./teacher_panel.php?page=student%20recorde&value=" + row.key + "&edit=true"
    );
    btn.setAttribute("class", "student_view");
    btn.innerHTML = "select";
    td1.innerHTML = row.course;
    td2.innerHTML = row.branch;
    td3.innerHTML = row.semester;
    td4.innerHTML = row.subject;
    td5.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tbody[0].appendChild(tr);
  });
};
let classList = (data) => {
  var tables1 = document.getElementsByClassName("subject_view");
  var tbody = tables1[0].children;
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var btn = document.createElement("a");
    btn.setAttribute(
      "href",
      "./teacher_panel.php?page=student%20recorde&value=" + row.key
    );
    btn.setAttribute("class", "student_view");
    btn.innerHTML = "select";
    td1.innerHTML = row.course;
    td2.innerHTML = row.branch;
    td3.innerHTML = row.semester;
    td4.innerHTML = row.subject;
    td5.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tbody[0].appendChild(tr);
  });
};
let studentList = (data) => {
  var tables6 = document.getElementsByClassName("student_list");
  var tbody = tables6[0].children;
  console.log(tbody);
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var btn = document.createElement("a");
    btn.setAttribute(
      "href",
      "./php_configue/state2.php?subject=true&delete=" + row.student_key
    );
    btn.setAttribute("class", "student_view");
    btn.innerHTML = "remove";
    td1.innerHTML = row.roll_number;
    td2.innerHTML = row.name;
    td3.innerHTML = row.batch;
    td4.innerHTML = row.enrollment;
    td5.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tbody[0].appendChild(tr);
  });
};

let attendanceRegistertList = (data) => {
  var tables1 = document.getElementsByClassName("list_subject");
  var tbody = tables1[0].children;
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var btn = document.createElement("a");
    btn.setAttribute(
      "href",
      "./teacher_panel.php?page=marking%20attendence&value=" + row.key
    );
    btn.setAttribute("class", "student_view");
    btn.innerHTML = "select";
    td1.innerHTML = row.course;
    td2.innerHTML = row.branch;
    td3.innerHTML = row.semester;
    td4.innerHTML = row.subject;
    td5.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tbody[0].appendChild(tr);
  });
};

let attendanceMark = (data) => {
  var tables2 = document.getElementsByClassName("make_attendance");
  var tbody = tables2[0].children;

  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var select1 = document.createElement("select");
    var opt1 = document.createElement("option");
    var opt2 = document.createElement("option");
    var opt3 = document.createElement("option");
    opt1.setAttribute("value", "absent");
    opt2.setAttribute("value", "present");
    opt3.setAttribute("value", "none");
    opt1.text = "apsent";
    opt2.text = "present";
    opt3.text = "none";
    select1.setAttribute("name", "attendance[]");
    select1.add(opt1);
    select1.add(opt2);
    select1.add(opt3);
    td2.innerHTML = row.roll_number;
    td1.innerHTML = row.name;
    td3.innerHTML = row.batch;
    td4.innerHTML = row.enrollment;
    td5.appendChild(select1);
    console.log(td5);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tbody[0].appendChild(tr);
  });
};

let attendanceViewList = (data) => {
  var tables3 = document.getElementsByClassName("attendance_view");
  var tbody = tables3[0].children;
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var btn = document.createElement("a");
    btn.setAttribute(
      "href",
      "./teacher_panel.php?page=attendance%20record&value=" + row.key
    );
    btn.setAttribute("class", "student_view");
    btn.innerHTML = "view attendance";
    td1.innerHTML = row.course;
    td2.innerHTML = row.branch;
    td3.innerHTML = row.semester;
    td4.innerHTML = row.subject;
    td5.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tbody[0].appendChild(tr);
  });
};

let attendenceViewDate = (data) => {
  var tables4 = document.getElementsByClassName("attendance-date");
  var tbody = tables4[0].children;
  var count = 1;
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var btn = document.createElement("a");
    btn.setAttribute(
      "href",
      "./teacher_panel.php?page=attendance%20record&show=" + row.id
    );
    btn.setAttribute("class", "student_view");
    btn.innerHTML = row.date;
    td1.innerHTML = count;
    td2.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tbody[0].appendChild(tr);
    count++;
  });
};
let studentAttendaceList = (data) => {
  var tables3 = document.getElementsByClassName("studentAttendanceList");
  var tbody = tables3[0].children;
  data.forEach((row) => {
    var tr = document.createElement("tr");
    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var td3 = document.createElement("td");
    var td4 = document.createElement("td");
    var td5 = document.createElement("td");
    var td6 = document.createElement("td");
    var td7 = document.createElement("td");
    var link = document.createElement("a");
    var status;
    if(row.status == "present") status = 'false';
    else status = 'true';

    link.setAttribute(
      "href",
      "./php_configue/state2.php?attenenceUpdate=true&edit="+row.id+"&status="+status
    );
    link.innerHTML = "update";
    td1.innerHTML = row.name;
    td2.innerHTML = row.roll_number;
    td3.innerHTML = row.batch;
    td4.innerHTML = row.enrollment;
    td5.innerHTML = row.status;
    td6.innerHTML = row.date;
    td7.appendChild(link);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    tr.appendChild(td7);

    tbody[0].appendChild(tr);
  });
};
fetch_qurrey(request[0], selectsubject);
fetch_qurrey(request[1], studentList);
fetch_qurrey(request[2], subjectList);
fetch_qurrey(request[2], classList);
fetch_qurrey(request[2], attendanceRegistertList);
fetch_qurrey(request[2], attendanceViewList);
fetch_qurrey(request[3], attendanceMark);
fetch_qurrey(request[4], attendenceViewDate);
fetch_qurrey(request[5], studentAttendaceList);

var list = document.getElementsByClassName("list_iterm");
for (let index = 0; index < list.length; index++) {
  let element = list[index];
  element.addEventListener('click',()=>{
   element.classList.add('active_list')
 });
}