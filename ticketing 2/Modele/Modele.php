<?php

// Renvoie la liste de tous les billets, triés par identifiant décroissant
function getBillets() {
  $bdd = getBdd();
  $billets = $bdd->query('select TIC_ID as id, TIC_DATE as date,'
    . ' TIC_TITRE as titre, TIC_CONTENU as contenu, eta_lib as lib from T_TICKETS,ETAT where ETAT.eta_id=T_TICKETS.TIC_ID'
    . ' order by TIC_ID desc');
  return $billets;
}

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=TICKETING_2;charset=utf8',
    'administra', 'simone', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  return $bdd;
}
// Renvoie les informations sur un billet
function getBillet($idBillet) {
    $bdd = getBdd();
    $billet = $bdd->prepare('select TIC_ID as id, TIC_DATE as date,'
      . ' TIC_TITRE as titre, TIC_CONTENU as contenu from T_TICKETS'
      . ' where TIC_ID=?');
    $billet->execute(array($idBillet));
    if ($billet->rowCount() == 1)
      return $billet->fetch();  // Accès à la première ligne de résultat
    else
     throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
  }
  
  // Renvoie la liste des commentaires associés à un billet
  function getCommentaires($idBillet) {
    $bdd = getBdd();
    $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,'
      . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
      . ' where COM_ID=?');
    $commentaires->execute(array($idBillet));
    return $commentaires;
  }