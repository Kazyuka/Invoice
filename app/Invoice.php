<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CalculatePriceMenegerInterface;

class Invoice
{

    protected $decription ;

    protected $price;

    protected $totalSumm;


    public function getDescription() {
        return $this->decription;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getTotalSumm() {
        return $this->totalSumm;
    }

    public function __construct( $decription , $price  , \App\CalculatePriceMenegerInterface $calculatePriceMeneger)
    {
        $this->decription = $decription;
        $this->price = $price;
        $this->totalSumm = $calculatePriceMeneger->getTotalPrice();
    }

}
