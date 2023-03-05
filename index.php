<?php
require_once __DIR__.'/ClassMatrix.php';


$mat1 = new Matrix(2,2);

    $mat1->setElem(0,0,1);
    $mat1->setElem(0,1,2);
    $mat1->setElem(1,0,3);
    $mat1->setElem(1,1,4);


$mat2 = new Matrix(2,2);

    $mat2->setElem(0,0,5);
    $mat2->setElem(0,1,6);
    $mat2->setElem(1,0,7);
    $mat2->setElem(1,1,8);


Matrix::printMatrix1($mat1);    
Matrix::printMatrix2($mat2);  
Matrix::addTwoMatsPrint($mat1, $mat2);
Matrix::multByNumPrint($mat1, 3);
Matrix::multTwoMatsPrint($mat1, $mat2);

?>
