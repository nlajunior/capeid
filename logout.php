<?php 
   require_once ("logica-usuario.php");
   logout();
   $_SESSION["success"] = "Deslogado com sucesso.";
   Header("Location: index.php");
   die();