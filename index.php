<?php

    $nick = new Student ("Nick", "Brave", 4.6, "4A");
    $fedor = new Aspirant("Fedor", "Faust", 5, "Big Data");
    $sara = new Student("Sara", "Holz", 5, "3C");
    $helen = new Aspirant("Helen", "Sala", 4.9, "Fuzzy Logic");

    $enrollArr = [$nick, $fedor, $sara, $helen];
    foreach ($enrollArr as $v)
    {
       echo $v->getScholarship().'<br>';
    }
      
?>

      

  
    