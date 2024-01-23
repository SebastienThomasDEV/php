
### Sommaire

1. **Introduction à la Programmation Orientée Objet**
   - Définition et Principes de Base
   - Avantages de la POO
2. **Les Bases de la POO en PHP**
   - Classes et Objets
   - Propriétés et Méthodes
   - Le constructeur et le destructeur
   - Visibilité: public, private, protected
3. **Approfondissement de la POO**
   - Héritage
   - Polymorphisme
   - Abstraction
   - Interfaces
4. Encapsulation & Gestion des Accès
5. Composition vs Héritage
6. Méthodes et Propriétés Statiques
7. Méthodes Magiques
8. Espace de Noms (Namespaces)
9.  Conclusion et Pratiques Avancées

---

### 1. Introduction à la Programmation Orientée Objet

#### Définition et Principes de Base

La POO est un paradigme centré sur la création d'objets qui représentent des concepts ou des choses du monde réel, avec des données et des comportements associés.

#### Avantages de la POO

- **Maintenance simplifiée** : grâce à l'encapsulation et à la séparation des préoccupations.
- **Réutilisabilité** : le code peut être réutilisé à travers l'héritage et la composition.
- **Flexibilité** : grâce au polymorphisme et à l'abstraction.

### 2. Les Bases de la POO en PHP

#### Classes et Objets

En POO, une classe est comme un plan ou un modèle pour créer des objets. Un objet est une instance d'une classe. Pensez à une classe comme le plan d'une maison, et à un objet comme une maison construite selon ce plan.

**Exemple :**

```php
class Voiture {
    public $couleur;
    public $marque;

    public function klaxonner() {
        return "Tut tut!";
    }
}

// Création d'une instance de la classe Voiture
$maVoiture = new Voiture();
$maVoiture->couleur = "rouge";
$maVoiture->marque = "Toyota";

echo $maVoiture->klaxonner(); // Appelle la méthode klaxonner
```

Dans cet exemple, `Voiture` est une classe avec des propriétés (`couleur` et `marque`) et une méthode (`klaxonner`). `$maVoiture` est un objet, une instance de la classe `Voiture`.

#### Propriétés et Méthodes

Les propriétés sont des variables qui appartiennent à une classe. Les méthodes sont des fonctions définies à l'intérieur d'une classe.

**Exemple :**

```php
class Animal {
    public $espece; // Propriété

    public function faireUnSon() { // Méthode
        echo "L'animal fait un son";
    }
}

$chien = new Animal();
$chien->espece = "Chien";
$chien->faireUnSon(); // Affiche : L'animal fait un son
```

Dans cet exemple, `espece` est une propriété et `faireUnSon` est une méthode de la classe `Animal`.

#### Le Constructeur et le Destructeur

Le constructeur est une méthode spéciale qui est automatiquement appelée lorsqu'un objet est créé. Le destructeur est appelé lorsqu'un objet est détruit.

**Exemple de constructeur :**

```php
class Livre {
    public $titre;
    public $auteur;

    public function __construct($titre, $auteur) {
        $this->titre = $titre;
        $this->auteur = $auteur;
    }
}

$livre = new Livre("1984", "George Orwell");
echo $livre->titre; // Affiche : 1984
```

Dans cet exemple, le constructeur initialise les propriétés `titre` et `auteur` lors de la création de l'objet `Livre`.

**Exemple de destructeur :**

```php
class Exemple {
    function __destruct() {
        echo "L'objet est détruit.";
    }
}

$obj = new Exemple();
unset($obj); // Déclenche le destructeur
```

#### Visibilité: public, private, protected

La visibilité détermine comment les propriétés et méthodes d'une classe peuvent être accédées.

- `public` : Accessible de partout, à l'intérieur comme à l'extérieur de la classe.
- `private` : Accessible uniquement à l'intérieur de la classe où elle est définie.
- `protected` : Accessible dans la classe où elle est définie et dans les classes héritées.

**Exemple :**

```php
class Exemple {
    public $publicVar = "Public";
    private $privateVar = "Privé";
    protected $protectedVar = "Protégé";

    function montrerVar() {
        echo $this->privateVar; // Accessible à l'intérieur de la classe
    }
}

$obj = new Exemple();
echo $obj->publicVar; // OK
echo $obj->privateVar; // Erreur : Accès privé
echo $obj->protectedVar; // Erreur : Accès protégé
```

Dans cet exemple, `publicVar` est accessible de l'extérieur de la classe, tandis que `privateVar` et `protectedVar` ne le sont pas.

### 3. Approfondissement de la POO

#### Héritage

L'héritage est un mécanisme clé de la POO qui permet à une classe (souvent appelée classe enfant ou sous-classe) de recevoir, ou "hériter", les propriétés et méthodes d'une autre classe (appelée classe parent ou superclasse). Ce concept est fondamental pour la réutilisation du code et la création d'une hiérarchie de classes.

- **Principe**: Lorsqu'une classe hérite d'une autre, elle absorbe non seulement les caractéristiques de la classe parent, mais peut également avoir ses propres méthodes et propriétés uniques.
- **Avantages**: Permet une meilleure organisation du code (réduction de la redondance), facilite la maintenance et améliore la lisibilité.

```php
class Animal {
    public $nom;
    public function seDeplacer() {
        echo "Je me déplace";
    }
}

class Oiseau extends Animal {
    public function seDeplacer() {
        echo "Je vole";
    }
}
```
#### Polymorphisme

Le polymorphisme, un pilier de la POO, permet aux objets de différentes sous-classes d'être traités comme des instances d'une superclasse commune. Cela signifie que vous pouvez utiliser un objet d'une sous-classe là où un objet de la superclasse est attendu.

- **Types de polymorphisme**:
    - **Polymorphisme d'héritage**: Des classes différentes ayant une même superclasse sont traitées via cette superclasse.
    - **Polymorphisme d'interface**: Des classes différentes implémentent la même interface et sont utilisées de manière interchangeable.
- **Utilité**: Le polymorphisme est essentiel pour la flexibilité et la généralisation du code. Il permet de créer des programmes qui traitent des objets de différentes classes de manière uniforme.

```php
class Oiseau extends Animal {
    public function seNourrir() {
        echo "L'oiseau mange des graines";
    }
}

function nourrirAnimal(Animal $animal) {
    $animal->seNourrir();
}

nourrirAnimal(new Chien()); // Affiche : L'animal mange
nourrirAnimal(new Oiseau()); // Affiche : L'oiseau mange des graines
```

#### Abstraction

L'abstraction est un concept qui permet de définir des "modèles" pour d'autres classes. Une classe abstraite est une classe qui ne peut pas être instanciée directement. Elle sert de squelette pour d'autres classes qui héritent d'elle.

- **Caractéristiques**:
    - Peut contenir des méthodes abstraites (sans implémentation) que les classes dérivées doivent implémenter.
    - Peut également contenir des implémentations complètes qui peuvent être héritées ou surchargées.
- **But** : Fournir un modèle général pour un ensemble de sous-classes, imposer une structure et garantir une certaine uniformité dans les classes dérivées.

```php 
abstract class Vehicule {
    public $vitesse;

    abstract public function demarrer();

    public function arreter() {
        echo "Le véhicule s'arrête";
    }
}

class Voiture extends Vehicule {
    public function demarrer() {
        echo "La voiture démarre";
    }
}

$maVoiture = new Voiture();
$maVoiture->demarrer(); // Affiche : La voiture démarre

```
#### Interfaces

Une interface est un contrat ou une garantie que certaines méthodes seront présentes dans les classes qui l'implémentent. Les interfaces spécifient ce qu'une classe doit faire, mais pas comment elle doit LE faire.

- **Fonctionnement**: Une interface définit des méthodes (sans corps) que les classes implémentant doivent définir.
- **Utilisation**: Permet de créer des systèmes flexibles et interchangeables, où les objets peuvent être remplacés par d'autres objets qui implémentent les mêmes interfaces, favorisant ainsi le découplage et l'extensibilité.

```php
interface InstrumentMusical {
    public function jouer();
}

class Guitare implements InstrumentMusical {
    public function jouer() {
        echo "La guitare joue de la musique";
    }
}

class Piano implements InstrumentMusical {
    public function jouer() {
        echo "Le piano joue de la musique";
    }
}

function demarrerConcert(InstrumentMusical $instrument) {
    $instrument->jouer();
}

demarrerConcert(new Guitare()); // Affiche : La guitare joue de la musique
demarrerConcert(new Piano());   // Affiche : Le piano joue de la musique

```


### 5. Encapsulation et Gestion des Accès

#### Encapsulation

L'encapsulation est le concept de regrouper les données et les méthodes qui manipulent ces données au sein d'une même unité (classe), et de contrôler leur accès de l'extérieur.

```php
class CompteBancaire {
    private $solde;

    public function __construct($montantInitial) {
        $this->solde = $montantInitial;
    }

    public function deposer($montant) {
        $this->solde += $montant;
    }

    public function retirer($montant) {
        if ($montant <= $this->solde) {
            $this->solde -= $montant;
        } else {
            echo "Solde insuffisant";
        }
    }

    public function getSolde() {
        return $this->solde;
    }
}
```

#### Gestion des Accès

Les getters et setters sont des méthodes publiques utilisées pour accéder ou modifier les propriétés privées ou protégées d'une classe.

```php
class Personne {
    private $nom;

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
}
```

### 6. Composition vs Héritage

#### Composition

La composition est un principe de conception où une classe est composée d'objets d'autres classes, plutôt que d'hériter de ces classes. Cela permet une plus grande flexibilité et réduit le couplage fort.

```php
class Moteur {
    // ...
}

class Voiture {
    private $moteur;

    public function __construct(Moteur $moteur) {
        $this->moteur = $moteur;
    }
}
```

#### Héritage

L'héritage est un mécanisme où une classe (fille) hérite des propriétés et méthodes d'une autre classe (parent). Il est utile pour la réutilisation du code, mais doit être utilisé judicieusement pour éviter la complexité excessive.

### 7. Méthodes et Propriétés Statiques

Les méthodes et propriétés statiques appartiennent à la classe elle-même plutôt qu'à une instance de la classe. Elles sont accessibles sans créer une instance de la classe.

```php
class Mathematiques {
    public static function additionner($a, $b) {
        return $a + $b;
    }
}

$resultat = Mathematiques::additionner(5, 10); // Pas besoin d'instancier
```

### 8. Méthodes Magiques

PHP fournit un ensemble de méthodes "magiques" qui ont des comportements spéciaux. Les plus courantes sont `__construct()`, `__destruct()`, `__get()`, `__set()`, `__call()`, etc.

```php
class Exemple {
    public function __get($propriete) {
        echo "Lecture de la propriété non accessible: $propriete";
    }

    public function __set($propriete, $valeur) {
        echo "Écriture dans la propriété non accessible: $propriete";
    }
}
```

### 9. Espace de Noms (Namespaces)

Les namespaces en PHP sont utilisés pour organiser et regrouper des classes, interfaces, fonctions et constantes pour éviter les conflits de noms.

```php
namespace MonProjet\Utilitaires;

class Outil {
    // ...
}

// Utilisation
$outil = new \MonProjet\Utilitaires\Outil();
```

### 10. Conclusion et Pratiques Avancées

- **Utilisation des exceptions** : Pour une gestion d'erreur plus robuste.
- **Patterns de conception avancés** : Comme l'observateur, le décorateur, etc.
- **Tests unitaires et TDD** (Test-Driven Development) : Pour améliorer la qualité et la fiabilité du code.
- **Frameworks PHP orientés objet** : Laravel, Symfony, etc., pour voir la POO en action dans des environnements professionnels.