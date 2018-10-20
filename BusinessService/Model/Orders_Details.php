<?php
namespace Model;

class Orders_Details
{
    private $order_details_id;
    
    function __construct($order_details_id) { 
        $this->order_details_id = $order_details_id; 
    }
    /**
     * @return mixed
     */
    public function getOrder_details_id()
    {
        return $this->order_details_id;
    }

    /**
     * @param mixed $order_details_id
     */
    public function setOrder_details_id($order_details_id)
    {
        $this->order_details_id = $order_details_id;
    }
 
}

