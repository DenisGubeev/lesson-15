<?php

	$host = 'localhost';
	$dbname = 'CSV_DB';
	$dbuser = 'root';
	$dbpassword = '';


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
     $sql = "CREATE TABLE `students` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL,
	`estimation` float NOT NULL,
	`budget` tinyint(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
 
    $conn->exec($sql);
    echo "Table students created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;

$sql = "SHOW TABLES FROM $dbname";
$statement = $pdo->prepare($sql);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
}
echo '';
?>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>Управление таблицами и базами данных</title>
</head>
<body>
    <ou>
        <?php if (!empty($results)) { foreach ($results as $table) :?>
        <li><a href="table.php?table=<?=array_values($table)[0]?>"><?=array_values($table)[0]?></a></li>
        <?php endforeach; }?>
    </ou>
</body>
</html>
