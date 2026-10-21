# Affichage, débogage et types

| Instruction / fonction | À quoi ça sert | Exemple |
|---|---|---|
| `echo` | Affiche du texte, une valeur ou du HTML. | `echo "Bonjour";` |
| `print` | Affiche une chaîne et renvoie `1`. | `print "Bonjour";` |
| `printf()` | Affiche du texte formaté. `%s` = chaîne, `%d` = entier, `%f` = décimal. | `printf("%s %d", "Ali", 19);` |
| `var_dump()` | Affiche la valeur, son type et sa structure ; utile pour déboguer. | `var_dump("5");` |
| `gettype()` | Renvoie le nom du type d'une valeur. | `gettype(3); // integer` |
| `is_string()` | Vérifie si une valeur est une chaîne ; renvoie `true` ou `false`. | `is_string("5"); // true` |
| `phpversion()` | Renvoie la version de PHP exécutée. | `echo phpversion();` |
| `.` | Concatène deux chaînes. | `echo "PHP" . " utile";` |
| `;` | Termine une instruction PHP. | `$age = 19;` |
| `$variable` | Syntaxe d'une variable PHP. Les noms de variables sont sensibles à la casse. | `$nom = "Taha";` |
| `//` | Commentaire sur une ligne. | `// commentaire` |
| `/* ... */` | Commentaire sur plusieurs lignes. | `/* explication */` |
| `<?php ... ?>` | Délimite le code PHP. Dans un fichier purement PHP, on omet souvent `?>` à la fin. | `<?php echo "Salut";` |
| HTML `<br>` | Saut de ligne dans la page web. Dans le code PHP, l'écrire entre guillemets avec `echo`. | `echo "<br>";` |

## Exemple : types et formatage

```php
$x = "5";
echo gettype($x); // string
var_dump(is_string($x)); // bool(true)
printf("Âge : %d", 19);
```

## Erreurs fréquentes

- `echo` doit être utilisé pour afficher une balise HTML depuis le code PHP : `echo "<br>";`.
- `$var2` et `$Var2` sont deux variables différentes.
- Chaque instruction PHP doit généralement se terminer par `;`.
- Dans `printf`, les marqueurs `%s`, `%d`, `%f` doivent être dans la chaîne formatée.

---

# Tableaux

PHP propose plusieurs sortes de tableaux. Les tableaux indexés utilisent des positions numériques ; les tableaux associatifs utilisent des clés nommées.

| Instruction / fonction | À quoi ça sert | Exemple |
|---|---|---|
| `array(...)` | Crée un tableau. La syntaxe courte `[...]` fait la même chose. | `$notes = array("do", "ré", "mi");` |
| `[]` | Ajoute un élément à la prochaine position numérique disponible. | `$notes[] = "fa";` |
| `$tab[$i]` | Accède à un élément par index ; le premier index est généralement `0`. | `echo $notes[0];` |
| `$tab["clé"]` | Accède à une valeur via une clé associative. | `echo $freq["do"];` |
| `=>` | Associe une clé à une valeur dans la déclaration d'un tableau. | `$freq = ["do" => "1", "ré" => "9/8"];` |
| `foreach` | Parcourt les éléments d'un tableau sans gérer soi-même un compteur. | `foreach ($notes as $note) { echo $note; }` |
| `for` | Parcourt un tableau à l'aide d'un compteur/index. | `for ($i = 0; $i < count($notes); $i++) { echo $notes[$i]; }` |
| `count()` | Renvoie le nombre d'éléments. | `count($notes);` |
| `implode()` | Assemble les valeurs d'un tableau en une chaîne avec un séparateur. | `echo implode("<br>", $notes);` |
| `var_dump()` | Affiche la structure complète du tableau. | `var_dump($notes);` |
| `array_sum()` | Additionne les valeurs numériques d'un tableau. | `$total = array_sum([10, 20, 30]);` |

## Exemples de tableaux

```php
$t = ["a", "b"];
$t[] = "c";
foreach ($t as $v) echo $v;
echo count($t); // 3
```

```php
$notes = [["Ali", 15], ["Sara", 18]];
echo $notes[0][1]; // 15
```

```php
$ages = ["Ali" => 19, "Sara" => 20];
foreach ($ages as $nom => $age) echo "$nom : $age ";
```

> Une clé associative ne peut avoir qu'une seule valeur à la fois : si la même clé est répétée, sa nouvelle valeur remplace l'ancienne.

---

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
echo strlen("PHP"); // 3
echo strtoupper("php"); // PHP
echo substr("Bonjour", 0, 3); // Bon
print_r(explode(" ", "Salut toi"));
```

## Exemple : créer un acronyme

```php
function acronyme($s) {
    $r = "";
    foreach (explode(" ", $s) as $mot)
        $r .= strtoupper($mot[0]);
    return $r;
}
echo acronyme("Hyper Text Markup Language"); // HTML
```

---

# Expressions régulières

Les expressions régulières décrivent un motif. En PHP, les fonctions PCRE les utilisent généralement entre délimiteurs `/.../`.

| Fonction / symbole | À quoi ça sert | Exemple |
|---|---|---|
| `preg_match()` | Vérifie si un texte correspond à un motif. Renvoie `1`, `0` ou `false` en cas d'erreur. | `preg_match('/^\\d+$/', "123");` |
| `preg_replace()` | Remplace les parties qui correspondent au motif. | `preg_replace('/[^0-9]/', '', $phone);` |
| `preg_split()` | Découpe une chaîne à chaque correspondance du motif. | `preg_split('/[.!?\\s,]+/', $texte);` |
| `^` / `$` | Début / fin de chaîne. | `/^06/`, `/\\d{10}$/` |
| `\\d` | Un chiffre. | `/\\d+/` |
| `{10}` | Répète exactement dix fois l'élément précédent. | `/^\\d{10}$/` |
| `[abc]` | Un caractère parmi ceux listés. | `/[abc]/` |
| `[^0-9]` | Un caractère qui n'est pas un chiffre. | `/[^0-9]/` |
| `?` | Rend l'élément précédent facultatif. | `/colou?r/` |
| `+` / `*` | Une ou plusieurs répétitions / zéro ou plusieurs répétitions. | `/\\d+/`, `/\\s*/` |
| `(...)` | Regroupe des éléments et peut capturer une partie du texte. | `/(\\d{4})-(\\d{2})-(\\d{2})/` |
| `\\s` | Un espace blanc. | `/\\s+/` |
| `i` | Ignore la différence entre majuscules et minuscules. | `/^[a-z]+$/i` |

## Exemples

```php
preg_match('/^\\d{3}$/', "123"); // 1 : correspond
preg_replace('/\\D/', '', "06-12"); // 0612
preg_split('/[, ]+/', "a, b c"); // ["a", "b", "c"]
```

> `preg_match()` vérifie, `preg_replace()` remplace et `preg_split()` découpe. Une validation du format ne garantit pas toujours que la valeur est réellement valide.

---

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

## Exemple court : plusieurs fichiers

`index.php`
```php
require_once 'fonctions.php';
echo doubler(4); // 8
```

`fonctions.php`
```php
<?php
function doubler(int $x): int {
    return $x * 2;
}
```

---

# Passage par valeur et par référence

Par défaut, PHP transmet les arguments **par valeur** : la fonction reçoit une copie. Avec `&`, elle peut modifier la variable d'origine.

| Type | Exemple | Résultat |
|---|---|---|
| Par valeur | `function f($x) { $x++; }` | La variable d'origine ne change pas. |
| Par référence | `function f(&$x) { $x++; }` | La variable d'origine augmente de 1. |

```php
function valeur($x) { $x++; }
function reference(&$x) { $x++; }
$a = 2;
valeur($a);    // $a vaut toujours 2
reference($a); // $a vaut 3
```

`&` se place devant le paramètre dans la déclaration de la fonction.

# Fonctions anonymes

Une fonction anonyme n'a pas de nom ; on peut la stocker dans une variable ou la transmettre à une autre fonction.

```php
$double = function($x) { return $x * 2; };
echo $double(3); // 6
```

Pour utiliser une variable extérieure, une fonction anonyme peut la capturer avec `use` :

```php
$taux = 2;
$f = function($x) use ($taux) { return $x * $taux; };
echo $f(3); // 6
```

# Fonctions fléchées

`fn` est une écriture courte d'une fonction anonyme. Elle contient une seule expression et capture automatiquement les variables extérieures par valeur.

```php
$double = fn($x) => $x * 2;
echo $double(3); // 6

$taux = 2;
$f = fn($x) => $x * $taux;
echo $f(3); // 6
```

**À retenir :**
- `function (...) { return ...; }` : fonction classique ou anonyme.
- `fn (...) => expression` : fonction fléchée, expression unique.
- `&$x` : passage par référence ; sans `&`, passage par valeur.
