<?php

class MyCalculator
    {
        public $a, $b, $c, $result;
                
        public function __construct ($a, $b, $result = null)
        {
            $this->a = $a;
            $this->b = $b;
            $this->result = $result;

        }

        public function __toString( )
        {
            return $this->result.$this->c;
        }

        public function add()
        { 
            $this->result = new MyCalculator($this->a, $this->b);
            $this->result->c = $this->a + $this->b;
            return $this->result;
        }

        public function subtract()
        { 
            $this->result = new MyCalculator($this->a, $this->b);
            $this->result->c = $this->a - $this->b;
            return $this->result;
        }

        public function multiply()
        { 
            $this->result = new MyCalculator($this->a, $this->b);
            $this->result->c = $this->a * $this->b;
            return $this->result;
        }

        public function divide()
        { 
            $this->result = new MyCalculator($this->a, $this->b);
            $this->result->c = $this->a / $this->b;
            return $this->result;
        }

            
        public function addBy($n)
        { 
            $this->result = $this->c + $n;
            return $this->result;      
        }

        public function subtractBy($n)
        { 
            $this->result = $this->c - $n;
            return $this->result;      
        }

        public function multiplyBy($n)
        { 
            $this->result = $this->c * $n;
            return $this->result;      
        }

        public function divideBy($n)
        { 
            $this->result = $this->c / $n;
            return $this->result;           
        }
    }

?>
