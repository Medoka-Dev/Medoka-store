<?php
include_once 'src/DB_connect.php';
include_once 'src/library.php';
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
$game->bind_result($gid, $name, $raw_genres, $raw_release_date, $image, $company, $description, $price);
if (!$game->fetch()) {
  header("location: store.php?err=nogame");
  exit;
}
$processed_release_date = date("d F,Y", strtotime($raw_release_date));
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
      <?php if (isset($_SESSION["in"])) echo '<li><a href="favourite.php">Favourite</a></li>' ?>
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
      <img <?php echo 'src="game_images/' . $image . '"'; ?> />
    </div>
    <div class="info">
      <h6 class="company"><?php echo $company; ?></h6>
      <div class="t-l">
        <h4 class="game-title"><?php echo $name; ?></h4>
        <a href="javascript:void(0)" class="liker">
          <?php echo '<input type="hidden" value="' . $gid . '"><button class="like ';
          if (isset($_SESSION["uid"]) and is_loved($conn, $gid, $_SESSION["uid"])) echo "fav-active";
          echo '">' ?>
          <svg class="empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30">
            <path fill="none" d="M0 0H24V24H0z"></path>
            <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z"></path>
          </svg>
          <svg class="filled" height="30" width="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H24V24H0z" fill="none"></path>
            <path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z"></path>
          </svg>
          </button>
        </a>
      </div>
      <h6 class="date"><?php echo $processed_release_date; ?></h6>
      <div class="genres">
        <?php
        $genres = json_decode($raw_genres);
        foreach ($genres as $genre) {
          echo '<span>' . $genre . '</span>';
        }
        ?>
      </div>
      <p class="description"><?php echo $description; ?></p>
      <div class="p-b">
        <h6 class="price"><?php echo $price; ?> DT</h6>
        <button class="buy">Buy</button>
      </div>
    </div>
  </div>
  <!-- <div class="game">
    <div class="image">
      <img <?php echo 'src="game_images/' . $image . '"'; ?>>
    </div>
    <div class="info">
      <h6 class="company"><?php echo $company; ?></h6>
      <h4 class="game-title"><?php echo $name; ?></h4>
      <h6 class="date"><?php echo $processed_release_date; ?></h6>
      <div class="genres">
        <?php
        $genres = json_decode($raw_genres);
        foreach ($genres as $genre) {
          echo '<span>' . $genre . '</span>';
        }
        ?>
      </div>
      <p class="description">
        <?php echo $description; ?>
      </p>

      <div class="p-b">
        <h6 class="price"><?php echo $price; ?> DT</h6>
        <?php echo '<input type="hidden" value="' . $gid . '"><button class="like ';
        if (isset($_SESSION["uid"]) and is_loved($conn, $gid, $_SESSION["uid"])) echo "fav-active";
        echo '">Like</button></a>' ?>
      </div>
    </div>

  </div> -->
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