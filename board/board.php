<?php
    include '../connect/connect.php';
    include '../connect/session.php';
    include '../connect/checkSession.php';
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Site | 게시판</title>

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/reset.css">-->

    <!-- css -->
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style4.css"> 
    <link rel="stylesheet" href="../css/board.css"> 

    <!-- webfonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
</head>
<body>
    <div id="wrap" class="light">
        
        <!-- header -->
        <?php
            include '../component/header.php';
        ?>
        <!-- //header -->

        <main id="main">
            <section id="board-cont">
                <div class="container">
                    <div class="listBoard">
                        <h2>무엇이든지 물어보세요!!!!</h2>
                        <div class="listSearch">
                          <form action="searchBoard.php" method="post" name="tableSearch">
                            <fieldset>
                              <legend class="sr-only">게시판 검색 영역입니다.</legend>
                              <input type="search" name="searchKeyword" class="form-search" placeholder="검색어를 입력하세요!" aria-label="search">
                              <select name="searchOption" id="searchOption" class="form-select">
                                <option value="title">제목</option>
                                <option value="content">내용</option>
                                <option value="tandc">제목과 내용</option>
                                <option value="torc">제목 또는 내용</option>
                              </select>
                              <button type="submit" class="form-btn">검색</button>
                              <a href="writeBoard.php" class="form-btn black" role="button">글 쓰기</a>
                            </fieldset>
                          </form>
                        </div>
                        <div class="listTable">
                          <table class="table">
                            <colgroup>
                              <col style="width:10%;">
                              <col style="width:65%;">
                              <col style="width:10%;">
                              <col style="width:15%;">
                            </colgroup>
                            <thead>
                              <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
  if( isset($_GET['page']) ){
    $page = (int) $_GET['page'];
  }else{
    $page = 0;
  }

  $numView = 20;
  $numStart = ($numView * $page) - $numview;

  // 01 ~ 20 : DESC LIMIT 00,10 ---> $page = 1 {$numView * $page} - $numview
  // 21 ~ 40 : DESC LIMIT 10,20 ---> $page = 2 {$numView * $page} - $numview
  // 41 ~ 60 : DESC LIMIT 20,30 ---> $page = 3 {$numView * $page} - $numview
  // 61 ~ 80 : DESC LIMIT 30,40 ---> $page = 4 {$numView * $page} - $numview

  // SELECT 필드명 (필드명 여러개일땐 쉼표 필수!) FROM 테이블명 앨리어스 JOIN 연결할 테이블명 앨리어스 ON(조건문)
  $sql = "SELECT b.boardID, b.boardTitle, m.youNickName, b.regTime FROM ";
  $sql .= "myBoard b JOIN myMember m ON (m.memberID = b.memberID) ORDER BY boardID ";
  $sql .= "DESC LIMIT {$numStart}, {$numView}";

  $result = $dbConnect -> query($sql);

  if($result){
    $boardCount = $result -> num_rows;
    echo $boardCount;

    if($boardCount > 0){
      for( $i = 1; $i <= $boardCount; $i++){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        // echo"<pre>";
        // var_dump($boardInfo);
        // echo"</pre>";
        // array(4) {
        //   ["boardID"]=>
        //   string(1) "1"
        //   ["boardTitle"]=>
        //   string(3) "sdd"
        //   ["youNickName"]=>
        //   string(6) "승호"
        //   ["regTime"]=>
        //   string(10) "1621141232"
        // }
        echo "<tr>";
        echo "<td>".$boardInfo['boardID']."</td>";
        echo "<td><a href='viewBoard.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
        echo "<td>".$boardInfo['youNickName']."</td>";
        echo "<td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td>";
        echo "</tr>";
      }
    }else{
      echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
      exit;
    }
  }else{
    echo "에러발생 : 관리자에게 문의하세요";
    exit;
  }


?>
                              <!-- <tr>
                                <td>1</td>
                                <td>2</td>
                                <td><a href="#">3</a></td>
                                <td>4</td>
                              </tr> -->
                            </tbody>
                          </table>
                        </div>
                        <?php
                          include 'pagination.php';
                        ?>
                    </div>
                </div>
            </section>
        </main>
        <!-- //main -->
        
    </div>
    <!-- //wrap -->
</body>
</html>