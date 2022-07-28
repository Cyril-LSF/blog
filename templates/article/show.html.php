<h1><?= $article['title'] ?></h1>
<small>Créé le <?= $article['created_at'] ?></small>
<p><?= $article['content'] ?></p>

<h2>Il y a déjà <?= count($comments) ?> réactions :</h2>
<?php foreach($comments as $comment): ?>
    <small>Créé par <?= $comment['author'] ?> le <?= $comment['created_at'] ?></small>
    <em><?= $comment['content'] ?></em>
    <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm(`Etes_vous sûr de vouloir supprimer ce commentaire ?`)">Supprimer</a>
    <hr>
<?php endforeach ?>

<form action="index.php?controller=comment&task=insert" method="post">
    <input type="text" name="author" placeholder="pseudo">
    <textarea name="content" cols="30" rows="10" placeholder="commentaire"></textarea>
    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
    <button type="submit">Valider</button>
</form>