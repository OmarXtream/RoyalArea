<?php 
try 
{
  $db = new PDO('mysql:host=localhost;dbname=RAA;charset=utf8', 'root', '248asdasd248');
} 
catch(PDOException $e)
{
  die('خطأ:'. $e->getMessage());
}
try 
{
  $rnk = new PDO('mysql:host=localhost;dbname=rnks;charset=utf8', 'root', '248asdasd248');
} 
catch(PDOException $e)
{
  die('خطأ:'. $e->getMessage());
}

?>
