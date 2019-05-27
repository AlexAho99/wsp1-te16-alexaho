<div role="main">
  <h2>Logga in som admin</h2>
  <form action="admin.php" method="post">
    <fieldset>
    <legend>Inloggningsuppgifter</legends>
    <?php echo $login_errormsg; ?>
    <p>
      <label class="widelbl" for="username">Andvändarnamn:</label>
      <input type="text" name="username" maxlength="20" value="<?php echo $login_username; ?>" id="username" required>
      </p>
    <p>
      <label class="widelbl" for="password">Lösenord:</label>
      <input type="password" name="password" value="" id="password" required>
      </p>
    <p>
      <input type="submit" value="Logga in">
    </p>
  </fieldset>
 </form>
</div>