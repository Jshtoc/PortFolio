<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Site | 회원가입</title>

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
            <section id="signup-cont">
                <div class="signup">
                    <h2><strong>JSH PORTFOLIO</strong> 사이트에 오신걸 환영합니다.</h2>
                    <form name="signUp" method="post" action="signUpSave.php">
                        <fieldset>
                            <legend class="sr-only">회원 가입 폼입니다.</legend>
                            <div>
                                <label for="userEmail" class="sr-only">이메일</label>
                                <input type="email" name="userEmail" id="userEmail" class="input-text" placeholder="이메일을 적어주세요." required autofocus>
                            </div>
                            <div>
                                <label for="userName" class="sr-only">이름</label>
                                <input type="text" name="userName" id="userName" class="input-text" placeholder="이름을 적어주세요" required>
                            </div>
                            <div>
                                <label for="userNickName" class="sr-only">닉네임</label>
                                <input type="text" name="userNickName" id="userNickName" class="input-text" placeholder="활동에 필요한 닉네임을 적어주세요" required>
                            </div>
                            <div>
                                <label for="userPW" class="sr-only">패스워드</label>
                                <input type="text" name="userPW" id="userPW" class="input-text" placeholder="패스워드를 적어주세요." required>
                            </div>
                            <div class="birth">
                                <div>
                                    <label for="birthYear">년도</label>
                                    <select name="birthYear" id="birthYear" required>
                                        <?php
                                            $thisYear = date('Y', time());
                                            
                                            for( $i = $thisYear; $i >= 1930; $i-- ){
                                                echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>                            
                                <div>
                                    <label for="birthMonth">월</label>
                                    <select name="birthMonth" id="birthMonth" required>
                                        <?php
                                            for( $i=1; $i<=12; $i++ ){
                                                echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="birthDay">일</label>
                                    <select name="birthDay" id="birthDay" required>
                                        <?php
                                            for( $i=1; $i<=31; $i++ ){
                                                echo "<option value='{$i}'>{$i}</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button class="signup-btn" type="submit" value="회원가입">회원가입</button>
                            <p class="signDesc">로그인을 원하면? <a href="logIn.php">로그인</a></p>
                        </fieldset>
                    </form>
                </div>  
            </section>
        </main>
        <!-- //main -->
    </div>
    <!-- //wrap -->
</body>
</html>