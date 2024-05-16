<?php
// Variables de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "abscence";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    // Récupération des valeurs de présence pour chaque matière
    $web = $_POST["p_web"];
    $si = $_POST["p_si"];
    $se = $_POST["p_se"];
    $bd = $_POST["p_bd"];
    $pa = $_POST["p_pa"];
    $code = $_POST["code"];

    // Requête SQL d'insertion des données dans la table de la base de données
    $requete = "UPDATE liste_presence SET web = '$web', SI = '$si', SE = '$se', BD = '$bd', PA = '$pa' WHERE code='$code' ";


    // Exécution de la requête
    if ($connexion->query($requete) === TRUE) {
        echo "";
    } else {
        echo "Erreur lors de l'enregistrement de la présence : " . $connexion->error;
    }

    // // Fermeture de la connexion à la base de données
    // $connexion->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succès</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
           
        }
        body{
    background-image: url('home.jpg');
    background-size: cover; 
        background-repeat: no-repeat; 
}
        .success-container {
            background-color: #e6ffe6; /* Couleur verte claire */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        h1 {
            color: #2ecc71; /* Vert espoir */
        }
        p {
            color: #333;
        }
        
    </style>
</head>
<body>

<div class="success-container">
    <h1>Succès</h1>
    <p>votre information ont ete bien enregistres</p>
</div>

</body>
</html>