<?php
include("../db.php");

if (isset($_POST['review_id'])) {
    $review_id = (int)$_POST['review_id'];

    $query = "UPDATE reviews SET amount_of_dislikes = amount_of_dislikes + 1 WHERE review_id = $review_id";

    if (mysqli_query($conn, $query)) {
        // Aktualizacja się powiodła
    } else {
        // Obsłuż błąd, np. loguj lub wyświetl info
    }
}

mysqli_close($conn);

// Przekieruj na stronę główną lub tam, gdzie chcesz
header('Location: ../index.php');
exit;
