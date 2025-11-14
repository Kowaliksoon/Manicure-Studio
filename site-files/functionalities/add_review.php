<?php
include ("../db.php");

    session_start();
    $user_id = $_SESSION['user_id'];
    $employee_id = $_POST['employee_id'];
    $service_id = $_POST['service_id'];
    $stars = $_POST['stars'];
    $comment = $_POST['comment'];

    // Walidacja
    if ($stars < 1 || $stars > 5) {
        die("Nieprawidłowa ocena.");
    }
    if (empty($comment)) {
        die("Komentarz jest wymagany.");
    }

    // Obsługa pliku (opcjonalnego)
    $image_path = 'NULL'; // jako tekst NULL dla zapytania
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = uniqid('img_', true) . '.' . $fileExtension;

            $uploadDir = __DIR__ . '/../uploads/reviews/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $destination = $uploadDir . $newFileName;

            // Ścieżka widoczna w przeglądarce (do zapisania w bazie)
            $webPath = 'uploads/reviews/' . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destination)) {
                $image_path = "'" . mysqli_real_escape_string($conn, $webPath) . "'";
            } else {
                die("Błąd przy przesyłaniu pliku.");
            }
        } else {
            die("Nieprawidłowy format pliku.");
        }
    }

    // Wstaw dane do bazy
    $query = "INSERT INTO reviews(user_id,service_id, employee_id, amount_of_stars, comment_text, image_path)
              VALUES ($user_id,$service_id, $employee_id, $stars, '$comment', $image_path)";

    if (mysqli_query($conn, $query)) {
        echo "Opinia została zapisana.";
    } else {
        echo "Błąd: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    header('Location: ../index.php');
    exit;

?>
