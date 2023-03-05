<?php

class Cell
{
    public int $x, $y, $dist;

    function __construct($x, $y, $dist)
    {
        $this->x = $x;
        $this->y = $y;
        $this->dist = $dist;
    }
}

?>