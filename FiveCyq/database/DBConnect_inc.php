<?php

	$m_strDBServerName = 'localhost';
	$m_strDBName = 'cyq';
	$m_strDBUsername = 'root';
	$m_strDBPassword = 'Hell123';

	$m_xDBConnection = mysql_connect( $m_strDBServerName, $m_strDBUsername, $m_strDBPassword )
	or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
	
	mysql_select_db( $m_strDBName ) or die ("Datenbank konnte nicht ausgewählt werden");
	

?>