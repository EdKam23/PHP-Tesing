<?php

function isValidURL(string $urlAddress) 
{
    $pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
    preg_match($pattern, $urlAddress);

    if ($urlAddress == null) die ("Enter URL");
    elseif (preg_match($pattern, $urlAddress)) 
    {
      echo "Valid URL";
    } 
    else 
    {
      echo "Invalid URL";
    }
}

isValidURL(" htps://innowise,com/"); 
echo '<br>';
isValidURL(" https://innowise.com/");

