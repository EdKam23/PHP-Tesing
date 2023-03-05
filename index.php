<?php

require_once __DIR__.'/classMaze.php';


//Enter your coordinates of A ($startX, $startY) and B ($finX, $finY) within the range 0-9:

$tryToPass = new Maze(3, 2, 9, 1);

$tryToPass->visualize();
$tryToPass->shortPath();
$tryToPass->serializeThePath();