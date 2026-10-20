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

## Tableau indexé

```php
$notes = array("do", "ré", "mi");
$notes[] = "fa";
$notes[] = "sol";

foreach ($notes as $note) {
    echo $note . "<br>";
}

echo implode("<br>", $notes);
```

## Tableau multidimensionnel

```php
$notesFreq = [
    ["do", "1"],
    ["ré", "9/8"],
    ["mi", "5/4"]
];

for ($i = 0; $i < count($notesFreq); $i++) {
    echo $notesFreq[$i][0] . " = " . $notesFreq[$i][1] . "<br>";
}
```

`$notesFreq[$i][0]` est la note ; `$notesFreq[$i][1]` est son rapport.

## Tableau associatif

```php
$notesFreqAssoc = [
    "do" => "1",
    "ré" => "1", // exemple de clé et valeur
    "mi" => "5/4"
];

foreach ($notesFreqAssoc as $note => $rapport) {
    echo $note . " = " . $rapport . "<br>";
}
```

> Une clé associative ne peut avoir qu'une seule valeur à la fois : si la même clé est répétée, sa nouvelle valeur remplace l'ancienne.
