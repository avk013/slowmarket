<?php 
$produkt_name_cena=array(
array('a','b','c','d','e','f','g','h','i','k','l','m'),
 array(1,1,1,1,1,1,1,1,1,1,1,1));
$skidka_a=array(array(10,'a','b'),array(5,'d','e'),array(5,'e','f','g'),
array(5,'a','k'),array(5,'a','l'),array(5,'a','m'));
$skidka_b=array( array(20,5,'a','c'), array(10,4,'a','c'), array(5,3,'a','c'));
$korzina=array(
 array('a','b','c','d','e','f','g','h','i','k','l','m'),
 array(1,1,2,1,1,4,1,1,1,0,1,1));
$skidka=array(
 //флаг скидкм
 array(0,0,0,0,0,0,0,0,0,0,0,0),
 //процент скидки
 array(0,0,0,0,0,0,0,0,0,0,0,0));
//счет процента общей скидки по скидке b
$procent=0;$nom_skidka_b='';$kol_tov_sk=0;
  for($j=0;$j<count($skidka_b)-1;$j++)  
 {  for($k=2;$k<count($skidka_b[0]);$k++)
 {$kol_tov=0;
    for($i=0;$i<count($korzina[0]);$i++) 
 if ($korzina[1][$i]!=0) 
  if ($skidka_b[$j][$k]!=$korzina[0][$i])
    {$kol_tov++;
      } }
  if($skidka_b[$j][1]<=$kol_tov)
  {$procent=$skidka_b[$j][0];
   $nom_skidka_b=$j;
   $kol_tov_sk=$skidka_b[$j][1];
   break;}}
// зная процент скидки устанавливаем его на товар 
for($i=count($korzina[0])-1;$i>=0;$i--)
 if(($korzina[1][$i]!=0)&&($kol_tov_sk>0)&&($kol_tov>0)&&(is_numeric($nom_skidka_b)))
{$skidka[0][$i]=1;$skidka[1][$i]=$procent;$kol_tov_sk--;}
//разбираемся с парной скидкой
for($j=0;$j<count($skidka_a);$j++)
{ $kol_tov=0; 
    for($k=1;$k<count($skidka_a[0]);$k++)
 for($i=0;$i<count($korzina[0]);$i++) 
 {//echo '='.$kol_tov.'+'.$skidka_a[$j][$k].'_'.$j.'_'.$k.'<BR>';
 if (($korzina[1][$i]!=0)&&($skidka[0][$i]==0))
 if ($skidka_a[$j][$k]==$korzina[0][$i])
{$kol_tov++; }
 //если количество товаров для строки сошлись
 //нужно застолбить им скидку
  if ($kol_tov==count($skidka_a[$j])-1)
{ /////
 for($k=1;$k<count($skidka_a[0]);$k++)
 for($i=0;$i<count($korzina[0]);$i++) 
 if (($korzina[1][$i]!=0)&&($skidka[0][$i]==0))
 if ($skidka_a[$j][$k]==$korzina[0][$i])
{$skidka[0][$i]=1;$skidka[1][$i]=$skidka_a[$j][0];}
 }}}
//вывести корзину на экран
for($i=0;$i<count($korzina[0]);$i++)
 if($korzina[1][$i]!=0)echo 'tovar: '.$korzina[0][$i].'_skidka='.$skidka[1][$i].'<BR>';?>
