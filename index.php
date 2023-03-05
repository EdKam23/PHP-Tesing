<?php

require_once __DIR__.'/MyClass.php';

$calc = new MyCalculator(12, 6);

echo $calc->add().'<br>';
echo $calc->multiply().'<br>';
echo $calc->add()->divideBy(9).'<br>';
echo $calc->subtract()->multiplyBy(4).'<br>';