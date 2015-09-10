<?php

	// Exemple simple de login amb CAS

	// Llibreria CAS
	require_once 'CAS.php';


	// Inicialitzem phpCAS
	phpCAS::client(CAS_VERSION_2_0, "cas.upc.edu", 443, "");

	// En entorns de producció s'hauria d'especificar el path del certificat del servidor CAS
	//phpCAS::setCasServerCACert("path");

	// Per aquesta prova simplement indiquem que no validi l'autenticitat del servidor de CAS
	phpCAS::setNoCasServerValidation();

	// Forcem l'autenticacio...
	phpCAS::forceAuthentication();


	// En aquest punt l'usuari ja ha seigut autenticat pel servidor de CAS
	// podem llegir el seu usuari amb phpCAS::getUser().


	// Si s'ha clicat logout, fem logout amb phpCAS::logout();
	if (isset($_REQUEST['logout'])) {
		phpCAS::logout();
	}

?>
<!--Indiquem a l'susuari que s'ha loguejat correctament i mostrem la versió del CAS-->
<html>
  <head>
    <title>Exemple login CAS</title>
  </head>
  <body>
    <h1>Has entrat correctament!</h1>
    <p>El teu nom d'usuari es <b><?php echo phpCAS::getUser(); ?></b>.</p>
    <p>La veris&oacute de phpCAS es <b><?php echo phpCAS::getVersion(); ?></b>.</p>
    <p><a href="?logout=">Logout</a></p>
  </body>
</html>
