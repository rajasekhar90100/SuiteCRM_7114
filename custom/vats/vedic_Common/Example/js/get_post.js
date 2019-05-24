$(document).ready(function() {
$("input[type=radio]").change(function() {
var method = $(this).val();
$("#form").attr("method", method); // Assigns Method Type From Radio Button
});
// Function Executes On Submit Button's Click
$("#submit").click(function() {
var fname = $("#fname").val();
var lname = $("#lname").val();
if (fname != '' || lname != '') {
return true;
} else {
alert("Please fill all fields...!!!!!!");
return false;
}
});
});