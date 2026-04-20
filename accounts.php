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
        <h1>Current accounts</h1>
        <?php
            // Check if the user is logged in
            if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
                // Redirect user to login page if not logged in
                header("Location: login.php?error=pleaselogin");
                exit();
            }

            // Check if the accounts file exists
            if (file_exists("accounts.txt")) {

                // Read all account records from the text file
                $accountRecords = file("accounts.txt", FILE_IGNORE_NEW_LINES);

                // Loop through each account record
                foreach ($accountRecords as $accountRecord) {

                    // Split the account record into separate values
                    $userData = explode(",", $accountRecord);

                    // Get the username from the record
                    $username = $userData[0];

                    // Display the username on the page
                    echo "<p>$username</p>";
                }
            } else {
                // Show message if the file cannot be found
                echo "<p>Accounts file not found.</p>";
            }
        ?>
        <a class="logOutBtn" href="logout.php">Logout</a>
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