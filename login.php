<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Connexion</h1><hr>

<form action="" method="post" enctype="multipart/form-data">
<p> Mail: <br><input type="email" name="mail" placeholder="Entrez votre mail:"required></p>
<p> Mot de passe: <br><input type="password" name="mdp" placeholder="Mot de passe:"required></p>
<p><input type="submit" value="Se connecter" name ="bouton"></p>
</form>



<?php

session_start();
// Create connection
$conn = mysqli_connect("localhost:8889", "root", "root", "leboncoin");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $result = mysqli_query($conn, "SELECT * FROM utilisateur WHERE mail = '$mail'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        

        if (md5($_POST['mdp']== $row['mdp'])) {
            // Le mot de passe est correct, connectez l'utilisateur
            $_SESSION['utilisateur'] = $row['id'];
            header('Location: index.php'); // Rediriger l'utilisateur vers la page d'accueil
            exit;
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Mail incorrect";
    }
}

mysqli_close($conn);
?>




</body>
</html>