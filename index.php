<?php

require_once 'core.php';

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
