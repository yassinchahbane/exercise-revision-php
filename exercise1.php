<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP</title>
</head>
<body>

<!-- Exercice 1 et 2 -->
<?php
$etudiant = [
    'nom' => 'Yassin',
    'prénom' => 'Chabane',
    'matricule' => '123456'
];
$etudiant['note'] = 15; 
$etudiant['note'] = 17; 
echo "<h3>Étudiant :</h3>";
echo "Nom: " . $etudiant['nom'] . "<br>";
echo "Prénom: " . $etudiant['prénom'] . "<br>";
echo "Matricule: " . $etudiant['matricule'] . "<br>";
echo "Note: " . $etudiant['note'] . "<br>";
?>

<!-- Exercice 3 -->
<?php
$produits = [
    'Produit1' => 100,
    'Produit2' => 200,
    'Produit3' => 150
];
echo "<h3>Produits :</h3>";
foreach ($produits as $nom => $prix) {
    echo "Nom: $nom, Prix: $prix DH<br>";
}
?>

<!-- Exercice 4 -->
<?php
$scores = [
    'Etudiant1' => 12,
    'Etudiant2' => 15,
    'Etudiant3' => 14,
    'Etudiant4' => 10,
    'Etudiant5' => 13
];
$moyenne = array_sum($scores) / count($scores);
echo "<h3>Scores des étudiants :</h3>";
foreach ($scores as $nom => $score) {
    echo "$nom : $score<br>";
}
echo "Moyenne des scores: " . $moyenne;
?>

<!-- Exercice 5 -->
<?php
$pays = [
    'Maroc' => 36000000,
    'France' => 67000000,
    'Allemagne' => 83000000
];
arsort($pays);
echo "<h3>Population des pays :</h3>";
foreach ($pays as $nom => $population) {
    echo "Pays: $nom, Population: $population<br>";
}
?>

<!-- Exercice 6 -->
<form method="POST" action="">
    Nom: <input type="text" name="nom"><br>
    Âge: <input type="number" name="age"><br>
    <input type="submit" value="Envoyer">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom']) && isset($_POST['age'])) {
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    if (!filter_var($age, FILTER_VALIDATE_INT) || $age <= 0) {
        echo "Erreur : L'âge doit être un entier positif.";
    } else {
        echo "Bienvenue, $nom, vous avez $age ans !";
    }
}
?>

<!-- Exercice 8 -->
<form method="POST" action="">
    Couleur préférée:
    <select name="couleur">
        <option value="Rouge">Rouge</option>
        <option value="Vert">Vert</option>
        <option value="Bleu">Bleu</option>
    </select>
    <input type="submit" value="Envoyer">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['couleur'])) {
    $couleur = $_POST['couleur'];
    echo "Votre couleur préférée est : $couleur";
}
?>

<!-- Exercice 9 -->
<form method="GET" action="">
    Nombre 1: <input type="number" name="nombre1"><br>
    Nombre 2: <input type="number" name="nombre2"><br>
    <input type="submit" value="Calculer">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['nombre1']) && isset($_GET['nombre2'])) {
    $somme = $_GET['nombre1'] + $_GET['nombre2'];
    echo "La somme est : $somme";
}
?>

<!-- Exercice 10 -->
<form method="POST" action="">
    Type de compte:
    <select name="compte">
        <option value="Administrateur">Administrateur</option>
        <option value="Utilisateur">Utilisateur</option>
    </select>
    <input type="submit" value="Envoyer">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['compte'])) {
    $compte = $_POST['compte'];
    if ($compte === 'Administrateur') {
        echo "Bienvenue, administrateur !";
    } else {
        echo "Bienvenue, utilisateur simple !";
    }
}
?>

</body>
</html>
