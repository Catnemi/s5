# Chaînes de caractères

Chaîne utilisée dans les exemples :

```php
$texte = "PHP est un langage de programmation puissant";
```

| Fonction | À quoi ça sert | Exemple |
|---|---|---|
| `strlen()` | Renvoie la longueur en octets. Avec certains caractères UTF-8, octets et caractères ne correspondent pas toujours. | `strlen("PHP"); // 3` |
| `strtoupper()` | Convertit les lettres en majuscules. | `strtoupper("php"); // PHP` |
| `strtolower()` | Convertit les lettres en minuscules. | `strtolower("PHP"); // php` |
| `str_replace()` | Remplace les occurrences d'un texte par un autre. | `str_replace("puissant", "flexible", $texte);` |
| `substr()` | Extrait une partie de la chaîne ; la position commence à `0`. | `substr("Bonjour", 0, 3); // Bon` |
| `explode()` | Découpe une chaîne en tableau à l'aide d'un séparateur. | `$mots = explode(" ", $texte);` |
| `implode()` | Réunit les éléments d'un tableau en une chaîne. | `implode(", ", ["a", "b"]); // a, b` |
| `strrev()` | Inverse une chaîne octet par octet. | `strrev("abc"); // cba` |
| `trim()` | Supprime les espaces au début et à la fin. | `trim(" bonjour "); // bonjour` |
| `.=` | Ajoute du texte à la fin d'une variable chaîne. | `$acronyme .= "P";` |
| `function` / `return` | Permet de définir une fonction réutilisable et de renvoyer son résultat. | `function salut() { return "Bonjour"; }` |

## Exemple : opérations de base

```php
echo strlen($texte);
echo strtoupper($texte);
echo strtolower($texte);
echo str_replace("puissant", "flexible", $texte);
echo substr($texte, 11, 7); // langage

$mots = explode(" ", $texte);
foreach ($mots as $mot) {
    echo $mot . "<br>";
}

echo strrev($texte);
```

## Exemple : créer un acronyme

```php
function acronyme(string $texte): string {
    $mots = explode(" ", trim($texte));
    $resultat = "";

    foreach ($mots as $mot) {
        if ($mot !== "") {
            $resultat .= strtoupper(substr($mot, 0, 1));
        }
    }

    return $resultat;
}
```

Pour la phrase de l'exercice, cette méthode donne `PEULPP` (première lettre de chaque mot). Si le corrigé attend un autre résultat, vérifie la règle précise utilisée pour l'acronyme.
