<?php
// Inclusion du fichier de configuration pour la connexion à la base de données
require_once __DIR__ . '/../config/connexion.php';
require_once __DIR__ . '/../controllers/ArticleController.php';
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
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
        <?php if ($article): ?>
            <div class="article-opened">
                <h2><?php echo $article['titre']; ?></h2>
                <p><?php echo $article['contenu']; ?></p>
            </div>
        <?php else: ?>
            <p>Article non trouvé.</p>
        <?php endif; ?>
    </div>
    <?php include __DIR__ . '/footer.php'; ?>
</body>
</html>
