window.addEventListener('load', function(){
	new Glider(document.querySelector('.carousel__lista'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: '.carousel__indicadores',
		arrows: {
			prev: '.carousel__anterior',
			next: '.carousel__siguiente'
		},
		responsive: [
			{
			  // screens greater than >= 775px
			  breakpoint: 450,
			  settings: {
				// Set to `auto` and provide item width to adjust to viewport
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},{
			  // screens greater than >= 1024px
			  breakpoint: 800,
			  settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			  }
			}
		]
	});
});

//-----------------------Codigo de login------------------------------

const btnSignIn= document.getElementById("sign-in"),
      btnSignUp= document.getElementById("sign-up"),
      formRegister=document.querySelector(".register"),
      formLogin=document.querySelector(".login");


btnSignIn.addEventListener("click", e=>{
    formRegister.classList.add("hide");
    formLogin.classList.remove("hide");
})

btnSignUp.addEventListener("click", e=>{
    formLogin.classList.add("hide");
    formRegister.classList.remove("hide");
})

// Redireccionar el boton volver



//-----------------------Validaciones Codigo de login------------------------------

function validateForm() {
	const password = document.getElementById("contraseña").value;
	const confirmPassword = document.getElementById("confirmar_contraseña").value;

	if (password !== confirmPassword) {
		alert("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
		return false;
	}

	// Validate nombre (3 to 20 characters)
	const nombre = document.getElementById("nombre").value;
	if (nombre.length < 3 || nombre.length > 20) {
		alert("El nombre debe tener entre 3 y 20 caracteres.");
		return false;
	}

	// Validate correo (must contain '@')
	const correo = document.getElementById("correo").value;
	if (!correo.includes("@")) {
		alert("El correo electrónico debe contener el símbolo '@'.");
		return false;
	}

	return true;
}

//-----------------------Validaciones Carrusel Gallinas Swiper------------------------------