<?php 
            
            //Info base
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "joliverie";
            $db = "mail";
            $user="";
            $Liste="";
            $Message="";
            $indice=0;
            try {
                $bdd = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8', $dbuser, $dbpass);
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            if(isset($_GET['user'])) {
                
                $prep = $bdd->prepare("SELECT * FROM donnee WHERE destinataire=?");
                $prep->execute(array($_GET["user"]));
                
                while ($donnees = $prep->fetch()) {
                    $point_fin=""; 
                    $apercu = substr($donnees['message'], 0, 10);
                    if(strlen($donnees['message'])>10){
                        $point_fin="...";
                    }
                    echo "<li class=\"liste_mail\" onclick=\"afficherMail(".$donnees['id'].")\">
                                <a id=\"listeMail\"  href=\"#l\">
                                    ".$donnees['date']." <b>".$donnees['expediteur']."</b> : ".$apercu."".$point_fin."
                                </a>
                                <a id=\"croix\" onclick=\"supprimer(".$donnees['id'].",'".$user."', '".$indice."')\" href=\"#\">
                                    <span class=\"croixgauche\"></span>
                                    <span class=\"croixdroite\"></span>
                                </a>
                            </li>";
                    $indice++;
            }
	}
        
        
?>
