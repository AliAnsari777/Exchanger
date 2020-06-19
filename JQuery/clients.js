$(document).ready(function(e) {

	$(".numbers").each(function(index, element) {
       	$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    });
	
	// this condition will check the user group and if it isn't admin
	// it will restrict his/her access to some part of program
	if($("#userClass").val() != "Admin")
	{
		$(".userAccess").on("click", function(e){
			e.preventDefault();	
		});
	}
	
    $("#searchValue").on("keyup", function(){
		var searchVal = $("#searchValue").val();
		var searchParameter = $("#parameter").val();
		var searchResult = $.ajax
		({
			type:"POST",
			url:"../PHP/searchClient.php",		
			data:{searchValue:searchVal, parameter:searchParameter}
		});
		searchResult.done(function(data){
			$("#clients").html(data);
			if($("#userClass").val() != "Admin")
			{
				$(".userAccess").on("click", function(e){
					e.preventDefault();	
				});
			}
		});
	});
});