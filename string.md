# `<string>` — Chaînes de caractères

À inclure avec `#include <string>`. Exemple de déclaration : `string nom;`.

| Méthode / opération | Rôle | Exemple |
|---|---|---|
| `length()` / `size()` | Renvoie le nombre de caractères. | `nom.length()` |
| `empty()` | Renvoie `true` si la chaîne est vide. | `nom.empty()` |
| `clear()` | Vide la chaîne. | `nom.clear();` |
| `at(i)` | Accède au caractère `i` avec vérification des limites. | `nom.at(0)` |
| `[i]` | Accède au caractère `i` sans vérification des limites. | `nom[0]` |
| `front()` / `back()` | Accède au premier / dernier caractère. | `nom.front()` |
| `append(s)` | Ajoute une chaîne à la fin. | `nom.append(" Ali");` |
| `push_back(c)` | Ajoute un caractère à la fin. | `nom.push_back('!');` |
| `pop_back()` | Supprime le dernier caractère. | `nom.pop_back();` |
| `insert(pos, s)` | Insère du texte à une position. | `nom.insert(0, "M. ");` |
| `erase(pos, n)` | Supprime `n` caractères à partir de `pos`. | `nom.erase(0, 3);` |
| `replace(pos, n, s)` | Remplace une partie de la chaîne. | `nom.replace(0, 3, "Mme");` |
| `find(s)` | Cherche une sous-chaîne ; renvoie `string::npos` si elle n'existe pas. | `nom.find("Ali")` |
| `substr(pos, n)` | Extrait une sous-chaîne. | `nom.substr(0, 3)` |
| `compare(s)` | Compare deux chaînes. | `nom.compare("Ali")` |
| `c_str()` | Donne une représentation C terminée par `\\0`. | `nom.c_str()` |
| `+` / `+=` | Concatène des chaînes. | `nom += " Ben";` |
| `==` / `!=` | Compare l'égalité / l'inégalité. | `nom == "Ali"` |

**Indices :** le premier caractère est à l'indice `0`. Vérifier qu'une chaîne n'est pas vide avant d'utiliser `front()`, `back()` ou `[0]` si nécessaire.
