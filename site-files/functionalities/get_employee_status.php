<?php
require_once "../db.php";

$reservation_date = $_POST["reservationDate"];
$reservation_time = $_POST["reservationTime"];
$reservation_end_time = $_POST["reservationEndTime"];


    $employeeQuery = "SELECT * FROM employees WHERE employee_id";
    $employeeResult = mysqli_query($conn, $employeeQuery);
            
    
    
    
    while($employee = mysqli_fetch_assoc($employeeResult)){

$employee_id = $employee['employee_id'];

            $conflictQuery = "
                SELECT 1 FROM reservations 
                WHERE reservation_date = '$reservation_date'
                AND employee_id = $employee_id
                AND (
                    ('$reservation_time' < reservation_end_time AND '$reservation_end_time' > reservation_time)
                )
                LIMIT 1
            ";
            $conflictResult = mysqli_query($conn, $conflictQuery);
            $isAvailable = (mysqli_num_rows($conflictResult) === 0);
        
            if ($isAvailable) {
                $availabilityText = "Dostępny";
                $availabilityClass = "available";
            } else {
                $availabilityText = "Pracownik posiada inne rezerwacje w tym czasie";
                $availabilityClass = "unavailable";
            }

            echo '
            <div class="chooseEmployee '.$availabilityClass.'"   data-employee-id="'.$employee["employee_id"].'">
                <div class="employeeImageBox">
                    <img src="'.$employee["image_source"].'" alt="" class="employeeProfile"></img>
                </div>
                <div class="employeeInfo">
                    <p class="employeeName">'.$employee["name"].'</p>
                    <p class="employeeAvailability">'.$availabilityText.'</p>
                </div> 
            </div>
                            
                ';
        }

?>
