<?php

function dayCount(string $nextBirthdayDate) 
  {
    $date = \Datetime::createFromFormat("d-m-Y", $nextBirthdayDate);
    if (! $date) 
    {
    echo "Invalid date format! Enter your date in 'DD-MM-YYYY' format."; return;
    }
    $today = date("d-m-Y");
    $diff = strtotime($nextBirthdayDate) - strtotime($today);
    print ("Your birthday is in ". abs(round($diff / 86400)) . " days! ");     
  }
    
   
 