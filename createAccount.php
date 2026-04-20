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
        <h1>Create account</h1>
        <?php
            // Include the password validation file
            require 'passwordValidation.php';
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if the accounts file exists
            if (!file_exists("accounts.txt")) {
                header("Location: register.php?error=filenotfound");
                exit();
            }
            $accountRecords = file("accounts.txt");
            $isUserExist = false;

            // Check if the username already exists
            foreach ($accountRecords as $accountRecord) {
                $userData = explode(",", $accountRecord);
                if ($userData[0] == $username) {
                    $isUserExist = true;
                }
            }

            // Check if username or password fields are empty
            if ($username == "" || $password == "") {
                header("Location: register.php?error=emptyfields");
                exit();
            }

            // Check if the password is valid
            if (!isValidPassword($password)) {
                header("Location: register.php?error=incorrectpassword");
                exit();
            }

            // Redirect if the username already exists
            if ($isUserExist) {
                header("Location: register.php?error=userexist");
                exit();
            }

            // Open the file and add new user data
            $file = fopen("accounts.txt", "a");
            fwrite($file, $username . "," . $password . "\n");
            fclose($file);

            echo "Your account has been created!";
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