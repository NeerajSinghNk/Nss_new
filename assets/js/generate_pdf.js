function hideme() {
    document.getElementById('mybtn').style.display = 'none';
    document.getElementById('mybtn2').style.display = 'none';
    document.getElementById('alert').style.display = 'none';
    setTimeout(function() { //using setTimeout function
        document.getElementById('mybtn').style.display = 'block'; //displaying the button again after 1000ms or 1 seconds
        document.getElementById('mybtn2').style.display = 'block';
    }, 1000);
}