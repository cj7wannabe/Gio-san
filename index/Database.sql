<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'gio_san'); // palitan kung may password ka
if ($conn->connect_error) {
    die('Database connection failed.');
}
$conn->set_charset('utf8mb4');

// ====== PRESYO NG SERVICES (palitan dito kahit kailan) ======
$SERVICES = [
    'Sports and Game Photography' => [
        'Sports and Game Photography' => 1000,
    ],
    'Outdoor Photography' => [
        'Pre-Birthday'   => 1000,
        'Pre-Nuptial'    => 1500,
        'Outdoor Shoot'  => 1000,
        'Collab Shoot'   => 1000,
        'Graduation Shoot' => 1000,
        'OTD Photography' => 1000,
    ],
    'Event Photography' => [
        "Bronze Package (Jollibee, McDonald's, Shakey's, Max's, Kenny Rogers)" => 1000,
        'Silver Package (Civil Weddings, Baptismal, Birthdays)' => 1500,
        'Product Photography (Church Weddings, Debuts, Reunions, Big Events)' => 1500,
    ],
];

// ====== PAYMENT DETAILS (ilagay ang totoong numbers mo) ======
$PAYMENTS = [
    'GCash'         => 'GCash: 09XX-XXX-XXXX (Pangalan mo)',
    'Maya'          => 'Maya: 09XX-XXX-XXXX (Pangalan mo)',
    'Bank Transfer' => 'BDO/BPI: XXXX-XXXX-XXXX (Pangalan mo)',
];

function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }