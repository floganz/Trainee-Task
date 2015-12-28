<?php
$tmp = json_decode(file_get_contents('php://input'), true);

function charFrequency($str)
{
  $frequency=array_fill(0,26,0);
  $length=strlen($str);
  $arr=array('a','b','c','d','e','f','g','h','i','j','k','l',
  'm','n','o','p','q','r','s','t','u','v','w','x','y','z');
  $arr2=array('A','B','C','D','E','F','G','H','I','J','K','L',
  'M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  for($i=0;$i<26;$i++)
    for($j=0;$j<$length;$j++)
      if(($str[$j]==$arr[$i]) || ($str[$j]==$arr2[$i]))
        $frequency[$i]++;      
  $tmp['frequency']=$frequency;
  $tmp['labels']=$arr;
  echo json_encode($tmp);
}

charFrequency($tmp['source']);
?>