
    <?php
        include '../vues/entete.php';
        require '../modele/fonction.php';
 

        if(!isset($_REQUEST['action']))
            {    
                $action = 'accueil';

            }else {   

             $action = $_REQUEST['action'];
            }
           


        switch ($action)
            {
                case 'acceuil':
                    include ("../vues/acceuil.php");
                    break;
                case 'cours':
                    $lesCours = getCours();
                    include("../vues/voir_cours.php");
                    break;
                case 'inscriptions':
                    $lesInscriptions = getInscription();
                    include ("../vues/voir_inscriptions.php");
                    break;
                case 'inscrire' :
                    $numero = $_REQUEST['numero'];
                    include ("../vues/inscrire.php");
                    break;
                case 'supprimer' :
                    $num = $_REQUEST['numeroInscription'];
                    supprimerInscription($num);
                    header('Location: index.php?action=inscriptions');
                    break;
                case  'validerInscription' :
                    try{
                        if (isset ($_POST["save"]))
                        {
                
                            $nom = htmlspecialchars(isset($_POST['nom']))? $_POST['nom'] : '' ;
                            $prenom = htmlspecialchars(isset($_POST['prenom']))? $_POST['prenom'] : '' ;
                            $tel = htmlspecialchars(isset($_POST['tel']))? $_POST['tel'] : '' ;
                            $adresse = htmlspecialchars(isset($_POST['adresse']))? $_POST['adresse'] : '' ;
                            $mail= htmlspecialchars(isset($_POST['mail']))? $_POST['mail'] : '' ;
                            $numero= htmlspecialchars(isset($_POST['numero']))? $_POST['numero'] : '' ;

                            $tableau = array($nom, $prenom, $tel, $adresse, $mail, $numero);

                        }
                        validerInscription($tableau);
                        include("../vues/confirmeInscription.php");
                        
                    } 
                    catch (Exception $e){
                        echo $e -> getMessage();
                    }                   
                    break;
                default : 
                    include ("../vues/acceuil.php");
            }
        include '../vues/pied.php';
    ?>
