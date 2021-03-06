<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>


<article>
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <br/>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>
</article>
<br/>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($billet['titre']) ?></h1>
</header>

<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
    <p><?= $this->nettoyer($commentaire['contenu']) ?></p>

<form method="post" action="billet/signaler">
    <input type="hidden" name="id" value="<?= $commentaire['id'] ?>" />
    <input type="submit" name="signaler" value="signaler" />
</form>
    
<br/>
<?php endforeach; ?>

<hr />

<form method="post" action="billet/commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /> 
    <br/>
    <br/>
    <textarea id="txtCommentaire" name="contenu" rows="5" cols="100" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>
