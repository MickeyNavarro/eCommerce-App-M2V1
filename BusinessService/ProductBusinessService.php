<?php
require_once '../../Autoloader.php';

class ProductBusinessService
{
    function findByProductName($n) { 
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByProductName($n); 
        
        return $products;
    }
    function findByKeywordInDescription($n) {
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByKeywordInDescription($n);
        
        return $products;
    }
    function findByPriceRange($n) {
        $products = Array();
        
        $dbservice = new ProductDataService();
        $products = $dbservice->findByPriceRange($n);
        
        return $products;
    }
}
