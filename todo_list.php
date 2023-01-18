<?php
$user = "administra";
$password = "simone";
$database = "fsb3";
$table = "AGENTS";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>AGENTS</h2><ol>"; 
  foreach($db->query("SELECT nom,dateNaissance FROM $table") as $row) {
    echo "<li>" . $row['nom'] . '&nbsp ' . $row['dateNaissance'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
