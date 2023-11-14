<?php

class OrderItem {

    protected $id;
    protected $product_id;
    protected $total;
    protected $order_id;

    function __construct($id, $product_id, $total, $order_id)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->total = $total;
        $this->order_id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setOrderId($order_id){
        $this->order_id = $order_id;
    }
    
    public function getOrderId(){
        return $this->order_id;
    }
    
    public function setProductId($product_id){
        $this->total = $product_id;
    }
    
    public function getProductId(){
        return $this->product_id;
    }
    
    public function setTotal($total){
        $this->order_id = $total;
    }
    
    public function getTotal(){
        return $this->total;
    }
    
    function print(){
        echo "Order item id: " . $this->id . " ProduktID: " . $this->product_id . " total: " . $this->total . " OrderID:" . $this->order_id;
    }
};

function getOrderItemsByOrderId($connection, $order_id)
{
    $query = "SELECT * FROM order_item WHERE order_id = '". $order_id . "'";
    $statement = $connection->query($query);
    $result = $statement->fetch_assoc();

    $order_items = array();
    while($result = $statement->fetch_assoc()){
   
        $id = $result['order_items_id'];
        $product_id = $result['product_id'];
        $total = $result['subtotal'];
        
        
        $order_item = new OrderItem($id, $product_id, $total, $order_id);
        $order_items[] = $order_item;
}
return $order_items;
}