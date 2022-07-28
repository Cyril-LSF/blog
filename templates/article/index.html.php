<h1>Nos articles</h1>

<?php foreach($articles as $article): ?>
    <h2><?= $article['title'] ?></h2>
    <p><?= $article['introduction'] ?></p>
    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Etes-vous sûr de vouloir cet article ?`)">Supprimer</a>
    <hr>
<?php endforeach ?>