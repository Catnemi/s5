# `<iomanip>` — Formatage

À inclure avec `#include <iomanip>`. Ces manipulateurs formattent l'affichage ; ils ne changent pas la valeur stockée.

| Manipulateur | Rôle | Exemple |
|---|---|---|
| `fixed` | Affiche un nombre en notation décimale fixe. | `cout << fixed << 12.345;` |
| `setprecision(n)` | Avec `fixed`, fixe le nombre de chiffres après la virgule ; sans `fixed`, règle généralement les chiffres significatifs. | `cout << fixed << setprecision(2) << prix;` |
| `scientific` | Affiche en notation scientifique. | `cout << scientific << x;` |
| `defaultfloat` | Revient au format flottant par défaut. | `cout << defaultfloat << x;` |
| `setw(n)` | Définit la largeur minimale du prochain champ seulement. | `cout << setw(10) << nom;` |
| `setfill(c)` | Définit le caractère de remplissage utilisé notamment avec `setw`. | `cout << setfill('*') << setw(8) << 42;` |
| `left` / `right` | Aligne à gauche / à droite dans le champ. | `cout << left << setw(10) << nom;` |
| `internal` | Place le remplissage entre le signe et la valeur numérique. | `cout << internal << setw(8) << -42;` |
| `setbase(n)` | Demande une base d'affichage, notamment 8, 10 ou 16. | `cout << setbase(16) << 255;` |
| `showpoint` / `noshowpoint` | Force / ne force pas l'affichage du point décimal. | `cout << showpoint << 2.0;` |
| `showpos` / `noshowpos` | Affiche / masque le signe `+` des nombres positifs. | `cout << showpos << 5;` |
| `uppercase` / `nouppercase` | Utilise / n'utilise pas les majuscules dans certains formats. | `cout << uppercase << scientific << x;` |
| `setiosflags(f)` | Active des indicateurs de formatage. | Usage avancé. |
| `resetiosflags(f)` | Désactive des indicateurs de formatage. | Usage avancé. |

**À retenir :** `setfill('*')` est un manipulateur de `<iomanip>`. `cout.fill('*')` est une méthode de flux qui règle le même caractère de remplissage. Aucun des deux ne dépose de l'argent : un dépôt est une opération arithmétique, par exemple `solde += montant;`.
