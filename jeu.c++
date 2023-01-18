#include <iostream>
#include <conio.h>
#include <windows.h>

using namespace std;

// Définition des constantes
const int LARGEUR = 20;
const int HAUTEUR = 20;
const int TAILLE_SERPENT = 5;

// Définition des structures
struct Serpent
{
  int x[100];
  int y[100];
  int longueur;
  char direction;
} serpent;

struct Fruit
{
  int x;
  int y;
} fruit;

// Déclaration des fonctions
void initialiser();
void afficher();
void deplacer();
void mettre_a_jour();
void gameover();

int main()
{
  initialiser();

  while (true)
  {
    afficher();
    deplacer();
    mettre_a_jour();
  }

  return 0;
}

// Fonction d'initialisation
void initialiser()
{
  serpent.longueur = TAILLE_SERPENT;
  serpent.direction = 'D';

  for (int i = 0; i < serpent.longueur; i++)
  {
    serpent.x[i] = 10 - i;
    serpent.y[i] = 10;
  }

  fruit.x = 15;
  fruit.y = 15;
}

// Fonction d'affichage
void afficher()
{
  system("cls"); // Efface l'écran

  // Dessine les bords de la grille
  for (int i = 0; i < LARGEUR + 2; i++)
    cout << "#";
  cout << endl;

  for (int i = 0; i < HAUTEUR; i++)
  {
    for (int j = 0; j < LARGEUR + 2; j++)
    {
      if (j == 0 || j == LARGEUR + 1)
        cout << "#";
      else if (i == serpent.y[0] && j == serpent.x[0])
        cout << "O"; // Dessine la tête du serpent
      else
      {
        bool afficher = false;
        for (int k = 1; k < serpent.longueur; k++)
        {
          if (i == serpent.y[k] && j == serpent.x[k])
          {
            cout << "o"; // Dessine le corps du serpent
            afficher = true;
            break;
          }
        }
        if (!afficher)
          cout << " ";
      }
    }
    cout << endl;
  }

  for (int i = 0; i < LARGEUR + 2; i++)
    cout << "#";
  cout << endl;

  // Affiche le score
  cout << "Score : " << serpent.longueur - TAILLE_SERPENT << endl;
}

// Fonction de déplacement
void deplacer()
{
  int dernier = serpent.longueur - 1;
  int av
