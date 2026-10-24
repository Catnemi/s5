#include<iostream>
#include<string>

const int LARGEUR = 40;
using namespace std;
void afficherLigne(int longueur = LARGEUR, char car = '*'){
    cout << longueur << endl;
}
void afficherEntete(){
    cout << "Bienvenue au TP de POO" << endl;
}
string demanderNom(string nom){
    cout << "entrer votre nom" << endl;
    cin >> nom ;
    getline(cin,nom);
     cout << "Votre nom est: " <<nom <<endl;
     return nom;
}
void afficherMessageBienvenue(string nom){
    cout << "Bienvenue "<<nom <<endl;
nom.length();
cout << "Votre nom contient :" << endl;
}
int main(){
	string nom;
afficherLigne(LARGEUR,'=');
afficherEntete();
afficherMessageBienvenue(nom);
return 0;
}

// EXERCICE 2 
#include<iostream>
#include<iomanip>

 using namespace std; 
const float SOLDE_INITIALE = 1000.0;
 
        bool deposer(float &solde, float montant){ 
            if(montant <= 0){
                cout << "False" << endl;
                return false;
            }
            solde += montant;
            return true;
        }
        bool retirer(float &solde, float montant){
            if(montant <= 0 || montant > solde){ 
                cout << "False" << endl;
                return false;
            }
            solde -= montant;
            return true;
            }
        void afficherSolde(float solde){
            cout << fixed << setprecision(2) << solde << endl;
        }
        void afficherMenu(){
            cout << "affichage du menu" << endl;
            cout << "1 Deposer" << endl;
            cout << "2 Retirer" << endl;
            cout << "3 Afficher le solde" << endl;
            cout << "4 Quitter" << endl;
            cout << "Votre choix : ";
        }
 int main(){
float solde = SOLDE_INITIALE;
int choix;
float montant;    
     do{
      afficherMenu();
      cin >> choix;
         switch(choix){
           case 1:
             cout << "Montant a deposer : " << endl;
             cin >> montant;
             deposer(solde , montant);
           break;

           case 2:
              cout << "Montant a retirer : " << endl;
              cin >> montant;
              retirer(solde , montant);
            break;

            case 3:
              afficherSolde(solde);
            break;

            case 4:
              cout << "Quitter" << endl;
            break;
                    
             default:
              cout << "Choix invalid" << endl;
            }
            }while(choix != 4);

            return 0;
        }
 #include <iostream>
 #include <cstdlib>
 #include <ctime>
    
    using namespace std;
 const int NB_MIN = 1;
 const int NB_MAX = 100;
 const int MAX_TENTATIVES = 7;
        int genererNombreSecret(){
            return rand() % (NB_MAX - NB_MIN + 1) + NB_MIN; 
        }
        bool faireDeviner(int nbrSecret, int &tentatives){
            tentatives = 0;
            int proposition;
            nbrSecret = genererNombreSecret();          
        
            while(tentatives < MAX_TENTATIVES){{
                cout << "Saisir la proposition" << endl;
                cin >> proposition;    
                tentatives ++;
                if(nbrSecret > proposition){
                cout << "Trop petit" << endl;
                }
                else if(nbrSecret < proposition){
                cout << "Trop GRAND" << endl;
                }
                else if(nbrSecret == proposition){
                cout << "Gagne" << endl;
                return true;
                }
            
            }}
        }
        void afficherResultat(bool reussi, int tentatives, int nbrSecret){
            reussi = faireDeviner(nbrSecret,tentatives);
            if(tentatives < nbrSecret || reussi == true){
            cout << "Non reussi" << endl;
            }
            if(tentatives == nbrSecret){
            cout << nbrSecret << endl;
            }
        }
        void jouePartie(){
            int proposition = 7;
            int nbrSecret = 10;
            char x;
            do{
            cout << "Rejouer?" << endl;
            if(x == '0'){
            faireDeviner(nbrSecret,proposition);
        }
        else{
            cout << "Faux" << endl;
        }
        }while(nbrSecret == 7);
        }
        int main(){
            srand(time(0));
            bool reussi;
            int tentatives = MAX_TENTATIVES;
            int nbrSecret = 7;           
            genererNombreSecret();
            faireDeviner(nbrSecret,tentatives);
            afficherResultat(reussi,tentatives,nbrSecret);
            jouePartie();
            return 0;
        }
