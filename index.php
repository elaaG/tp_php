<?php
require_once "Pokemon.php";

$atk1 = new AttackPokemon(10, 100, 2, 20);
$atk2 = new AttackPokemon(10, 30, 2, 20);

$pokemon1 = new PokemonFeu("Dracaufeu Gigamax", "https://img.pokemondb.net/artwork/large/charizard.jpg", 200, $atk1);
$pokemon2 = new PokemonPlante("Dracaufeu Gigamax", "https://img.pokemondb.net/artwork/bulbasaur.jpg", 200, $atk2);

$rounds = [];

while (!$pokemon1->isDead() && !$pokemon2->isDead()) {
    ob_start();
    echo "<div class='round'>";
    echo "<div class='scoreboard'>";
    $score1 = $pokemon1->attack($pokemon2);
    $score2 = $pokemon2->isDead() ? 0 : $pokemon2->attack($pokemon1);
    echo "</div>";
    echo "<div class='result'><span>{$score1}</span> - <span>{$score2}</span></div>";
    echo "<div class='status'>";
    afficherPokemon($pokemon1);
    afficherPokemon($pokemon2);
    echo "</div>";
    echo "</div>";
    $rounds[] = ob_get_clean();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Combat Pokémon</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        .pokemon-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background: white;
            width: 300px;
            margin: 10px;
        }
        .pokemon-card img {
            width: 100px;
        }
        .combat {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .round {
            border: 1px solid #f0a;
            background: #fbe4e4;
            border-radius: 10px;
            margin: 15px 0;
            padding: 10px;
            width: 80%;
        }
        .scoreboard, .status {
            display: flex;
            justify-content: space-around;
        }
        .result {
            text-align: center;
            font-size: 1.5em;
            margin: 10px 0;
        }
        .result span {
            background: white;
            border: 1px solid #999;
            border-radius: 5px;
            padding: 4px 12px;
        }
        .winner {
            background-color: #dff0d8;
            border: 1px solid green;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            font-size: 1.2em;
        }
    </style>
</head>
<body>



<div class="combat">
    <div style="display: flex; justify-content: center; gap: 20px;">
        <?php afficherPokemon($pokemon1); ?>
        <?php afficherPokemon($pokemon2); ?>
    </div>

    <?php foreach ($rounds as $index => $r): ?>
        <div class="round-container">
            <h3>Round <?= $index + 1 ?></h3>
            <?= $r ?>
        </div>
    <?php endforeach; ?>

    <div class="winner">
        Le vainqueur est :
        <strong><?= $pokemon1->isDead() ? $pokemon2->getName() : $pokemon1->getName() ?></strong>
    </div>
</div>

</body>
</html>

<?php
function afficherPokemon($pokemon) {
    echo "<div class='pokemon-card'>";
    echo "<h4>{$pokemon->getName()}</h4>";
    echo "<img src='{$pokemon->getImage()}' alt='Image'>";
    echo "<p>Points : {$pokemon->getHp()}</p>";
    echo "<p>Min Attack Points : {$pokemon->getAttack()->getMin()}</p>";
    echo "<p>Max Attack Points : {$pokemon->getAttack()->getMax()}</p>";
    echo "<p>Special Attack x{$pokemon->getAttack()->getSpecialAttackMultiplier()}</p>";
    echo "<p>Probability Special Attack : {$pokemon->getAttack()->getProbabilitySpecialAttack()}</p>";
    echo "</div>";
}
?>
