<?php
$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "abscence"; 

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$code = $_POST["code"];

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
$sql = "SELECT * FROM liste_presence WHERE prenom = '$prenom' AND nom = '$nom' AND code = '$code'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    header("Location: noter.html");
    exit(); 
} else {
    echo "";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .error-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        h1 {
            color: #ff6347; /* Rouge tomate */
        }
        p {
            color: #ff6347;
        }
    </style>
</head>
<body>

<div class="error-container">
    <h1>Erreur</h1>
    <p>les informations entrees ne correspond a aucun etudiant</p>
</div>

</body>
</html>


