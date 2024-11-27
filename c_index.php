<?php

session_start();

function operation($op) {
    switch ($_SESSION['OP']){
        case '/':
            $_SESSION['result'] = (float)$_SESSION['NB'] / (float)$_SESSION['result'];
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
}

if (!isset($_SESSION['result'])){$_SESSION['result'] = '';}
if (!isset($_SESSION['OP'])) {$_SESSION['OP'] = '';} // Debug
if (!isset($_SESSION['NB'])) {$_SESSION['NB'] = 0.0;} // Debug

if (isset($_POST['btn'])) {$btn = $_POST['btn'];}

if ($btn >=0 && $btn <= 9){
    $_SESSION['result'] .= $btn;
}
else{
    switch ($btn){
        case 'CL':
            session_unset();
            session_destroy();
            session_start();
            break;
        case '%':
            if (str_contains($_SESSION['result'], '%') || str_contains($_SESSION['result'], '.')){}
            else {$_SESSION['result'] .= '%';}
            break;
        case '/':
            $_SESSION['OP'] = $btn;
            if (str_contains($_SESSION['result'], '%'))
            {$_SESSION['NB'] = (float)$_SESSION['result'] / 100;}
            else {$_SESSION['NB'] = (float)$_SESSION['result'];}
            $_SESSION['result'] = ''; 
            break;
        case '*':
            $_SESSION['OP'] = $btn;
            if (str_contains($_SESSION['result'], '%'))
            {$_SESSION['NB'] = (float)$_SESSION['result'] / 100;}
            else {$_SESSION['NB'] = (float)$_SESSION['result'];}
            $_SESSION['result'] = ''; 
            break;
        case '-':
            $_SESSION['OP'] = $btn;
            if (str_contains($_SESSION['result'], '%'))
            {$_SESSION['NB'] = (float)$_SESSION['result'] / 100;}
            else {$_SESSION['NB'] = (float)$_SESSION['result'];}
            $_SESSION['result'] = ''; 
            break;
        case '+':
            $_SESSION['OP'] = $btn;
            if (str_contains($_SESSION['result'], '%'))
            {$_SESSION['NB'] = (float)$_SESSION['result'] / 100;}
            else {$_SESSION['NB'] = (float)$_SESSION['result'];}
            $_SESSION['result'] = ''; 
            break;
        case '.':
            if (str_contains($_SESSION['result'], '%') || str_contains($_SESSION['result'], '.')){}
            else {$_SESSION['result'] .= '.';}
            break;
        case '=':
            if (str_contains($_SESSION['result'], '%')){
                $_SESSION['result'] = $_SESSION['result'] / 100;
            }
            
            break;
    }
}
header('Location: index.php');
exit();

?>