<?php
	session_start();
	$db = new PDO("mysql:dbname=testtable;host=localhost;charset=utf8", "root", "");
	$selectsqls =$db->prepare("SELECT * FROM m_employee;");
	$selectsqls->execute();
	$selectsqls = $selectsqls->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<style>
.submit_b {
	float: right;
}
</style>
<meta charset="utf-8">
<title>教員新規登録</title>
</head>
<body>
<form action="teacherinput.php" method="post">
<table border="0">
<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; border-radius: 10px;">
入力フォーム
<br>
　　　　　　姓：<input type="text" name="surname" size="40" maxlength="20"><br>
<br>
　　　　　　名：<input type="text" name="name" size="40" maxlength="20"><br>
<br>
メールアドレス：<input type="text" name="mail" size="40" maxlength="20"><br>
<br>
　　パスワード：<input type="text" name="pass" size="40" maxlength="20"><br>
<br>
　　　　　状態：<select name="status">
			<option value="0" selected>常勤</option>
			<option value="1">非常勤</option>
			<option value="2">退校</option>
			<option value="3">休暇</option>
			</select><br>
<br>
</div>
</table>
</form>
</table>
<br>
<input class="submit_b" type="submit" value="登録">
<br>
</body>
</html>