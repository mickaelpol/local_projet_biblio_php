$(document).ready(function(){
	
	var str1 = $("#hellomark").text();
	var md1 = markdown.toHTML(str1);
	
	
	$("#hellomark").html(md1);
});