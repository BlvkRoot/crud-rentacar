function confirmation()
{
	var msg = confirm('Are you sure you want to delete?');

	if(msg)
	{
		document.querySelector('#manage_car_form').submit();
	  	return true;
	}else{
		return false;
	}
	  
}

function loginFormValidation()
{
	var input = document.querySelectorAll('input');

	for(var i = 0; i < input.length; i++) 
	{
		if(input[i].value == "")
		{
			input[i].style.border = "2px solid red";

			return false;

		}else{
			
			input[i].style.border = "2px solid green";
		}

	}

	document.querySelector('#car_form').submit();
}

function edit()
{
	document.querySelector('#manage_car_form').submit();
}

function login()
{
	document.querySelector('#login_form').submit();
}

//DELETE BUTTON FUNCTION
var deleteBtn = document.querySelector('#deleteBtn');

deleteBtn.onclick = function(){
	document.querySelector('#manage_car_form').action = 'delete';
	document.querySelector('#manage_car_form').submit();
}

//UPDATE BUTTON FUNCTION

var editBtn = document.querySelector('#editBtn');

editBtn.onclick = function() {
	document.getElementById('manage_car_form').action = 'edit';
	document.getElementById('manage_car_form').submit();
}
