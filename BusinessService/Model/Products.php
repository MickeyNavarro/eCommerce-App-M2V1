<?php
namespace Model;

class Products
{
    private $product_id; 
    private $product_name; 
    private $description; 
    private $price;
    
    function __construct($product_id, $product_name, $description, $price) { 
        $this->product_id = $product_id; 
        $this->product_name = $product_name; 
        $this->description = $description; 
        $this->price = $price; 
        
    }
    
    /**
     * @return mixed
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * @return mixed
     */
    public function getProduct_name()
    {
        return $this->product_name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $product_id
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @param mixed $product_name
     */
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
 
    
    
}

