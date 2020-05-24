document
    .querySelector(".custom-file-input")
    .addEventListener("change", function(e) {
        var fileName = document.getElementById("inputFile").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });

function checkFile() {
    var fileUpload = document.getElementById("inputFile");

    if (typeof fileUpload.files != "undefined") {
        var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
        if (size > 1300) {
            alert("This file is too large");
            removeFile();
        }
    }
}

function removeFile() {
    var fld = document.getElementById("inputFile");
    fld.form.reset();
    fld.focus();
}
