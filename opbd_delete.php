<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите ID удаляемого владельца</h3>
<form action="opbd_delete.php" method="POST">
    <p>Id владельца:
        <input type="number" name='owner'>
        <input type="submit" name="submit" value="Удалить"></p>
</form>
<?php
$dbuser = 'postgres';
$dbpass = 'DgJ160';
$host = 'localhost';
$dbname = 'Electricity_meter';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['owner'])) {
    $result = pg_query($db, "SELECT *	FROM \"Payment\".owner WHERE owner_id = '{$_POST['owner']}'");
    if (pg_num_rows($result) == 0) {
        echo "Такого пользователя нет!";
    } else {
        $result = pg_query($db, "DELETE FROM \"Payment\".owner WHERE owner_id = '{$_POST['owner']}'");
        echo "Удаление выполнено!";
    }
}
?>
<a href="opbd.php">Вернуться к списку выбора</a>
</body>
</html>