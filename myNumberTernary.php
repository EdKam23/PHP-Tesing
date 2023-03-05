<?php

function myNumberTernary(int $inputNumber) 
{
    $inputNumber > 30 ? print ("More than 30 <br>"):
    ($inputNumber > 20 ? print ("More than 20 <br>"):
    ($inputNumber > 10 ? print ("More than 10 <br>"):
                print ("Equal or less than 10 <br>")));
}

