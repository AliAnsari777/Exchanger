$(document).ready(function(e) {
    // if we omit 'window' from 'opener.location.reload(true);' it will reload whole page
	// and if we add 'window' to id it will reload only that part which link was clicked.
    $(window).on("unload", function(){
		opener.location.reload(true);	
	});
	
	// if returned value of curreny from database is dollar so this field isn't necessary.
	if($("#currency").val() == "دالر")
	{
		$("#rate").attr("readonly","");
	}
	
	// if user change the currency the 'exchangeRate' field would be active to accept value
	$("#currency").on("change", function(){
		if($("#currency").val() == "متفرقه")
		{
			$("#otherCurrency").removeAttr("hidden");
			$("#rate").removeAttr("readonly");
			$("#rate").val('');
			$("#to_dollar").val('');
		}
		else if($("#currency").val() != "دالر")
		{
			$("#otherCurrency").attr("hidden","");
			$("#rate").removeAttr("readonly");
			$("#rate").val('');
			$("#to_dollar").val('');
		}
		else
		{
			$("#otherCurrency").attr("hidden","");
			$("#rate").val('');
			$("#to_dollar").val('');
			$("#rate").attr("readonly","");
		}
	});
	
	// this part calculate the price of other currency to dollar according to exchange rate.
	$("#rate").on("keyup", function(){
		if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
		{
			if($("#income").val() != "")
			{
				$("#to_dollar").val( $("#rate").val() * $("#income").val() );
			}
			else if($("#outgo").val() != "")
			{
				$("#to_dollar").val( $("#rate").val() * $("#outgo").val() );	
			}
		}
		else
		{
			if($("#income").val() != "")
			{
				$("#to_dollar").val( $("#income").val() / $("#rate").val());
			}
			else if($("#outgo").val() != "")
			{
				$("#to_dollar").val( $("#outgo").val() / $("#rate").val());	
			}	
		}
	});
	
	$("#income").on("keyup", function(){
		if($("#currency").val() != "دالر")
		{
			if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
			{
				$("#to_dollar").val( $("#rate").val() * $("#income").val() );	
			}
			else
			{
				$("#to_dollar").val( $("#income").val() / $("#rate").val());	
			}
		}	
	});
	
	$("#outgo").on("keyup", function(){
		if($("#currency").val() != "دالر")
		{
			if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
			{
				$("#to_dollar").val( $("#rate").val() * $("#outgo").val() );	
			}
			else
			{
				$("#to_dollar").val( $("#outgo").val() / $("#rate").val());	
			}
		}	
	})
	
	// on submiting form some validations will run
	$("#update").on("click", function(e){
		// first it will check that both 'incoming' and 'outgoing' aren't empty.
		if($("#income").val() == "" && $("#outgo").val() == "")
		{
			e.preventDefault();
			alert("Please provide a value for transaction!");
			$("#income").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#outgo").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		// second it will check that both 'incoming' and 'outgoing' aren't fill.
		else if ($("#income").val() != "" && $("#outgo").val() != "")
		{
			e.preventDefault();
			alert("You can't fill these two fields at same time!");
			$("#income").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#outgo").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		// then if only one of 'incoming' or 'outgoing' fields has value
		else if($("#income").val() != "" && $("#income").val() > 0)
		{
			// if the enterd data was number it will check that what is its currency.
			// if currency be something other than dollar it will check the exchange rate field.
			if ($("#currency").val() != "دالر")
			{	
				// if currency wasn't dollar and user didn't enter any value for exchange rate field
				// it will display a message and ask user to provide a value for this field.
				if($("#rate").val() == "")
				{
					e.preventDefault();
					alert("Please provide a exchange rate for this currency!");
					$("#rate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});	
				}
				else
				{
					// if user entered value in exchage rate it will check the value is number or not.
					// and if it wasn't a number it will show a message and prevent from submiting the form.
					if($("#to_dollar").val() == "NaN")
					{
						e.preventDefault();
						alert("Please enter a number value!");
						$("#rate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
					}
					else if($("#to_dollar").val() < 1)
					{
						e.preventDefault();
						alert("Please enter a number greater than zero!");
						$("#rate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});	
					}
				}
			}		
		}
		// all the description for 'incoming' field is equal for 'outgoing' field.
		else if($("#outgo").val() != "" && $("#outgo").val() > 0)
		{
			if ($("#currency").val() != "دالر")
			{
				if($("#rate").val() == "")
				{
					e.preventDefault();
					alert("Please provide a exchange rate for this currency!");
					$("#rate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
				}
				else
				{
					if($("#to_dollar").val() == "NaN")
					{
						e.preventDefault();
						alert("Please enter a number value!");
						$("#rate").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
					}
					else if($("#to_dollar").val() < 1)
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
			alert("Please provide a valid value for 'incoming' or 'outgoing' fields");
			$("#incoming").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#outgoing").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
	});
	
	$("#cancel").on("click", function(){
		window.close();	
	});
	
});