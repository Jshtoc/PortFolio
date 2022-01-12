<footer class="footer">
      <h2>
        <p>
          <span>PORTFOLIO</span>
        </p>
      </h2>
      <div class="bottom_text_wrap">
        <div class="page_num">
          <div class="page_icon_sec">
            <div class="page_icon"></div>
            <div class="page_icon_num">
              <p>
                <span>01</span>
              </p>
            </div>
          </div>
          <div class="bottom_text_info">
            <p>Welcome my portfolio site If you scroll down, you can see a lot of content</p>
          </div>
          <div class="right_page_text">
            <div class="right_page">
              <div class="top_right">
                <p>
                  <span>01</span>
                </p>
              </div>
              <div class="bottom_right">
                <p>
                  <span>05</span>
                </p>
              </div>
            </div>
          </div>
          <div class="nav">
            <ul>
              <?php if(isset($_SESSION['memberID'])){ ?>
                  <li class="line"><?=$_SESSION['youNickName']?> welcome.</li>
                  <li><a href="../sign/logOut.php">LOGOUT</a></li>
              <?php }else{ ?>
                  <li><a href="../sign/signUp.php">SIGN UP</a></li>
                  <li><a href="../sign/logIn.php">LOGIN</a></li>
              <?php } ?>
              <li><a href="../board/writeBoard.php">WRITE</a></li>
              <li><a href="../board/board.php">BOARD</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="page_nav">
        <div class="page_nav_btns">
          <div class="next_btns">
            <p>
              <span>PROJECT</span>
            </p>
            <p><span>SCRIPT</span></p>
            <p><span>CSS</span></p>
            <p><span>CONTACT</span></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- //footer -->