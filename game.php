<?php
include_once 'src/DB_connect.php';
session_start();
include_once "DB_connect.php";
if (!isset($_GET["gid"])) {
  header("location: store.php");
  exit;
}
$game = $conn->prepare("SELECT * FROM games where game_id= ?;");
$game->bind_param("s", $_GET["gid"]);
$game->execute();
$game->store_result();
$game->bind_result($gid, $name, $genre, $raw_release_date, $image, $company, $description, $price);
if (!$game->fetch()) {
  header("location: store.php?err=nogame");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="shortcut icon" href="styles/img/manette.png">
  <title><?php echo $name; ?></title>
</head>

<body onresize="close_sidebar()">
  <nav id="navbar" onresize="close_sidebar()">
    <a href="#home"><img src="styles/img/logo.png" class="logo" /></a>
    <ul class="navlist" id="navlist">
      <li><a href="index.php">Home</a></li>
      <li><a href="store.php">Store</a></li>
      <?php if (isset($_SESSION["in"])) echo '<li><a href="favourite.php">Favourite</a></li>'?>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="spacer"></div>
    <div class="account-info" id="user-info">
      <button href="#" class="sign btn-r">Login</button>
      <button href="#" class="login btn-r">Sign up</button>
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
  <div class="game">
    <div class="image">
      <img src="game_images/The last of us 2.jpg">
    </div>
    <div class="info">
      <h6 class="company">Sony Interactive Entertainment</h6>
      <h4 class="game-title">The Last Of Us 2</h4>
      <h6 class="date">19 June, 2020</h6>
      <div class="genres">
        <span>Survival</span>
        <span>Zombies</span>
        <span>Action</span>
      </div>
      <p class="description">
        Five years after their dangerous journey across the post-pandemic United States, Ellie and Joel have settled down in Jackson, Wyoming. Living amongst a thriving community of survivors has allowed them peace and stability, despite the constant threat of the infected and other, more desperate survivors. When a violent event disrupts that peace, Ellie embarks on a relentless journey to carry out justice and find closure. As she hunts those responsible one by one, she is confronted with the devastating physical and emotional repercussions of her actions.
      </p>

      <div class="p-b">
        <h6 class="price">150 DT</h6>
        <a href="#"><button class="buy">Buy</button></a>
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
      <!--* Modals  -->
      <div class="panel" id="registration_form">
        <div class="panel__form-wrapper">
          <button type="button" class="panel__prev-btn" aria-label="Go back to home page" title="Go back to home page">
            <svg fill="rgba(255,255,255,0.5)" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0h24v24H0z" fill="none" />
              <path d="M21 11H6.83l3.58-3.59L9 6l-6 6 6 6 1.41-1.41L6.83 13H21z" />
            </svg>
          </button>

          <ul class="panel__headers">
            <li class="panel__header"><a href="#register-form" class="panel__link" role="button">Sign Up</a></li>
            <li class="panel__header active"><a href="#login-form" class="panel__link" role="button">Sign In</a></li>
          </ul>

          <div class="panel__forms">

            <!-- Login Form -->
            <form class="form panel__login-form" id="login-form" method="post" action="src/login.php">
              <div class="form__row">
                <input type="text" id="email" class="form__input" name="login-mail" data-validation="email" data-error="Invalid email address." required>
                <span class="form__bar"></span>
                <label for="email" class="form__label">E-mail</label>
                <span class="form__error"></span>
              </div>
              <div class="form__row">
                <input type="password" id="password" class="form__input" name="login-pass" data-validation="length" data-validation-length="8-25" data-error="Password must contain 8-25 characters." required>
                <span class="form__bar"></span>
                <label for="password" class="form__label">Password</label>
                <span class="form__error"></span>
              </div>
              <div class="form__row">
                <input type="submit" class="form__submit" value="Get Started!" name="submit">
                <a href="#password-form" class="form__retrieve-pass" role="button">Forgot Password?</a>
              </div>
            </form>

            <!-- Register Form -->
            <form class="form panel__register-form" id="register-form" method="post" action="src/add_user.php">
              <div class="form__row">
                <input type="text" id="register-username" class="form__input" name="register-username" data-validation="length" data-validation-length="5-15" data-error="username must contain 5-15 characters" required>
                <span class="form__bar"></span>
                <label for="register-username" class="form__label">username</label>
                <span class="form__error"></span>
              </div>
              <div class="form__row">
                <input type="text" id="register-email" class="form__input" name="register-mail" data-validation="email" data-error="Invalid email address." required>
                <span class="form__bar"></span>
                <label for="register-email" class="form__label">E-mail</label>
                <span class="form__error"></span>
              </div>
              <div class="form__row">
                <input type="password" id="register-password" class="form__input" name="register-password" data-validation="length" data-validation-length="8-25" data-error="Password must contain 8-25 characters" required>
                <span class="form__bar"></span>
                <label for="register-password" class="form__label">Password</label>
                <span class="form__error"></span>
              </div>
              <div class="form__row">
                <input type="submit" class="form__submit" value="Register!" name="submit">
              </div>
            </form>

            <!-- Forgot Password Form -->
            <form class="form panel__password-form" id="password-form" method="post" action="/">
              <div class="form__row">
                <p class="form__info">Can't log in? Please enter your email. We will send you an email with instructions on how to reset your password.</p>
              </div>
              <div class="form__row">
                <input type="text" id="retrieve-pass-email" class="form__input" name="retrieve-mail" data-validation="email" data-error="Invalid email address." required>
                <span class="form__bar"></span>
                <label for="retrieve-pass-email" class="form__label">E-mail</label>
                <span class="form__error"></span>
              </div>
              <div class="form__row">
                <input type="submit" class="form__submit" value="Send new password!">
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <!-- fontawsome CDN -->
    <script src="https://kit.fontawesome.com/4f4b2ce8e5.js" crossorigin="anonymous"></script>
    <!-- personal CDN -->
    <!--Scroll to top button-->
    <div class="scrolltop">
      <div class="scroll icon"><i class="fa fa-4x fa-angle-up"></i></div>
    </div>
    <script src="main.js"></script>
</body>

</html>