    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="register_style.css">
            <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
        <title>Rejestracja do Serwisu</title>
    </head>
    <body>
        
    <div id="modal" class="modal hidden">
        <div class="modalContent">
            
            <div class="registerLoginBar">
                <div id="logIn" onclick="chooseLogIn()" class="chosen">Zaloguj się</div>
                <div id="signUp" onclick="chooseSignUp()">Zarejestruj się</div>
            </div>
            
            <div id="logInSectionForm">
                <form action="functionalities/log_in.php" method="POST">
                    <h1>Formularz Logowania</h1>
                    <div class="form-group">
                        <input type="email" id="email-login" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                        <label for="email-login">Adres E-mail</label>
                    </div>

                    <div class="form-group">
                        <input type="password" id="password-login" name="passwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <label for="password-login">Hasło</label>
                    </div>

                    <button type="submit" class="signRegisterButton">Zaloguj się</button>
                </form>
            </div>


            <div id="signUpSectionForm" class="hidden">
                <form action="functionalities/add_user.php" id="signup" method="POST">
                    
            <div class="modalTitle">
                <h1>Formularz Rejestracji</h1>
            </div>
            <div class="form-group">
                <input type="text" id="first-name-signup" name="name" pattern="^[A-Za-zĄĆĘŁŃÓŚŹŻąćęłńóśźż\s]{3,50}$" required>
                <label for="first-name-signup">Imię</label>
                <div class="help-block" id="help-block-signup-first-name"></div>
            </div>

            <div class="form-group">
                <input type="text"id="last-name-signup" name="surname" pattern="^[A-Za-zĄĆĘŁŃÓŚŹŻąćęłńóśźż\s]{3,50}$" required>
                <label forl="last-name-signup">Nazwisko</label>
                <div class="help-block" id="help-block-signup-last-name"></div>
            </div>
     

            <div class="form-group">
                <input type="email" id="email-signup" name="email" pattern="^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$" required>
                <label for="email-signup">Adres E-mail</label>
                <div class="help-block" id="help-block-signup-email"></div>
            </div>



            <div class="form-group">
                <input type="password" id="password-signup" name="passwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <label for="password-signup">Hasło</label>
                <div class="help-block" id="help-block-signup-password"></div>
            </div>



            <div class="form-group">
                <input type="password" id="re-password-signup" name="re-passwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <label for="re-password-signup">Powtórz Hasło</label>
                <div class="help-block" id="help-block-signup-re-password"></div>
            </div>



            <div class="form-group">
                <input type="date" id="birth-date-signup" name="birth-date" min="1900-01-01" required>
                <label for="birth-date-singup">Data Urodzenia</label>
                <div class="help-block" id="help-block-signup-birth-date"></div>
            </div>


                
            <div class="gender-group">
                <div class="genderBox">
                    <input type="radio" id="Male" value="Mężczyzna"
                    name="gender" required>
                    <label for="Male">Mężczyzna</label>
                </div>
                <div class="genderBox">
                    <input type="radio" id="Female" value="Mężczyzna"
                    name="gender" required>
                    <label for="Female">Kobieta</label>
                </div>
            </div>

                                       
            <button type="submit" class="signRegisterButton">Zarejestruj się</button>
                </form>
            </div>


            <div class="continueWith">
                    <div class="continueWithBar">
                        <span>LUB</span>
                    </div>


                    <button class="logInWith">
                        <img src="../assets/facebookLogo.png" alt="Facebook Logo" class="serviceLogo">
                        <p>Kontynuuj przez Facebook</p>
                    </button>
                    <button class="logInWith">
                        <img src="../assets/appleLogo.png" alt="Apple Logo" class="serviceLogo">
                        <p>Kontynuuj z Apple</p>
                    </button>
                    <button class="logInWith">
                        <img src="../assets/googleLogo.png" alt="Google Logo" class="serviceLogo">
                        <p>Kontynuuj przy użyciu konta Google</p>
                    </button>

            </div>
        </div>
    </div>

    <script src="register_script.js"></script>
    </body>
    </html>