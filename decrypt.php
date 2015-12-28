<?php
$tmp = json_decode(file_get_contents('php://input'), true);

function shift($char,$sh)
{
  $arr=array('a','b','c','d','e','f','g','h','i','j','k','l',
  'm','n','o','p','q','r','s','t','u','v','w','x','y','z');
  $arr2=array('A','B','C','D','E','F','G','H','I','J','K','L',
  'M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
  $n=count($arr);
  while($sh>$n-1)
    $sh-=$n;
  $index=-1;
  for($i=0;$i<$n;$i++)
    if($arr[$i]==$char)
    {
      $index=$i;
      if($index==-1)
      {
        return $char;
      }
      else
      {
        $shift=$index-$sh;
        while($shift<0)
          $shift+=$n;
        return $arr[$shift];
      }
    }
    else if($arr2[$i]==$char)
    {
      $index=$i;
      if($index==-1)
      {
        return $char;
      }
      else
      {
        $shift=$index-$sh;
        while($shift<0)
          $shift+=$n;
        return $arr2[$shift];
      }
    }
}

function decrypt_message($str,$sh)
{
  $length=strlen($str);
  for ($i=0;$i<$length;$i++)
  {
    $res[$i]=shift($str[$i],$sh);
  }
  $tmp['result']=implode($res);
  echo json_encode($tmp);
}

decrypt_message($tmp['source'],$tmp['shift']);

?>