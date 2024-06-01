let loginP = document.querySelector(".login-panel");
let signupP = document.querySelector(".signup-panel");
let menubar = document.querySelector(".menubar");
let mainmenu = document.querySelector(" .main-menu");
let name = document.forms["signup"]["email"].value;
let pass = document.forms["signup"]["password"].value;
let passc = document.forms["signup"]["cpassword"].value;
let passw =/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[@#%<>^/#&*])[a-zA-Z0-9@#%<>^/#&*]{7,15}$/g;
let emailv = /^[a-zA-Z\.\-0-9]*[@][a-zaA-Z]*[\.][a-z]{2,4}$/gm;

function alertd() {
  let alertp = document.querySelector("#alert");
  alertp.innerHTML = "";
}
function log_in() {
  loginP.style.display = "block";
  signupP.style.display = "none";
}
function logout() {
  loginP.style.display = "none";
}
function signu() {
  signupP.style.display = "block";
  loginP.style.display = "none";
}
function signout() {
  signupP.style.display = "none";
}
function mobile_menu() {
  mainmenu.style.display = "block";
}
function mobile_menu_close() {
  mainmenu.style.display = "none";
  signupP.style.display = "none";
  loginP.style.display = "none";
}

function seterr(id, text, num) {
  element = document.querySelectorAll(id);
  element[num].innerHTML = text;
}
function clearerr(id) {
  clear = document.querySelectorAll(id);
  for (let i = 0; i < clear.length; i++) {
    clear[i].innerHTML = "";
  }
}
clearerr(".formerr");
function submitvalid() {
  let bool = true;
  clearerr(".formerr");
  let passw = /^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[@#%<>^/#&*])[a-zA-Z0-9@#%<>^/#&*]{7,15}$/g;
  let emailv = /[a-zA-Z\.\-0-9]*[@][a-zaA-Z]*[\.][a-z]{2,4}/gm;
  var name = document.forms["signup"]["email"].value;
  var pass = document.forms["signup"]["password"].value;
  var passc = document.forms["signup"]["cpassword"].value;

  if (name.match(emailv)) {
    if (pass.match(passw) && pass == passc) {
      bool = true;
    }
     else {
      seterr(".formerr", "enter password invalid", 1);
      bool = false;
    }
  } 
  else {
    seterr(".formerr", "email doesnt valid", 0);
    bool = false;
  }
  return bool;
}
