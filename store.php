<?php
include_once 'src/DB_connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/style.css" />
  <!--bootstrap for scroll to top button-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="styles/img/manette.png">
  <title>Medoka Games</title>
</head>

<body onresize="close_sidebar()">
  <div class="the_horse_bug">
    <nav id="navbar" onresize="close_sidebar()">
      <a href="#home"><img src="styles/img/logo.png" class="logo" /></a>
      <ul class="navlist" id="navlist">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#store">Store</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <div class="spacer"></div>
      <div class="account-info" href="src/loggerout.php id="user-info">
        
        <?php
        if (isset($_SESSION["in"])) {
          echo '<a href="src/loggerout.php"><div>
              <p>'.$_SESSION["username"].'</p>
            </div>
            <img src="styles/img/user.png" alt="user image" height="60"></a>';
        } else {
          echo '<button href="#" class=" btn-r" id="login">Login</button><button href="#" class=" btn-r" id="sign">Sign up</button>';
        }
        ?>
      </div>
      <i class="fa fa-bars fa-2xl" id="menu-icon" onclick="open_sidebar()"></i>
      <div class="sidebar" id="sidebar">
        <div id="sidebar-user-info" class="account-info">
          <!-- *account info gets copied here automatically -->
        </div>
        <ul id="sidebar-list">
          <!-- *the nav list gets copied here automatically -->
        </ul>
      </div>
    </nav>
  <div class="store">
    <div class="trending">
      <div class="slides">
        <!--radio btns start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--radio btns end-->
        <!--slider imgs start-->
        <div class="slide first">
          <img src="styles/img/hogwarts.jpg">
        </div>
        <div class="slide">
          <img src="styles/img/tlou.jpg">
        </div>
        <div class="slide">
          <img src="styles/img/re4.jpg">
        </div>
        <div class="slide">
          <img src="styles/img/the witcher.png">
        </div>
        <!--slider imgs end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
  </div>
  <div class="games">
    <div class="title">
      <h1><span>Our</span> Games</h1>
    </div>
    <div class="games-cards">
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
      <div class="cardc">
        <div class="card2">
          <img src="styles/img/tlos2.jpg">
          <div class="t-p">
          <h6 class="game-title">the last of us 2</h6>
          <h6 class="price">40DT</h6>
        </div>
        <div class="g-b">
          <div class="genres">
            <span>Action</span>
            <span>Survival</span>
            <span>Zombies</span>
          </div>
          <a href="#"><button class="buy">Buy</button></a>
        </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <!--Contact section-->
    <div class="contact" id="contact">
      <h1>Contact <span>Us</span></h1>
      <div class="question">
        <input type="text" name="question" id="question" required placeholder="Ask us a question" />
        <button class="q" type="submit">Send</button>
      </div>
      <div class="socialinfo">
        <p><i class="fa-solid fa-phone"></i> +216 24 092 623</p>
        <p><i class="fa-solid fa-envelope"></i> Medoka.games@gmail.com</p>
      </div>
      <div class="social">
        <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#" class="insta"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" class="discord"><i class="fa-brands fa-discord"></i></a>
        <a href="#" class="tiktok"><i class="fa-brands fa-tiktok"></i></a>
      </div>
    </div>
  </footer>
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
  <!-- fontawsome CDN -->
  <script src="https://kit.fontawesome.com/4f4b2ce8e5.js" crossorigin="anonymous"></script>
  <!-- personal CDN -->
  <script>
    var counter = 1;
    setInterval(function () {
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if (counter > 4) {
        counter = 1;
      }
    }, 5000);
  </script>

</body>

</html>