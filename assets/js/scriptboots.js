
// AÑADIR TEXTO A LOS INPUT FILE

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

// CHECKBOX INPUT CREATE POST FEED

function myFunction() {
var checkBox = document.getElementById("myCheck");
var text = document.getElementById("text");
if (checkBox.checked == true){
    text.style.display = "block";
} else {
    text.style.display = "none";
}
}
