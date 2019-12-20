<?php
	session_start();
	$db = new PDO("mysql:dbname=testtable;host=localhost;charset=utf8", "root", "");
	$selectsqls =$db->prepare("SELECT * FROM m_employee;");
	$selectsqls->execute();
	$selectsqls = $selectsqls->fetchAll(PDO::FETCH_ASSOC);
	$empformcount = count($selectsqls);
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
<form name="csvopen" action="teacherentry.php" method="post" enctype="multipart/form-data">
<div class="titlebar">
    教員新規登録
    <div class="buttonWrapper">
       <script>
	var myWindow;
	function openWin() {
	myWindow = window.open('teacherinput.php', 'myWindow', 'top=100,left=300,width=500,height=500');
						 //読み込むHTMLのファイル名
	// myWindow.document.write("教室データ登録<hr>");
	}
</script>
        </a>
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
<input class="submit_b" type="submit" value="登録">
</form>
</head>
<body>
<form action="teacherentry.php" method="post">
<table border="0">
</table>
<br>

</form>
</table>
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
<?php
if (!empty($_FILES["csvfile"]["tmp_name"])) {
  $file_tmp_name = $_FILES["csvfile"]["tmp_name"];
  $file_name = $_FILES["csvfile"]["name"];

  //拡張子を判定
  if (pathinfo($file_name, PATHINFO_EXTENSION) != 'csv') {
    $err_msg = 'CSVファイルのみ対応しています。';
  } else {

    if (move_uploaded_file($file_tmp_name, "data/uploaded/" . $file_name)) {
      //後で削除できるように権限を644に
      chmod("data/uploaded/" . $file_name, 0644);
      $msg = $file_name . "をアップロードしました。";
      $file = 'data/uploaded/'.$file_name;
      $fp   = fopen($file, "r");

      //配列に変換する
      while (($data = fgetcsv($fp,',')) !== FALSE) {
        $asins[] = $data;
      }
      fclose($fp);

      //ファイルの削除
      unlink('data/uploaded/'.$file_name);
    } else {
      $err_msg = "ファイルをアップロードできません。";
    }
  }

?>
<h1>出力結果</h1>
<form action="teacherentry.php" method="post">
<table border='1'>
<tr>
<?php
for($t=0;$t<count($asins[0]); $t++){
?>
	<th><?php echo $asins[0][$t] ?></th>
<?php
}
?>	
</tr>
<?php
for($i=1;$i<count($asins); $i++){
?>
<tr>
<?php
	for($j=0;$j<count($asins[$i]); $j++){
?>
	<td><input type="text" name="tate<?php echo $i?>yoko<?php echo $j ?>" value="<?php echo $asins[$i][$j] ?>"></td>
<?php
}
?>
</tr>
<?php
}
?>
</table>
<br>
 <input type="submit" value="登録確定" />
 
</form>
<?php
}
?>
<?php
	if(isset($_POST['newrec']))
	{
	$empformcount++;
	if($empformcount<10){
	$INS=$db->prepare("INSERT INTO m_employee(m_employee_id,m_employee_name,m_employee_password,m_employee_mailaddress,m_employee_gotoworkstatus,m_employeeclassification_id)values(\"E0000".$empformcount."\",\"".$_POST['newclasstype']."\")");
	}else if($empformcount<100){
	
	}else if($empformcount<1000){
	
	}else if($empformcount<10000){
	}
	}
	?>
</body>
</html>