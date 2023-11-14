<?php


class Order {

protected $customer_id;
protected $order_id;
protected $total;
protected $created;


function __construct($customer_id, $order_id, $total, $created)
{
    $this->customer_id = $customer_id; 
    $this->order_id = $order_id;
    $this->total = $total;
    $this->created = $created;
   
   // $this->print();
}    

//public function getCustomerId(){

    //$data = array();
    //$data['order_id'] = $this->orders;
    
    //return $this->customer_id;
//}

public function setCustomer($customer_id){
    $this->customer_id = $customer_id;
}

public function getCustomer(){
    return $this->customer_id;
}

public function setOrderId($order_id){
    $this->order_id = $order_id;
}

public function getOrderId(){
    return $this->order_id;
}

public function setCreated($created){
    $this->order_id = $created;
}

public function getCreated(){
    return $this->created;
}

public function setTotal($total){
    $this->order_id = $total;
}

public function getTotal(){
    return $this->total;
}


function print(){
    echo "<br>En order:<br>" . "CustomerID: " . $this->customer_id . " OrderID: " . $this->order_id . " Total: " . $this->total . " Created: " . $this->created;
}

}

function getOrdersByCustomer($connection, $customer_id)
{
    $query = "SELECT * FROM orders WHERE customer_id = " . $customer_id;
    $statement = $connection->query($query);

    $orders = array();
    while($result = $statement->fetch_assoc()) {
   
    
        $order_id = $result["order_id"];
        $total = $result["total"];
        $created = $result["created"];
        
        
        $order = new Order($order_id, $total, $created, $customer_id);
        //blir ett nytt orderobjekt varje gång det loopas igenom
        $orders[] = $order;
    }
    return $orders;
}





function getOrdersByDate($connection, $date){
    $query = "SELECT * FROM orders WHERE created = '". $date ."'";
    $statement = $connection->query($query);
    $result = $statement->fetch_assoc();

    if($result != null){
   
        $customer_id = $result["customer_id"];
        $order_id = $result["order_id"];
        $total = $result["total"];
        $created = $result["created"];
        
        
        $order = new Order($customer_id, $order_id, $total, $created);
        return $order;
        }else{
            echo "Kunde inte hämta alla ordrar!";
            return null;
        }

}