<?php
namespace Model;

class Orders
{
    private $order_id; 
    private $completed;
    
    function __construct($order_id, $completed) { 
        $this->order_id = $order_id; 
        $this->completed = $completed; 
    }
    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @param mixed $completed
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
    }
 
    
    
}

