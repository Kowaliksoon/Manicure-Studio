<?php
include("db.php");


session_start();

if(empty($_SESSION)){
header('Location: register.php');
exit;
}


function cut_text($text, $length = 100) {
    if (strlen($text) > $length) {
        return substr($text, 0, $length) . '...';  // Przycina i dodaje '...'
    }
    return $text;
}

// SERVICES

$queryCategories = "SELECT * FROM categories";
$categoriesResult = mysqli_query($conn, $queryCategories);

$queryServicesCategories = "SELECT 
s.*, cs.category_id FROM services s
INNER JOIN category_service cs ON s.service_id = cs.service_id";
$servicesCategoriesResult = mysqli_query($conn,$queryServicesCategories);


?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="../assets/ImageSlide1.png" style="width:100%" class="slideImages">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="../assets/ImageSlide2.png" style="width:100%" class="slideImages">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="../assets/ImageSlide3.png" style="width:100%" class="slideImages">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>


            <div class="underSliderPanel">
                <div class="underInfo">
                    <h1>Maniura Studio</h1>
                    <p>6 Sierpnia 41, 90-617, Łódź, Polesie</p>
                    <p>Przedsiębiorca</p>
                </div>

                <div class="underIconsContainer">
                    <img src="../assets/heart.png" alt="Polub" class="underIcons">
                    <img src="../assets/upload.png" alt="Udostępnij" class="underIcons">
                </div>

            </div>

            <div class="services">
                <div class="serviceBar">
                    <div class="titleService">
                        <h1>Usługi</h1>
                    </div>
                    <div class="searchBar">
                        <input type="search" placeholder="Szukaj usługi">
                        <img src="../assets/loupe.png" alt="Wyszukaj" class="searchIcon">
                    </div>
                </div>

                <?php
// Grupowanie usług po kategorii
$servicesByCategory = [];
if (mysqli_num_rows($servicesCategoriesResult) > 0) {
    while ($row = mysqli_fetch_assoc($servicesCategoriesResult)) {
        $servicesByCategory[$row['category_id']][] = $row;
    }
}

// Wyświetlanie kategorii z usługami
if (mysqli_num_rows($categoriesResult) > 0) {
    while ($category = mysqli_fetch_assoc($categoriesResult)) {
        $catId = $category['category_id'];
        echo '
        <div class="category-block">
            <div class="category" data-category="'.$catId.'">
                <span class="arrow">❯</span>
                <h4>'.$category["name"].'</h4>
            </div>
            <div class="servicesBlock hidden">';

        if (!empty($servicesByCategory[$catId])) {
            foreach ($servicesByCategory[$catId] as $service) {
                $galleryHtml = '';
                $serviceId = $service['service_id'];
                $galleryQuery = "SELECT image_url FROM service_gallery WHERE service_id = $serviceId";
                $galleryResult = mysqli_query($conn, $galleryQuery);

                if ($galleryResult && mysqli_num_rows($galleryResult) > 0) {
                    while ($img = mysqli_fetch_assoc($galleryResult)) {
                        $galleryHtml .= '<img src="'.$img['image_url'].'" class="serviceGalleryImage">';
                        }
                    }   
                
                echo '
                <div class="serviceContainer">
                <form method="post" action="" >
                    <input type="hidden" name="selected_service_id" value="'.$service["service_id"].'">
                    <input type="hidden" name="selected_service_name" value="'.$service["name"].'">
                    <input type="hidden" name="selected_service_price" value="'.$service['price'].'">
                    <input type="hidden" name="selected_service_time" value="'.$service["time"].'">
                    
                    <div class="serviceContainerLeft">
                        <h4>'.$service["name"].'</h4>
                        <p>' . cut_text($service['description'], 80) . '</p>
                        <div class="serviceGallery">
                        '.$galleryHtml.'
                            <div class="galleryInfoBlock">
                                <img src="../assets/dots.png" class="dotsInfoIcon"></img>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="serviceContainerRight">
                        <div class="serviceSmallContainer">
                            <div class="serviceInfo">
                                <p>'.$service["price"].' zł</p>
                                <span>'.$service["time"].'</span>
                            </div>
                            <div class="buttonContainer">
                                <button name="open_modal" class="makeArrangement openBookingModal" >Umów</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>';
            }
        } else {
            echo '<p class="no-services">Brak usług w tej kategorii.</p>';
        }

        echo '</div></div>'; // zamknięcie services i category-block
    }
}
?>

<div class="portfolioSection">
    <div class="portfolioTitle">
        <h1>Nasze portfolio</h1>
    </div>

    <div class="portfolioDisplayContainer">
        <div class="portfolioLeftSection">
            <img src="uploads/gallery/45.jpeg" alt="Obrazek" class="mainPhotoPortfolio">
        </div>
        <div class="portfolioRightSection">
            <img src="uploads/gallery/46.jpeg" alt="Obrazek" class="smallPhotoPortfolio">
            <img src="uploads/gallery/47.jpeg" alt="Obrazek" class="smallPhotoPortfolio">
            <img src="uploads/gallery/48.jpeg" alt="Obrazek" class="smallPhotoPortfolio">
            <img src="uploads/gallery/49.jpeg" alt="Obrazek" class="smallPhotoPortfolio">
        </div>
    
    </div>
    
    <button class="openPortfolio" onclick="window.location.href='gallery_Portfolio.php'">ZOBACZ CAŁE PORTFIOLIO</button>
</div>

<div class="amentiesSection">
    <div class="amentiesTitle">
        <h1>Udogdodnienia</h1>
    </div>
    <div class="amentiesUpperSection">
        <div class="amentiesBox">
            <img src="../assets/car.png" alt="Parking" class="amentiesIcon">
            <p>Parking</p>
        </div>
        <div class="amentiesBox">
            <img src="../assets/wifi.png" alt="Internet Wi-fi" class="amentiesIcon">
            <p>Internet</p>
        </div>
    </div>
    <div class="amentiesBottomSection">
        <div class="amentiesBox">
            <img src="../assets/credit-card.png" alt="Karty Płatnicze" class="amentiesIcon">
            <p>Aplikacja kart płatniczych</p>
        </div>
        <div class="amentiesBox">
            <img src="../assets/pawprint.png" alt="Zwierzęta" class="amentiesIcon">
            <p>Zwierzęta domowe</p>
        </div>
    </div>

</div>



<div class="reviewSection">
    <div class="reviewLeftSection">
        <div class="reviewTitle">
            <h1>Opinie</h1>
        </div>

        <div class="reviewDescription">
            <p>Opinie, przy których widoczny jest znacznik „Zweryfikowany użytkownik Booksy” to opinie, co do których Booksy zapewnia, że pochodzą od zarejestrowanych użytkowników Booksy, którzy faktycznie skorzystali z danej usługi. Wyłącznie po zrealizowaniu danej usługi, zarejestrowany użytkownik Booksy uzyskuje możliwość opublikowania opinii.</p>
        </div>
    </div>
    <div class="reviewRightSection">
        <div class="reviewBox">
            <div class="reviewBoxLeftSection">
                <div class="reviewDisplayBox">
                    <div class="reviewBoxLeftHeader">
                        <p><h1>4.9</h1>/5</p>
                    </div>
                    <div class="reviewStarContainer">
                        <span>&#9733;</span>
                        <span>&#9733;</span>
                        <span>&#9733;</span>
                        <span>&#9733;</span>
                        <span>&#9733;</span>
                    </div>
                    <div class="allReviewsContainer">
                        <p>Na podstawie 1245 opini</p>
                    </div>
                </div>
            </div>
            <div class="reviewBoxRightSection">
                <div class="reviewBreakdownBox">
                    <div class="reviewRow">
                        <span class="reviewStarLabel"><span class="goldStar">★</span> 5</span>
                        <div class="reviewBar"><div class="reviewBarFill" style="width: 96.8%;"></div></div>
                        <span class="reviewCount">2011</span>
                    </div>
                    <div class="reviewRow">
                        <span class="reviewStarLabel"><span class="goldStar">★</span> 4</span>
                        <div class="reviewBar"><div class="reviewBarFill" style="width: 1.7%;"></div></div>
                        <span class="reviewCount">35</span>
                    </div>
                    <div class="reviewRow">
                        <span class="reviewStarLabel"><span class="goldStar">★</span> 3</span>
                        <div class="reviewBar"><div class="reviewBarFill" style="width: 0.4%;"></div></div>
                        <span class="reviewCount">8</span>
                    </div>
                    <div class="reviewRow">
                        <span class="reviewStarLabel"><span class="goldStar">★</span> 2</span>
                        <div class="reviewBar"><div class="reviewBarFill" style="width: 0.4%;"></div></div>
                        <span class="reviewCount">8</span>
                    </div>
                    <div class="reviewRow">
                        <span class="reviewStarLabel"><span class="goldStar">★</span> 1</span>
                        <div class="reviewBar"><div class="reviewBarFill" style="width: 0.8%;"></div></div>
                        <span class="reviewCount">16</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="commentFormContainer">
  <h3>Dodaj opinie</h3>
  <form class="commentForm" id="reviewForm" action="functionalities/add_review.php" method="POST" enctype="multipart/form-data">
    

    <div class="commentFormContainerFunctionalities">

        <div class="leftSideCommentForm">
            <div class="starRating" id="starRating">
              <span class="star" data-value="1">&#9733;</span>
              <span class="star" data-value="2">&#9733;</span>
              <span class="star" data-value="3">&#9733;</span>
              <span class="star" data-value="4">&#9733;</span>
              <span class="star" data-value="5">&#9733;</span>
            </div>
            
            <textarea placeholder="Napisz swoją opinię..." name="comment" required></textarea>
        </div>
      
          <div class="rightSideCommentForm">
            <div class="formGroup">
                <label for="image">Dodaj zdjęcie: (opcjonalne)</label>
                  <input type="file" name="image" id="image" accept="image/*">
            </div>

              
                <div class="formGroup">
                    <label for="service">Wybierz usługę:</label>
                    <select name="service_id" id="serviceSelect" required>
                        <?php
                                
                        $query = "SELECT service_id, name FROM services ORDER BY name";
                        $result = mysqli_query($conn, $query);
            
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['service_id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                            }
                        } else {
                            echo '<option disabled>Błąd ładowania usług</option>';
                        }
                        ?>
                    </select>
                    </div>

                <div class="formGroup">
                <label for="employee">Wybierz pracownika: </label>
                    <select name="employee_id" class="serviceSelect" required>
                        <?php
                                
                        $query = "SELECT employee_id, name FROM employees ORDER BY employee_id";
                        $result = mysqli_query($conn, $query);
            
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['employee_id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                            }
                        } else {
                            echo '<option disabled>Błąd ładowania pracowników</option>';
                        }
                        ?>
                    </select>
            </div>

          </div>


    </div>


    <input type="hidden" name="stars" id="selectedStars" required>
    <div class="commentButtonContainer">
        <button type="submit">Opublikuj</button>
    </div>
  </form>
</div>


<div class='reviewCommentSection'>
<?php
$query = "
SELECT 
    r.*, 
    s.name AS service_name, 
    u.name AS name, 
    u.surname AS surname,
    e.name AS employee_name
FROM reviews r
LEFT JOIN services s ON r.service_id = s.service_id
LEFT JOIN users u ON r.user_id = u.user_id
LEFT JOIN employees e ON r.employee_id = e.employee_id
ORDER BY r.created_at DESC
";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rating = $row['amount_of_stars'];
        $comment = $row['comment_text'];
        $userName = $row['name'] . ' ' . mb_substr($row['surname'],0,1);
        $employee_name = $row["employee_name"];
        $serviceName = $row['service_name'];
        $createdAt= $row['created_at'];

        $imagePath = '';
        if (!empty($row['image_path'])) {
            $imagePath = htmlspecialchars($row['image_path']);
        }

        $imageHtml = '';
        if (!empty($imagePath)) {
            $imageHtml = "<img src='" . $imagePath . "' alt='Załącznik' class='reviewImage'>";
        }

        $starsHtml = '';
        for ($i = 1; $i <= 5; $i++) {
            $color = '';
            if ($i <= $rating) {
                $color = '#ff980b';
            } else {
                $color = 'lightgray';
            }
            $starsHtml .= "<span style='color:{$color}'>&#9733;</span>";
        }

        echo "
            <div class='commentContainer'>
                <div class='commentSidesContainer'>
                    <div class='leftSideCommentContainer'>
                        <div class='commentStarContainer'>
                            {$starsHtml}
                        </div>
                        <div class='reviewServiceName'>
                            <p>{$serviceName}</p>
                        </div>
                        <div class='reviewEmployeeName'>
                            <p>Pracownik: {$employee_name}</p>
                        </div>
                    </div>
                    <div class='rightSideCommentContainer'>
                        <div class='reviewUserData'>
                            <p>{$userName}</p>
                            <p>{$createdAt}</p>
                        </div>
                    </div>
                </div>
                <div class='boottomCommentContainer'>
                    <div class='descriptionCommentContainer'>
                        <p>{$comment}</p>
                        {$imageHtml}
                    </div>
                    <div class='commentFunctionalities'>
                        <div class='commentRatingContainer'>
                        <form method='POST' action='functionalities/update_like.php' class='likeForm'>
                         <input type='hidden' name='review_id' value='{$row['review_id']}'>
                            <button><p>{$row['amount_of_likes']}</p><img src='../assets/like.png' alt='Like' class='ratingButtonIcon'></button>
                        </form>

                        <form method='POST' action='functionalities/update_dislike.php' class='dislikeForm'>
                        <input type='hidden' name='review_id' value='{$row['review_id']}'>
                        <input type='hidden' name='action' value='dislike'>
                        <button>
                            <p>{$row['amount_of_dislikes']}</p>
                            <img src='../assets/dislike.png' alt='Dislike' class='ratingButtonIcon'>
                        </button>
                        </form>

                        </div>
                        <div class='commentReport'>
                            <button><p>Zgłoś</p><img src='../assets/reportFlag.png' alt='Zgłoś' class='reportButtonIcon'></button>
                        </div>
                    </div>
                </div>
            </div>
            ";
        }
    } else {
        echo "<p>Brak opinii do wyświetlenia.</p>";
    }
    ?>
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
            <?php if(isset($_POST['open_modal'])){
                echo'
                <div id="bookingService" class="bookingService hidden">
                    <div class="bookingServiceContent">
                        <span id="closeBookingService" class="close">&times;</span>
                            <h3 class="calendarMonth"></h3>
                        <div class="bookServiceCalendar">
                            <button class="bsCalendarLeftArrow"><</button>
                                <div class="bsCalendarContainer">
                                    
                                </div>
                            <button class="bsCalendarRightArrow">></button>
                        </div>
                        <div class="dayTimeBar">
                            <div id="morningTime" class="chosen" onclick="chooseMorning()">Rano</div>
                            <div id="afternoonTime" onclick="chooseAfternoon()">Popołudnie</div>
                            <div id="eveningTime" onclick="chooseEvening()">Wieczór</div>
                        </div>
            
                        <div class="bookHourCalendar">
                            <button class="bsHourLeftArrow"><</button>
                                <div class="hourContainer">
                                    
                                </div>
                            <button class="bsHourRightArrow">></button>
                        </div>
            
                        <div class="servicesCollection">
                        <div class="serviceBox">
                            <div class="serivceBoxInformations">
                                <div class="serviceTitle">
                                    
                                </div>
                            <div class="serviceParameters">
                                <p class="servicePrice"></p>
                                <p class="serviceTimeRange"></p>
                            </div>
                        </div>
                            
                        <div class="serviceBoxEmployees">            
                            <div class="employeeBox">Pracownik: </div>
                                    <div class="serviceButtonContainer"> 
                                        <button id="changeEmployee" class="changeEmployee">Zmień</button>
                                    </div>
                            </div>
                        </div>
            
                        </div>
                                
                        <div class="addNextService">
                        <span id="pluseAddService">+</span>
                        <h4 id="addExtraService">Dodaj kolejną usługę</h4>
                        </div>
                        
                        <div class="summaryServices">
                        <div class="summaryInformations">

                        <div class="priceSummary">
                        <p id="sumOfPrice">Łącznie: </p>
                        <h2 id="sumOfPriceH"></h2>
                        </div>

                        <div class="timeServiceSummary">
                        <p id="sumOfTime">3h</p>
                        </div>
                        



                        <div class="buttonBookServiceContainer">
                            <form id="bookingForm" action="add_reservation.php" method="POST">
                                <input type="hidden" name="reservation_service_id" id="reservation_service_id">
                                <input type="hidden" name="reservation_date" id="reservation_date">
                                <input type="hidden" name="reservation_time" id="reservation_time">
                                <input type="hidden" name="reservation_end_time" id="reservation_end_time">

                                <div id="dynamicServicesFields"></div>

                                <button class="bookService">Dalej</button>
                            </form>
                        </div>
                        </div>
                        



                    </div>
                </div>
                
                ';
            }
            ?>

                <div id="bookingExtraService" class="bookingExtraService hidden">
                    <div class="bookingExtraServiceContent">
                        <div class="interactionsServiceContainer">
                            <img src="../assets/arrow.png" alt="Wróć" class="return" id="returnToBookingService">
                            <span id="closeBookingExtraService" class="close">&times;</span>
                        </div>

                        <div class="businessServiceInformations">


                            <div class="businessLogoAdress">
                                <img src="../assets/ManiuraStudio-Logo.png" alt="LogoFirmy" class="businessServiceLogo">
                                <div class="adressInformations">
                                    <h2>Maniura Studio</h2>
                                    <p>6 Sierpnia 41, 90-617, Łódź, Polesie</p>
                                </div>
                            </div>
                            <div class="businessRatingService">
                                <h2>4,9/5</h2>
                                <div class="businessStarsContainer">
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                    <span>&#9733;</span>
                                </div>
                            </div>

                            
                            
                        </div>
                        <div class="businessServiceSearchBar">
                            <input type="search" placeholder="Szukaj usługi">
                            <img src="../assets/loupe.png" alt="Wyszukaj" class="serviceSearchIcon">
                        </div>

                        <div class="businessServiceContainer">
    <?php
    // Ponowne pobranie danych z bazy danych
    $queryCategories = "SELECT * FROM categories";
    $categoriesResult = mysqli_query($conn, $queryCategories);

    $queryServicesCategories = "SELECT s.*, cs.category_id FROM services s INNER JOIN category_service cs ON s.service_id = cs.service_id";
    $servicesCategoriesResult = mysqli_query($conn, $queryServicesCategories);

    // Grupowanie usług po kategorii
    $servicesByCategory = [];
    if (mysqli_num_rows($servicesCategoriesResult) > 0) {
        while ($row = mysqli_fetch_assoc($servicesCategoriesResult)) {
            $servicesByCategory[$row['category_id']][] = $row;
        }
    }

    // Wyświetlanie kategorii z usługami
    if (mysqli_num_rows($categoriesResult) > 0) {
        while ($category = mysqli_fetch_assoc($categoriesResult)) {
            $catId = $category['category_id'];
            echo '
            <div class="category-block">
                <div class="categoryBookingExtraService" data-category="'.$catId.'">
                    <span class="arrow">❯</span>
                    <h4>'.$category["name"].'</h4>
                </div>
                <div class="servicesBlock hidden">';

            if (!empty($servicesByCategory[$catId])) {
                foreach ($servicesByCategory[$catId] as $service) {
                    echo '
                    <div class="serviceContainer">
                        <form method="post" action="">
                            <input type="hidden" name="selected_service_id" value="'.$service["service_id"].'">
                            <input type="hidden" name="selected_service_name" value="'.$service["name"].'">
                            <input type="hidden" name="selected_service_price" value="'.$service['price'].'">
                            <input type="hidden" name="selected_service_time" value="'.$service["time"].'">
                            
                            <div class="extraServiceContainerLeft">
                                <div class="extraServiceText">
                                <h4>'.$service["name"].'</h4>
                                <p>' . cut_text($service['description'], 80) . '</p>
                                </div>
                            </div>
                            
                            <div class="extraServiceContainerRight">
                                <div class="serviceSmallContainer">
                                    <div class="serviceInfo">
                                        <p>'.$service["price"].' zł</p>
                                        <span>'.$service["time"].'</span>
                                    </div>
                                    
                                    <div class="buttonContainer">
                                        <button name="open_modal" class="makeArrangement addExtraService">Umów</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>';
                }
            } else {
                echo '<p class="no-services">Brak usług w tej kategorii.</p>';
            }

            echo '</div></div>'; // zamknięcie servicesBlock i category-block
        }
    }
    ?>
                        </div>
                    </div>
                </div>
                



                <div id="employeeChange" class="employeeChange hidden">
                    <div class="employeeChangeContent">
                        <div class="interactionsEmployeesContainer">
                            <img src="../assets/arrow.png" alt="Wróć" class="return" id="employeesReturnToBookService">
                            <h2>Wybierz Pracownika</h2>
                        </div>
                        <div class="employeeDisplayBox">
                         
                            
                            <div id="employeesCotainerBox">
    
                            
                            </div>
                            

                            <form id="employeeSelectionForm">
                                <input type="hidden" name="serviceIndex" id="selectedServiceIndex">
                                <input type="hidden" name="reservationDate" id="selectedReservationDate">
                                <input type="hidden" name="reservationTime" id="selectedReservationTime">
                                <input type="hidden" name="reservationEndTime" id="selectedReservationEndTime">
                            </form>
                            
                            <div id="reservationResults"></div>
                            
                        </div>
                    </div>
                </div>
                
                
                
                


    <script src="script.js"></script>

</body>

</html>