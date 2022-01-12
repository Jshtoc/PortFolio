<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Site | 로그인</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style4.css" />

    <!-- webfonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <style>
      body{
        height: 100vh;
      }
    </style>
</head>
<body>
    <div id="wrap">
        
        <!-- header -->
        <?php
            include '../component/header.php';
        ?>
        <!-- //header -->

        <main id="main">
            <section id="login-cont">
                <div class="login">
                  <?php
                    include '../connect/session.php';
                    include '../connect/connect.php';

                    $userEmail = $_POST['userEmail'];
                    $userPW = $_POST['userPW'];

                    function goSignUpPage($alert){
                      echo "<div class='signInfo'><p>{$alert}</p></div>";
                      return;
                    }
                  
                    //이메일 검사
                    if( !filter_var($userEmail, FILTER_VALIDATE_EMAIL) ){
                      goSignUpPage("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!");
                      exit;
                    }

                    //비밀번호 검사
                    if($userPW == null || $userPW == ''){
                      goSignUpPage('비밀번호를 입력해 주세요.');
                      exit;
                    }

                    //데이터 입력 --> 데이터 검사 --> 데이터 보내기
                    // $sql = "SELECT * FROM myMember " --> 전체를 조회하고 싶을때
                    $sql = "SELECT youEmail,youPw,youNickName,memberID FROM myMember ";
                    $sql .= "WHERE youEmail = '{$userEmail}' AND youPw = '{$userPW}'";
                    $result = $dbConnect -> query($sql);

                    if($result){
                      if($result -> num_rows == 0){
                        goSignUpPage('로그인 정보가 없습니다. 회원가입해주세요!!!');
                      }else{
                        $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                        $_SESSION['memberID'] = $memberInfo['memberID'];
                        $_SESSION['youNickName'] = $memberInfo['youNickName'];
                        Header("Location:http://dkdl1566.dothome.co.kr/PortFolio/pages/main.html");
                      }
                    }else{
                      goSignUpPage('에러발생1: 관리자에게 문의하세요!!!');
                    }

                  ?>
                </div>  
            </section>
        </main>
        <!-- //main -->
    </div>
    <!-- //wrap -->
</body>
</html>