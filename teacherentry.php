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
a
{
color:black;
text-decoration:none;
}
.filelabel {
  width: 365px;
  height: 50px;
  border: 0;
  border-right: solid 3px #969696;
  border-left: solid 3px #969696;
  background-color: #c8c8c8;
  font-size: 40px;
  outline: none;
  float:right;
}
#filesend {
   display: none;  /* 本来のファイル選択フォームは非表示に */
}

.filelabel img{ /* 登録ボタンの画像 */
  width: 50px;
  height: 40px;
  position: relative;
  top: 5px;
  outline: none;
  cursor: default;
}

.filelabel:hover{ /* 登録ボタン：ホバー時 */
  border-top: solid 2px white;
}
</style>
<meta charset="utf-8">
<title>教員新規登録</title>
<?php
require('C:/xampp/htdocs/Layout/Layout.php');
?>
<div class="breadcrumbs">
              <li><a href="/">ホーム</li></a>
              <li><a href="/attendance/">出席管理</li></a>
              <li><a href="/attendance/student/">生徒管理</li></a>
              <li><a href="/attendance/student/teacher">教員管理</li></a>
              <li>教員新規登録</li>
        </div>
<form name="csvopen" action="teacherentry.php" method="post">
<div class="titlebar">
    教員新規登録
    <div class="buttonWrapper">
        <a href="teacher.php" target="_blank"><button class="registration_b" type="button" name="registration">
            <input class="registration_b_img" type="image" src="../Layout/image/registration.png" alt="登録" />
                登録
        </button></a>
    <label>
	<span class="filelabel" title="登録データ参照">
		<img src="../Layout/image/csvfile.png">
		登録データ参照
		</span>
        <input class="csv_b_img" type="file" name="csvfile" id="filesend">
       </label>
       </button>
    </div>

</div>
</form>
</head>
<body>
<form action="teacherentry.php" method="post">
<table border="0">
</table>
</form>
</table>
<br>
<input class="submit_b" type="submit" value="登録">
<br>
  <script>
    
    //Form要素を取得する
    var form = document.forms.csvform;
    
    //ファイルが読み込まれた時の処理
    form.csvfile.addEventListener('load', function(e) {
      
      //ここにファイル取得処理を書く
      console.log( reader.result.split('\n') );
    })
  </script>
</body>
</html>