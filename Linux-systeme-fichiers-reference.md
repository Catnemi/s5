# Linux — Référence : système de fichiers et commandes


## 1. Arborescence Linux

Linux organise les fichiers dans une seule arborescence qui commence à la racine `/`. Un disque ou une clé USB peut être accessible depuis un répertoire appelé *point de montage*.

| Répertoire | Rôle | Exemple / détail |
|---|---|---|
| `/` | Racine : départ de toute l'arborescence | `cd /` |
| `/bin` | Commandes essentielles ; souvent lié à `/usr/bin` | `ls`, `cp` |
| `/boot` | Fichiers nécessaires au démarrage, dont le noyau | `ls /boot` |
| `/dev` | Fichiers spéciaux représentant les périphériques | disques, terminaux |
| `/etc` | Configuration du système | `/etc/passwd` décrit les comptes locaux |
| `/home` | Dossiers personnels des utilisateurs ordinaires | `/home/etudiant` |
| `/root` | Dossier personnel de l'administrateur `root` | différent de `/` |
| `/lib` | Bibliothèques nécessaires aux programmes | bibliothèques partagées |
| `/usr` | Programmes et ressources installés | `/usr/bin` |
| `/tmp` | Fichiers temporaires | fichiers provisoires |
| `/var` | Données qui changent souvent | `/var/log` pour les journaux |
| `/media` | Montage fréquent des supports amovibles | clé USB |
| `/mnt` | Points de montage temporaires ou administrés | partition montée manuellement |

### Où regarder selon le besoin ?

| Besoin | Répertoire / fichier |
|---|---|
| Comptes utilisateurs | `/etc/passwd` |
| Journaux pour diagnostiquer une panne | `/var/log` |
| Fichiers de démarrage / noyau | `/boot` |
| Clé USB branchée | souvent `/media/<utilisateur>/<nom>` |
| Documents d'un utilisateur | `/home/<utilisateur>` |
| Fichier temporaire | `/tmp` |

### Disques, partitions et espace disque

| Commande | Utilité | Exemple |
|---|---|---|
| `less /etc/fstab` | Lire la configuration des montages prévus au démarrage | `less /etc/fstab` |
| `mount` | Afficher les systèmes de fichiers montés | `mount` |
| `df -h` | Espace utilisé et disponible ; `-h` rend les tailles lisibles | `df -h` |
| `du -sh dossier` | Taille totale occupée par un dossier ; `-s` = total, `-h` = lisible | `du -sh ~/Documents` |

`df` répond plutôt à « combien d'espace reste-t-il sur le système de fichiers ? » ; `du` répond à « combien cet élément occupe-t-il ? ».

---

## 2. Chemins absolus et relatifs

Un **chemin absolu** part de la racine `/` et ne dépend pas du répertoire courant. Un **chemin relatif** part du répertoire courant et dépend donc de l'endroit où l'on se trouve.

| Type | Exemple | Dépend de `pwd` ? |
|---|---|---|
| Absolu | `/home/etudiant/Documents/tp1.txt` | Non |
| Relatif | `Documents/tp1.txt` | Oui |

### Symboles à connaître

| Symbole | Signification | Exemple |
|---|---|---|
| `/` | Racine | `cd /` |
| `.` | Répertoire courant | `cp /etc/hosts .` |
| `..` | Répertoire parent | `cd ..` |
| `~` | Dossier personnel de l'utilisateur courant | `cd ~/Images` |
| `-` | Répertoire précédent dans l'historique de `cd` | `cd -` |

- `cd` sans argument équivaut généralement à `cd ~`.
- `../..` remonte de deux niveaux.
- `../TP2` remonte au parent, puis entre dans `TP2`.
- `cd -` revient au répertoire où l'on se trouvait juste avant et affiche généralement le chemin atteint.

### Exemple guidé

Départ : `/home/etudiant/Documents/TP1`

| Commande | Destination |
|---|---|
| `cd ..` | `/home/etudiant/Documents` |
| `cd ../..` | `/home/etudiant` |
| `cd ../TP2` | `/home/etudiant/Documents/TP2` |
| `cd ~/Images` | `/home/etudiant/Images` |
| `cd /tmp` | `/tmp` |
| `cd ../../../../etc` | `/etc` |

**Méthode :** pars du dossier indiqué, applique chaque `..` pour remonter d'un niveau, puis entre dans les sous-dossiers indiqués. Vérifie avec `pwd`.

Exemple : depuis `/home/etudiant/Images`, le fichier `/home/etudiant/Documents/TP1/notes.txt` s'écrit relativement `../Documents/TP1/notes.txt`.

---

## 3. Naviguer dans les répertoires

| Commande | Ce qu'elle fait | Exemple |
|---|---|---|
| `pwd` | Affiche le chemin absolu courant | `pwd` |
| `cd chemin` | Change de répertoire | `cd /var/log` |
| `cd ~` | Va au dossier personnel | `cd ~` |
| `cd -` | Revient au répertoire précédent | `cd -` |
| `pushd dossier` | Mémorise le répertoire courant dans une pile et va dans `dossier` | `pushd /etc/ssh` |
| `popd` | Retire le sommet de la pile et revient au répertoire mémorisé | `popd` |
| `dirs -v` | Affiche la pile de répertoires, numérotée | `dirs -v` |

`pushd`, `popd` et `dirs` sont des commandes internes de certains shells, notamment Bash.

**À retenir :** une commande réussie peut ne rien afficher. En cas de doute, utilise `pwd` ou vérifie avec `ls`.

```bash
pwd
cd /var/log
pwd
cd -
pwd
```

Le deuxième `pwd` affiche `/var/log` ; `cd -` revient au dossier de départ.

---

## 4. Afficher et inspecter les fichiers

### Options de `ls`

| Commande / option | Utilité | Exemple |
|---|---|---|
| `ls` | Liste les éléments visibles | `ls` |
| `ls -l` | Format détaillé : droits, propriétaire, taille, date, nom | `ls -l` |
| `ls -a` | Inclut les éléments cachés (noms commençant par `.`) | `ls -a` |
| `ls -h` | Tailles lisibles, surtout avec `-l` | `ls -lh` |
| `ls -t` | Trie par date, plus récent d'abord | `ls -lt` |
| `ls -S` | Trie par taille, plus gros d'abord | `ls -lS` |
| `ls -d dossier` | Affiche le dossier lui-même, pas son contenu | `ls -ld /etc` |
| `ls -R` | Liste récursivement les sous-dossiers | `ls -R projet` |

Les options se combinent : `ls -lah` équivaut à `ls -l -a -h`.

**Piège :**
- `ls -l TP1` affiche le contenu de `TP1`.
- `ls -ld TP1` affiche les informations sur `TP1` lui-même.

### Lire une ligne de `ls -l`

Exemple :
```text
drwxr-xr-x 2 etudiant etudiant 4096 14 oct. 10:02 TP1
```

| Élément | Signification |
|---|---|
| `d` au début | Répertoire (`-` = fichier ordinaire, `l` = lien symbolique) |
| `rwxr-xr-x` | Droits du propriétaire, du groupe, puis des autres |
| `2` | Nombre de liens physiques |
| premier `etudiant` | Propriétaire |
| deuxième `etudiant` | Groupe |
| `4096` | Taille affichée en octets |
| `14 oct. 10:02` | Date de modification |
| `TP1` | Nom |

`r` = lecture, `w` = écriture, `x` = exécution (ou traversée pour un répertoire), `-` = droit absent.

### Identifier le type réel d'un fichier

```bash
file image.txt
```

`file` examine le contenu du fichier. L'extension est une convention : un fichier nommé `image.txt` peut être une image.

### Lire un fichier texte

| Commande | Utilité | Exemple |
|---|---|---|
| `cat fichier` | Affiche tout le fichier | `cat notes.txt` |
| `less fichier` | Lecture page par page ; `q` quitte, `/mot` recherche | `less notes.txt` |
| `head -n 3 fichier` | Affiche les 3 premières lignes | `head -n 3 notes.txt` |
| `tail -n 2 fichier` | Affiche les 2 dernières lignes | `tail -n 2 notes.txt` |
| `tail -f fichier` | Suit les nouvelles lignes en temps réel ; `Ctrl+C` arrête | `tail -f /var/log/syslog` |

Sans `-n`, `head` et `tail` affichent généralement 10 lignes.

---

## 5. Caractères génériques (*globbing*)

Le shell développe le motif en noms de fichiers **avant** de lancer la commande. Un motif s'applique à un seul segment du chemin (il ne traverse pas `/`). Par défaut, `*` ne sélectionne pas les noms cachés.

| Motif | Signification | Exemple |
|---|---|---|
| `*` | Zéro ou plusieurs caractères | `*.txt` |
| `?` | Exactement un caractère | `rapport?.txt` |
| `[123]` | Un caractère parmi `1`, `2` ou `3` | `file[123].txt` |
| `[1-5]` | Un caractère de `1` à `5` | `file[1-5].txt` |
| `[!123]` | Un caractère différent de `1`, `2` et `3` | `file[!123].txt` |
| `**/*.txt` | Fichiers `.txt` dans les sous-niveaux avec Bash et `globstar` activé | `shopt -s globstar; ls **/*.txt` |

### Exemple

Si le dossier contient `rapport.txt`, `rapport1.txt`, `rapport2.txt`, `rapport10.txt`, `Rapport3.txt` et `.cache.txt` :

| Motif | Résultat |
|---|---|
| `*.txt` | `rapport.txt`, `rapport1.txt`, `rapport2.txt`, `rapport10.txt`, `Rapport3.txt` |
| `rapport?.txt` | `rapport1.txt`, `rapport2.txt` |
| `rapport[0-9]*.txt` | `rapport1.txt`, `rapport2.txt`, `rapport10.txt` |
| `[Rr]apport*` | Noms commençant par `Rapport` ou `rapport` |
| `*.pdf` | Aucun fichier si aucun nom ne correspond |

La casse compte : `R` et `r` sont différents. Si aucun nom ne correspond, le motif peut rester littéral et provoquer une erreur.

**Sécurité :** avant d'utiliser un motif avec `rm`, affiche les éléments concernés avec `ls`, puis supprime avec confirmation si nécessaire.

---

## 6. Créer, copier, déplacer, renommer et supprimer

| Commande | Fonction | Exemple |
|---|---|---|
| `touch fichier` | Crée un fichier vide s'il n'existe pas ; sinon actualise sa date | `touch notes.txt` |
| `mkdir dossier` | Crée un répertoire | `mkdir TP1` |
| `mkdir -p a/b` | Crée aussi les répertoires parents manquants | `mkdir -p S2/TP1` |
| `cp source destination` | Copie un fichier | `cp a.txt b.txt` |
| `cp -r dossier destination` | Copie un répertoire et son contenu | `cp -r TP1 sauvegarde/` |
| `mv source destination` | Déplace ou renomme | `mv ancien.txt nouveau.txt` |
| `rm fichier` | Supprime un fichier sans corbeille | `rm notes.txt` |
| `rm -i fichier` | Demande confirmation | `rm -i notes.txt` |
| `rm -r dossier` | Supprime récursivement un répertoire et son contenu | `rm -r projet` |
| `rm -ri dossier` | Demande confirmation pendant la suppression récursive | `rm -ri projet` |
| `rmdir dossier` | Supprime un répertoire vide seulement | `rmdir vide` |

### Différences importantes

- `cp a.txt b.txt` : garde `a.txt` et crée la copie `b.txt`.
- `mv a.txt b.txt` : déplace ou renomme ; après un renommage, `a.txt` n'existe plus.
- `cp` sur un répertoire nécessite `-r`.
- `rmdir` refuse un répertoire non vide : c'est une protection.
- `cp` et `mv` peuvent écraser une destination existante sans avertissement. `-i` demande confirmation : `cp -i a.txt b.txt`, `mv -i a.txt b.txt`.
- `rm` ne passe généralement pas par une corbeille. **Vérifie avant de supprimer.**

### Noms contenant des espaces

```bash
cd "Mes Documents"
# Équivalent :
cd Mes\ Documents
```

### Créer une petite arborescence

```bash
mkdir -p ~/projet/{src,docs,sauvegardes}
touch ~/projet/src/analyse.sh ~/projet/docs/README.md
ls -R ~/projet
```

Dans Bash, `{src,docs,sauvegardes}` est développé en trois noms. `~` désigne le dossier personnel.

### Sauvegarder avec une date

```bash
cp -iv ~/projet/docs/README.md \
  ~/projet/sauvegardes/README_$(date +%F).md
```

- `-i` : demande confirmation avant écrasement.
- `-v` : affiche l'opération.
- `$(date +%F)` : remplace cette expression par la date, par exemple `2026-10-24`.

### Utiliser `&&`

```bash
mkdir projet && cd projet
```

La deuxième commande s'exécute uniquement si la première réussit.

### Exemple complet : organiser un TP

Départ : `/home/etudiant`, contenant `notes TP1.txt`, `rapport.pdf`, `tp1.c`, `tp1_old.c`.

```bash
mkdir -p S2/TP1 S2/archives
mv tp1.c rapport.pdf S2/TP1/
mv "notes TP1.txt" S2/TP1/
mv tp1_old.c S2/archives/tp1_v0.c
cp -r S2/TP1 S2/archives/TP1_sauvegarde
ls -R S2
```

Ordre : créer les destinations, déplacer les fichiers, renommer l'ancien fichier, copier le dossier complet, puis vérifier.

---

## 7. Diagnostiquer les erreurs fréquentes

| Message / problème | Cause probable | Correction |
|---|---|---|
| `No such file or directory` | Mauvais répertoire courant ou chemin incorrect | `pwd`, puis corriger le chemin |
| `cp: -r not specified; omitting directory` | Copie d'un dossier sans `-r` | `cp -r TP1 sauvegarde/` |
| `cd: too many arguments` | Nom contenant un espace non protégé | `cd "Mes Documents"` |
| `rmdir: Directory not empty` | `rmdir` ne supprime que les dossiers vides | Vérifier avec `ls`, puis choisir la méthode adaptée |
| `Permission denied` | Droits insuffisants ou absence du droit d'accès | Vérifier chemin et permissions ; ne pas utiliser `sudo` sans comprendre l'action |

### Réflexe de dépannage

```bash
pwd       # Où suis-je ?
ls        # Quels éléments sont ici ?
ls -l     # Quels sont leurs droits ?
```

Un dossier peut exister mais être introuvable par un chemin relatif si l'on se trouve ailleurs.

---

## 8. Commandes types pour l'examen

| Besoin | Commande | Pourquoi ? |
|---|---|---|
| Afficher le chemin courant | `pwd` | Chemin absolu |
| Voir les détails et fichiers cachés | `ls -la` | `-l` = détails, `-a` = cachés |
| Voir les droits du dossier `/etc` | `ls -ld /etc` | `-d` affiche le dossier lui-même |
| Voir les éléments les plus récents | `ls -lt` | `-t` trie par date |
| Voir les éléments les plus gros avec tailles lisibles | `ls -lhS` | `-S` trie par taille, `-h` rend les tailles lisibles |
| Afficher les sous-dossiers récursivement | `ls -R projet` | `-R` parcourt les sous-dossiers |
| Lire les 3 premières lignes | `head -n 3 notes.txt` | Début du fichier |
| Lire les 2 dernières lignes | `tail -n 2 notes.txt` | Fin du fichier |
| Copier un dossier | `cp -r TP1 archives/` | `-r` copie son contenu |
| Prévisualiser avant suppression | `ls *.log` | Vérifier les noms sélectionnés |
| Supprimer avec confirmation | `rm -i *.log` | Demande avant suppression |

---

## 9. Mini-quiz corrigé

**1.** Depuis `/home/etudiant/Documents`, où mène `cd ../Images` ?  
**Réponse :** `/home/etudiant/Images`.

**2.** Quel chemin est absolu : `Documents/TP1`, `./var/log`, `/var/log`, `../etc` ?  
**Réponse :** `/var/log`, car il commence par `/`.

**3.** Quelle commande affiche les détails, y compris les fichiers cachés ?  
**Réponse :** `ls -la`.

**4.** Un dossier contient `a1.txt`, `a2.txt`, `a10.txt`, `b1.txt`. Que désigne `a?.txt` ?  
**Réponse :** `a1.txt` et `a2.txt` ; `?` correspond à exactement un caractère.

**5.** Pourquoi `cp TP1 archives/` échoue-t-il si `TP1` est un dossier ?  
**Réponse :** il manque `-r` ; utiliser `cp -r TP1 archives/`.

**6.** Que faire avant `rm *.log` ?  
**Réponse :** exécuter `ls *.log` pour vérifier la liste, puis utiliser `rm -i *.log` si les fichiers sont bien ceux à supprimer.

**7.** Différence entre `ls -l TP1` et `ls -ld TP1` ?  
**Réponse :** le premier liste le contenu de `TP1` ; le second affiche les informations sur le dossier lui-même.

**8.** Différence entre `cd ..` et `cd ~` ?  
**Réponse :** `cd ..` remonte d'un niveau ; `cd ~` va au dossier personnel.

---

## 10. À mémoriser en priorité

1. **Vérifier le répertoire courant** avec `pwd`.
2. Un chemin absolu commence par `/` ; un chemin relatif dépend du répertoire courant.
3. `.` = courant, `..` = parent, `~` = personnel, `-` = répertoire précédent.
4. `ls -la` montre les détails et les fichiers cachés.
5. `ls -ld dossier` décrit le dossier lui-même.
6. `*` = plusieurs caractères ; `?` = un caractère ; `[abc]` = un caractère parmi les choix.
7. `cp -r` copie un dossier ; `mv` déplace ou renomme ; `rmdir` ne supprime qu'un dossier vide.
8. Avant `rm`, inspecter les noms avec `ls` et préférer `rm -i` quand c'est approprié.
9. `df -h` indique l'espace des systèmes de fichiers ; `du -sh dossier` mesure l'espace occupé par un dossier.
10. Une commande silencieuse peut avoir réussi : vérifie l'état obtenu au lieu de supposer un échec.
