//UPDATE BUTTON FUNCTION

function edit(id){
	document.querySelector('#car_id').value = id;
	document.querySelector('#manage_car_form').action = 'update';
	document.querySelector('#manage_car_form').submit();
}

function remove(id, name){
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