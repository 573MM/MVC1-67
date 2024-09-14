<?php
session_start();

if (!isset($_SESSION['milked_cows'])) {
    $_SESSION['milked_cows'] = [];
}


function CalculateMilk($result) {
    switch ($result['breed']) {
        case "white":
            $age = $result['age'];
            include '../model/white_cow_calculate_milk.php';
            break;
        case "brown":
            $age = $result['age'];
            include '../model/brown_cow_calculate_milk.php';
            break;
        case "pink":
            $age = $result['age'];
            include '../model/pink_cow_calculate_milk.php';
            break;
        default:
            echo "<p style='color:red;'>พันธุ์วัวไม่ถูกต้อง</p>";
            break;
    }
}

if (isset($_POST['result'])) {
    $result = json_decode($_POST['result'], true);

    if ($result) {
        if (!in_array($result['cow_id'], $_SESSION['milked_cows'])) {
            CalculateMilk($result);
            $_SESSION['milked_cows'][] = $result['cow_id'];
            $_SESSION['search_result'] = $result;
        } else {
            $_SESSION['message'] = "รหัสวัวนี้ได้รับการรีดนมไปแล้ว";
        }
    } else {

        $_SESSION['message'] = "ไม่พบรหัสวัวในระบบ";
    }
}


$_SESSION['milk'] = isset($_SESSION['milk']) ? $_SESSION['milk'] : 0;
$_SESSION['chocolate'] = isset($_SESSION['chocolate']) ? $_SESSION['chocolate'] : 0;
$_SESSION['strawberry'] = isset($_SESSION['strawberry']) ? $_SESSION['strawberry'] : 0;

// เปลี่ยนเส้นทางไปยัง view
header("Location: ../view/cow_view.php");
exit();
?>
