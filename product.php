<?php
 
 class Courseld 
 {
  public function __construct($name)
  {
    echo "hi";
    $this->name = $name;

  }
  public function getName(): string{
    return $this->name;
  }
  
  public function setName(string $name) : void
  {
    $this->name = $name;
  }


 }

 $name = new Courseld("Devloper beginner");
 echo $apple->getName();

 $apple->setName('mouse');
 echo $apple->getName();