<?php

function generateRandomAge() {
    $years = rand(0, 10);
    $months = rand(0, 11);
    return "{$years} years, {$months} months";
}


function generateCowId($startId) {
    return str_pad($startId, 8, '0', STR_PAD_LEFT);
}


$breeds = ['white', 'brown', 'pink'];

$cows = [];
$startId = 10000001; 


foreach ($breeds as $breed) {
    for ($i = 0; $i < 5; $i++) { 
        $cows[] = [
            'cow_id' => generateCowId($startId),
            'breed' => $breed,
            'age' => generateRandomAge()
        ];
        $startId++; 
    }
}


$file = 'cows_data.json';
file_put_contents($file, json_encode($cows, JSON_PRETTY_PRINT));

echo "สร้างไฟล์ข้อมูลวัวเรียบร้อยแล้ว: $file";
?>
