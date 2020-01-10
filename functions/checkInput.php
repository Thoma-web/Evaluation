<?php
function checkInput($chaîne) {
  return htmlspecialchars(addslashes(urlencode(trim($chaîne))));
}
