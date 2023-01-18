<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Ticketing</title>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1 id="titreBlog">Ticketing</h1></a>
        <p>Bienvenue sur mon site de ticketing.</p>
      </header>
      <div id="contenu">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=TICKETING;charset=utf8', 
          'administra', 'simone');
        $billets = $bdd->query('select TIC_ID as id, TIC_DATE as date,'
          . ' TIC_TITRE as titre, TIC_CONTENU as contenu, eta_lib as lib from T_TICKETS,ETAT where ETAT.eta_id=T_TICKETS.TIC_ID'
          . ' order by TIC_ID desc');
        foreach ($billets as $billet): ?>
          <article>
            <header>
              <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
              <time><?= $billet['date'] ?></time>
            </header>
            <p><?= $billet['contenu'] ?></p>
            <p><?= $billet['lib'] ?></p>
          </article>
          <hr />
        <?php endforeach; ?>
      </div> <!-- #contenu -->
      <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS.
      </footer>
    </div> <!-- #global -->
  </body>
</html>