<?php

function digitSum($num)
{       
    $digitArr = str_split($num);
    $sum = 0;
    
    for ($i = 0; $i < count($digitArr); $i++)
    {
        $sum += $digitArr[$i];
    }    
   
    if ($sum < 10)
    {
        return $sum;
    }
    return digitSum($sum);
}




