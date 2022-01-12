<?php
    include '../connect/connect.php';
    include '../connect/session.php';
    include '../connect/checkSession.php';
?>


<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Site | 게시판</title>

    <!-- CSS -->
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
                        <h2>검색한 결과입니다.</h2>
                        <div class="listSearch">
                          <a href="board.php" class="form-btn black">목록보기</a>
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
    $page = 1;
  }

  $numView = 20;
  $numStart = ($numView * $page) - $numview;

  $searchKeyWord = $dbConnect -> real_escape_string($_POST['searchKeyword']);
  $searchOption = $dbConnect -> real_escape_string($_POST['searchOption']);
  

  if($searchKeyWord == '' || $searchKeyWord == null){
    echo "검색어가 없습니다.";
    exit;
  }

  switch ($searchOption){
    case 'title':
    case 'content':
    case 'tandc':
    case 'torc':
      break;
    default:
      echo "검색 옵션을 선택해주세요!";
      exit;
      break;
  }

  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyWord}%'";
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE b.boardContent LIKE '%{$searchKeyWord}%'";
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyWord}%' AND b.boardContent LIKE '%{$searchKeyWord}%'";
  // "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) WHERE b.boardTitle LIKE '%{$searchKeyWord}%' OR b.boardContent LIKE '%{$searchKeyWord}%'";

  $sql = "SELECT b.boardID, b.boardTitle, b.boardContent, m.youNickName, b.regTime FROM myBoard b JOIN myMember m ON (m.memberID = b.memberID) ";
  
  switch ($searchOption){
    case 'title' :
      $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyWord}%'";
      break;
    case 'content':
      $sql .= "WHERE b.boardContent LIKE '%{$searchKeyWord}%'";
      break;
    case 'tandc':
      $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyWord}%' AND b.boardContent LIKE '%{$searchKeyWord}%'";
      break;
    case 'torc':
      $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyWord}%' OR b.boardContent LIKE '%{$searchKeyWord}%'";
      break;
  }

  $result = $dbConnect -> query($sql);

  if($result){
    $boardCount = $result -> num_rows;
    if($boardCount > 0 ){
      for($i = 1; $i <= $boardCount; $i++){
        $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<tr>";
        echo "<td>".$boardInfo['boardID']."</td>";
        echo "<td><a href='viewBoard.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
        // 클릭시 뷰페이지 넘어가는거 위에꺼연결하기
        echo "<td>".$boardInfo['youNickName']."</td>";
        echo "<td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td>";
        echo "</tr>";
      }
    }else{
      echo "<tr><td colspan='4'>{$searchOption}가 없습니다.</td></tr>";
    }
  }else{
    echo "에러 발생 : 관리자에게 문의하세요!";
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
                          include 'searchPagination.php';
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