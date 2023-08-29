<?php
require 'User.php';

class empolye extends User
{
  protected int $salary;

  public function __construct($salary, $name, $age)
  {
    parent::__construct($name, $age);
    $this->salary = $salary;
  }

  public function getAge() : int {
    return 30;
  }
}

$empolye = new Employe(200, "Rinat", 20);

echo $empolye->getAge();