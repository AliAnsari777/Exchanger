$(document).ready(function(e) {
    $("#update").on("click", function(e){
		if($("#name").val() == "" || $("#group").val() == "")
		{
			e.preventDefault();
			alert("Please fill the form completely.");
		}
	});
	
	$("#cancel").on("click", function(){
		window.close();	
	});
	
	// this part will reload the page (in this case client.php page) which open this page (editClient page)
	// when the window is 'unload' or closed to see the result of change that user create.  
	$(window).on("unload", function(){
		window.opener.location.reload(true);
	});
});