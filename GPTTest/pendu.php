<?php
session_start();

// Liste des mots à deviner
$words = ["licorne", "dragon", "fantome", "sorcier", "magie", "chateau"];

// Initialisation du jeu
if (!isset($_SESSION['word'])) {
    $_SESSION['word'] = $words[array_rand($words)];
    $_SESSION['masked_word'] = str_repeat('_', strlen($_SESSION['word']));
    $_SESSION['attempts'] = 0;
    $_SESSION['guessed_letters'] = [];
}

$word = $_SESSION['word'];
$masked_word = $_SESSION['masked_word'];
$attempts = $_SESSION['attempts'];
$guessed_letters = $_SESSION['guessed_letters'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['letter'])) {
    $letter = strtolower($_POST['letter']);
    
    if (!in_array($letter, $guessed_letters)) {
        $_SESSION['guessed_letters'][] = $letter;
        
        if (strpos($word, $letter) !== false) {
            for ($i = 0; $i < strlen($word); $i++) {
                if ($word[$i] === $letter) {
                    $_SESSION['masked_word'][$i] = $letter;
                }
            }
        } else {
            $_SESSION['attempts']++;
        }
    }
}

$masked_word = $_SESSION['masked_word'];
$attempts = $_SESSION['attempts'];

$game_over = $attempts >= 3 || $masked_word === $word;
$win = $masked_word === $word;

if ($game_over) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Pendu Fantaisiste</title>
    <style>
        body { text-align: center; font-family: 'Comic Sans MS', cursive; background-color: #f0e6f6; }
        .game-container { border: 5px dashed purple; display: inline-block; padding: 20px; border-radius: 10px; background: white; }
        .masked-word { font-size: 2em; letter-spacing: 5px; }
        .rules { font-size: 1.2em; margin-top: 10px; color: darkmagenta; }
        .btn { padding: 10px; background: purple; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Le Pendu Fantaisiste</h1>
    <div class="game-container">
        <?php if (!$game_over) : ?>
            <p class="masked-word"> <?= implode(' ', str_split($masked_word)) ?> </p>
            <form method="post">
                <input type="text" name="letter" maxlength="1" required>
                <button type="submit" class="btn">Deviner</button>
            </form>
            <p>Erreurs : <?= $attempts ?> / 3</p>
        <?php else : ?>
            <p><?= $win ? 'Bravo ! Vous avez trouvé le mot !' : 'Dommage, le mot était : ' . $word ?></p>
            <a href="" class="btn">Rejouer</a>
        <?php endif; ?>
    </div>
    <p class="rules">Trouvez le mot mystère avant d’atteindre 3 erreurs !</p>
</body>
</html>
