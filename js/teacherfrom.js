var stateSelect = document.getElementById("state");
var citySelect = document.getElementById("city");
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
    console.log("something worng try agin");
  });

function populateCities() {
  var selectedState = stateSelect.value;
  fetch("../php_configue/state2.php?state=" + selectedState)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data1) => {
      // city detail of list
      data1.forEach((city) => {
        var option = document.createElement("option");
        option.text = city.city;
        option.setAttribute("value", city.code);
        citySelect.add(option);
      });
    })
    .catch(() => {
      console.log("something worng try agin" + Error);
    });
}
stateSelect.addEventListener("change", () => {
  citySelect.innerHTML = " ";
  populateCities();
});

// tosubmit
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
