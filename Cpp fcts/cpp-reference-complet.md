# Référence C++ — cours et exercices

Documentation concise regroupant les notions du cours et les fonctions des exercices, classées par grands titres dans un seul fichier.

## Sommaire

- [Bases du C++](#bases-du-c--chapitre-1)
- [Entrées et sorties — `<iostream>`](#iostream--entrées-et-sorties)
- [Chaînes — `<string>`](#string--chaînes-de-caractères)
- [Caractères — `<cctype>`](#cctype--tester-et-convertir-des-caractères)
- [Formatage — `<iomanip>`](#iomanip--formatage)
- [Nombres pseudo-aléatoires — `<cstdlib>` et `<ctime>`](#cstdlib-et-ctime--nombres-pseudo-aléatoires)
- [Vecteurs — `<vector>`](#vector--tableaux-dynamiques)
- [Algorithmes — `<algorithm>`](#algorithm--recherche-et-tri)
- [Listes — `<list>`](#list--listes-doublement-chaînées)
- [Itérateurs, références et saisie de chaînes](#itérateurs-références-et-saisie-de-chaînes)
- [Conditions et boucles](#conditions-boucles-et-instructions)
- [Références et mémoire dynamique](#références-et-mémoire-dynamique)
- [Classes et objets](#poo--classes-et-objets)
- [Fichiers — `<fstream>`](#fstream--fichiers)

---

## Bases du C++ — chapitre 1

## Compilation et exécution

1. **Édition** : écrire le code dans un fichier `.cpp`.
2. **Compilation** : vérifie le code et produit généralement un fichier objet.
3. **Édition de liens (linker)** : assemble le fichier objet et les bibliothèques nécessaires.
4. **Exécution** : le système charge le programme et le processeur exécute les instructions.

## Espaces de noms

| Élément | Rôle | Exemple |
|---|---|---|
| `std::` | Désigne un élément de la bibliothèque standard. | `std::cout << "Salut";` |
| `namespace` | Regroupe des éléments sous un nom et évite les conflits de noms. | `namespace Calcul { ... }` |
| `using namespace std;` | Permet d'utiliser les noms de `std` sans écrire `std::` à chaque fois. | `cout << "Salut";` |
| `using std::cout;` | Importe un seul nom dans la portée courante. | `using std::cout;` |
| `::` | Opérateur de résolution de portée. | `Calcul::afficher();` |

Pour des programmes plus grands, préférer des `std::` explicites ou importer seulement les noms nécessaires.

## Types prédéfinis

| Type | Rôle | Exemple |
|---|---|---|
| `int` | Entier. | `int age = 19;` |
| `short`, `long`, `long long` | Autres types entiers, de capacité variable selon l'implémentation. | `long population = 100000;` |
| `unsigned` | Variante entière sans valeurs négatives. | `unsigned int n = 10;` |
| `float` | Réel en simple précision. | `float prix = 12.5f;` |
| `double` | Réel en double précision, souvent préféré pour les calculs courants. | `double moyenne = 14.5;` |
| `char` | Un caractère ou une petite valeur entière. | `char lettre = 'A';` |
| `bool` | Valeur logique `true` ou `false`. | `bool valide = true;` |
| `string` | Chaîne de caractères, avec `#include <string>`. | `string nom = "Ahmed";` |

**À retenir :** `'A'` est un caractère ; `"A"` est une chaîne. La taille exacte de certains types dépend de l'implémentation : les tailles souvent enseignées (par exemple `int` 4 octets) sont courantes, mais pas universelles.

## Variables : caractéristiques

Une variable possède un **nom**, un **type**, une **valeur**, une **portée** (où elle est accessible) et une **durée de vie** (combien de temps elle existe). Son adresse correspond à son emplacement mémoire.

## Mémoire — modèle simplifié

| Zone | Rôle courant |
|---|---|
| Pile (*stack*) | Variables locales automatiques et informations d'appels de fonctions. |
| Zone statique | Variables globales et variables `static`, disponibles pendant l'exécution du programme. |
| Tas (*heap*) | Mémoire demandée dynamiquement, par exemple avec `new`, puis libérée avec `delete`. |

Ce modèle est simplifié : les détails dépendent du compilateur et de l'architecture. La mémoire dynamique est résumée dans la section « Références et mémoire dynamique » plus bas.

## Opérateurs

| Famille | Opérateurs | Exemple |
|---|---|---|
| Arithmétiques | `+ - * / %` | `reste = a % 2;` |
| Comparaison | `== != < > <= >=` | `a >= b` |
| Logiques | `&& || !` | `age >= 18 && valide` |
| Affectation composée | `+= -= *= /=` | `total += prix;` |
| Incrémentation / décrémentation | `++ --` | `i++;` |
| Conditionnel | `? :` | `max = (a > b) ? a : b;` |

- `&&` : toutes les conditions doivent être vraies.
- `||` : au moins une condition doit être vraie.
- `!` : inverse une valeur logique.
- `%` donne le reste d'une division entière.
- `=` affecte une valeur ; `==` compare deux valeurs.

## Exemple minimal

```cpp
#include <iostream>
using namespace std;

int main() {
    int age;
    cout << "Quel âge as-tu ? ";
    cin >> age;
    cout << "Âge saisi : " << age << endl;
    return 0;
}
```

`#include <iostream>` donne accès aux flux d'entrée/sortie ; `main()` est le point d'entrée du programme ; `return 0;` indique normalement une fin réussie.


---

## `<iostream>` — Entrées et sorties

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


## Syntaxe et espace de noms

Les éléments de la bibliothèque standard appartiennent généralement à `std`. On peut donc écrire `std::cout` et `std::cin`, ou ajouter `using namespace std;` dans les petits exercices. `#include <iostream>` est la directive qui rend disponibles ces flux ; elle n'est pas une instruction d'affichage en elle-même.

```cpp
#include <iostream>
using namespace std;

int main() {
    int age;
    cin >> age;
    cout << "Âge : " << age << endl;
    return 0;
}
```


---

## `<string>` — Chaînes de caractères

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


---

## `<cctype>` — Tester et convertir des caractères

À inclure avec `#include <cctype>`.

| Fonction | Rôle | Exemple |
|---|---|---|
| `isupper(c)` | Vérifie si `c` est une majuscule. | `isupper(c)` |
| `islower(c)` | Vérifie si `c` est une minuscule. | `islower(c)` |
| `isdigit(c)` | Vérifie si `c` est un chiffre décimal. | `isdigit(c)` |
| `isalpha(c)` | Vérifie si `c` est une lettre. | `isalpha(c)` |
| `isalnum(c)` | Vérifie si `c` est une lettre ou un chiffre. | `isalnum(c)` |
| `isspace(c)` | Vérifie si `c` est un espace blanc, comme une espace ou une tabulation. | `isspace(c)` |
| `ispunct(c)` | Vérifie si `c` est un signe de ponctuation. | `ispunct(c)` |
| `isprint(c)` | Vérifie si le caractère est imprimable, espace compris. | `isprint(c)` |
| `isgraph(c)` | Vérifie si le caractère est imprimable et n'est pas un espace. | `isgraph(c)` |
| `iscntrl(c)` | Vérifie si c'est un caractère de contrôle. | `iscntrl(c)` |
| `isxdigit(c)` | Vérifie si le caractère est hexadécimal. | `isxdigit(c)` |
| `tolower(c)` | Convertit en minuscule si possible. | `tolower(c)` |
| `toupper(c)` | Convertit en majuscule si possible. | `toupper(c)` |

Utile pour valider un mot de passe, compter les chiffres ou vérifier la présence de majuscules. Pour des caractères potentiellement négatifs, convertir en `unsigned char` avant l'appel.


---

## `<iomanip>` — Formatage

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


---

## `<cstdlib>` et `<ctime>` — Nombres pseudo-aléatoires

## `<cstdlib>`

| Fonction | Rôle | Exemple |
|---|---|---|
| `rand()` | Produit un entier pseudo-aléatoire entre `0` et `RAND_MAX`. | `rand()` |
| `srand(seed)` | Initialise le générateur ; généralement appelé une seule fois. | `srand(time(0));` |
| `abs(n)` | Renvoie la valeur absolue d'un entier. | `abs(-7)` |

## `<ctime>`

| Fonction | Rôle | Exemple |
|---|---|---|
| `time(0)` | Renvoie le temps courant sous forme numérique, souvent utilisé comme graine. | `srand(time(0));` |

Pour obtenir un entier de 1 à 10 dans un exercice simple : `rand() % 10 + 1`. Pour des besoins plus sérieux, préférer les outils modernes de `<random>`.


---

## `<vector>` — Tableaux dynamiques

À inclure avec `#include <vector>`. Un `vector` stocke une série d'éléments et peut grandir ou rétrécir.

| Fonction / opération | Rôle | Exemple |
|---|---|---|
| `vector<T>` | Déclare un vecteur d'éléments de type `T`. | `vector<int> notes;` |
| `push_back(x)` | Ajoute un élément à la fin. | `notes.push_back(15);` |
| `pop_back()` | Supprime le dernier élément. | `notes.pop_back();` |
| `size()` | Renvoie le nombre d'éléments. | `notes.size()` |
| `empty()` | Vérifie si le vecteur est vide. | `notes.empty()` |
| `at(i)` | Accède à l'indice `i` avec vérification des limites. | `notes.at(0)` |
| `[i]` | Accède à l'indice `i` sans vérification des limites. | `notes[0]` |
| `front()` / `back()` | Accède au premier / dernier élément. | `notes.front()` |
| `clear()` | Supprime tous les éléments. | `notes.clear();` |
| `begin()` / `end()` | Renvoient les itérateurs du début / de la position après le dernier élément. | `notes.begin()` |
| `erase(it)` | Supprime l'élément désigné par l'itérateur. | `notes.erase(notes.begin() + 1);` |
| `insert(it, x)` | Insère `x` avant la position indiquée. | `notes.insert(notes.begin(), 10);` |

**Parcours :**

```cpp
for (int i = 0; i < notes.size(); i++) // par indice
    cout << notes[i] << " ";

for (float note : notes)              // pour chaque élément
    cout << note << " ";
```

**Sortie possible** (avec `notes = {12, 15, 9}`) :

```text
12 15 9
12 15 9
```

`std::vector` est souvent plus simple que gérer soi-même un tableau dynamique avec `new[]` et `delete[]`. Si l'énoncé impose la mémoire manuelle, respecte la consigne du TP.

## Exemple — notes et moyenne

```cpp
#include <iostream>
#include <vector>
using namespace std;

int main() {
    vector<int> notes = {12, 15, 9, 17, 14};
    notes.push_back(18);
    notes.at(2) = 20;  // troisième note : indice 2
    notes.pop_back();  // retire le dernier élément

    int somme = 0;
    for (int note : notes) {
        cout << note << " ";
        somme += note;
    }
    cout << endl;
    if (!notes.empty())
        cout << "Moyenne : " << static_cast<double>(somme) / notes.size() << endl;
    return 0;
}
```

`size()` renvoie un nombre d'éléments non signé ; dans une moyenne, convertir la somme en `double` permet d'obtenir un résultat décimal. Vérifier qu'un vecteur n'est pas vide avant de diviser par `size()`.


---

## `<list>` — Listes doublement chaînées

À inclure avec `#include <list>`. Une `list<T>` contient des éléments du même type. Contrairement à `vector`, elle ne permet pas l'accès direct par indice (`liste[1]`) ; on la parcourt généralement avec `for` ou `for` basé sur une plage.

| Méthode / opération | Rôle | Exemple |
|---|---|---|
| `list<T>` | Déclare une liste. | `list<string> clients;` |
| `push_back(x)` | Ajoute à la fin. | `clients.push_back("Ahmed");` |
| `push_front(x)` | Ajoute au début. | `clients.push_front("Yassine");` |
| `pop_back()` | Supprime le dernier élément. | `clients.pop_back();` |
| `pop_front()` | Supprime le premier élément. | `clients.pop_front();` |
| `size()` | Renvoie le nombre d'éléments. | `clients.size()` |
| `empty()` | Vérifie si la liste est vide. | `clients.empty()` |
| `clear()` | Supprime tous les éléments. | `clients.clear();` |
| `front()` / `back()` | Accède au premier / dernier élément. | `clients.front()` |
| `remove(x)` | Supprime toutes les occurrences égales à `x`. | `clients.remove("Ahmed");` |

## Exemple — file de clients

```cpp
#include <iostream>
#include <list>
#include <string>
using namespace std;

int main() {
    list<string> clients;
    clients.push_back("Ahmed");
    clients.push_back("Yassine");

    for (const string& client : clients)
        cout << client << endl;

    if (!clients.empty()) clients.pop_front();

    cout << "Clients restants : " << clients.size() << endl;
    for (const string& client : clients)
        cout << client << endl;
    return 0;
}
```

**Différence avec `vector` :** `vector` convient bien à l'accès par indice et au stockage contigu ; `list` permet notamment des insertions/suppressions aux extrémités, mais l'accès à un élément précis nécessite un parcours. Toujours vérifier qu'une liste n'est pas vide avant `front()`, `back()`, `pop_front()` ou `pop_back()`.

## Méthodes supplémentaires de `list` — TP2

| Méthode | Rôle | Exemple |
|---|---|---|
| `begin()` / `end()` | Itérateurs du début / après le dernier élément. | `auto it = file.begin();` |
| `erase(it)` | Supprime l'élément et renvoie l'itérateur suivant. | `it = file.erase(it);` |
| `remove(x)` | Supprime toutes les occurrences de `x`. | `file.remove("Omar");` |
| `sort()` | Trie la liste par ordre croissant / alphabétique. | `file.sort();` |
| `unique()` | Supprime les doublons **consécutifs**. Trier avant si l'on veut supprimer tous les doublons. | `liste.unique();` |
| `reverse()` | Inverse l'ordre des éléments. | `liste.reverse();` |

## Exemple — `list` : tri, doublons et inversion

```cpp
list<int> nombres = {5, 3, 8, 5, 2, 2};
nombres.sort();
// 2 2 3 5 5 8
nombres.unique();
// 2 3 5 8
nombres.reverse();
// 8 5 3 2
```

**Sortie finale :**

```text
8 5 3 2
```

## Exemple — suppression avec `erase()`

```cpp
for (auto it = nombres.begin(); it != nombres.end(); ) {
    if (*it < 0)
        it = nombres.erase(it); // erase renvoie l'élément suivant
    else
        ++it;                   // avancer seulement si rien n'est supprimé
}
```

**Règle importante :** ne faites pas `++it` après `erase(it)` : l'itérateur a déjà été avancé par la valeur renvoyée par `erase`.

---

## `<algorithm>` — Recherche et tri

À inclure avec `#include <algorithm>`. Ces algorithmes travaillent avec des itérateurs.

| Fonction | Rôle | Exemple |
|---|---|---|
| `find(debut, fin, valeur)` | Recherche une valeur ; renvoie `fin` si elle est absente. | `find(v.begin(), v.end(), 12)` |
| `sort(debut, fin)` | Trie les éléments par ordre croissant. | `sort(v.begin(), v.end());` |
| `reverse(debut, fin)` | Inverse une plage d'éléments. | `reverse(v.begin(), v.end());` |

**Exemple — `find()` et `sort()` avec un `vector` :**

```cpp
vector<string> contacts = {"Youssef", "Amina", "Karim"};
auto it = find(contacts.begin(), contacts.end(), "Karim");
if (it != contacts.end())
    cout << "Trouve a la position : " << it - contacts.begin() << endl;

sort(contacts.begin(), contacts.end());
for (const string& nom : contacts)
    cout << nom << endl;
```

**Sortie :**

```text
Trouve a la position : 2
Amina
Karim
Youssef
```

La position renvoyée commence à `0`. Pour afficher un numéro de contact commençant à `1`, utiliser `it - contacts.begin() + 1`.

**Attention :** `std::sort()` nécessite des itérateurs à accès direct, comme ceux de `vector` ou `array`. Pour une `list`, utiliser sa méthode `liste.sort()`.

---

## Itérateurs, références et saisie de chaînes

### Itérateurs

Un itérateur permet de parcourir une collection ou de désigner un élément.

| Élément | Rôle | Exemple |
|---|---|---|
| `begin()` | Itérateur sur le premier élément. | `auto it = v.begin();` |
| `end()` | Position située juste après le dernier élément (pas un élément à lire). | `it != v.end()` |
| `*it` | Accède à la valeur désignée. | `cout << *it;` |
| `++it` | Passe à l'élément suivant. | `++it;` |
| `it - v.begin()` | Calcule l'indice d'un itérateur dans un `vector`. | `int pos = it - v.begin();` |

Exemple de parcours avec un itérateur :

```cpp
for (list<string>::const_iterator it = file.begin(); it != file.end(); ++it)
    cout << *it << endl;
```

`list` ne permet pas `it - file.begin()` : cette soustraction est possible avec les itérateurs de `vector`, pas ceux de `list`.

### Références constantes

| Syntaxe | Rôle |
|---|---|
| `vector<float>& v` | Référence modifiable : la fonction peut modifier le vecteur original. |
| `const vector<float>& v` | Référence en lecture seule : évite une copie et interdit la modification via ce paramètre. |
| `list<string>& file` | Référence modifiable à la liste originale. |
| `const list<string>& file` | Référence en lecture seule à la liste originale. |

Exemple : `float moyenne(const vector<float>& notes);` reçoit le vecteur sans le copier et sans pouvoir modifier ses éléments.

### `getline()` et `cin.ignore()`

| Instruction | Rôle | Exemple |
|---|---|---|
| `cin >> choix` | Lit une valeur ; laisse généralement le retour à la ligne dans le flux. | `cin >> choix;` |
| `cin.ignore()` | Ignore le prochain caractère, souvent le `\n` restant. | `cin.ignore();` |
| `getline(cin, nom)` | Lit toute la ligne, espaces compris. | `getline(cin, nom);` |

Après une saisie numérique suivie d'un nom complet :

```cpp
cin >> choix;
cin.ignore();
getline(cin, nom);
```

**Exemple de saisie / résultat :**

```text
Choix : 1
Nom du contact : Youssef Alami
Contact ajoute.
```

`cin.ignore()` suffit dans le cas simple du TP où seul le retour à la ligne reste à supprimer. Pour vider toute la ligne restante, utiliser `cin.ignore(numeric_limits<streamsize>::max(), '\n')` avec `#include <limits>`.

---

## Conditions, boucles et instructions

Ces éléments font partie du langage C++ ; ce ne sont pas des fonctions d'une bibliothèque particulière.

| Instruction | Rôle | Exemple de forme |
|---|---|---|
| `if` | Exécute un bloc si une condition est vraie. | `if (age >= 18) { ... }` |
| `else` | Définit le cas contraire. | `else { ... }` |
| `else if` | Vérifie une autre condition si la précédente est fausse. | `else if (note >= 10) { ... }` |
| `switch` | Choisit un cas selon une valeur. | `switch (choix) { ... }` |
| `case` | Définit une valeur possible dans un `switch`. | `case 1:` |
| `break` | Sort du `switch` ou de la boucle la plus proche. | `break;` |
| `default` | Définit le cas par défaut dans un `switch`. | `default:` |
| `for` | Répète avec initialisation, condition et mise à jour. | `for (int i=0; i<n; i++)` |
| `while` | Répète tant que la condition est vraie. | `while (i < n)` |
| `do ... while` | Exécute au moins une fois, puis vérifie la condition. | `do { ... } while (choix != 0);` |
| `continue` | Passe à l'itération suivante. | `continue;` |
| `return` | Termine une fonction et peut renvoyer une valeur. | `return 0;` |
| `bool` | Type logique : `true` ou `false`. | `bool valide = true;` |
| Paramètre par défaut | Valeur utilisée si l'argument est omis. | `void afficher(int n = 0);` |


## Différence importante entre les boucles

- `while` teste la condition **avant** le bloc : il peut s'exécuter zéro fois.
- `do ... while` teste la condition **après** le bloc : il s'exécute au moins une fois et se termine par un point-virgule.
- `for` regroupe généralement l'initialisation, la condition et l'évolution dans l'en-tête.

Les opérateurs de comparaison et logiques sont récapitulés dans la section « Bases du C++ » en haut de ce document.


---

## Références et mémoire dynamique

## Références

| Élément | Rôle | Exemple |
|---|---|---|
| `T&` | Référence à une variable existante ; peut permettre de la modifier. | `void ajouter(int& solde);` |
| `const T&` | Référence en lecture seule, souvent utilisée pour éviter une copie. | `void afficher(const string& nom);` |

## Mémoire dynamique

| Instruction | Rôle | Exemple |
|---|---|---|
| `new T` | Réserve dynamiquement un objet. | `int* p = new int;` |
| `new T[n]` | Réserve un tableau dynamique de `n` éléments. | `int* notes = new int[n];` |
| `delete p` | Libère un objet réservé avec `new`. | `delete p;` |
| `delete[] p` | Libère un tableau réservé avec `new[]`. | `delete[] notes;` |
| `nullptr` | Représente un pointeur nul. | `int* p = nullptr;` |

**Règle :** `new[]` doit être associé à `delete[]`, et `new` à `delete`. Ne pas utiliser un pointeur après avoir libéré sa mémoire. Quand c'est autorisé, `vector` évite souvent cette gestion manuelle.


---

## Modèles de fonctions utilisés dans le TP2

| Fonction | Rôle | Exemple de déclaration |
|---|---|---|
| Saisie / modification | Reçoit une collection par référence modifiable. | `void saisirNotes(vector<float>& notes);` |
| Affichage / calcul | Reçoit une collection par référence constante. | `void afficherNotes(const vector<float>& notes);` |
| Recherche | Renvoie une position ou `-1` si absent. | `int rechercherContact(const vector<string>& contacts, string nom);` |
| Suppression | Renvoie `true` si l'opération a réussi. | `bool supprimerContact(vector<string>& contacts, int numero);` |
| Résultat via référence | Modifie une variable fournie par l'appelant. | `bool servirClient(list<string>& file, string& servi);` |

**Exemples de sorties des collections :**

```text
Notes : 12.00 15.50 8.50 17.00
Nombre de notes : 4
Premiere note : 12.00 | Derniere note : 17.00
Moyenne : 13.25
Note max : 17.00 | Note min : 8.50
Notes au-dessus de la moyenne : 2
```

```text
Contacts (3) :
1. Amina Bennani
2. Karim Tazi
3. Youssef Alami
```

```text
File d'attente (3 client(s)) :
1. Mme Idrissi
2. Sara
3. Omar
Client servi : Mme Idrissi
```

**À retenir :** `size()` donne le nombre d'éléments ; `front()` et `back()` accèdent aux extrémités ; `empty()` vérifie si la collection est vide. Vérifier `empty()` avant d'utiliser `front()` ou `back()`.

---

## POO — Classes et objets

Ces mots-clés et concepts appartiennent au langage C++.

| Élément | Rôle | Exemple de forme |
|---|---|---|
| `class` | Définit un type qui regroupe données et méthodes. | `class Compte { ... };` |
| `private` | Réserve l'accès aux membres à la classe et à ses amis. | `private:` |
| `public` | Rend les membres accessibles depuis l'extérieur selon les règles C++. | `public:` |
| Constructeur | Fonction spéciale appelée à la création d'un objet. | `Compte(double solde);` |
| Méthode | Fonction membre d'une classe. | `void deposer(double montant);` |
| Objet | Instance d'une classe. | `Compte compte(100);` |
| Méthode `const` | Indique que la méthode ne modifie pas l'état observable de l'objet. | `double lireSolde() const;` |
| Encapsulation | Protège les données en contrôlant l'accès via l'interface publique. | Données privées + méthodes publiques. |

Un dépôt bancaire est une opération métier : après avoir vérifié que le montant est valide, le solde peut augmenter, par exemple `solde += montant;`. `setfill` ne fait que formater l'affichage.


---

## `<fstream>` — Fichiers

À inclure avec `#include <fstream>`. À réviser lorsque le cours demande de lire ou d'écrire des fichiers.

| Élément | Rôle | Exemple |
|---|---|---|
| `ifstream` | Ouvre un fichier pour lire. | `ifstream fichier("notes.txt");` |
| `ofstream` | Ouvre un fichier pour écrire. | `ofstream fichier("resultat.txt");` |
| `fstream` | Permet lecture et écriture selon le mode. | `fstream fichier;` |
| `open()` | Ouvre un fichier après création de l'objet. | `fichier.open("notes.txt");` |
| `close()` | Ferme le fichier. | `fichier.close();` |
| `is_open()` | Vérifie si le fichier est ouvert. | `fichier.is_open()` |
| `good()` | Vérifie si le flux est dans un état valide. | `fichier.good()` |
| `fail()` | Vérifie si une opération a échoué. | `fichier.fail()` |
| `eof()` | Indique si la fin du fichier a été atteinte. | `fichier.eof()` |
| `get()` | Lit un caractère. | `fichier.get(c);` |
| `getline()` | Lit une ligne. | `getline(fichier, ligne);` |
| `read()` / `write()` | Lit / écrit des blocs d'octets. | Usage avancé. |
| `put(c)` | Écrit un caractère. | `fichier.put('A');` |

Vérifier que le fichier s'est bien ouvert avant de l'utiliser. Ces fonctions ne sont pas nécessaires pour une simple opération de dépôt bancaire.


---
