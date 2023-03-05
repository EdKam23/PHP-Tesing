<?php

function myNumberSwitch(int $inputNumber) 
{
    switch ($inputNumber) 
    {
        case $inputNumber > 30: return "More than 30 <br>"; break;
        case $inputNumber > 20: return "More than 20 <br>"; break;
        case $inputNumber > 10: return "More than 10 <br>"; break;
        case $inputNumber <= 10: return "Equal or less than 10 <br>"; break;
    }
}

