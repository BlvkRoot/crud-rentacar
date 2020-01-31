const inputs = document.querySelectorAll('.input_field');
const success = '2px solid green';
const error = '2px solid red';

const regPatterns = {

	name: /^[a-zA-Z\s]{3,}$/,
	plateNumber: /^[A-Z]{2}(-[\d]{2}){2}-[A-Z]{2}$/,
	color: /^[a-zA-Z]{3,}$/,
	status: /^[0-1]$/
}

function validateField(field, regex){

	if(!regex.test(field.value))
	{
		field.className = 'invalid';

	}else{
		field.className = 'valid';
		field.style.border = success;
	}

	return regex.test(field.value);

}

//Check input value onkeyup
inputs.forEach((input) => {

	input.addEventListener('keyup', function(event){
		// console.log(event);
		let field = event.target;
		let fieldValue = event.target.attributes.name.value;

		validateField(field, regPatterns[fieldValue]);
	});
});
	
let saveBtn = document.getElementById('saveBtn');

saveBtn.addEventListener('click', (event) => {

	for(let i = 0; i < inputs.length; i++) 
	{
		let field = inputs[i];

		if(inputs[i].value == "" || validateField(field, regPatterns[field.name]) == false)
		{
			inputs[i].style.border = error;
			event.preventDefault();
		}else{
			
			inputs[i].style.border = success;
		}
	}

});

	