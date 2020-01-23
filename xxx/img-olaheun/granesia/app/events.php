<?php
// List of events
 $json = array();

 // Query that retrieves events
 $requete = "SELECT alat.id_alat as title, jadwal.tanggal as start FROM jadwal
			LEFT JOIN alat on alat.id_alat = jadwal.id_alat
			LEFT JOIN pengawas_alat ON pengawas_alat.id_alat = alat.id_alat
			Where id_pengawas = '4'";

 // connection to the database
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=perangkat', 'root', '');
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
 // Execute the query
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

?>