<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SELECT</title>
</head>
<body> 
    <h2>Владельцы</h2>
<?php
$dbuser = 'postgres';
$dbpass = 'DgJ160';
$host = 'localhost';
$dbname='Electricity_meter';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
$result = pg_query($db, "SELECT * FROM \"Payment\".owner");
$arr = pg_fetch_all($result);
    if ($result){
	foreach ($arr as &$row) {
  echo <<<OUT
<ul>
	<h3>$row[owner_id] владелец</h3>
 	<li>Паспорт №: $row[passport]</li>
	<li>Фамилия: $row[lastname]</li>
	<li>Имя: $row[firstname]</li>
	<li>Отчество: $row[patronymic]</li>
	<li>Льгота: $row[privillege]</li>
</ul>
OUT;
}
}

?>
<a href="opbd.php">Вернуться к списку выбора</a>
</body>
</html> 