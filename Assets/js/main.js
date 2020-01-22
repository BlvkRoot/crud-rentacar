function edit()
{
	document.querySelector('#manage_car_form').submit();
}

function login()
{
	document.querySelector('#login_form').submit();
}

//UPDATE BUTTON FUNCTION

function _editar(id){
	document.querySelector('#car_id').value = id;
	document.querySelector('#manage_car_form').action = 'update';
	document.querySelector('#manage_car_form').submit();
}

function _remover(id, name){
	let msg = confirm('Are you sure you want to delete '+name+'?');
	if(msg)
	{
		document.querySelector('#car_id').value = id;
		document.querySelector('#manage_car_form').action = 'destroy';
		document.querySelector('#manage_car_form').submit();

	}else{
		return false;
	}
}