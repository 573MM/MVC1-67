<?php

function calculateMonths($ageString) {
    preg_match('/(\d+)\s*years?,\s*(\d+)\s*months?/', $ageString, $matches);

    if (count($matches) === 3) {
        $months = (int)$matches[2]; 
        return $months;
    } else {
        return null;
    }
}

if (isset($age)) {
    $months = calculateMonths($age);
    $milk = 30-$months;
    $_SESSION['strawberry'] +=  $milk;
    echo "<p>ได้นมสตรอว์เบอร์รี่ $milk ลิตร</p>";
} else {
    echo "<p style='color:red;'>ข้อมูลอายุของวัวไม่ถูกต้อง</p>";
}
?>