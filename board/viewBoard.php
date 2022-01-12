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
                      <h2>게시판입니다.</h2>
                        <div class="listTable">
                            <table class="table">
                                <colgroup>
                                    <col style="width: 20%">
                                    <col style="width: 80%">
                                </colgroup>
                                <tbody>
<?php
  if( isset($_GET['boardID']) && (int) $_GET['boardID'] > 0){
    $boardID = $_GET['boardID'];

    $sql = "SELECT b.boardTitle, b.boardContent, m.youNickName, b.regTime ";
    $sql .= "FROM myBoard b JOIN myMember m ON (b.memberID = m.memberID) ";
    $sql .= "WHERE b.boardID = {$boardID}";

    $result = $dbConnect -> query($sql);

    if($result){
      $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
      echo "<tr><th>제목</th><td>".$boardInfo['boardTitle']."</td></tr>";
      echo "<tr><th>글쓴이</th><td>".$boardInfo['youNickName']."</td></tr>";
      echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $boardInfo['regTime'])."</td></tr>";
      echo "<tr><th>내용</th><td>".$boardInfo['boardContent']."</td></tr>";
    }
  }
?>
                                </tbody>
                            </table>
                        </div>
                        <div class="listSearch">
                          <a href="board.php" class="form-btn black mt20">목록보기</a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- //main -->
    </div>
    <!-- //wrap -->
</body>
</html>