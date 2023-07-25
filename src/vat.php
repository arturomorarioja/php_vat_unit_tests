<?php

function calculateVAT($amount, $vat = 25) {
    if ((!in_array(gettype($amount), ['integer', 'double'])) || ($amount < 0)) {
        return 0;
    }
    return $amount + ($amount / 100 * $vat);
}