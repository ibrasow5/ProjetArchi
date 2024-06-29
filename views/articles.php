<?php
// Inclusion du fichier de configuration pour la connexion à la base de données
require_once __DIR__ . '/../config/connexion.php';
require_once __DIR__ . '/../controllers/ArticleController.php';

// Gérer la déconnexion
if (isset($_POST['logout'])) {
    // Démarrer la session si elle n'est pas déjà démarrée
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Détruire la session
    session_destroy();
    // Rediriger vers la page d'accueil
    header('Location: accueil.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Actualités Polytechniciennes</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .article-box {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .article-box h2 {
            margin-bottom: 5px;
        }

        .article-box p {
            margin-top: 5px;
        }

        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545; /* Rouge */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            float: right;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #c82333; /* Rouge plus sombre au survol */
        }

        .button-container {
            overflow: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="article-container">
        <div class="button-container">
            <?php if ($showManageButton): ?>
                <div style="display: inline-block;">
                    <a href="views/manage_articles.php" class="button">Gérer les articles</a>                
                </div>
            <?php endif; ?>

            <?php if ($showManageUsersButton): ?>
                <div style="display: inline-block;">
                    <a href="views/manage_users.php" class="button">Gérer les utilisateurs</a>
                </div>
            <?php endif; ?>
            
            <div style="float: right;">
                <form method="POST" style="display: inline;">
                    <button type="submit" name="logout" class="logout-button">Se déconnecter</button>
                </form>
            </div>
        </div>

        <?php if (isset($articles) && count($articles) > 0): ?>
            <?php foreach ($articles as $article): ?>
                <div class="article-box">
                    <h2><a href="?id=<?php echo $article['id']; ?>"><?php echo $article['titre']; ?></a></h2>
                    <p><?php echo substr($article['contenu'], 0, 100); ?>...</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>      
    </div>
    <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
