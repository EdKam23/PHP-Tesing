<?php

function studlyCaps(string $input)
{
   $inputArr = str_split($input);
    
  for ($i=0; $i < count($inputArr)-1; $i++) 
  {
    if ( $inputArr[$i] == " " || $inputArr[$i] == "-" || $inputArr[$i] == "_") 
    {
        $inputArr[$i+1] = mb_strtoupper($inputArr[$i+1]); 
    }      
  }

  $myStr = "";
  foreach ($inputArr as $val) 
  {
    $myStr .= trim($val, "-\ \_");
  }
   return $myStr;
}

print studlyCaps('                The quick-brown_fox  jumps over the_lazy-dog       ');

