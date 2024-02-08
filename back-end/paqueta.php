<?php

include '../config/db.php';


session_start();


// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    // Vérifier si les valeurs sont définies
    if ($password !== null && $id !== null) {
        // Récupérer le mot de passe stocké associé à l'ID
        $stmt = $conn->prepare("SELECT id, password FROM login WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['password'])) {
            // Authentification réussie
            $_SESSION['user_id'] = $result['id'];
            header("Location: index.back.php"); // Redirection vers la page protégée
            exit();
        } else {
            echo "Identifiant ou mot de passe incorrect.";
        }
    } else {
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Connexion</title>
</head>
<body id="body-login">
    <div id="container-login">
        <form method="post" action="paqueta.php">
            <h3>Ravi de te revoir</h3>
            <div>
            <label for="id">identifiant</label>
            <input type="text" placeholder="Votre Identifiant" name="id" autocomplete="current-id">
            </div>

            <div>
            <label for="password">mot de passe</label>
            <input type="password" placeholder="mot de passe" id="password" name="password" autocomplete="current-password">
            </div>

            <button>Connexion</button>
            </div>
        </form>
    </div>
</body>
</html>








