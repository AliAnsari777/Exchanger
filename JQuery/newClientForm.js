$(document).ready(function(e) {
	
	// filter variable is used to check entred data is number to provide accurate data
	var filter = /^[0-9]+$/;
	var phone = $("#phone").val();
	
    $("#submit").on("click", function(e){
		if($("#name").val() == "")
		{
			e.preventDefault();
			alert("Please fill the form completely.");
			$("#name").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else if( $("#company").val() == "")
		{
			e.preventDefault();
			alert("Please fill the form completely.");
			$("#company").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else if($("#place").val() == "")
		{
			e.preventDefault();
			alert("Please fill the form completely.");
			$("#place").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else if($("#phone").val().length != 10 || !filter.test($("#phone").val()))
		{
			e.preventDefault();
			alert("Please fill the phone number correctly.");
			$("#phone").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
	});
	
	$("#cancel").on("click", function(){
		window.close();	
	});
	
	$(window).on("unload", function(){
		window.opener.location.reload(true);
	});
});