// JavaScript Document
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
			url:"../PHP/searchTempClient.php",		
			data:{searchValue:searchVal, parameter:searchParameter}
		});
		searchResult.done(function(data){
			$("#TempClients").html(data);
			
			$(".numbers").each(function(index, element) {
				$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
			});
			
			if($("#userClass").val() != "Admin")
			{
				$(".userAccess").on("click", function(e){
					e.preventDefault();	
				});
			}
		});
	});
	
	// this part is responsible for printing and it has its own style sheet.
	$("#print").on("click", function(){
		$("#art-layout-cell").print({
			noPrintSelector : ".noPrint",
			stylesheet : "print.css",
		})
	})
});