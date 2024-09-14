<?php
function calculateYear($ageString) {
    preg_match('/(\d+)\s*years?,\s*(\d+)\s*months?/', $ageString, $matches);

    if (count($matches) === 3) {
        $years = (int)$matches[1]; 
        return $years;
    } else {
        return null;
    }
}

if (isset($age)) {
    $years = calculateYear($age);
    $milk = 40-$years;
    $_SESSION['chocolate'] +=  $milk;
    echo "<p>ได้นมช็อกโกแลต $milk ลิตร</p>";
} else {
    echo "<p style='color:red;'>ข้อมูลอายุของวัวไม่ถูกต้อง</p>";
}
?>