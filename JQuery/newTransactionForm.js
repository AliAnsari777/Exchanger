$(document).ready(function(e) {
	
	// if we omit 'window' from 'opener.location.reload(true);' it will reload whole page
	// and if we add 'window' to id it will reload only that part which link was clicked.
    $(window).on("unload", function(){
		opener.location.reload(true);	
	});
	
	// this field isn't necessary if the currency is dollar
	if($("#exchangeRate").val() == "")
	{
		$("#exchangeRate").attr("readonly","");
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
			$("#exchangeRate").val('');
			$("#equalToDollar").val('');
			$("#exchangeRate").attr("readonly","");
		}
	});
	
	// this part calculate the price of other currency to dollar according to exchange rate.
	$("#exchangeRate").on("keyup", function(){
		if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
		{
			if($("#incoming").val() != "")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#incoming").val() );
			}
			else if($("#outgoing").val() != "")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#outgoing").val() );	
			}
		}
		else
		{
			if($("#incoming").val() != "")
			{
				$("#equalToDollar").val( $("#incoming").val() / $("#exchangeRate").val() );
			}
			else if($("#outgoing").val() != "")
			{
				$("#equalToDollar").val( $("#outgoing").val() / $("#exchangeRate").val() );	
			}
		}
	});
	
	$("#incoming").on("keyup", function(){
		if($("#currency").val() != "دالر")
		{
			if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#incoming").val() );	
			}
			else
			{
				$("#equalToDollar").val( $("#incoming").val() / $("#exchangeRate").val());	
			}
		}	
	});
	
	$("#outgoing").on("keyup", function(){
		if($("#currency").val() != "دالر")
		{
			if($("#currency").val() == "یورو" || $("#currency").val() == "پوند انگلیس")
			{
				$("#equalToDollar").val( $("#exchangeRate").val() * $("#outgoing").val() );	
			}
			else
			{
				$("#equalToDollar").val( $("#outgoing").val() / $("#exchangeRate").val());	
			}
		}	
	});
	
	$("#submit").on("click", function(e){
		if($("#name").val() == "")
		{
			e.preventDefault();
			alert("Please provide a name!");
			$("#name").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});	
		}
		else if($("#incoming").val() == "" && $("#outgoing").val() == "")
		{
			e.preventDefault();
			alert("Please provide a value for transaction!");
			$("#incoming").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#outgoing").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else if ($("#incoming").val() != "" && $("#outgoing").val() != "")
		{
			e.preventDefault();
			alert("You can't fill these two fields at same time!");
			$("#incoming").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#outgoing").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
		else if($("#incoming").val() != "" && $("#incoming").val() > 0)
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
		else if($("#outgoing").val() != "" && $("#outgoing").val() > 0)
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
			alert("Please provide a valid value for 'incoming' or 'outgoing' fields");
			$("#incoming").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
			$("#outgoing").css({"border" : "2px inset #07c", "box-shadow" : "0 0 20px red"});
		}
	});	
	
	
	$("#cancel").on("click", function(){
		window.close();	
	});
});