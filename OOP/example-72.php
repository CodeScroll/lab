<?php

class Str {
  public static function getCharsCount($str) {
    return strlen($str);
  }
  
  public static function splitOnBlanks($str) {
    return explode(' ', $str);
  }
}

echo Str::getCharsCount('Marios') . PHP_EOL;
echo json_encode(Str::splitOnBlanks('Marios Fakiolas')) . PHP_EOL;