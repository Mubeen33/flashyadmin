      var _URL = window.URL;


$("#meta_image").change(function () {
    var file, img;
    var object = $(this);
    var textbox = $(this).prev();
    var filesCount = $(this)[0].files.length;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            // alert("Width:" + this.width + "   Height: " + this.height);
            if(this.height > 40 || this.width > 200){
                alert("Please Upload Logo of size 200x40")
                $("#meta_image").val(''); 
            }
            else{
                gothere1();
            }
        };
        img.src = _URL.createObjectURL(file);
    }
function gothere1(){
if (filesCount === 1) {
var fileName = object.val().split('\\').pop();
textbox.text(fileName);
} else {
textbox.text(filesCount + ' files selected');
}
if (typeof (FileReader) != "undefined") {
var dvPreview = $("#div_meta_image");

$(object[0].files).each(function () {

var file = $(this);
var reader = new FileReader();
reader.onload = function (e) {
    dvPreview.html("");
var img = $("<img />");
img.attr("style", "width: 130px; padding: 10px");
img.attr("src", e.target.result);
dvPreview.append(img);
}
reader.readAsDataURL(file[0]);
});
} else {
alert("This browser does not support HTML5 FileReader.");
}
}

});