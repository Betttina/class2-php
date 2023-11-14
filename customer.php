<?php

//namespace mittprojekt\minasidor;

class Customer {

    protected $customer_id;
    protected $customer_name;
    protected $customer_phone;
    protected $customer_email;
    protected $created;
    protected $member;

function __construct($customer_id, $customer_name, $customer_phone, $customer_email, $created, $member)
{
    // tilldela värdet av variabler till egenskaper ($customer_id är en parameter)
    $this->customer_id = $customer_id; 
    $this->customer_name = $customer_name;
    $this->customer_phone = $customer_phone;
    $this->customer_email = $customer_email;
    $this->created = $created;
    $this->member = $member;
    //$this->print();
   
    //parent::__construct($customer);
}

// ---SET FUNCTIONS----

function setCustomerId($customer_id){
    $this->customer_id = $customer_id;
}

function setCustomerName($customer_name){
    $this->customer_name = $customer_name;
}

function setCustomerPhone($customer_phone){
    $this->customer_phone = $customer_phone;
}

function setCustomerEmail($customer_email){
    $this->customer_email = $customer_email;
}

function setCreated($created){
$this->created = $created;
}

function setMember($member){
    $this->member = $member;
}



// --------- GET FUNCTIONS ----------
public function getCustomerId(){
    return $this->customer_id;
}

public function getCustomerName(){
    return $this->customer_name;
}

public function getCustomerPhone(){
    return $this->customer_phone;
}

public function getCustomerEmail(){
    return $this->customer_email;
}

public function getCreated(){
    return $this->created;
}

public function getMember(){
    return $this->member;
}

public function print(){
    //var_dump($this->customer_email);
    echo "<br>Kund-ID: " . $this->customer_id . ", Kundnamn: " . $this->customer_name . ", Telefon nr: " . $this->customer_phone . ", E-post: " . $this->customer_email . ", Skapad: " . $this->created . ", Medlem: " . $this->member;
}   
}

// hämta kunden
function getCustomer($connection, $customer_email){
    $query = "SELECT * FROM customers WHERE customer_email = '". $customer_email . "'";
    $statement = $connection->query($query);
    $result = $statement->fetch_assoc();

    if($result != null){
   
        $customer_id = $result["customer_id"];
        $customer_name = $result["customer_name"];
        $customer_phone = $result["customer_phone"];
        //$customer_email = $result["customer_email"];
        $created = $result["created"];
        $member = $result["member"];
        
        
        $customer = new Customer($customer_id, $customer_name, $customer_phone, $customer_email, $created, $member);
        return $customer;
        }else{
            echo "Kunden hittades inte!";
            return null;
        }

}