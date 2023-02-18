<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Inscription leboncoin</h1><hr>

<form action="" method="post" enctype="multipart/form-data">
<p> Pseudo: <br><input type="text" name="pseudo" placeholder="Entrez votre pseudo:" required></p>
<p> Mail: <br><input type="email" name="mail" placeholder="Entrez votre mail:"required></p>
<p> Mot de passe: <br><input type="password" name="mdp" placeholder="Mot de passe:"required></p>
<p>Nom: <br><input type="text" name="nom" placeholder="Entrez votre nom:"required></p>
<p>Prenom: <br><input type="text" name="prenom" placeholder="Entrez votre prenom:"required></p>
<p>Adresse: <br><input type="text" name="adresse" placeholder="Entrez votre adresse:"required></p>
<p>Ville: <br><input type="text" name="ville" placeholder="Entrez votre ville:"required></p>
<p>Tel: <br><input type="tel" name="tel" placeholder="Entrez votre numéro de téléphone:"required></p>
<!-- <p>Date de naissance: <br><input type="date" name="dob" placeholder="Entrez votre date de naissance:"required></p> -->
<p><input type="submit" value="S'inscrire" name ="bouton"></p>

</form>
<?php
if(isset($_POST["bouton"])){
//var_dump($_POST);
//var_dump($_FILES);
$pseudo=$_POST["pseudo"];
$mail=$_POST["mail"];
$mdp=md5($_POST["mdp"]);
$nom= $_POST["nom"];
$prenom=$_POST["prenom"];
$adresse=$_POST["adresse"];
$ville=$_POST["ville"];
$tel=$_POST["tel"];
//$dob=$_POST["dob"];

if (empty($_POST['mail']) || empty($_POST['mdp'])) {
    echo "Veuillez saisir votre e-mail et votre mot de passe";
    exit;
  }
  
else if (strlen($_POST['mdp']) < 10) {
    echo "Le mot de passe doit contenir au moins 10 caractères";
    exit;
  }
else{

    // Create connection
    $conn = mysqli_connect("localhost:8889", "root","root","leboncoin");

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }



    $req="insert into utilisateur 
    values (null, '" . mysqli_real_escape_string($conn, $pseudo) . "','" . mysqli_real_escape_string($conn, $mail) . "','$mdp','" . mysqli_real_escape_string($conn, $nom) . "','" . mysqli_real_escape_string($conn, $prenom) ."','" . mysqli_real_escape_string($conn, $adresse) . "','$ville','$tel')";

    //echo $id ; 
    //mysqli_query($conn, $req);

    if (mysqli_query($conn, $req)) {
        echo "Bienvenue parmi nous !";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);  
}
  
}

?>
</body>
</html>