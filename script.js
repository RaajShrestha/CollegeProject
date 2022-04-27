let menu = document.getElementById('threeLine');

let menuShow = document.getElementById('menus');

function displayThreeLine(){
    menuShow.style.display = "block";
}
function hideThreeLine(){
    menuShow.style.display = "none";
}


// // Hide unhide the login form
// function login() {
//     if(document.getElementById('containerForm').style.display == "none"){
//         document.getElementById('containerForm').style.display = 'flex';
//     }else{
//         document.getElementById('containerForm').style.display = 'none';
//     }
// }
// function hideLogin() {
//     document.getElementById('containerForm').style.display = "none";
// }

// Password show or hide 
function showpass() {
    document.getElementById('hidepas').style.visibility = "visible";
    document.getElementById('showpas').style.visibility = "hidden";
    
    var x = document.getElementById("inputpass");
    if (x.type === "password") {
      x.type = "text";
    }
}
function hidepass() {
    document.getElementById('hidepas').style.visibility = "hidden";
    document.getElementById('showpas').style.visibility = "visible";

    var x = document.getElementById("inputpass");
    if (x.type === "text") {
      x.type = "password";
    }
}


function submitForm() {
    document.getElementById('alert').style.display = "flex";
}


// let check = document.getElementById('checkbox');
function checked() {
    if(document.getElementById("checkbox").checked == false){
        document.getElementById("checkbox").checked = true;
    }else{
        document.getElementById("checkbox").checked = false;
    }
}
