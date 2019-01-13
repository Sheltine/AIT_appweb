# STI - projet 1
## Lancement
Pour lancer l'application, il faut exécuter _./run.sh_. Ce script devrait:  
- Tuer les potentiels containers parasites  
- Lancer un nouveau container docker pour l'application 
- Vous donner les droits d'écritures sur la base de données   
- Réinitialiser la base de données  
- Populer la base de données avec des valeurs  
  Vous pouvez ensuite ouvrir un navigateur à l'adresse _localhost:8080_ et l'application devrait fonctionner! Vous pouvez vous connecter avec ces identifiants:  
  Login: Mr_rubinstein  
  Password: Mr_rubinstein

### Vulnérabilités

#### Chifffrement 

hash des passwords pas fait

#### XSS dans les messages

- Dans le champs message d'un email on entre la ligne suivante : 

```
" onfocus="alert(1);" autofocus=""> <input type="textfield
```

le code précédent va terminer l'attribut value de l'élément input puis mettre le script sur l'attribut onfocus. Ensuite on ferme la balise et on en ouvre une nouvelle afin que le champ disabled s'applique à la suivante.

### Horizontal vulnerability

Marche à suivre : 

1. faite une requête delete d'un message avec burp en écoute
2. capturez la requête dans le repeater
3. changez l'id de l'élément à delete dans la requête répétée
4. envoyez la requête répétée 
5. voilà vous avez supprimé un message qui peut ne pas être le vôte.

### Non sécurisation des méthodes d'administration

Marche à suivre : 

1. Faire une méthode comme par exemple passer un utilisateur "collaborateur" en "administrateur"
2. l'attaquant doit donc capturer la requête avec burp par exemple
3. l'attaquant remplace le nom du compte par le sien et peut alors se passer en admin

Pour cela le body de la requête post est : `login=Yann&role=0&validity=true&saveInfo=`

On peut aussi imaginer le scénario ou la requête est récupére via une écoute wireshark

**On peut faire la même chose avec la validité d'un compte**



#### injection SQL Login

- Sur la page de login dans le champs Username mettre un username d'un administrateur et dans le champ password mettre 

`1"or true`

1"or true or "

Cela nécéssite de connaitre le nom d'un utilisateur par exemple un administrateur

**Explications**

```php
public function checkLogin($login, $password){
    $stmt = $this->pdo->prepare("SELECT password FROM users WHERE login=:login");
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $val = $stmt->fetch();
    if($val["password"] === $password){
        return true;
    }
    return false;
}
```

Lors du test du if, il vérifie si le password de la base de donnée correspond au password entré et ici on demande si il est égale à 1, ce qui ne sera surement pas le cas et après on lui dit "or true".

