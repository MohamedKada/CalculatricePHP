<?php

session_start();
// Pour enchainer les calculs, je dois ajouter une condition aux opérations de switch case
// et ajouter une condition à la fonction operation (ou faire une fonction operation2?)
// afin de gérer le cas ou $op est déja saisie

/* A FAIRE 
CAS 16 : Réutilisation du bouton égal (=) pour répéter l'opération précédente
Le bug du length= dans le debug
*/
function operation($op) {
    switch ($_SESSION['OP']){
        case '/':
            if ((float)$_SESSION['result'] == 0) {
                $_SESSION['result'] = 'Infinity';} 
            else {
                $_SESSION['result'] = (float)$_SESSION['NB'] / (float)$_SESSION['result'];}
            $_SESSION['NB'] = 0.0;
            $_SESSION['OP'] = '';
            break;
        case '*':
            $_SESSION['result'] = (float)$_SESSION['NB'] * (float)$_SESSION['result'];
            $_SESSION['NB'] = 0.0;
            $_SESSION['OP'] = '';
            break;
        case '-':
            $_SESSION['result'] = (float)$_SESSION['NB'] - (float)$_SESSION['result'];
            $_SESSION['NB'] = 0.0;
            $_SESSION['OP'] = '';
            break;
        case '+':
            $_SESSION['result'] = (float)$_SESSION['NB'] + (float)$_SESSION['result'];
            $_SESSION['NB'] = 0.0;
            $_SESSION['OP'] = '';
            break;
    }
    $_SESSION['NB'] = 0.0;
    $_SESSION['OP'] = '';

}
function bouton($btn) {
    $_SESSION['OP'] = $btn;
        if (str_contains($_SESSION['result'], '%')){
            $_SESSION['NB'] = (float)$_SESSION['result'] / 100;
            $_SESSION['result'] = '';}
        else if ($_SESSION['result'] === 'Infinity'){
            return;
        } 
        else {
            $_SESSION['NB'] = (float)$_SESSION['result'];
            $_SESSION['result'] = '';}
}

if (!isset($_SESSION['result'])){$_SESSION['result'] = '';}
if (!isset($_SESSION['OP'])) {$_SESSION['OP'] = '';} // Debug
if (!isset($_SESSION['NB'])) {$_SESSION['NB'] = 0.0;} // Debug

if (isset($_POST['btn'])) {$btn = $_POST['btn'];}

if ($btn >=0 && $btn <= 9){
    if($_SESSION['result'] != 'Infinity'){$_SESSION['result'] .= $btn;}   
}
else{
    switch ($btn){
        case 'CL':
            session_unset();
            session_destroy();
            session_start();
            break;
        case '%':
            if($_SESSION['result'] != 'Infinity'){
                if (str_contains($_SESSION['result'], '%') || str_contains($_SESSION['result'], '.')){

                }
                else {$_SESSION['result'] .= '%';}
                break;
            }
        case '/':
            if($_SESSION['result'] != 'Infinity'){
                bouton($btn);
                break;}
        case '*':
            if($_SESSION['result'] != 'Infinity'){
                bouton($btn);
                break;}
        case '-':
            if($_SESSION['result'] != 'Infinity'){
                bouton($btn);
                break;}
        case '+':
            if($_SESSION['result'] != 'Infinity'){
                bouton($btn);
                break;}
        case '.':
            if($_SESSION['result'] != 'Infinity'){
                if (str_contains($_SESSION['result'], '%') || str_contains($_SESSION['result'], '.')){}
                else {$_SESSION['result'] .= '.';}
                break;}
        case '=':
            if($_SESSION['result'] != 'Infinity'){
                operation($_SESSION['OP']);
                break;}
            
    }
}
session_write_close();
header('Location: index.php');
exit();

?>