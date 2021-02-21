<?php
require_once 'classes\Test.php';

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_database = 'localdb';
$link = "mysql:host=$db_host;dbname=$db_database";

try{
    $pdo = new PDO($link, $db_user, $db_pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
}catch (\mysql_xdevapi\Exception $e){
    echo "NoDB";
}
$set_names = $pdo->query('SET NAMES UTF8');
$set_names = $pdo->prepare('SELECT id , name_of_category FROM ecommers');
$set_names->execute();
//$set_names->bindColumn('id' , $id);
//$set_names->bindColumn('name_of_category' , $name);

// while ($row = $set_names->fetch(PDO::FETCH_BOUND)){
// 	echo $id." & ".$name."<br>";
// }
//


    class WorkWithDb
    {
        public $id;
        public $name_of_category;

        public function GetAll()
        {
            return "This item have id:".$this->id." and name: ".$this->name_of_category;
        }
    }

    $result = $set_names->fetchAll(PDO::FETCH_CLASS, "WorkWithDb");
    echo "<pre>";

foreach ($result as $item) {
        echo $item->GetAll();
    }

    function ArrayS($asss , $b){
        echo $asss * $b;

    }

ArrayS(3, 5);



$test = new Test\Test();
?>