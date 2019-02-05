 <?php 
            
            //Info base
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "joliverie";
            $db = "mail";
            $user="";
            $Liste="";
            $Message="";
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8', $dbuser, $dbpass);
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            if (isset($_POST)) {


                $user = $_POST['user'];

                $prep = $bdd->prepare('INSERT INTO donnee (destinataire,expediteur,date,message) VALUES (?,?,NOW(),?)');
                $prep->execute(array($_POST["dest"],$user,$_POST["message"]));
             }   
        
        
        ?>
