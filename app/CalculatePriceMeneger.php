<?php

namespace App;

use App\CalculatePriceMenegerInterface;

class CalculatePriceMeneger implements \App\CalculatePriceMenegerInterface
{
    private $totalSumm;

    public function getTotalPrice() {
        return $this->totalSumm;
    }

    function calculateTotalPrice($prices) {
        $this->totalSumm = array_sum($prices);
    }
}
