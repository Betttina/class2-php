<?php

//import databasanslutning
require_once "database.php";

// importera för att kunna använda getProducts
require_once "product.php";
require_once "customer.php";
require_once "order.php";
require_once "order_item.php";

echo "<h1>Min E-handel</h1>";

// connection kan heta vad som helst här
$connection = getConnection();

$customer = getCustomer($connection, "bettina.toth@gritacademy.se");
if($customer != null){
    $customer->print();
}

echo "<br>";

$orders = getOrdersByCustomer($connection, $customer->getCustomerId());

echo "<h2>Orders:</h2>";
foreach ($orders as $order){
    $order->print();
    $order_items = getOrderItemsByOrderId($connection, $order->getOrderId());
    echo "<br>";

    foreach($order_items as $item){
        echo "-";
        $item->print();
        echo "<br/>";
        echo " - ";
        $product = getProductById($connection, $item->getProductId());
        $product->print();
        $item->print();
        echo "<br>";
    }
}

echo "<br>";

//läsa produkt från databsen
$product = getProductBySku($connection, "kaffe");

if ($product != null){
$product->print();
}

   
?>

