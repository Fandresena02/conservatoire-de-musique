
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
                    getCours();
                    include("../vues/voir_cours.php");
                    break;
                case 'inscriptions':
                    include ("../vues/voir_inscriptions.php");
                    break;
                default : 
                    include ("../vues/acceuil.php");
            }
        include '../vues/pied.php';
    ?>
