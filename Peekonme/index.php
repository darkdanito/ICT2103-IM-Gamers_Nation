<?php
	session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Gamers Nation</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" />
    </head>
    
    <body id="background">
        <?php include 'header.inc.php'; ?>
            <div class="container-fluid" id="intro">
                <h1 class="text-center">Gaming is a love affair with life.</h1>
                <p class="text-center">If you enjoy playing game and love to sell your unwanted to anyone, here’s the place for you!</p> 
                <p class="text-center">Introducing the all new online platform, Gamers Nation, that allows you to upload and share your games with our online community.</p>
                <ul class="text-center">
                    <a class="btn btn-success btn-md" href="explore.php">Explore</a>
                    <a class="btn btn-success btn-md" href="signup.php">Sign Up</a>
                </ul>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>