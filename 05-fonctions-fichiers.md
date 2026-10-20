# Fonctions, constantes et organisation des fichiers

PHP n'utilise pas des `#include` comme C++. La plupart des fonctions PHP courantes sont directement disponibles ; pour ton propre code réparti entre plusieurs fichiers, on utilise `include` ou `require`.

## Déclarer et appeler des fonctions

| Instruction / fonction | À quoi ça sert | Exemple |
|---|---|---|
| `function` | Déclare une fonction réutilisable. | `function doubler($x) { return $x * 2; }` |
| Paramètres | Valeurs reçues par la fonction. | `function convertir(array $montants, float $taux)` |
| `return` | Renvoie un résultat à l'appelant et termine la fonction. | `return $montant * $taux;` |
| `: array` | Indique que la fonction doit renvoyer un tableau. | `function convertir(...): array` |
| `: string` | Indique que la fonction doit renvoyer une chaîne. | `function total(...): string` |
| `: void` | Indique que la fonction ne renvoie pas de valeur. | `function afficher(): void` |
| `array` / `float` | Types attendus pour les paramètres. | `function convertir(array $m, float $t): array` |
| `const` | Déclare une constante. | `const TAUX_EURO = 0.091;` |

## Inclure d'autres fichiers

| Instruction | À quoi ça sert | Exemple |
|---|---|---|
| `include` | Insère le contenu d'un fichier ; si le fichier manque, un avertissement est émis mais le script peut continuer. | `include 'conversion.php';` |
| `require` | Comme `include`, mais une erreur empêche le script de continuer si le fichier manque. | `require 'conversion.php';` |
| `require_once` | Comme `require`, mais inclut le fichier au maximum une fois. Pratique pour éviter les déclarations répétées. | `require_once 'conversion.php';` |

## Calculs et affichage numérique

| Fonction / opérateur | À quoi ça sert | Exemple |
|---|---|---|
| `*` | Multiplie deux valeurs. | `$euros = $mad * $taux;` |
| `foreach` | Parcourt les montants à convertir. | `foreach ($montants as $m) { ... }` |
| `array_sum()` | Additionne les valeurs d'un tableau. | `$somme = array_sum($euros);` |
| `number_format()` | Formate un nombre avec des décimales et séparateurs choisis. | `number_format($somme, 2, ',', ' ');` |
| `for` | Parcourt des tableaux avec un index. | `for ($i = 0; $i < count($mad); $i++) { ... }` |
| `echo` | Affiche du texte ou du HTML. | `echo "<table>";` |
| `htmlspecialchars()` | Protège l'affichage de texte dynamique dans le HTML. | `htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');` |

## Exemple de projet réparti sur quatre fichiers

### `index.php`

```php
<?php
require_once 'conversion.php';
require_once 'somme.php';
require_once 'affichage.php';

const TAUX_EURO = 0.091;

$montantsDirham = [100, 250, 50, 300];
$montantsEuro = convertir($montantsDirham, TAUX_EURO);
$totalEuro = calculerSomme($montantsEuro);

afficherTableau($montantsDirham, $montantsEuro);
echo "<p>Total EUR : " . $totalEuro . "</p>";
```

### `conversion.php`

```php
<?php
function convertir(array $montants, float $taux): array {
    $resultats = [];

    foreach ($montants as $montant) {
        $resultats[] = $montant * $taux;
    }

    return $resultats;
}
```

### `somme.php`

```php
<?php
function calculerSomme(array $montantsEuro): string {
    $somme = array_sum($montantsEuro);
    return number_format($somme, 2, ',', ' ');
}
```

### `affichage.php`

```php
<?php
function afficherTableau(array $montantsDirham, array $montantsEuro): void {
    echo "<table border='1'>";
    echo "<tr><th>N°</th><th>Montant (MAD)</th><th>Montant (EUR)</th></tr>";

    for ($i = 0; $i < count($montantsDirham); $i++) {
        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>";
        echo "<td>" . number_format($montantsDirham[$i], 2, ',', ' ') . "</td>";
        echo "<td>" . number_format($montantsEuro[$i], 2, ',', ' ') . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
```

> L'énoncé impose le taux `0.091`. C'est une approximation de `1 / 11` ; garde la valeur du professeur si c'est celle qui est demandée.
