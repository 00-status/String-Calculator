<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
// Import the StringCalc class in the index.php page.
require_once("index.php");

// A constant to represent the expected result of each test method.
define("DEFAULT_RESULT", 1+2+5);

final class EmTest extends TestCase
{
    /**
    * Tests that the method returns the expected result with the simplest imput.
    * 
    */
    public function testAdd(): void
    {
        $stringCalculator = new StringCalc();
        // The actual result of the method.
        $calcResult = $stringCalculator->Add("1,2,5");
        // Assert that the expected result matches the actual result.
        $this->assertEquals(DEFAULT_RESULT, $calcResult);
    }

    /**
    * Ensures that the Add() method returns a zero when an empty string is submitted.
    * 
    */
    public function testAddEmpty(): void
    {
        $stringCalculator = new StringCalc();
        // The actual result of the method.
        $calcResult = $stringCalculator->Add("");
        // Assert that the expected result matches the actual result.
        $this->assertEquals(0, $calcResult);
    }

    /**
    * Ensures that newlines do not interfere with the adding of strings.
    * 
    */
    public function testAddNewline(): void
    {
        $stringCalculator = new StringCalc();
        // The actual result of the method.
        $calcResult = $stringCalculator->Add("\n1,2,5");
        // Assert that the expected result matches the actual result.
        $this->assertEquals(DEFAULT_RESULT, $calcResult);
    }

    /**
    * Ensures that a customized delimeter can be used via the control code.
    * 
    */
    public function testAddCustomDelimeter(): void
    {
        $stringCalculator = new StringCalc();
        // The actual result of the method.
        $calcResult = $stringCalculator->Add("//|\n1|2|5");
        // Assert that the expected result matches the actual result.
        $this->assertEquals(DEFAULT_RESULT, $calcResult);
    }

    /**
    * Ensures that an exception is thrown when negative values are given.
    * 
    */
    public function testAddNegativeException(): void
    {
        $stringCalculator = new StringCalc();

        // Tell phpunit to expect an exception to be thrown when our method is called.
        $this->expectException(Exception::class);
        // The actual result of the method.
        $stringCalculator->Add("//|\n-1|2|-5");
    }

    /**
    * Ensures that numbers greater than 1000 are not added.
    *
    */
    public function testAddLargeNumberFails(): void
    {
        $stringCalculator = new StringCalc();
        // The actual result of the method.
        $calcResult = $stringCalculator->Add("2,1001");
        // Assert that the expected result matches the actual result.
        $this->assertEquals(2, $calcResult);        
    }
}