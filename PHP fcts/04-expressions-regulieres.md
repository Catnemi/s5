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

## Valider un format

```php
$email = "test@example.com";
$valideEmail = preg_match('/^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/', $email);

$phone = "06-12-34-56-78";
$validePhone = preg_match('/^0[5-7](?:[ .-]?\\d{2}){4}$/', $phone);

$date = "15/07/2025";
$valideDate = preg_match('/^\\d{2}\\/\\d{2}\\/\\d{4}$/', $date);
```

Ces motifs vérifient surtout la forme. Pour vérifier qu'une date existe vraiment, utiliser également `checkdate()`.

## Remplacer et découper

```php
$phone = "+212 (0)6-12.34 56 78";
$phone = preg_replace('/^\\+212\\s*\\(0\\)/', '0', $phone);
$phone = preg_replace('/\\D/', '', $phone); // 0612345678

$date = "2025-07-15";
$dateFormatee = preg_replace(
    '/^(\\d{4})-(\\d{2})-(\\d{2})$/',
    '$3/$2/$1',
    $date
); // 15/07/2025

$texte = "Bonjour! Comment allez-vous aujourd'hui?";
$mots = preg_split('/[^\\p{L}]+/u', $texte, -1, PREG_SPLIT_NO_EMPTY);

$ip = "192.168.1.1";
$partiesIP = preg_split('/\\./', $ip);
```

> `preg_match()` vérifie, `preg_replace()` remplace et `preg_split()` découpe. Une validation du format ne garantit pas toujours que la valeur est réellement valide.
