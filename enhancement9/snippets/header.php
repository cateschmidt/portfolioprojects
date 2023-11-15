<header>
  <div class="banner">
    <img src="/phpmotors/images/site/logo.png" alt="PHP Motors Logo">
    <!-- <p>My Account</p> -->

    <p>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo "<a href='/phpmotors/accounts/index.php'>";
        echo $_SESSION['clientData']['clientFirstname'];
        echo ", Welcome Back!    ";
        echo "</a>"; 
      } ?></p>

    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) : ?>
      <p> <a class="account" href="/phpmotors/accounts/index.php?action=Logout">Logout</a></p>
    <?php else : ?>
      <p> <a class="account" href="/phpmotors/accounts/index.php?action=login-view">My Account</a></p>
    <?php endif ?>

  </div>


</header>