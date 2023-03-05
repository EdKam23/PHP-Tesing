<?php

function showNumsRecur(int $A, int $B)
{
  if ($A == $B) 
  {
    echo $A;
    return;
  }
  
  elseif ($A < $B)
  {
    echo "$A\n";
    return showNumsRecur($A+1, $B);
  }
  
   echo "$A\n";
   return showNumsRecur($A-1, $B);
}

