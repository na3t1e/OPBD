<!DOCTYPE html>
<head>
    <title>UPDATE</title>
</head>
<body>
<h3>Введите ID владельца</h3>
<form action="opbd_update.php" method="POST">
    <p>Id владельца:
        <input type="number" name='owner'>
        <input type="submit" name="submit" value="Ввести"></p>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
#$owner_id = $_POST['owner'];
#echo $_POST['owner'];
#echo $owner_id;
$dbuser = 'postgres';
$dbpass = 'DgJ160';
$host = 'localhost';
$dbname = 'Electricity_meter';
$db = pg_connect("host=$host dbname=$dbname user=$dbuser password=$dbpass");
if (isset($_POST['passport_updated'])) {
    $result = pg_query($db, "UPDATE \"Payment\".owner SET passport = '{$_POST['passport_updated']}', lastname = '{$_POST['surname_updated']}', 
        firstname = '{$_POST['name_updated']}', patronymic = '{$_POST['patronumic_updated']}', privillege = '{$_POST['privilege_updated']}' WHERE owner_id = '{$_POST['owner_id_updated']}'");

}
if (isset($_POST['owner'])) {
    $result = pg_query($db, "SELECT *	FROM \"Payment\".owner WHERE owner_id = '{$_POST['owner']}'");
    $row = pg_fetch_assoc($result);
    if (pg_num_rows($result)==0){
        echo"Такого пользователя нет!";
    }else {
        echo "
  <form action='opbd_update.php' method='POST' >
  <h3> Измените данные </h3>
  <ul>
    Id владельца : 
    <input type='text' name='owner_id_updated' value='$_POST[owner]'></p>
 	<p>Паспорт №: 
	<input type='text' name='passport_updated' value='$row[passport]'></p>
	<p>Фамилия: 
	<input name='surname_updated' type='text' value='$row[lastname]'></p>
	<p>Имя: 
	<input name='name_updated' type='text' value='$row[firstname]'></p>
	<p>Отчество: 
	<input name='patronumic_updated' type='text' value='$row[patronymic]'></p>
	<p>Льгота: ";
        if ($row['privillege'] == 't') {
            echo "
                <SELECT name='privilege_updated' autofocus>
            	<option selected = '$row[privillege]'>да</option>
	            <option value='f'>нет</option>
	            </SELECT>";
        } else {
            echo "
            <SELECT name='privilege_updated' autofocus>
            <option selected = '$row[privillege]'>нет</option>
	        <option value='t'>да</option>
	        </SELECT>";
        }
        echo "
	<p><input type='submit' name='new' value='Обновить' /></p>
</ul>
</form>";
    }
}
?>
<p><a href="opbd.php">Вернуться к списку выбора</a></p>
</body>
</html>