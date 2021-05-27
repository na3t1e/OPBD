<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSERT</title>
</head>
<body>
<h2>Введите данные:</h2>
<form method="POST" action="opbd_insert.php">
    Введите id владельца:
    <input name="owner_id" type="number">
    <p>Введите пасспорт:
        <input name="passport" type="number"></p>
    <p>Введите фамилию:
        <input name="surname" type="text"></p>
    <p>Введите имя:
        <input name="name" type="text"></p>
    <p>Введите отчество:
        <input name="patronumic" type="text"></p>
    Есть ли льгота?
    <SELECT name="privilege">
        <option value='t'>да</option>
        <option value='f'>нет</option>
    </SELECT>
    <p><INPUT type='submit' value="Добавить"></p>
    <a href="opbd.php">Вернуться к списку выбора</a>
</FORM>
<?php
if (isset($_POST['passport'])) {
    $dbuser = 'postgres';
    $dbpass = 'DgJ160';
    $host = 'localhost';
    $dbname = 'Electricity_meter';
    $db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
    $result = pg_query($db, "INSERT INTO \"Payment\".owner (owner_id, passport, firstname, lastname, patronymic,
	privillege) VALUES ('{$_POST['owner_id']}', '{$_POST['passport']}', '{$_POST['name']}', '{$_POST['surname']}','{$_POST['patronumic']}','{$_POST['privilege']}')");
}
?>
</body>
</html>