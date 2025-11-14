<?php 

namespace App\Enums;    

enum TaxValue: string {
    case ICMS_VALUE_FIC = '0.12';
    case ISS_VALUE_FIC  = '0.06';

    public function toFloat(): float {
        return (float) $this->value;
    }
}