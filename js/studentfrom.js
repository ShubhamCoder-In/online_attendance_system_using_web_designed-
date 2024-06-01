var stateSelect = document.getElementById("state");
var citySelect = document.getElementById("city");
var courseselect = document.getElementById("course");
var branchselect = document.getElementById("branch");
var semesterselect = document.getElementById("semester");
stateSelect.innerHTML = "";
fetch("../php_configue/state2.php?country=true")
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    console.log(response);
    return response.json();
  })
  .then((data) => {
    data.forEach((state) => {
      var option = document.createElement("option");
      option.text = state.name;
      option.setAttribute("value", state.code);
      stateSelect.add(option);
    });
  })
  .catch(() => {
    console.log("");
  });

let count = 0;
function populateCities() {
  var selectedState = stateSelect.value;
  citySelect.innerHTML = "";
  fetch("../php_configue/state2.php?state=" + selectedState + "&course=true")
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      // city detail of list
      data[0].forEach((city) => {
        var option = document.createElement("option");
        option.text = city.city;
        option.setAttribute("value", city.code);
        citySelect.add(option);
      });

      // course detail of list
      if (count < 1) {
        data[1].forEach((course) => {
          var option = document.createElement("option");
          option.text = course.name;
          option.setAttribute("value", course.id);
          courseselect.add(option);
        });

        // branch detail of list
        data[2].forEach((branch) => {
          var option = document.createElement("option");
          option.text = branch.name;
          option.setAttribute("value", branch.id);
          branchselect.add(option);
        });

        // semester year of list
        data[3].forEach((semester) => {
          var option = document.createElement("option");
          option.text = semester.year;
          option.setAttribute("value", semester.id);
          semesterselect.add(option);
        });
        count++;
      }
    })
    .catch(() => {
      console.log("something worng try agin");
    });
}
let err = document.querySelector(".error_text");
console.log(err);
// fetch city
stateSelect.addEventListener('change',()=>{
  console.log("change");
  populateCities();
  });
// Tosubmit function
function Tosubmit() {
  let email = document.getElementById("student-email").value;
  let emailv = /[a-zA-Z\.\-0-9]*[@][a-zaA-Z]*[\.][a-z]{2,4}/gm;
  if (email.match(emailv)) {
    err.innerHTML = "";
    return true;
  } else {
    err.innerHTML = "plesea enter valid email";
  }
  return false;
}
