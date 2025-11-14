let name = document.getElementById("first-name-signup");
let surname = document.getElementById("last-name-signup");
let login = document.getElementById("login-signup");
let email = document.getElementById("email-signup");
let password = document.getElementById("password-signup");
let re_password = document.getElementById("re-password-signup");
let birth_date = document.getElementById("birth-date-signup");

birth_date.max = new Date().toISOString().split("T")[0];

let help_block_name = document.getElementById("help-block-signup-first-name");
let help_block_surname = document.getElementById("help-block-signup-last-name");
let help_block_email = document.getElementById("help-block-signup-email");
let help_block_password = document.getElementById("help-block-signup-password");
let help_block_re_password = document.getElementById(
	"help-block-signup-re-password"
);
let help_block_birth_date = document.getElementById(
	"help-block-signup-birth-date"
);

let check_name = false;
let check_surname = false;
let check_email = false;
let check_password = false;
let check_re_password = false;
let check_birth_date = false;

name.addEventListener("keyup", function () {
	if (name.validity.valid) {
		help_block_name.innerHTML = "Twoje imię jest poprawne";
		help_block_name.classList.remove("wrongData");
		help_block_name.classList.add("correctData");
		check_name = true;
	} else {
		help_block_name.innerHTML =
			"Imię jest niepoprawne (używaj tylko liter, minimum 3 znaki)";
		help_block_name.classList.remove("correctData");
		help_block_name.classList.add("wrongData");
		check_name = false;
	}
});

surname.addEventListener("keyup", function () {
	if (surname.validity.valid) {
		help_block_surname.textContent = "Twoje nazwisko jest poprawne";
		help_block_surname.classList.remove("wrongData");
		help_block_surname.classList.add("correctData");
		check_surname = true;
	} else {
		help_block_surname.textContent =
			"Nazwisko jest niepoprawne (używaj tylko liter, minimum 3 znaki)";
		help_block_surname.classList.remove("correctData");
		help_block_surname.classList.add("wrongData");
		check_surname = false;
	}
});

email.addEventListener("keyup", function () {
	if (email.validity.valid) {
		help_block_email.textContent = "Email jest poprawny";
		help_block_email.classList.remove("wrongData");
		help_block_email.classList.add("correctData");
		check_email = true;
	} else {
		help_block_email.textContent =
			"Email jest niepoprawny (upewnij się, że jest w formacie: example@domain.com)";
		help_block_email.classList.remove("correctData");
		help_block_email.classList.add("wrongData");
		check_email = false;
	}
});

password.addEventListener("keyup", function () {
	if (password.validity.valid) {
		help_block_password.textContent = "Hasło jest poprawne";
		help_block_password.classList.remove("wrongData");
		help_block_password.classList.add("correctData");
		check_password = true;
	} else {
		help_block_password.textContent =
			"Hasło jest niepoprawne (wymaga minimum 8 znaków, w tym jednej dużej litery, jednej małej litery i cyfry)";
		help_block_password.classList.remove("correctData");
		help_block_password.classList.add("wrongData");
		check_password = false;
	}
});

re_password.addEventListener("keyup", function () {
	if (re_password.value === password.value) {
		help_block_re_password.textContent = "Hasła sie zgadzają";
		help_block_re_password.classList.remove("wrongData");
		help_block_re_password.classList.add("correctData");
		check_re_password = true;
	} else {
		help_block_re_password.textContent =
			"Hasła się nie zgadzają (upewnij się, że wpisujesz to samo hasło)";
		help_block_re_password.classList.remove("correctData");
		help_block_re_password.classList.add("wrongData");
		check_re_password = false;
	}
});

birth_date.addEventListener("blur", function (event) {
	let birth_date_input = new Date(birth_date.value);
	let today = new Date();
	let age = today.getFullYear() - birth_date_input.getFullYear();
	let month_difference = today.getMonth() - birth_date_input.getMonth();

	if (age >= 15 || (age >= 15 && month_difference < 0)) {
		help_block_birth_date.textContent =
			"Masz odpowiednia ilość lat aby miec konto";
		help_block_birth_date.classList.remove("wrongData");
		help_block_birth_date.classList.add("correctData");
		check_birth_date = true;
	} else {
		help_block_birth_date.textContent = "Masz za mało lat aby móc mieć konto";
		help_block_birth_date.classList.remove("correctData");
		help_block_birth_date.classList.add("wrongData");
		check_birth_date = false;
	}
});

let form = document.getElementById("signup");

function validateForm(event) {
	if (
		check_name &&
		check_surname &&
		check_email &&
		check_password &&
		check_re_password &&
		check_birth_date
	) {
		return true;
	} else {
		event.preventDefault();
		alert(
			"Któreś z pól jest uzupełnione niepoprawnie! Popraw i zarejestruj sie do naszego serwisu !"
		);
		return false;
	}
}

document.querySelectorAll(".form-group input").forEach(input => {
	input.addEventListener("input", function () {
		const label = this.nextElementSibling;
		if (this.value.trim() !== "") {
			label.classList.add("active");
		} else {
			label.classList.remove("active");
		}
	});

	// Przy załadowaniu strony, np. po błędnym submit
	const label = input.nextElementSibling;
	if (input.value.trim() !== "") {
		label.classList.add("active");
	}
});

// Nasłuchiwanie zdarzenia submit na formularzu
form.addEventListener("submit", validateForm);

let logIn = document.getElementById("logIn");
let signUp = document.getElementById("signUp");
let signUpSection = document.getElementById("signUpSectionForm");
let logInSection = document.getElementById("logInSectionForm");

function chooseLogIn() {
	signUp.classList.remove("chosen");
	logIn.classList.add("chosen");
	logInSection.classList.remove("hidden");
	signUpSection.classList.add("hidden");
}

function chooseSignUp() {
	logIn.classList.remove("chosen");
	signUp.classList.add("chosen");
	signUpSection.classList.remove("hidden");
	logInSection.classList.add("hidden");
}
