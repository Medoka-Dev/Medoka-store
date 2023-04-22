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
      <div class="account-info" id="user-info">
        <?php
        if (isset($_SESSION["in"])) {
          echo '<div>
              <p>'.$_SESSION["username"].'</p>
            </div>
            <img src="styles/img/user.png" alt="user image" height="60">';
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
    <header class="home" id="home">
      <div class="stars">
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
      </div>
      <div class="title-section">
        <img src="styles/img/via.png" />
        <p>get the best games at the lowest price</p>
      </div>
    </header>
    <!--About us section-->
    <div id="about" class="about">
      <img class="about-img" src="styles/img/dragon.png" />
      <div class="spacer"></div>
      <div class="about-text">
        <h3 class="sub-title">About <span>Us</span></h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos
          officia, corporis eum maxime odio nulla!
        </p>
      </div>
    </div>
    <!--store section-->
    <div id="store" class="store">
      <div class="title">
        <h1><span>Our</span> Store</h1>
      </div>
      <div id="cards">
        <div class="card">
          <a href="#">
            <div class="card1">
              <div class="card1-content">
                <div class="card1-image">
                  <i><img src="styles/img/showcase_games.jpg" /></i>
                </div>
                <div class="card1-info-wrapper">
                  <div class="card1-info">
                    <div class="card1-info-title">
                      <h3>Medoka shop</h3>
                      <h4>we sell the latest games online</h4>
                      <h4>click here to visit Via Events</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
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
      <!-- jQuery CDN -->
      <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
      <!-- fontawsome CDN -->
      <script src="https://kit.fontawesome.com/4f4b2ce8e5.js" crossorigin="anonymous"></script>
      <!-- personal CDN -->
      <script src="main.js"></script>
      <!--Scroll to top button-->
      <div class="scrolltop">
        <div class="scroll icon"><i class="fa fa-4x fa-angle-up"></i></div>
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
  </div>
</body>

</html>