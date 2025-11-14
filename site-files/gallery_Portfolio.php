<?php
include("db.php");

session_start();

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gallery_Portfolio.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>Manicure Studio</title>
</head>

<body>

    <header>

        <div class="maniuraStudioBar">
            <img src="../assets//ManiuraStudio-Logo.png" alt="ManiuraStudio Logo" class="maniuraLogo">

            <div class="maniuraInformations">
                <h1>Maniura Studio</h1>
                <p>6 Sierpnia 41, 90-617, Łódź, Polesie</p>

            </div>
        </div>



        <div class="headerFunctions">
            <div class="iconsContainer">
                <img src="../assets/upload.png" alt="Udostępnij" class="headerIcons">
                <img src="../assets/heart.png" alt="Polub" class="headerIcons">
            </div>
                

            
            <button class="bookManicure"><img src="../assets/account.png" alt="" class="accountButtonIcon">Konto Użytkownika</button>
        </div>
    </header>


    <section class="mainContainer">
        <section class="leftPanel">
            <div class="returnToIndex">
                <img src="../assets/arrow.png" alt="Strzałka" class="returnToIndexIcon">
                <a href="index.php">Powrót do biznesu</a>
            </div>
            <div class="maniuraInformationDisplayBox">

                <div class="maniuraTitleSection">
                    <h1>ManiuraStudio</h1>
                </div>    

                <div class="maniuraLocationSection">
                    <p>6 Sierpnia 41, 90-617, Łódź, Polesie</p>
                </div>
            </div>


            <div class="maniuraImagesPortfolioSection">
                <div class="rowPortolioSection">
                <?php

                    $query = "SELECT image_url FROM service_gallery";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<img src="' . $row['image_url'] . '" alt="Zdjęcie z galerii">';
                        }
                    } else {
                        echo "<p>Brak zdjęć w galerii.</p>";
                    }

                ?>
                </div>
            </div>

        </section>

        <section class="rightPanel">

            <div id="map"></div>

            <div class="studioInformation">
                <div id="textAbout" class="collapsed">
                    <h4>O NAS</h4>
                    <br>

                    <p>
                        Naszą specjalnością jest profesjonalna stylizacja paznokci. Duże doświadczenie i specjalistyczne
                        umiejętności pozwalają nam zatroszczyć się o piękne dłonie i stopy naszych klientów. W ofercie
                        salonu kosmetycznego Maniura zamieściliśmy ogromny wybór usług z zakresu manicure i pedicure, a
                        wśród nich: dekorowanie płytki lakierem, żelem lub hybrydą, manicure francuski, biologiczny oraz
                        męski. Stylizacje ozdabiamy ręcznie malowanymi wzorkami, pyłkami, naklejkami i kryształkami.
                        Dbamy
                        także o oprawę oka (henna brwi i rzęs).<br><br>

                        W naszym salonie wychodzimy naprzeciw oczekiwaniom Klientów. To dlatego możemy wykonać manicure
                        i
                        pedicure z wykorzystaniem ekologicznych lakierów firmy ZOYA lub wegańskich hybryd od NCLA.
                        Chcielibyśmy przy tym zapewnić, że nieustannie przykładamy duży nacisk do higieny i dbamy o
                        bezpieczeństwa naszych Klientów.<br><br>

                        Robimy wszystko, aby pobyt w naszym salonie kosmetycznym był dla Klientów nie tylko okazją do
                        wystylizowania paznokci, ale także sposobnością do spędzenia kilku chwil w miłej atmosferze.
                        Nasze
                        studio urządziliśmy z dużą starannością, tak aby każdy czuł się tu jak u siebie.<br><br>

                        Salon kosmetyczny Maniura położony jest w Łodzi przy ul. 6 sierpnia 41 (tuż przy skrzyżowaniu z
                        ul.
                        Lipową). Klienci mogą pozostawić samochody na parkingu wzdłuż ulicy. Miło nam również
                        poinformować,
                        że na zabiegi u naszych stylistek można już umawiać się przez Internet. Serdecznie zapraszamy!
                    </p>
                </div>
                <button id="toggleButton">ROZWIŃ <span id="arrow">˅</span></button>

            </div>

            <div class="employees">
                <h4>PRACOWNICY</h4>
                <div class="employeesTeam">
                    <div class="employee">
                        <img src="uploads/profile-images/Natalia.png" alt="">
                        <p>Natalia</p>
                    </div>

                    <div class="employee">
                        <img src="uploads/profile-images/Angelika.png" alt="">
                        <p>Angelika</p>
                    </div>

                    <div class="employee">
                        <img src="uploads/profile-images/Awelina.png" alt="">
                        <p>Awelina</p>
                    </div>

                    <div class="employee">
                        <img src="uploads/profile-images/Marta.png" alt="">
                        <p>Marta</p>
                    </div>

                    <div class="employee">
                        <img src="uploads/profile-images/Daria.png" alt="">
                        <p>Daria</p>
                    </div>

                </div>

            </div>

            <div id="openingHours">
                <h4>GODZINY OTWARCIA</h4>

                <div id="today-only">
                    <span id="today-name"></span>
                    <span id="today-hours"></span>
                </div>

                <button id="toggle-week">Pokaż cały tydzień <span class="chevron">▼</span></button>

                <ul id="week-hours" class="hidden">
                    <li data-day="1"><span>Poniedziałek</span><span>08:30 - 20:00</span></li>
                    <li data-day="2"><span>Wtorek</span><span>08:30 - 20:00</span></li>
                    <li data-day="3"><span>Środa</span><span>08:30 - 20:00</span></li>
                    <li data-day="4"><span>Czwartek</span><span>08:30 - 20:00</span></li>
                    <li data-day="5"><span>Piątek</span><span>08:30 - 20:00</span></li>
                    <li data-day="6"><span>Sobota</span><span>08:30 - 15:00</span></li>
                    <li data-day="0"><span>Niedziela</span><span>Zamknięte</span></li>
                </ul>

            </div>

            <div class="buisnessInformation">
                <h4>DANE BIZNESU</h4>
                <p class="informationParagraph">IN-PULS ANNA KUPIECKA, MANIURA</p>
                <div class="buisnessInformationBar">
                    <img src="../assets/lock.png" alt="Lock" class="buisnessInformationIcon">
                    <div class="buisnessParagraph">
                        <p>Zaloguj się lub załóż konto na Booksy, aby skontaktować się z usługodawcą</p>
                    </div>
                </div>
            </div>


            <div class="socialMedia">
                <h4>MEDIA SPOŁECZNOŚCIOWE</h4>

                <div class="socialMediaBar">
                    <a href="https://www.instagram.com/maniurastudio/" target="_blank" class="mediaBox">
                        <img src="../assets/instagramIcon.png" alt="instagram" class="mediaIcon">
                        <h5>Instagram</h5>
                    </a>
                    <a href="https://www.facebook.com/maniurastudio" target="_blank" class="mediaBox">
                        <img src="../assets/facebookIcon.png" alt="facebook" class="mediaIcon">
                        <h5>facebook</h5>
                    </a>

                    <a href="https://www.maniurastudio.pl/" target="_blank" class="mediaBox">
                        <img src="../assets/websiteIcon.png" alt="strona" class="mediaIcon">
                        <h5>Strona</h5>
                    </a>

                </div>
            </div>

            <div class="report">
                <div class="reportBar">
                    <p>Zgłoś</p>
                    <span>❯</span>
                </div>
            </div>

        </section>
    </section>

                <?php

    $user_id = $_SESSION['user_id'];
    $name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $email = $_SESSION['email'];
    $birth_date = $_SESSION['birth_date'];
    $sex = $_SESSION['sex'];
    $created_at = $_SESSION['created_at'];
    
$query = "
    SELECT r.*, e.name AS employee_name, s.name AS service_name
    FROM reservations r
    LEFT JOIN employees e ON r.employee_id = e.employee_id
    LEFT JOIN services s ON r.service_id = s.service_id
    WHERE r.user_id = $user_id
    ORDER BY r.created_at DESC
";

    $result = $conn->query($query);


    echo'
    <div id="bookingReservation" class="reservation hidden">
        <div class="reservation-content">
            <span id="closeReservation" class="close">&times;</span>
            <h2>Konto Użytkownika</h2>
            <div class="userProfileImage">
            <img src="../assets/profilePicture.png" alt="Zdjecie Profilu" class="profileImageIcon"></img>
            </div>
            <div class="userPrimaryInformations">
                <div class="nameSurname">
                    <p>'.$name.' '.$surname.'</p>
                </div>
                <div class="primaryInfoBox">
                    <p>Email: '.$email.'</p>
                </div>
                <div class="primaryInfoBox">
                    <p>Data Urodzenia: '.$birth_date.'</p>
                </div>
                <div class="primaryInfoBox">
                    <p>Płeć: '.$sex.'</p>
                </div>

                <div class="primaryInfoBox">
                    <p>Data utworzenia konta: '.$created_at.'</p>
                </div>
            </div>
            <div class="userReservationsSection">
                <h3>Dodane Rezerwacje</h3>
            ';
if ($result && $result->num_rows > 0) {
    echo '<div class="reservationsContainer">';
    echo '<table class="reservationsTable">
            <thead>
                <tr>
                    <th>Nazwa Usługi</th>
                    <th>Imię pracownika</th>
                    <th>Data</th>
                    <th>Start</th>
                    <th>Koniec</th>
                    <th>Utworzono</th>
                </tr>
            </thead>
            <tbody>';

    // Pętla - tutaj PHP wyświetla wiersze
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>'.$row['service_name'].'</td>
                <td>'.$row['employee_name'].'</td>
                <td>'.$row['reservation_date'].'</td>
                <td>'.$row['reservation_time'].'</td>
                <td>'.$row['reservation_end_time'].'</td>
                <td>'.$row['created_at'].'</td>
              </tr>';
    }

    echo '</tbody></table></div>';

} else {
    echo '<p>Brak dodanych rezerwacji.</p>';
}

// Wracamy do echo i zamykamy resztę divów i przycisk
echo '
        </div>
        <form action="functionalities/log_out.php">
        <button class="bookNow">Wyloguj</button>
        </form>
    </div>
</div>
    ';
    ?>
            


    <script src="gallery_Portfolio.js"></script>

</body>

</html>