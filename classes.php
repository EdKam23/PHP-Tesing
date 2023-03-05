<?php


class Student
{
    protected $firstName;
    protected $lastName;
    public $group;
    public float $averageGrade = 0.00;

    public function __construct($firstName, $lastName, $averageGrade, $group)
    {
        $this->firstName = $firstName;
        if(!is_string($firstName)) {
            throw new InvalidArgumentException("First name must be a string!");
        }
        $this->lastName = $lastName;
        if(!is_string($lastName)) {
            throw new InvalidArgumentException("Last name must be a string!");
        }
        $this->group = $group;
        if(!is_string($group)) {
            throw new InvalidArgumentException("Group must be a string!");
        }
        $this->averageGrade = $averageGrade;
        if(!is_numeric($averageGrade)) {
        throw new InvalidArgumentException("Average grade must be a float! Use '.' as a decimal separator");
        }
    }
        
    public function getScholarship()
    {
        if ($this->averageGrade === 5.0)
        {
            return $this->firstName." 100 USD";
        }
        return $this->firstName. " 80 USD";
    }
}

class Aspirant extends Student
{
    public $researchWorkTitle;
    
    public function __construct($firstName, $lastName, $averageGrade, $researchWorkTitle)
    {
        $this->firstName = $firstName;
          if(!is_string($firstName)) {
              throw new InvalidArgumentException("First name must be a string!");
          }
        $this->lastName = $lastName;
          if(!is_string($lastName)) {
              throw new InvalidArgumentException("Last name must be a string!");
          }
        $this->averageGrade = $averageGrade;
          if(!is_numeric($averageGrade)) {
              throw new InvalidArgumentException("Average grade must be a float! Use '.' as a decimal separator");
          }
        $this->researchWorkTitle = $researchWorkTitle;
          if(!is_string($researchWorkTitle)) {
              throw new InvalidArgumentException("Research work title must be a string!");
          }            
    }

    public function getScholarship()
        {
            if ($this->averageGrade === 5.0)
            {
                return $this->firstName." 200 USD";
            }
            return $this->firstName. " 180 USD";
        }
}    

?>
