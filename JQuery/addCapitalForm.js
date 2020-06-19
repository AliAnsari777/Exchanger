$(document).ready(function(e) {
	
	// if we omit 'window' from 'opener.location.reload(true);' it will reload whole page
	// and if we add 'window' to id it will reload only that part which link was clicked.
    $(window).on("unload", function(){
		opener.location.reload(true);	
	});
	
	// this field isn't necessary if the currency is dollar
	$("#exchangeRate").attr("readonly","");
	
	if($("#currency").val() == "دالر")
	{
		$("#exchangeRate").val(1);
	}
	
	// if user change the currency the 'exchangeRate' field would be active to accept value
	$("#currency").on("change", function(){
		if($("#currency").val() == "متفرقه")
		{
			$("#otherCurrency").removeAttr("hidden");
			$("#exchangeRate").removeAttr("readonly");
			$("#exchangeRate").val('');
			$("#equalToDollar").val('');
		}
		else if($("#currency").val() != "دالر")
		{
			$("#otherCurrency").attr("hidden","");
			$("#exchangeRate").removeAttr("readonly");
			$("#exchangeRate").val('');
			$("#equalToDollar").val('');
		}
		else
		{
			$("#otherCurrency").attr("hidden","");
			$("#exchangeRate").val(1);
			$("#exchangeRate").attr("readonly","");
			$("#equalToDollar").val( $("#exchangeRate").val() * $("#money").val() );
		}
	});
	
	// this part calculate the price of other currency to dollar according to exchange rate.
	$("#exchangeRate").on("keyup", function(){
		if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
		{
			if($("#money").val() != "")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#money").val() );
			}
		}
		else
		{
			if($("#money").val() != "")
			{
				$("#equalToDollar").val( $("#money").val() / $("#exchangeRate").val() );
			}
		}
	});
	
	
	$("#money").on("keyup", function(){
			if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#money").val() );	
			}
			else
			{
				$("#equalToDollar").val( $("#money").val() / $("#exchangeRate").val());	
			}
	});
	
	$("#submit").on("click", function(e){
		if($("#money").val() == "")
		{
			e.preventDefault();
			alert("Please provide a value for new capital record!");
			$("#money").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else if($("#money").val() != "" && $("#money").val() > 0)
		{
			if ($("#currency").val() != "دالر")
			{	
				if($("#exchangeRate").val() == "")
				{
					e.preventDefault();
					alert("Please provide a exchange rate for this currency!");
					$("#exchangeRate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});	
				}
				else
				{
					var rate = parseFloat($("#exchangeRate").val());
					if(isNaN(rate))
					{
						e.preventDefault();
						alert("Please enter a number value!");
						$("#exchangeRate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
					}
					else if(rate < 1)
					{
						e.preventDefault();
						alert("Please enter a number greater than zero!");
						$("#exchangeRate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});	
					}
				}
			}		
		}
		else
		{
			e.preventDefault();
			alert("Please provide a valid value for capital field!");
			$("#money").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
	});	
	
	$("#cancel").on("click", function(){
		window.close();	
	});
});