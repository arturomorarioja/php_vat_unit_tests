<?php

require_once 'src/vat.php';

use PHPUnit\Framework\TestCase;

class vatTest extends TestCase {

    /*
        Positive testing. Valid inputs are tested
    */

    public function testVATFor10000Is12500() {
        $amount = 10000;
        $expected = 12500;

        $result = calculateVAT($amount);

        $this->assertEquals($expected, $result);
    }

    public function testVATFor20000Is25000() {
        $amount = 20000;
        $expected = 25000;

        $result = calculateVAT($amount);

        $this->assertEquals($expected, $result);
    }

    // Valid input with a decimal number
    public function testVATFor14000Point78Is17500Point975() {
        $amount = 14000.78;
        $expected = strval(17500.975);
        
        $result = strval(calculateVAT($amount));
        
        $this->assertEquals($expected, $result);
    }
    
    /*
        Edge case. Both values are zero
    */

    public function testVATFor0Is0() {
        $amount = 0;
        $expected = 0;

        $result = calculateVAT($amount);

        $this->assertEquals($expected, $result);
    }

    /*
        Edge case. A negative value is tested
    */

    public function testVATForMinus10000Is0() {
        $amount = -10000;
        $expected = 0;

        $result = calculateVAT($amount);

        $this->assertEquals($expected, $result);
    }

    /*
        Negative testing. An invalid data type is tested
    */

    public function testVATForAIs0() {
        $amount = 'A';
        $expected = 0;

        $result = calculateVAT($amount);

        $this->assertEquals($expected, $result);
    }

}