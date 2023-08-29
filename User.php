<?php

class Courseld 
{
  protected string $name;
  protected int $description;
  private $instructor; 

  public function __construct(string $name, int $description)
  {
    $this->name = $name;
    $this->description = $description;
  }

  public function getName() : string 
  {
    return $this->name;
  }

  public function getAge() : int
  {
    return $this->description;
  }
}

$user = new Courseld("Devloper", 20);

echo $user->getAge();