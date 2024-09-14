<?php

function calculateAgeInMonths($ageString) {
    preg_match('/(\d+)\s*years?,\s*(\d+)\s*months?/', $ageString, $matches);

    if (count($matches) === 3) {
        $years = (int)$matches[1]; 
        $months = (int)$matches[2]; 
        return ($years * 12) + $months;
    } else {
        return null;
    }
}


if (isset($age)) {
    $ageInMonths = calculateAgeInMonths($age);
    $milk = 120-$ageInMonths;
    $_SESSION['milk'] +=  $milk;
    echo "<p>ได้นมจืด $milk ลิตร</p>";
} else {
    echo "<p style='color:red;'>ข้อมูลอายุของวัวไม่ถูกต้อง</p>";
}
?>