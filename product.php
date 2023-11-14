<?php

class Product {

    protected $id = null;
    protected $name = null;
    protected $price = null;
    protected $sku = null;

    // initialisera egenskaper när ett objekt skapas
    function __construct($id, $name, $price, $sku)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->sku = $sku;

    }

    //get. hämta värdena av objektets egenskaper
    function getId(){
        return $this->id;
    }

    function getName(){
        return $this->name;
    }

    function getPrice(){
        return $this->price;
    }

    function getSku(){
        return $this->sku;
    }

    // set. sätta eller uppdatera värdena av objektets egenskaper.
    function setId($value){
        $this->id = $value;
    }

    // Ställer inte in namnet om det givna värdet är tomt
    function setName($value){
        //sant eller falskt med empty, kollar om det är tomt värde.
        if(empty($value) == false){
        $this->name = $value;
        }
    }

    // Ställer inte in priset om det givna värdet är negativt
    function setPrice($value){
        // sätter inga negativa värden.
        if($value > 0){
        $this->price = $value;
        }
    }

    function setSku($value){
        $this ->sku = $value;
    }

    // skriver ut allt om produkter
    public function print(){
        echo "<br>Produkt: <br>" . "id : " . $this->id . " name: " . $this->name . " price: " . $this->price . "  sku: " . $this->sku;
    }
};

// funk läser databas och skapar produkt
// hämta produkt baserad på sku
// först: läsa en produkt från en databas baserat på dess SKU och databasanslutning (parametrar)
function getProductBySku($connection, $sku){
    // läs produkt från tabellen
    $query = "SELECT * FROM products WHERE sku = '". $sku . "'";

    // förbereder SQL-frågan för säker exekvering, skapar statement objekt
    $statement = $connection->query($query);

    //binder $sku-parametern till frågan som en sträng
    //$statement->bind_param("s", $sku);

    //kör frågan mot databsen
    $result = $statement->fetch_assoc();
    //var_dump($result);

     // läsa raderna, det som det returneras ifrån
    if($result != null){
   
    // temporära variabler
    $id = $result["product_id"];
    $name = $result["name"];
    $price = $result["price"];

    //skapar ny produkt
    $product = new Product($id, $name, $price, $sku);
    return $product;
    }else{
        echo "Produkten kunde inte hittas!";
        return null;
    }
};

function getProductById($connection, $id){
    // läs produkt från tabellen
    $query = "SELECT * FROM products WHERE sku = '". $id . "'";

   
    $statement = $connection->query($query);
    $result = $statement->fetch_assoc();
    

    if($result != null){
   

    $id = $result["product_id"];
    $name = $result["name"];
    $price = $result["price"];
    $sku = $result['sku'];

    //skapar ny produkt
    $product = new Product($id, $name, $price, $sku);
    return $product;
    }else{
        echo "Produkten kunde inte hittas!";
        return null;
    }
};