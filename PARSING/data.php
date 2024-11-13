<?php
// Membuat array data sesuai dengan struktur yang diinginkan
$data = [
    "suhumax" => 36,
    "suhumin" => 30,
    "suhu_rata" => 33.5,
    "hasil_suhu_max_humid_max" => [
        [
            "idx" => 131,
            "suhum" => 36,
            "humid" => 36,
            "kecerahan" => 23,
            "timestamp" => "2010-09-18 07:23:33"
        ],
        [
            "idx" => 226,
            "suhum" => 36,
            "humid" => 36,
            "kecerahan" => 27,
            "timestamp" => "2011-05-02 12:29:44"
        ]
    ],
    "month_year_max" => [
        [
            "humid" => 6,
            "month_year" => "9-2010"
        ],
        [
            "month_year" => "8-2011"
        ]
    ]
];

// Mengonversi array PHP menjadi format JSON
header('Content-Type: application/json'); // Memberi tahu bahwa output adalah JSON
echo json_encode($data, JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT untuk format yang lebih mudah dibaca
?>
