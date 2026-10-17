# `<iostream>` — Entrées et sorties

À inclure avec `#include <iostream>`.

| Élément | Rôle | Exemple |
|---|---|---|
| `cout` | Affiche du texte ou une valeur. | `cout << age;` |
| `cin` | Lit une valeur saisie ; `>>` s'arrête aux espaces pour une chaîne. | `cin >> age;` |
| `cerr` | Affiche un message d'erreur. | `cerr << "Erreur";` |
| `clog` | Affiche un message de journalisation. | `clog << "Étape 1";` |
| `endl` | Passe à la ligne et vide le tampon de sortie. | `cout << "Salut" << endl;` |
| `flush` | Vide le tampon sans ajouter de nouvelle ligne. | `cout << "Chargement..." << flush;` |
| `ws` | Ignore les espaces blancs au début de la prochaine lecture. | `getline(cin >> ws, nom);` |
| `ignore()` | Ignore des caractères dans le flux d'entrée. | `cin.ignore();` |
| `get()` | Lit un caractère, y compris éventuellement un espace. | `char c = cin.get();` |
| `peek()` | Observe le prochain caractère sans le retirer du flux. | `char c = cin.peek();` |
| `put(c)` | Écrit un caractère. | `cout.put('A');` |
| `getline(cin, s)` | Lit une ligne entière dans une variable `string`. | `getline(cin, nom);` |

**Attention :** après `cin >> age`, le retour à la ligne reste souvent dans le flux. Avant un `getline`, il faut le gérer. Pour ignorer toute la ligne restante, on utilise généralement `cin.ignore(numeric_limits<streamsize>::max(), '\\n')` avec `#include <limits>`.
