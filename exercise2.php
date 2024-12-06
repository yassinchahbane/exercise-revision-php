<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Révision PHP : Tableaux Associatifs et Traitement des Formulaires 2</title>
</head>
<body>

<!-- Exercice 1 -->
<?php
$employes = [
    ['nom' => 'Ali', 'poste' => 'Développeur', 'salaire' => 3000],
    ['nom' => 'Sara', 'poste' => 'Designer', 'salaire' => 2500],
    ['nom' => 'Youssef', 'poste' => 'Manager', 'salaire' => 4000],
    ['nom' => 'Fatima', 'poste' => 'Comptable', 'salaire' => 2800],
    ['nom' => 'Hassan', 'poste' => 'Technicien', 'salaire' => 2200],
];

function calculerSalaireMoyen($employes) {
    $total = 0;
    foreach ($employes as $employe) {
        $total += $employe['salaire'];
    }
    return $total / count($employes);
}

echo "<h3>Salaire moyen : " . calculerSalaireMoyen($employes) . " DH</h3>";
?>
<br>

<!-- Exercice 2 -->
<form method="POST" action="">
    Rechercher un employé : <input type="text" name="recherche">
    <input type="submit" value="Rechercher">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];
    $trouve = false;
    foreach ($employes as $employe) {
        if (strtolower($employe['nom']) === strtolower($recherche)) {
            echo "Employé trouvé : " . $employe['nom'] . ", Poste : " . $employe['poste'] . ", Salaire : " . $employe['salaire'] . " DH<br>";
            $trouve = true;
            break;
        }
    }
    if (!$trouve) {
        echo "Employé non trouvé.";
    }
}
?>
<br>

<!-- Exercice 3 -->
<form method="POST" action="">
    Email : <input type="email" name="email"><br>
    Mot de passe : <input type="password" name="password"><br>
    <input type="submit" value="Se connecter">
</form>
<?php
$utilisateurs = [
    ['email' => 'admin@example.com', 'password' => 'admin123'],
    ['email' => 'user@example.com', 'password' => 'user123'],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $valide = false;

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email && $utilisateur['password'] === $password) {
            echo "Connexion réussie. Bienvenue, $email !<br>";
            $valide = true;
            break;
        }
    }
    if (!$valide) {
        echo "Échec de connexion. Vérifiez vos informations.<br>";
    }
}
?>
<br>

<!-- Exercice 4 -->
<?php
$panier = [
    ['nom' => 'Produit1', 'quantite' => 2, 'prix' => 50],
    ['nom' => 'Produit2', 'quantite' => 1, 'prix' => 100],
    ['nom' => 'Produit3', 'quantite' => 3, 'prix' => 30],
];
$total = 0;
foreach ($panier as $item) {
    $total += $item['quantite'] * $item['prix'];
}
echo "<h3>Total du panier : $total DH</h3>";
?>
<br>

<!-- Exercice 5 -->
<form method="POST" action="">
    Commentaire : <textarea name="commentaire"></textarea><br>
    <input type="submit" value="Envoyer">
</form>
<?php
$commentaires = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    $commentaires[] = ['texte' => $_POST['commentaire'], 'horodatage' => date('Y-m-d H:i:s')];
}
foreach ($commentaires as $commentaire) {
    echo $commentaire['horodatage'] . " : " . $commentaire['texte'] . "<br>";
}
?>
<br>

<!-- Exercice 6 -->
<?php
$villes = [
    'Casablanca' => 25,
    'Rabat' => 22,
    'Marrakech' => 30,
    'Fès' => 27,
    'Tanger' => 23,
];
$villeMax = array_keys($villes, max($villes))[0];
echo "<h3>La ville la plus chaude est $villeMax avec " . max($villes) . "°C.</h3>";
?>
<br>

<!-- Exercice 7 -->
<form method="POST" enctype="multipart/form-data" action="">
    Fichier CSV : <input type="file" name="csv_file"><br>
    <input type="submit" value="Importer">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
    echo "<table border='1'><tr><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
    while ($row = fgetcsv($file)) {
        echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td></tr>";
    }
    echo "</table>";
    fclose($file);
}
?>
<br>

<!-- Exercice 8 -->
<form method="POST" action="">
    <input type="checkbox" name="produits[]" value="Produit1,50"> Produit1 (50 DH)<br>
    <input type="checkbox" name="produits[]" value="Produit2,100"> Produit2 (100 DH)<br>
    <input type="checkbox" name="produits[]" value="Produit3,30"> Produit3 (30 DH)<br>
    <input type="submit" value="Ajouter">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produits'])) {
    $total = 0;
    foreach ($_POST['produits'] as $produit) {
        list($nom, $prix) = explode(',', $produit);
        $total += $prix;
        echo "Produit sélectionné : $nom, Prix : $prix DH<br>";
    }
    echo "Prix total : $total DH";
}
?>
<br>

<!-- Exercice 9 -->
<?php
$etudiants = [
    'Ali' => ['Math' => 12, 'Physique' => 14, 'Informatique' => 16],
    'Sara' => ['Math' => 15, 'Physique' => 13, 'Informatique' => 17],
];
foreach ($etudiants as $nom => $notes) {
    $moyenne = array_sum($notes) / count($notes);
    echo "$nom a une moyenne de $moyenne<br>";
}
?>
<br>

<!-- Exercice 10 -->
<form method="POST" action="">
    <input type="text" name="nom" placeholder="Nom"><br>
    <input type="text" name="action" placeholder="Action (ajouter/modifier/supprimer)"><br>
    <input type="submit" value="Gérer">
</form>
<?php
$utilisateurs = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['action'])) {
    $action = $_POST['action'];
    $nom = $_POST['nom'];

    if ($action === 'ajouter') {
        $utilisateurs[] = $nom;
    } elseif ($action === 'supprimer' && ($key = array_search($nom, $utilisateurs)) !== false) {
        unset($utilisateurs[$key]);
    }
    echo "Utilisateurs : " . implode(', ', $utilisateurs);
}
?>
<br>

</body>
</html>
