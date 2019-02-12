<?php $this->titre = "Mon Blog"; ?>

<div id="synopsis"><span id="titre_synopsis"><h2>Synopsis</h2></span><br/><p>Nam tincidunt semper semper. Integer dictum tempor nunc imperdiet blandit. Vestibulum turpis orci, pretium in lobortis et, dapibus nec lectus. Duis tempus fermentum nulla, ac volutpat justo posuere sit amet. Praesent eu purus id arcu porttitor fringilla eget vel nulla. Donec non arcu tincidunt, tincidunt lacus quis, accumsan nibh. Sed venenatis erat id porta imperdiet. Etiam fermentum gravida mattis. Donec interdum feugiat luctus. Mauris maximus dolor non turpis condimentum, faucibus vulputate ex iaculis.</p></div>
<hr/>

<?php foreach ($billets as $billet):    ?>

    <div class="container">
    <article>
        <section>
            <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            </a>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </section>
        <div id="nbchar"><p><?= $this->nettoyer($billet['contenu']) ?></p></div>
    </article>
    </div>
    <hr />
<?php endforeach; ?>
