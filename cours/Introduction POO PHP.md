
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
4. **Design Patterns en POO**
   - Présentation générale des Design Patterns
   - Le Pattern Singleton
5. Encapsulation & Gestion des Accès
6. Composition vs Héritage
7. Méthodes et Propriétés Statiques
8. Méthodes Magiques
9. Espace de Noms (Namespaces)
10.  Conclusion et Pratiques Avancées

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

```php
class Personne {
    public $nom;
    public function sePresenter() {
        echo "Bonjour, je suis " . $this->nom;
    }
}

$personne = new Personne();
$personne->nom = "Alice";
$personne->sePresenter(); // Affiche : Bonjour, je suis Alice
```

#### Propriétés et Méthodes

- **Propriétés** : Variables définies dans une classe.
- **Méthodes** : Fonctions appartenant à une classe.

#### Le constructeur et le destructeur

```php
class Personne {
    function __construct($nom) {
        $this->nom = $nom;
    }
    function __destruct() {
        echo "Destruction de " . $this->nom;
    }
}
```

#### Visibilité

- **public** : Accessible de n'importe où.
- **private** : Accessible uniquement à l'intérieur de la classe.
- **protected** : Accessible dans la classe et ses classes filles.

### 3. Approfondissement de la POO

#### Héritage

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

Le polymorphisme permet d'utiliser une interface commune pour des types différents.

#### Abstraction

Les classes abstraites servent de modèle pour d'autres classes.

#### Interfaces

Les interfaces définissent un ensemble de méthodes que les classes implémentant doivent définir.

### 4. Design Patterns en POO

#### Présentation générale des Design Patterns

Les design patterns sont des solutions éprouvées à des problèmes courants en conception logicielle.

#### Le Pattern Singleton

Le Singleton est un design pattern qui assure qu'une classe n'a qu'une seule instance et fournit un point d'accès global à cette instance.

```php
class BaseDeDonnees {
    private static $instance = null;

    private function __construct() {
        // Initialisation de la base de données
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new BaseDeDonnees();
        }
        return self::$instance;
    }
}

$db1 = BaseDeDonnees::getInstance();
$db2 = BaseDeDonnees::getInstance();

var_dump($db1 === $db2); // true
```

Dans cet exemple, le pattern Singleton assure que l'objet `BaseDeDonnees` est unique, peu importe combien de fois `getInstance` est appelé.

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