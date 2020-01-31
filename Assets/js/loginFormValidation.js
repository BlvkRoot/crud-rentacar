let loginBtn = document.getElementById('loginBtn');
let inputs = document.querySelectorAll('input');

loginBtn.addEventListener('click', (event) => {

	inputs.forEach((input)=>{

		if(input.value == ""){
			input.className = 'invalid';
			event.preventDefault();
		}
	});
});