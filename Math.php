<?php

class Math
{
  public static $PI = 3.14;

  public static function kv(int $a) : int 
  {
    return $a = $a;
  }
}

//echo "Число PI " . Math::$Pi;

echo Math::kv(5);