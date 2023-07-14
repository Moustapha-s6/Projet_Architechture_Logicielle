<?php 
	$con = mysqli_connect('localhost','root','','mglsi');
	$sql = mysqli_query($con,"SELECT * FROM article");
	$xml = new XMLWriter();
	$xml->openURI("php://output");
	$xml->startDocument();
	$xml->setIndent(true);
	$xml->startElement('articles');
		while($row = mysqli_fetch_assoc($sql)){
			$xml->startElement('article');
				$xml->startElement('id');
				$xml->writeRaw($row['id']);
				$xml->endElement();
				$xml->startElement('titre');
				$xml->writeRaw($row['titre']);
				$xml->endElement();
				$xml->startElement('contenu');
				$xml->writeRaw($row['contenu']);
				$xml->endElement();
				$xml->startElement('contenuComplet');
				$xml->writeRaw($row['contenuComplet']);
				$xml->endElement();
				$xml->startElement('dateCreation');
				$xml->writeRaw($row['dateCreation']);
				$xml->endElement();
				$xml->startElement('dateModification');
				$xml->writeRaw($row['dateModification']);
				$xml->endElement();
				$xml->startElement('categorie');
				$xml->writeRaw($row['categorie']);
				$xml->endElement();
				$xml->startElement('titre');
				$xml->writeRaw($row['titre']);
				$xml->endElement();
			$xml->endElement();
		}
	$xml->endElement();
	$xml->flush();	
?>