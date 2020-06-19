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
	
    $("#currencyFilter").on("change", function(){
		var filter = $("#currencyFilter").val();
		var filterResult = $.ajax
		({
			type:"POST",
			url:"../PHP/capitalFilter.php",
			data:{filterValue:filter}
		});
		filterResult.done(function(data){
			$("tbody").html(data);
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
	
	$("#filterDate").on("keyup", function(){
		var filter = $("#filterDate").val();
		var filterResult = $.ajax
		({
			type:"POST",
			url:"../PHP/filterDate.php",
			data:{filterDate:filter}
		});
		filterResult.done(function(data){
			$("tbody").html(data);
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
	
	$("#print").on("click", function(){
		$(".layout-item-0").print({
			noPrintSelector : ".noPrint",
			stylesheet : "print.css",
			append : ".art-footer",
			prepend : ".art-header",
		})
	})
});