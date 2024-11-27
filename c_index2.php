<?php
session_start();


if (!isset($_SESSION['result'])) {
    $_SESSION['result'] = ''; 
}
// Debug
if (!isset($_SESSION['OP'])) {
    $_SESSION['OP'] = ''; 
}
if (!isset($_SESSION['NB'])) {
    (float)$_SESSION['NB'] = 0; 
} // Debug

if (isset($_POST['btn'])) {
    $btn = $_POST['btn']; 

    if ($btn >= 0 && $btn <= 9) { 
        $_SESSION['result'] .= $btn; 
    }

    elseif ($btn == "CL") {
        $_SESSION['result'] = ''; 
        $_SESSION['OP'] = ''; //DEBUG
        $_SESSION['NB'] = 0; //DEBUG
    }
    else {

        switch ($btn){
            case '/' : 
            case '*' : 
            case '-' : 
            case '+' : 
                if ($_SESSION['NB'] == 0) 
                {
                    $_SESSION['OP'] = $btn;
                    $_SESSION['NB'] = (float)$_SESSION['result']; 
                    $_SESSION['result'] = ''; 
                } 
                else 
                {

                    switch ($_SESSION['OP']){
                        case '/':
                            $_SESSION['result'] = $_SESSION['NB'] / (float)$_SESSION['result'];
                            break;
                        case '*':
                            $_SESSION['result'] = $_SESSION['NB'] * (float)$_SESSION['result'];
                            break;
                        case '-':
                            $_SESSION['result'] = $_SESSION['NB'] - (float)$_SESSION['result'];
                            break;
                        case '+':
                            $_SESSION['result'] = $_SESSION['NB'] + (float)$_SESSION['result'];
                            break;
                    }

                    $_SESSION['NB'] = 0;
                    $_SESSION['OP'] = '';
                }
                break;
            case '=' : 

                if ($_SESSION['NB'] != 0) {
                    switch ($_SESSION['OP']){
                        case '/':
                            $_SESSION['result'] = $_SESSION['NB'] / (float)$_SESSION['result'];
                            break;
                        case '*':
                            $_SESSION['result'] = $_SESSION['NB'] * (float)$_SESSION['result'];
                            break;
                        case '-':
                            $_SESSION['result'] = $_SESSION['NB'] - (float)$_SESSION['result'];
                            break;
                        case '+':
                            $_SESSION['result'] = $_SESSION['NB'] + (float)$_SESSION['result'];
                            break;
                    }

                    $_SESSION['NB'] = 0; //DEBUG
                    $_SESSION['OP'] = ''; //DEBUG
                }
                break;
            case '.':
                (float)$_SESSION['result'] .=',';
                break;
        }
    }
}


header('Location: index.php');
exit();
?>
