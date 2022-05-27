<?php
session_start();
        include '../vues/entete.php';
        require '../modele/fonction.php';
 

if (!isset($_SESSION["is_loged"]))
{
    $_SESSION["is_loged"] = "false";
}

//$is_loged= $_SESSION["is_loged"];


    if(!isset($_REQUEST['action']))
        {
            if (!isset($_SESSION["id"]))
            {
                $action = 'connexion';
            }
             else{
                    $action = 'acceuil';                
               }

        }else {
            $action = $_REQUEST['action'];

            if ($action == 'validerConnexion')
                {
                    if (isset ($_POST["seconnecter"]))
                        {
                            $login = htmlspecialchars(isset($_POST['login']))? $_POST['login'] : '' ;
                            $mdp = htmlspecialchars(isset($_POST['mdp']))? $_POST['mdp'] : '' ;

                            $res = seConnecter($login, $mdp);

                            if (!is_array($res))
                                {
                                    include("../vues/connexion.php");
                            } else{

                                $_SESSION['is_loged'] = "true";
                                //$_SESSION["id"] = $res['id'];
                                connect($res['id']);
                                //$action = 'acceuil';
                                header("Location: index.php?action=acceuil");
                                    
                                }
                        }

                }
            }
            
        if (!isset($_SESSION["id"]) && isset($_REQUEST['action']))
            {
                $action ='connexion';
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
                    $lesAdherent = getAdherent();
                    include ("../vues/inscrire.php");
                    break;
                case 'supprimer' :
                    $num = $_REQUEST['numeroInscription'];
                    supprimerInscription($num);
                    header('Location: index.php?action=inscriptions');
                    break;
                case 'voirPdf' :
                    $lesInscriptions = getInscription();
                    $num = $_REQUEST['numeroInscription'];
                    $uneInscription = $lesInscriptions[$num];
                   // var_dump($uneInscription);
                    include ("../vues/voir_pdf.php");

                    $pdf = creerPdf($uneInscription);
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
                case 'connexion':
                    include("../vues/connexion.php");
                    break;
                /*case 'validerConnexion':
                    echo ("avant if");
                        if (isset ($_POST["seconnecter"]))
                        {
                            echo ("après if");
                            $login = htmlspecialchars(isset($_POST['login']))? $_POST['login'] : '' ;
                            $mdp = htmlspecialchars(isset($_POST['mdp']))? $_POST['mdp'] : '' ;

                            echo $login;
                            echo $mdp;
                            $res = seConnecter($login, $mdp);

                            if (!is_array($res))
                                {
                                    include("../vues/connexion.php");
                            } else{

                                connect($res['id']);
                                $action = 'acceuil';
                                    
                                }
                        }
                        

                    break;*/
                    case 'deconnexion':
                        deconnexion();
                        $action = 'connexion';
                        header("Location: index.php");
                        break;
                default : 
                    include ("../vues/acceuil.php");
            }
        include '../vues/pied.php';
    ?>
