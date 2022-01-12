<?php
  $host = "localhost";
  $user = "dkdl1566";
  $pw = "jsh970116!";
  $dbName = "dkdl1566";
  $dbConnect = new mysqli($host,$user,$pw,$dbName);
  $dbConnect -> set_charset("utf8");

  if(mysqli_connect_errno()){
    echo "database connect false";
  }else{
    // echo "database connect good";
  }

  // 1. 데이터베이스 접속
  // 2. 회원가입
  // 2-1. 회원가입 페이지
  // 2-2. 섹션 파일 만들기
  // 3. 회원 테이블 만들기
?>