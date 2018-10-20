<?php
namespace Model;

class Credit_Cards
{
    private $card_id; 
    private $bank; 
    private $card_number; 
    private $expiration_date; 
    private $cvc; 
    private $is_default;
    
    function __construct($card_id, $bank, $card_number, $expiration_date, $cvc, $is_default) {
        $this->card_id = $card_id;
        $this->bank = $bank;
        $this->card_number = $card_number;
        $this->expiration_date = $expiration_date;
        $this->cvc = $cvc;
        $this->is_default = $is_default;
    }
    
    /**
     * @return mixed
     */
    public function getCardId()
    {
        return $this->card_id;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @return mixed
     */
    public function getCard_number()
    {
        return $this->card_number;
    }

    /**
     * @return mixed
     */
    public function getExpiration_date()
    {
        return $this->expiration_date;
    }

    /**
     * @return mixed
     */
    public function getCvc()
    {
        return $this->cvc;
    }

    /**
     * @return mixed
     */
    public function getIs_default()
    {
        return $this->is_default;
    }

    /**
     * @param mixed $id
     */
    public function setCardId($id)
    {
        $this->id = $card_id;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @param mixed $card_number
     */
    public function setCard_number($card_number)
    {
        $this->card_number = $card_number;
    }

    /**
     * @param mixed $expiration_date
     */
    public function setExpiration_date($expiration_date)
    {
        $this->expiration_date = $expiration_date;
    }

    /**
     * @param mixed $cvc
     */
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
    }

    /**
     * @param mixed $is_default
     */
    public function setIs_default($is_default)
    {
        $this->is_default = $is_default;
    }
 
    
    
}

