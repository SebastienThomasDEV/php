#### Contexte

Vous travaillez pour une bibliothèque qui souhaite informatiser sa gestion des livres et des membres. Votre tâche est de créer un système simple en PHP en utilisant la programmation orientée objet.

#### Instructions

1. **Créer une classe `Livre`**
    
    - Propriétés: titre, auteur, ISBN, disponible (booléen).
    - Méthodes:
        - Un constructeur pour initialiser les propriétés.
        - `emprunter()`: change le statut de `disponible` à `false`.
        - `retourner()`: change le statut de `disponible` à `true`.
        - `afficherInformation()`: affiche les détails du livre.
2. **Créer une classe `Membre`**
    
    - Propriétés: nom, ID, liste des livres empruntés.
    - Méthodes:
        - Un constructeur pour initialiser le nom et l'ID.
        - `emprunterLivre(Livre $livre)`: ajoute le livre à la liste des emprunts si disponible.
        - `retournerLivre(Livre $livre)`: retire le livre de la liste des emprunts et met à jour le statut du livre.
        - `afficherEmprunts()`: affiche la liste des livres empruntés.
3. **Créer une classe `Bibliotheque`**
    
    - Propriétés: nom, liste des livres, liste des membres.
    - Méthodes:
        - Un constructeur pour initialiser le nom.
        - `ajouterLivre(Livre $livre)`: ajoute un livre à la bibliothèque.
        - `inscrireMembre(Membre $membre)`: ajoute un membre à la bibliothèque.
        - `afficherLivres()`: affiche tous les livres de la bibliothèque.
        - `afficherMembres()`: affiche tous les membres de la bibliothèque.

#### Exemple de scénario d'utilisation

- Créez plusieurs instances de `Livre` et de `Membre`.
- Inscrivez les membres dans une instance de `Bibliotheque`.
- Faites emprunter et retourner des livres par les membres.
- Affichez les états des livres et les listes d'emprunts des membres pour vérifier le bon fonctionnement de votre système.

### Conseils

- Pensez à bien gérer les cas où un livre n'est pas disponible pour l'emprunt.
- Utilisez des messages d'erreur ou des exceptions si nécessaire pour gérer les cas d'usage incorrects.
- Testez votre code avec différents scénarios pour vous assurer qu'il se comporte comme prévu.