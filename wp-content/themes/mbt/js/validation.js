
	var submitcount=0;
	function formcheck()
	{
		var name = /^(\s?[a-zA-Z\']+(([ ][a-zA-Z\' ])?[a-zA-Z\'.,]*)\s?)*$/;
		var company = /^(\s?[0-9a-zA-Z\']+(([ ][a-zA-Z\' ])?[a-zA-Z\'.,]*)\s?)*$/;
		var address = /^[0-9a-zA-Z\']+(([ ][0-9a-zA-Z\'])?[0-9a-zA-Z\'.,]*)*$/;
	    var nul="";
		var alphaExp = /^[a-zA-Z]+$/;
		var alphaNumExp = /^[0-9a-zA-Z]+$/;
		var numericExpression = /^[0-9]+$/;
		var phone =/^(\+\d{1,3})*\s*(\(*\d{3}(\)|\/|\-)*\s*)*\d{3}(-{0,1}|\s{0,1})\d{4,8}(?:\s*(?:#|x\.?|ext\.?|Ext\.?|EXT\.?|Ext\.?|Ex\.?|ex\.?|EX\.?|Extension\.?|extension)\s*(\d+))?$/;
		var email = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		var info = document.getElementsByName("information[]");
	    var infochecked = false;
		var errormessage = "";
		var f = document.contactform;

			
			if (f.Name.value == '')
			{
			errormessage = errormessage + "Please enter in your Name.<br>";
			document.getElementById("Name").className = "formerror";
			}
			else if (!(f.Name.value.match(name)))
			{
			errormessage = errormessage + "Please enter only letters for your Name.<br>";
			document.getElementById("Name").className = "formerror";
			}
			else 
			{
			document.getElementById("Name").className = "";
			}

			
			if (f.Company.value == '')
		    {
			errormessage = errormessage + "Please enter in your Company Name.<br>";
			document.getElementById("Company").className = "formerror";
	    	}
		    else if (!(f.Company.value.match(company)))
		    {
			errormessage = errormessage + "Please enter only letters for your Company Name.<br>";
			document.getElementById("Company").className = "formerror";
	        }
		    else 
		    {
			document.getElementById("Company").className = "";
		    }

			if (f.Phone.value == '')
			{
			errormessage = errormessage + "Please enter in your Phone Number.<br>";
			document.getElementById("Phone").className = "formerror";
			}
			else if (!(f.Phone.value.match(phone)))
			{

				if (f.Phone.value.length<10)
				{
						errormessage = errormessage + "Please enter a 10 digit number for your Phone Number.<br>";
						document.getElementById("Phone").className = "formerror";
				}
				else
				{
					errormessage = errormessage + "Please enter only numbers for your Phone Number.<br>";
					document.getElementById("Phone").className = "formerror";
				}
			}
			else 
			{
				document.getElementById("Phone").className = "";
			}

		    if (f.Email.value == '')
		    {
			errormessage = errormessage + "Please enter in your Email Address.<br>";
			document.getElementById("Email").className = "formerror";
	    	}
		    else if (!(f.Email.value.match(email)))
		    {
			errormessage = errormessage + "Please enter in a valid Email Address.<br>";
			document.getElementById("Email").className = "formerror";
	        }
		    else 
		    {
			document.getElementById("Email").className = "";
		    }	

		    if (f.More.value.length > 1500)
			{
			errormessage = errormessage + "Comments are limited to 1500 characters.<br>";
			document.getElementById("More").className = "formerror";
			}
			else 
			{
			document.getElementById("More").className = "";
			}

 
		     for (var i = 0; i < info.length; i++) 
			 {
		       if (info[i].checked) 
			   {
		        infochecked = true;
		        break;
		       }
		     }
		     if (!infochecked) {
		    	 errormessage = errormessage + "Please select a topic for Information Request.<br>";
		    	 document.getElementById("information[]").className = "formerror";
			
		   }
		    
		    if (errormessage !='')
		    {
			document.getElementById("alert").innerHTML = errormessage;
			return false;
		    }
		    else
		    {
			document.getElementById("alert").innerHTML = "";
			return true;
		    }
	}