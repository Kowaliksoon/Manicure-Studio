<?php
include("db.php");

        echo "<pre>";
        print_r($_POST['services']); // wypisuje tablicę usług
        echo "</pre>";

session_start();
$user_id = $_SESSION["user_id"];


if (!empty($_POST['services'])) {
    $services = $_POST['services'];
    $reservation_date = $_POST['reservation_date'];


    foreach ($services as $service) {
        $service_id = $service['id'];
        $reservation_time = $service['time'];
        $reservation_end_time = $service['endTime'];
        $employee_id = $service['employee'];

        $sql = "INSERT INTO reservations (user_id, service_id, employee_id, reservation_date, reservation_time, reservation_end_time)
                VALUES ('$user_id', '$service_id', '$employee_id', '$reservation_date', '$reservation_time', '$reservation_end_time')";

        if (!$conn->query($sql)) {
            echo "Błąd przy dodawaniu usługi: " . $conn->error;
        }
    }

    echo "Usługi zostały dodane.";
} else {
    echo "Brak usług do dodania.";
}

$conn->close();

header('Location: index.php');
exit;
?>
