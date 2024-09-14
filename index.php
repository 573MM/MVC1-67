<?php 
session_start();
if (isset($_SESSION['milk']) && isset($_SESSION['chocolate']) && isset($_SESSION['strawberry'])) {
    echo "น้ำนมรวม = " . $_SESSION['milk']. "<br>";
    echo "นมช็อกโกแลตรวม = " . $_SESSION['chocolate']. "<br>";
    echo "นมสตรอว์เบอร์รี่รวม = " . $_SESSION['strawberry']. "<br>";
} else {
    $_SESSION['milk'] = 0;
    $_SESSION['chocolate'] = 0;
    $_SESSION['strawberry'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COW</title>
</head>
<body>
    <h2>กรอกข้อมูลรหัสวัว</h2>
    
    <form action="controller/find_cows.php" method="post" onsubmit="return validateCowId()">
        <label for="cow_id">รหัสวัว (8 หลัก ไม่ขึ้นต้นด้วย 0):</label><br>
        <input type="text" id="cow_id" name="cow_id" maxlength="8" required><br><br>
        <input type="submit" value="ตรวจสอบ">
    </form>
</body>
<script>
        function validateCowId() {
            var cowId = document.getElementById("cow_id").value;

            if (cowId.length !== 8) {
                alert("รหัสวัวต้องมีความยาว 8 หลัก");
                return false;
            }
            if (!/^\d+$/.test(cowId)) {
                alert("รหัสวัวต้องเป็นตัวเลขเท่านั้น");
                return false;
            }

            if (cowId.charAt(0) === '0') {
                alert("รหัสวัวต้องไม่ขึ้นต้นด้วยเลข 0");
                return false;
            }

            return true;
        }
    </script>
</html>