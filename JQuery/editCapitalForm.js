$(document).ready(function(e) {
    // if we omit 'window' from 'opener.location.reload(true);' it will reload whole page
	// and if we add 'window' to id it will reload only that part which link was clicked.
    $(window).on("unload", function(){
		opener.location.reload(true);	
	});
	
	// this is for grouping numbers for better reading
	$(".numbers").each(function(index, element) {
        	$(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    });
	
	// if returned value of curreny from database is dollar so this field isn't necessary.
	if($("#currency").val() == "دالر")
	{
		$("#exchangeRate").val(1);
		$("#exchangeRate").attr("readonly","");
	}
	
	// if user change the currency the 'exchangeexchangeRate' field would be active to accept value
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
	
	// this part calculate the price of other currency to dollar according to exchange Rate.
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
				$("#equalToDollar").val( $("#money").val() / $("#exchangeRate").val());
			}	
		}
	});
	
	
	$("#money").on("keyup", function(){
		if($("#currency").val() != "دالر")
		{
			if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#money").val() );	
			}
			else
			{
				$("#equalToDollar").val( $("#moeny").val() / $("#exchangeRate").val());	
			}
		}	
	});
	
	// on submiting form some validations will run
	$("#update").on("click", function(e){
		// first it will check that both 'incoming' and 'outgoing' aren't empty.
		if($("#money").val() == "")
		{
			e.preventDefault();
			alert("Please provide a value for capital registration!");
			$("#money").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		// then if only one of 'incoming' or 'outgoing' fields has value
		else if($("#money").val() != "" && $("#money").val() > 0)
		{
			// if the enterd data was number it will check that what is its currency.
			// if currency be something other than 'Dollar' it will check the exchange Rate field.
			if ($("#currency").val() != "دالر")
			{	
				// if currency wasn't 'Dollar' and user didn't enter any value for exchange Rate field
				// it will display a message and ask user to provide a value for this field.
				if($("#exchangeRate").val() == "")
				{
					e.preventDefault();
					alert("Please provide a exchange rate for this currency!");
					$("#exchangeRate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});	
				}
				else
				{
					// if user entered value in exchage Rate it will check the value is number or not.
					// and if it wasn't a number it will show a message and prevent from submiting the form.
					if($("#equalToDollar").val() == "NaN")
					{
						e.preventDefault();
						alert("Please enter a number value!");
						$("#exchangeRate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
					}
					else if($("#equalToDollar").val() < 1)
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
			alert("Please provide a valid value for 'capital' field");
			$("#money").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
	});
	
	$("#cancel").on("click", function(){
		window.close();	
	});
	
});