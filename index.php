<?php
session_start();

// Initialisation de la session si vide
if (!isset($_SESSION['result'])) {
    $_SESSION['result'] = ''; // Initialisation à '0' ou vide
}
if (!isset($_SESSION['OP'])) {
    $_SESSION['OP'] = ''; // Initialisation de OP à une chaîne vide
}
if (!isset($_SESSION['NB'])) {
    $_SESSION['NB'] = 0.0; // Initialisation de NB à 0
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="debug-container">
        <p>$result:<?php var_dump($_SESSION['result']); ?></p>
        <p>$op:<?php var_dump($_SESSION['OP']); ?></p>
        <p>$nb:<?php var_dump($_SESSION['NB']); ?></p>
    </div>
<div class="calculator-container">
    <!-- Affichage -->
    <input class="calculator-display" type="text" name="display" value="<?php echo $_SESSION['result']; ?>" readonly>

    <!-- Boutons -->
    <form action="c_index.php" method="POST" class="calculator-buttons">
        <button type="submit" name="btn" value="CL" class="calculator-button cl">CL</button>
        <button type="submit" name="btn" value="%" class="calculator-button operation">%</button>
        <button type="submit" name="btn" value="/" class="calculator-button operation">/</button>
        <button type="submit" name="btn" value="*" class="calculator-button operation">x</button>
        <button type="submit" name="btn" value="7" class="calculator-button">7</button>
        <button type="submit" name="btn" value="8" class="calculator-button">8</button>
        <button type="submit" name="btn" value="9" class="calculator-button">9</button>
        <button type="submit" name="btn" value="-" class="calculator-button operation">-</button>
        <button type="submit" name="btn" value="4" class="calculator-button">4</button>
        <button type="submit" name="btn" value="5" class="calculator-button">5</button>
        <button type="submit" name="btn" value="6" class="calculator-button">6</button>
        <button type="submit" name="btn" value="+" class="calculator-button operation">+</button>
        <button type="submit" name="btn" value="1" class="calculator-button">1</button>
        <button type="submit" name="btn" value="2" class="calculator-button">2</button>
        <button type="submit" name="btn" value="3" class="calculator-button">3</button>
        <button type="submit" name="btn" value="." class="calculator-button operation">.</button>
        <button type="submit" name="btn" value="0" class="calculator-button">0</button>
        <button type="submit" name="btn" value="=" class="calculator-button equal">=</button>
    </form>
</div>






</body>
</html>
