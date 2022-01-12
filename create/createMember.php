
<?php
  include "../connect/connect.php";

  // 테이블 만드는 방법
  $sql = "CREATE TABLE myMember (";
	$sql .= "memberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
	$sql .= "youEmail varchar(40) UNIQUE NOT NULL,";
	$sql .= "youName varchar(10) NOT NULL,";
	$sql .= "youNickName varchar(10) NOT NULL,";
	$sql .= "youPw varchar(20) DEFAULT NULL,";
	$sql .= "birthday varchar(10) NOT NULL,";
	$sql .= "regTime int(11) NOT NULL,";
	$sql .= "PRIMARY KEY (memberID)";
	$sql .= ") CHARSET=utf8";
  
  $result = $dbConnect -> query($sql);

  if($result){
    echo "create table complete";
  }else{
    echo "create none";
  }
?>