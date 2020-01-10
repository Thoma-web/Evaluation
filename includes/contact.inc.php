<?php
if (isset($_POST['frmContact'])) {
  $nom = checkInput($_POST['nom']);
  $prenom = checkInput($_POST['prenom']);
  $mail = checkInput($_POST['mail']);
  $tel = checkInput($_POST['tel']);
  $message = checkInput($_POST['message']);
  $erreur = array();
  if ($nom === "")
    array_push($erreur, "Saisi ton nom");
  if ($prenom === "")
    array_push($erreur, "Saisi le prénom vite fait");
  if ($mail === "")
    array_push($erreur, "Une petite adresse mail pour te faire spamer");
  if ($tel === "")
    array_push($erreur, "Mets ton 06");
  if ($message === "")
    array_push($erreur, "Si vraiment tu veux dire un truc c'est juste ici");
  if (count($erreur) > 0) {
    $message = '<ul>';
    for($i = 0 ; $i < count($erreur) ; $i++) {
      $message .= '<li>';
      $message .= $erreur[$i];
      $message .= '</li>';
    }
    $message .= '</ul>';
    echo $message;
    require 'frmContact.php';
  }
  else {
    $sqlVerif = "SELECT COUNT(*) FROM matable
    WHERE mail='" . $mail ."'";
    $nbrOccurences = $pdo->query($sqlVerif)->fetchColumn();
    if ($nbrOccurences > 0) {
      echo "Ici Paris";
    }
else {
    $sql = "INSERT INTO matable (nom, prenom, mail, tel, message) VALUES  ('" . $nom . "', '" . $prenom . "', '" . $mail ."', '" . $tel ."', '" . $message ."')";
    $query = $pdo->prepare($sql);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindValue(':mail', $mail, PDO::PARAM_STR);
    $query->bindValue(':tel', $tel, PDO::PARAM_STR);
    $query->bindValue(':message', $message, PDO::PARAM_STR);
    $query->execute();
    echo "Bien joué mon gars";
    }
  }
}
else {
  $nom = $prenom = $mail = $tel = $message = "";
  require 'frmContact.php';
}
