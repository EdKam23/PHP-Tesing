<?php

function remove(&$arr, $index)
{
  $newArr = [];
   
  for ($i = 0; $i < $index; $i++)
    {$newArr[$i] = $arr[$i];}
  for ($i = $index+1; $i < count($arr); $i++ )
    {$newArr[$i-1] = $arr[$i];}

  $arr = $newArr;  
  return $arr;
}

$myArr = [1, 2, 3, 4, 5];
remove($myArr, 3);
var_dump($myArr);
