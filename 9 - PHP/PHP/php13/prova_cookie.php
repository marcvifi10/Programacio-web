<?php

    // llegir una cookie
    echo $_COOKIE["idioma"];

    // Eliminar una cookie, li dones un temps de vida negatiu
    setcookie("idioma","ES",time()-60*60*24);

?>