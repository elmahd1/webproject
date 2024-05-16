<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $code = $_POST["code"];

    if ($prenom === "prenomprof" && $nom === "nomprof" && $code === "codeprof") {
        $servername = "localhost"; 
        $username = "root"; 
        $password = "";
        $database = "abscence";
        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }
        $sql = "SELECT * FROM liste_presence";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Nom</th><th>Prénom</th><th>Code</th><th>WEB</th><th>SI</th><th>SE</th><th>BD</th><th>PA</th></tr>"; // Ajouter les en-têtes des nouvelles colonnes
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["code"]."</td><td>".$row["web"]."</td><td>".$row["SI"]."</td><td>".$row["SE"]."</td><td>".$row["BD"]."</td><td>".$row["PA"]."</td></tr>"; 
            }

            echo "</table>"; 
        } else {
            echo "Aucune donnée trouvée.";
        }
        $conn->close();
    } else {
        echo "ERREUR";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style général du tableau */
table {
    width: 100%; /* Occupe toute la largeur de son conteneur */
    border-collapse: collapse; /* Fusionne les bordures des cellules */
}

/* Style des cellules du tableau */
td, th {
    border: 1px solid #dddddd; /* Bordure des cellules */
    padding: 8px; /* Espacement interne des cellules */
    text-align: left; /* Alignement du texte à gauche */
}

/* Style de l'en-tête du tableau */
th {
    background-color: #f2f2f2; /* Couleur de fond de l'en-tête */
}

/* Style des lignes paires du tableau */
tr:nth-child(even) {
    background-color: #f9f9f9; /* Couleur de fond des lignes paires */
}

/* Style des lignes impaires du tableau */
tr:nth-child(odd) {
    background-color: #ffffff; /* Couleur de fond des lignes impaires */
}

/* Style pour mettre en surbrillance une cellule */
.highlight {
    background-color: yellow; }
    body{
    background-image: url('home.jpg');
    background-size: cover; 
        background-repeat: no-repeat; 
}
    </style>
</head>
<body>
    
</body>
</html>