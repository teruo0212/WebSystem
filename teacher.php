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
.send_b {
    float: right;
}
</style>
<style>
.reset_b {
	float: right;
}
</style>
<style>
.submit_b {
	float: right;
}
</style>
<meta charset="utf-8">
<title>教員管理</title>
<?php
require('C:/xampp/htdocs/Layout/Layout.php');
?>
<div class="breadcrumbs">
              <li><a href="/">ホーム</li></a>
              <li><a href="/attendance/">出席管理</li></a>
              <li><a href="/attendance/student/">生徒管理</li></a>
              <li>教員管理</li>
        </div>

<div class="titlebar">
    教員管理
    <div class="buttonWrapper">
        <button class="registration_b" type="button" name="registration">
            <input class="registration_b_img" type="image" src="../Layout/image/registration.png" alt="登録" />
                登録
        </button>
    </div>
</div>
</head>
<body>
<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
<form action="teacher.php" method="post">
<table border="0">
<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; border-radius: 10px;">
検索項目<br>
<br>
教員番号　：<input type="text" name="id" size="40" maxlength="20"><br>
<br>
教員名　　：<input type="text" name="name" size="40" maxlength="20"><br>
<br>
登録年　　：<input type="text" name="year" size="40" maxlength="20"><br>
<br>
<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; border-radius: 10px; width: 354px">
勤務状態：
<input type="checkbox" name="status[]" value="Full"/>常勤
<input type="checkbox" name="status[]" value="Part"/>非常勤
<input type="checkbox" name="status[]" value="Leaving"/>退校
<input type="checkbox" name="status[]" value="Holiday"/>休暇
</div>
<input class="send_b" type="submit" name="send" value="OK" />
<br>
</div>
</table>
</form>
<?php 
		if(isset($_POST['send']))
		{

			if(!empty($_POST['id'])){
				$tables=$db->prepare("SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_id=\"".$_POST['id']."\"");
				$tables->execute();
				$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
			}else if(!empty($_POST['name'])){
		 		$tables=$db->prepare("SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_name like \"%".$_POST['name']."%\"");
		 		$tables->execute();
				$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
		}
		
		if(isset($_POST['status'])){
		$status=implode(",",$_POST['status']);
		

if($status=="Full"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="常勤"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Part"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="非常勤"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Leaving"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="退校"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Holiday"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="休暇"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Full,Part"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="常勤" OR m_employee_gotoworkstatus="非常勤"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Full,Leaving"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="常勤" OR m_employee_gotoworkstatus="退校"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Full,Holiday"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="常勤" OR m_employee_gotoworkstatus="休暇"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Part,Leaving"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="非常勤" OR m_employee_gotoworkstatus="退校"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Part,Holiday"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="非常勤" OR m_employee_gotoworkstatus="休暇"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
if($status=="Leaving,Holiday"){
			$tables=$db->prepare('SELECT m_employee_id,m_employee_name,m_employee_mailaddress,m_employee_gotoworkstatus FROM m_employee WHERE m_employee_gotoworkstatus="退校" OR m_employee_gotoworkstatus="休暇"');
						$tables->execute();
			$tables=$tables->fetchAll(PDO::FETCH_ASSOC);
}
		}

?>
<form action="teachertable.php" method="POST">
<table border="1">
 	<tr>
    	<th>教員番号</th>
        <th>教員名</th>
        <th>メールアドレス</th>
        <th>状態</th>
        <th>分類名</th>
    </tr>
    <?php
    	if(isset($tables)!=null){
    	foreach($tables as $table){
    ?>
    <tr>
    	<td><?php echo $table['m_employee_id']; ?></td>
    	<td><input type="text" value="<?php echo $table['m_employee_name']; ?>"></td>
    	<td><input type="text" value="<?php echo $table['m_employee_mailaddress']; ?>"></td>
    	<td><select name="状態">
      <option value="1" selected><?php echo $table['m_employee_gotoworkstatus']; ?></option>
      <option value="2">常勤</option>
	  <option value="3">非常勤</option>
	  <option value="4">退校</option>
	  <option value="5">休暇</option>
      </select>
      </td>
    	<td></td>
    </tr>
    <?php
    }
    }
    }
    ?>
</table>

<br>
<input class="reset_b"  type="reset" value="変更を破棄">
<input class="submit_b" type="submit" value="保存">
<br>
</div>
</body>
</html>