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
              <?php
                include '../connect/session.php';

                unset($_SESSION['memberID']);
                unset($_SESSION['youNickName']);

                echo "<div class='out'>로그아웃 되었습니다. <br><a href='../pages/main.html'>메인 페이지로 이동하기</a></div>";
              ?>
            </section>
        </main>
        <!-- //main -->
    </div>
    <!-- //wrap -->
</body>
</html>