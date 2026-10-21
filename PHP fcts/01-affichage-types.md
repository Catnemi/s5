# Affichage, débogage et types

| Instruction / fonction | À quoi ça sert | Exemple |
|---|---|---|
| `echo` | Affiche du texte, une valeur ou du HTML. | `echo "Bonjour";` |
| `print` | Affiche une chaîne et renvoie `1`. | `print "Bonjour";` |
| `printf()` | Affiche du texte formaté. `%s` = chaîne, `%d` = entier, `%f` = décimal. | `printf("Nom : %s, âge : %d", "Ali", 19);` |
| `var_dump()` | Affiche la valeur, son type et sa structure ; utile pour déboguer. | `var_dump("5");` |
| `gettype()` | Renvoie le nom du type d'une valeur. | `gettype(3); // integer` |
| `is_string()` | Vérifie si une valeur est une chaîne ; renvoie `true` ou `false`. | `is_string("5"); // true` |
| `phpversion()` | Renvoie la version de PHP exécutée. | `echo phpversion();` |
| `.` | Concatène deux chaînes. | `echo "PHP " . "est utile";` |
| `;` | Termine une instruction PHP. | `$age = 19;` |
| `$variable` | Syntaxe d'une variable PHP. Les noms de variables sont sensibles à la casse. | `$nom = "Taha";` |
| `//` | Commentaire sur une ligne. | `// commentaire` |
| `/* ... */` | Commentaire sur plusieurs lignes. | `/* explication */` |
| `<?php ... ?>` | Délimite le code PHP. Dans un fichier purement PHP, on omet souvent `?>` à la fin. | `<?php echo "Salut";` |
| HTML `<br>` | Saut de ligne dans la page web. Dans le code PHP, l'écrire entre guillemets avec `echo`. | `echo "<br>";` |

## Exemple : types et formatage

```php
$var = "5";
echo gettype($var);       // string
var_dump(is_string($var)); // bool(true)

$var = 3;
printf("Type : %s, double : %d<br>", gettype($var), $var * 2);
```

## Erreurs fréquentes

- `echo` doit être utilisé pour afficher une balise HTML depuis le code PHP : `echo "<br>";`.
- `$var2` et `$Var2` sont deux variables différentes.
- Chaque instruction PHP doit généralement se terminer par `;`.
- Dans `printf`, les marqueurs `%s`, `%d`, `%f` doivent être dans la chaîne formatée.
