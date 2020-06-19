// JavaScript Document
$(document).ready(function(e) {
	
	// this part is for filtering capitals accrording to a range of date
    $("#sendDate").on("click", function(){
		if($("#from").val() == "" || $("#to").val() == "")
		{
			alert("Please provide a valid date");
			$("#from").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#to").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else
		{
			var start = $("#from").val();
			var end = $("#to").val();
			
			var filterCapital = $.ajax({
				type:"POST",
				url:"../PHP/filterCapital.php",
				data:{startDate:start, endDate:end}
			});
			filterCapital.done(function(data){
				$("tbody").html(data);
				$(".numbers").each(function(index, element) {
					$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
				});
			});
		}
	});
	
	// this part is for printing
	$("#print").on("click", function(){
		$("#art-layout-cell").print({
			noPrintSelector : ".noPrint",
			stylesheet : "print.css",
		})
	});
	
	// this part is for grouping numbers
	$(".numbers").each(function(index, element) {
       	$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    });
});