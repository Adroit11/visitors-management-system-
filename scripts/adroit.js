$(document).ready(function(){
setTimeout(function(){
$("div.message").fadeOut(10000, function () {
$("div.message").remove();
});

}, 3000);
});