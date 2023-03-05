<?php

function myNumberIf(int $inputNumber)

{ 
    if ($inputNumber > 30) return "More than 30 <br>";
    else if ($inputNumber > 20) return "More than 20 <br>";
    else if ($inputNumber > 10) return "More than 10 <br>";
    else return "Equal or less than 10";
}
