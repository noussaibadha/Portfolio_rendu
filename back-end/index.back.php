
<?php require '../config/db.php'; ?>

    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-Office</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <nav>
      <img src="../img/logo1.png" alt="logo.png">
      <h1>Back-Office</h1>
      <a href="logout.php" class="logout-btn">Déconnexion</a>
  </nav>



    <div class="main-container">
        <h2 class="title">Bienvenue dans l'Espace d'Administration !🎉</h2>
        <p>Vous êtes maintenant dans la partie administrative du site, où vous pouvez gérer tous les aspects du site pour l'améliorer davantage.</p>
        <h3 class="section-title">Messages Reçus :</h3>

        <?php

          $result = $conn->query("SELECT * FROM contact");

          echo "<table>";
          echo "<tr><th>Nom</th><th>Email</th><th>Sujet</th><th>Message</th><th>Traitement</th></tr>";
          while($row = $result->fetch()) {
              echo "<tr>";
              echo "<td>".$row[""]."</td>";
              echo "<td>".$row["sujet"]."</td>";
              echo "<td>".$row["message"]."</td>";
              echo "<td><a href='?delete_id=".$row["id"]."'><i class='fas fa-times'></i></a></td>"; // Lien pour supprimer le message
              echo "</tr>";
          }

          // Vérifier si un message doit être supprimé
          if(isset($_GET['delete_id'])) {
              $delete_id = $_GET['delete_id'];
              $conn->query("DELETE FROM contact WHERE id = $delete_id");
              // Actualiser la page pour mettre à jour la liste des messages après la suppression
              header('Location: ' . $_SERVER['PHP_SELF']);
              exit();
          }

          // Fermer la connexion à la base de données
          $conn->close();
          echo "</table>";

        ?>

        
    </div>

    <script src="js/app.js"></script>
</body>
</html>


