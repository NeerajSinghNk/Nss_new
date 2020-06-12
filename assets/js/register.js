$(document).ready(function() {
    $("#txtConfirmPassword").keyup(checkPasswordMatch);
    $("#txtNewPassword").change(checkPasswordLength);
});

function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword) {
        $('#txtNewPassword').addClass('wrong');
        $('#txtConfirmPassword').addClass('wrong');
        $("#divCheckPasswordMatch").html("<span style='color:red;'>Passwords do not match!</span>");
        $("#submit_button").attr('disabled', 'true');
    } else {
        $("#divCheckPasswordMatch").html("<span style='color:green'>Passwords match.</span>");
        $('#txtNewPassword').removeClass('wrong');
        $('#txtConfirmPassword').removeClass('wrong');
        $("#submit_button").removeAttr('disabled');
    }

}

function checkPasswordLength() {
    var password = $("#txtNewPassword").val();
    if (password.length < 8) {
        $("#myalert").html("<span style='color:red;'>Password must contain at least 8 characters!</span>");
        $("#submit_button").attr('disabled', 'true');
    } else {
        $("#myalert").html("");
    }
}

function showpass() {
    var x = document.getElementById("txtConfirmPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function load() {
    document.getElementById('2019').enabled = "true";
    document.getElementById('2018').disabled = "true";
    document.getElementById('2017').disabled = "true";
    document.getElementById('2016').disabled = "true";
    document.getElementById('2015').disabled = "true";
}

function check(elem) {
    if (document.getElementById('mySelect').value == 'No') {
        document.getElementById('mySelect1').value = '2019';
        document.getElementById('2018').disabled = "true";
        document.getElementById('2017').disabled = "true";
        document.getElementById('2016').disabled = "true";
        document.getElementById('2015').disabled = "true";

    }
    if (document.getElementById('mySelect').value != 'No') {
        document.getElementById('mySelect1').removeAttribute('disabled');
        document.getElementById('mySelect1').value = "2018";
        document.getElementById('2019').disabled = "true";
        document.getElementById('2018').removeAttribute('disabled');
        document.getElementById('2017').removeAttribute('disabled');
        document.getElementById('2016').removeAttribute('disabled');
        document.getElementById('2015').removeAttribute('disabled');

        document.getElementById('2018').enabled = "true";
        document.getElementById('2017').enabled = "true";
        document.getElementById('2016').enabled = "true";
        document.getElementById('2015').enabled = "true";
    }
}

// Generate pdf