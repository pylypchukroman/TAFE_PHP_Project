<?php
    session_start();
    // Disable element if the user is not logged in
    $isDisabled = !isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true;
?>

<nav>
    <ul>
        <li class="menu">
            <a href="index.php">
                <img src="images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
            </a>
        </li>
        <li class="<?= $isDisabled ? 'menu' : 'disabled-link' ?>"><a href="register.php">REGISTER</a></li>
        <li class="<?= $isDisabled ? 'menu' : 'disabled-link' ?>"><a href="login.php">LOGIN</a></li>
        <li class="<?= $isDisabled ? 'disabled-link' : 'menu' ?>"><a href="accounts.php">VIEW ACCOUNTS</a></li>
</nav>