<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// ...rest of your code...
// Set your email address here
$to = "pareekdp2005@gmail.com"; // <-- Change this to your email

// Collect POST data
$name   = isset($_POST['name']) ? $_POST['name'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$pin    = isset($_POST['pin']) ? $_POST['pin'] : '';
$city   = isset($_POST['city']) ? $_POST['city'] : '';
$state  = isset($_POST['state']) ? $_POST['state'] : '';
$flat   = isset($_POST['flat']) ? $_POST['flat'] : '';
$area   = isset($_POST['area']) ? $_POST['area'] : '';
$item   = isset($_POST['item']) ? $_POST['item'] : '';
$color  = isset($_POST['color']) ? $_POST['color'] : '';

// Prepare message
$message = "New Order:\n";
$message .= "Name: $name\n";
$message .= "Mobile: $number\n";
$message .= "PIN: $pin\n";
$message .= "City: $city\n";
$message .= "State: $state\n";
$message .= "House/Flat: $flat\n";
$message .= "Area: $area\n";
$message .= "Item: $item\n";
$message .= "Color: $color\n";

// Save to file
$file = __DIR__ . '/orders.txt';
file_put_contents($file, $message . "\n---\n", FILE_APPEND);

// Send email
$subject = "New Order from Website";
$headers = "From: noreply@" . $_SERVER['SERVER_NAME'];
mail($to, $subject, $message, $headers);  

// ...your code for saving and mailing...

header("Location: /assets/product-details/order-summary.html");
exit();