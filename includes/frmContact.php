<form action="index.php?page=contact" method="post">
  <fieldset>
    <legend>Contact moi Michel !</legend>
    <div>
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom"  />
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" />
      <label for="mail">E-mail :</label>
      <input type="email" name="mail" id="mail"  />
      <label for="tel">Telephone :</label>
      <input type="tel" name="tel" id="tel" />
      <label for="message">Message :</label>
      <textarea name="message" id="message"></textarea>
      <input type="submit" value="Valider"/>
      <input type="hidden" name="frmContact" />
    </div>
  </fieldset>
</form>
