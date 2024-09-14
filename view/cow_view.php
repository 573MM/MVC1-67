<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COW</title>
</head>
<body>
<?php
session_start();
// แสดงผลลัพธ์ที่ส่งมาจาก Controller
if (isset($_SESSION['search_result'])) {
    $result = $_SESSION['search_result'];
    echo "<h3>ผลลัพธ์การค้นหา:</h3>";
    echo "<p>รหัสวัว: " . htmlspecialchars($result['cow_id']) . "</p>";
    echo "<p>พันธุ์วัว: " . htmlspecialchars($result['breed']) . "</p>";
    echo "<p>อายุ: " . htmlspecialchars($result['age']) . "</p>";
    unset($_SESSION['search_result']);
} 

if (isset($_SESSION['message'])) {
    echo "<p style='color:blue;'>".$_SESSION['message']."</p>";
    unset($_SESSION['message']);
}

echo "น้ำนมรวม = " . $_SESSION['milk'] . "<br>";
echo "นมช็อกโกแลตรวม = " . $_SESSION['chocolate'] . "<br>";
echo "นมสตรอว์เบอร์รี่รวม = " . $_SESSION['strawberry'] . "<br>";
?>

<form action="../index.php" method="post">
    <input type="submit" value="กลับหน้าแรก">
</form>

</body>
</html>
