<?php 
	$con = mysqli_connect('localhost','root','','mglsi');
	$sql = mysqli_query($con,"SELECT * FROM utilisateur");
	$xml = new XMLWriter();
	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(true);
	$xml->startElement('utilisateurs');
		while($row = mysqli_fetch_assoc($sql)){
			$xml->startElement('utilisateur');
				$xml->startElement('id_user');
				$xml->writeRaw($row['id_user']);
				$xml->endElement();
				$xml->startElement('nom');
				$xml->writeRaw($row['nom']);
				$xml->endElement();
				$xml->startElement('prenom');
				$xml->writeRaw($row['prenom']);
				$xml->endElement();
				$xml->startElement('email');
				$xml->writeRaw($row['email']);
				$xml->endElement();
				$xml->startElement('password');
				$xml->writeRaw($row['password']);
				$xml->endElement();
				$xml->startElement('date_enregistrement');
				$xml->writeRaw($row['date_enreg']);
				$xml->endElement();
				$xml->startElement('groupe');
				$xml->writeRaw($row['groupe']);
				$xml->endElement();
				$xml->startElement('titre');
				$xml->writeRaw($row['titre']);
				$xml->endElement();
			$xml->endElement();
		}
	$xml->endElement();
	header('Content-Type: text/xml');
	$xml->flush();	
?>