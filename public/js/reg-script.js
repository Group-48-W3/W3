function checkFirstNameEmpty(inputID)
{
	$(inputID).blur(function(){
 
		if($(this).val() == '')
		{
			$(this).css('border','1px solid red');
			
		}
		else
		{
			$(this).css('border','1px solid green');
			
		}
	});
}
 
function checkLastNameEmpty(inputID)
{
	$(inputID).blur(function(){
 
		if($(this).val() == '')
		{
			$(this).css('border','1px solid red');
			
		}
		else
		{
			$(this).css('border','1px solid green');
			
		}
	});
}
 
 
function checkPasswordEmpty(inputID)
{
	$(inputID).blur(function(){
 
		if($(this).val() == '')
		{
			$(this).css('border','1px solid red');
			
		}
		else
		{
			$(this).css('border','1px solid green');
			
		}
	});
}
 
 
//regex to validate email
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
 
 
// validation for email input using validateEmail Function
function checkValidEmail(emailInputID)
{
	$(emailInputID).blur(function(){
		var email = $(emailInputID).val();
		if (validateEmail(email)) 
		{
			$(this).css('border','1px solid green');
			
		} 
		else 
		{
			$(this).css('border','1px solid red');
		}
	});
		
	
}
 
 
// regex to validate phone
function validatePhone(inputtxt) {
	
	//+XX-XXXX-XXXX
	//+XX.XXXX.XXXX
	//+XX XXXX XXXX
			
	var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
	if(inputtxt.match(phoneno)) 
	{
		return true;
	}  
	else 
	{  
		return false;
	}
}
 
 
// validation for phone input using validatePhone Function
function checkvalidPhoneNumber(phoneInputID)
{
	
	$(phoneInputID).blur(function(){
		var phone = $(phoneInputID).val();
		var getPhone = validatePhone(phone);
		if(getPhone)
		{
			$(this).css('border','1px solid green');
		}
		else
		{
			$(this).css('border','1px solid red');
		}
		
	});
}
 
$(document).ready(function(){
	
	//run time form validation
	checkFirstNameEmpty("#firstName");
	checkLastNameEmpty("#lastName");
	checkValidEmail("#emailAddress");
	checkvalidPhoneNumber("#phone");
	checkPasswordEmpty("#password");
	
	
	//when click on submit
	$("#submitForm").click(function(e){
		
		
		if($("#firstName").val() == '')
		{
			$("#firstName").css('border','1px solid red');
			return false;	
		}
		
		if($("#lastName").val() == '')
		{
			$("#lastName").css('border','1px solid red');
			return false;
		}
		
		if($("#emailAddress").val() == '')
		{
			$("#emailAddress").css('border','1px solid red');
			return false;
		}
		
		if($("#emailAddress").val() != '')
		{
			var email = $("#emailAddress").val();
			if (!validateEmail(email)) 
			{
				return false;
			} 
		}
		
		
		if($("#phone").val() == '')
		{
			$("#phone").css('border','1px solid red');
			return false;
		}
		
		
		if($("#phone").val() != '')
		{
			var getPhone = validatePhone($("#phone").val());
			if(!getPhone)
			{
				return false;
			}
		}
		
		
		
		if($("#password").val() == '')
		{
			$("#password").css('border','1px solid red');
			return false;
		}
				
	});
	
});