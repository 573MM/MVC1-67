<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cow_id = $_POST['cow_id'];

    $json_data = file_get_contents('cows_data.json');
    $cows = json_decode($json_data, true);

    $result = null;
    foreach ($cows as $cow) {
        if ($cow['cow_id'] === $cow_id) {
            $result = $cow;
            break;
        }
    }

    $_POST['result'] = json_encode($result);
    include 'cow_controller.php';
}
?>