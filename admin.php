<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelos Enterprises</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="headerContent">
            <?php
                // Include navigation file
                include 'nav.php';
            ?>
        </div>
    </header>
    <section id="banner">
        <img src="images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
    <main>
        <h1>Admin</h1>
        <?php
            // Include password validation file
            require 'passwordValidation.php';
            // Get username and password from the login form
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Check if username or password fields are empty
            if ($username == "" || $password == "") {
                $_SESSION["isLoggedIn"] = false;
                header("Location: login.php?error=emptyfields");
                exit();
            }

            // Check if the password format is valid
            if (!isValidPassword($password)) {
                $_SESSION["isLoggedIn"] = false;
                header("Location: login.php?error=incorrectpassword");
                exit();
            }

            // Check if the accounts file exists
            if (!file_exists("accounts.txt")) {
                $_SESSION["isLoggedIn"] = false;
                header("Location: login.php?error=filenotfound");
                exit();
            }

            // Read all account records from the file
            $accountRecords = file("accounts.txt", FILE_IGNORE_NEW_LINES);

            // Set login status to false by default
            $isLoggedIn = false;

            // Loop through each account record
            foreach ($accountRecords as $accountRecord) {
                // Split each record into username and password
                $userData = explode(",", $accountRecord);

                // Check if the entered details match the record
                if ($userData[0] === $username && $userData[1] === $password) {
                    $isLoggedIn = true;
                    break;
                }
            }
            // Redirect user based on login result
            if ($isLoggedIn) {
                $_SESSION["isLoggedIn"] = true;
                header("Location: accounts.php");
                exit();
            } else {
                $_SESSION["isLoggedIn"] = false;
                header("Location: login.php?error=wrongdata");
                exit();
            }
        ?>
    </main>
    <footer>
        <p>Contact us</p>
        <p>A: 111 Business Avenue, TULITZA NSW 9460<br>
        P: 02 0000 0000<br>
        E: contactus@gelosmail.com.au</p>


        <p>Gelos Enterprises would like to pay our respect and acknowledge Aboriginal and Torres Strait Islander Peoples as the Traditional Custodians of the land, rivers and sea. We acknowledge and pay our respect to the Elders, both past and present of all Nations.</p>
        <p>This site has been developed by TAFE NSW &copy TAFE NSW <?php echo date("Y") ?></p>
        <p >Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>
</body>
</html>