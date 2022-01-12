<div class="listPage">
  <ul class="pagination">
<?php
  // 게시글 1003 / 20 ---> page 101
  $sql = "SELECT count($searchKeyWord) FROM myBoard";
  $result = $dbConnect -> query($sql);

  $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
  $boardTotalCount = $boardTotalCount['count($searchKeyWord)'];

  // echo $boardTotalCount;

  // 총 페이지 수
  $boardTotalPage = ceil($boardTotalCount / $numView);

  // echo $boardTotalPage;

  // 현재 페이지를 기준으로 보여주고 싶은 갯수
  $pageView = 3;
  $startPage = $page - $pageView;
  $endPage = $page + $pageView;
  $prevPage = $page - 1;
  $nextPage = $page + 1;

  // 처음 페이지 초기화
  if($startPage < 1) $startPage = 0;
  
  // 마지막 페이지 초기화
  if($endPage > $boardTotalPage) $endPage = $boardTotalPage;

  // 이전 페이지
  if($page != 0){
    echo "<li><a href='searchBoard.php?page=0'>처음으로</a></li>";
    echo "<li><a href='searchBoard.php?page={$prevPage}'>이전</a></li>";
  }


  // 페이지
  for($i= $startPage; $i <= $endPage; $i++){
    $active = '';
    if($i == $page) $active = 'active';

    echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
  }

  // 다음 페이지
  if($page != $endPage){
    echo "<li><a href='searchBoard.php?page={$nextPage}'>다음</a></li>";
    echo "<li><a href='searchBoard.php?page={$boardTotalPage}'>마지막으로</a></li>";
  }

?>
  </ul>
</div>