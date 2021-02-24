function showregister() {
    document.getElementById("signupform").style.display = "none";
    document.getElementById("accbtn").style.display = "none";
    document.getElementById("newm").style.display = "none";
    document.getElementById("registerform").style.display = "block";
    document.getElementById("regbtn").style.display = "block";
    document.getElementById("entd").style.display = "block";
}

function showlogin() {
    document.getElementById("registerform").style.display = "none";
    document.getElementById("regbtn").style.display = "none";
    document.getElementById("entd").style.display = "none";
    document.getElementById("signupform").style.display = "block";
    document.getElementById("accbtn").style.display = "block";
    document.getElementById("newm").style.display = "block";
}

$("#forgetpass").click(function() {
    window.location = "forgetpass.php";
});

$("#eyetogglePassword").click(function () {
    if ($("#signinputpass").attr("type") == "text") {
        $("#signinputpass").attr("type", "password");
        $("#eyetogglePassword").attr("class", "far fa-eye");
    } else {
        $("#signinputpass").attr("type", "text");
        $("#eyetogglePassword").attr("class", "far fa-eye-slash");

    }
});