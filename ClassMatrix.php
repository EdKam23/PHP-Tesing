<?php

class Matrix 
{
    public $mainMat =
        [
            [], 
            []
        ];
    public int $rows, $cols;
   

    public function __construct ($row, $col) 
    {
        if ($row > 0 && $col > 0) 
        {
            $mainMat = array();
            $this->rows = $row;
            $this->cols = $col;

            for ($i=0; $i < $this->rows; $i++) 
            {
                array_push($mainMat,array());

                for ($j=0; $j < $this->cols; $j++) 
                {
                    array_push($mainMat[$i],0);
                }
            }
        }
    }

    function setElem($x, $y, $val)
    {
        if ($x >= 0 && $x < $this->rows) 
        {
            if ($y >= 0 && $y < $this->cols) 
            {
                $this->mainMat[$x][$y] = $val;
            }
        }
    }

    function getElem($x, $y) 
    {
        if ($x >= 0 && $x < $this->rows) 
        {
            if ($y >= 0 && $y < $this->cols) 
            {
                return $this->mainMat[$x][$y];
            }
        }
    }
    static function printMatrix1($mat1)
    {   
        echo "<br>";
        print "Matrix 1: ";
        foreach ($mat1->mainMat as $v1) 
        {   echo "<br>";
            foreach ($v1 as $v2) {echo "$v2\n";}
        }
    }

    static function printMatrix2($mat2)
    {
    echo "<br>";
    print "Matrix 2: ";
    foreach ($mat2->mainMat as $v1) 
    {   echo"<br>";
        foreach ($v1 as $v2) {echo "$v2\n";}
    }
    }
    

    function twoMatAdd($arr) 
    {
        if ($this->rows == $arr->rows && $this->cols == $arr->cols) 
        {
            $rslt = new Matrix($this->rows,$this->cols);

            for ($i=0; $i < $this->rows; $i++) 
            {
                for ($j=0; $j < $this->cols; $j++) 
                {
                    $rslt->setElem($i,$j,$this->getElem($i,$j) + $arr->getElem($i,$j));
                }
            }

            return $rslt;
        }
    }

    static function addTwoMatsPrint($mat1, $mat2)
    {
    echo "<br>";
    print "Matrix1 + Matrix2 : ";
    $addResult = $mat1->twoMatAdd($mat2);
    foreach ($addResult->mainMat as $v1) 
    {   echo"<br>";
        foreach ($v1 as $v2) {echo "$v2\n";}
    }
    }

    function multByNum($mat, $n)
    {   
        $mat = new Matrix($this->rows,$this->cols);
        for ($i=0; $i < $this->rows; $i++) 
        {
            for ($j=0; $j < $this->cols; $j++) 
            {
                $mat->setElem($i,$j,$this->getElem($i,$j) * $n);
            }
        }
        return $mat;
    }
    static function multByNumPrint($mat, $n)
    {
        echo "<br>";
        print "Given Matrix multiplied by ".$n. ": ";
        $rslt = $mat->multByNum($mat, $n);
        foreach ($rslt->mainMat as $v1) 
        {  echo"<br>";
            foreach ($v1 as $v2) {echo "$v2\n";}
        }
    }

    function multTwoMats($mat) 
    {
        if ($this->cols == $mat->rows) 
        {
            $rslt = new Matrix($this->rows, $mat->cols);
            for ($i=0; $i < $rslt->rows; $i++) 
            {
                for ($j=0; $j < $rslt->cols; $j++) 
                {
                    $total = 0;
                    for ($k=0; $k < $mat->rows; $k++) 
                    {
                        $total += $this->getElem($i,$k) * $mat->getElem($k,$j);
                    }
                    $rslt->setElem($i,$j,$total);
                }
            }
            return $rslt;
        }
    }

    static function multTwoMatsPrint ($mat1, $mat2)
 {
    echo "<br>";
    print "Matrix1 * Matrix2: ";
    $rslt = $mat1->multTwoMats($mat2);
    
    foreach ($rslt->mainMat as $v1) 
    {   echo"<br>";
        foreach ($v1 as $v2) {echo "$v2\n";}
    }
 }
    		
}

?>