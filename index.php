<?php

// Method Calls
$strCalc = new StringCalc;
echo $strCalc->Add("");
echo $strCalc->Add("1,2,5");
echo $strCalc->Add("1,2\n,5");
echo $strCalc->Add("//|\n1|2|\\n5");
echo $strCalc->Add("2,1001");

// Calculator Class
class StringCalc
{
    /**
    * Adds together a delimeted string of numbers.
    * @param string $additionString a string consisting of a control code and delimeted numbers.
    * @return int returns the added string
    *
    */
    public function Add($additionString): int
    {
        // A variable to hold the result of the function
        $result = 0;
        // A default delimeter
        $delimeter = ',';

        // Tear any newline characters out of the string.
        $additionString = str_replace('\n', '', $additionString);

        // If a control code has been provided, then tear it from the string and determine the delimeter.
        // NOTE: I realized after this was done that another solution would be to search for the position
        // of the first newline character, and then split the string in two parts from there. That way
        // you could work with each side separately.
        if(substr($additionString, 0,2) == "//")
        {
            // Find the delimeter and overwrite the default.
            $delimeter = substr($additionString, 2, 1);
            // Get rid of the control code from the string.
            $additionString = str_replace("//$delimeter", "", $additionString);
        }
        

        // Split the string based on the given delimeter
        $splitString = explode($delimeter, $additionString);

        // Loop through the new array of strings.
        for ($i = 0; $i < count($splitString); $i++)
        {
            // Clean the current number.
            $currentNumber = (int)trim($splitString[$i]);

            // If the split number is lower than 0, then throw an exception.
            if ($currentNumber < 0)
            {
                throw new Exception("Negatives not allowed. ($currentNumber)");
            }

            // If the split number is lower than 1001, then add it to the results.
            if ($currentNumber < 1001)
            {
                $result += $currentNumber;
            }
        }

        // Return the added number.
        return $result;
    }
}