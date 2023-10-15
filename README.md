## ACTIVITAT

A través d'un formulari en PHP (amb totes les etiquetes HTML en format DOCTYPE) afegir les dades d'usuaris (alumnat i professorat) utilitzant el mètode procedimental.

A **phpMyAdmin**, crear una BBDD de nom Users i la taula de nom user.

A la taula user, afegir dades d'alumnat i professorat des d'un programa en PHP connectant-se a la BBDD Users.

### Dades alumnat/professorat que han d'estar al formulari:

- `user_id` (PK INT)
- `name` (VARCHAR, 255)
- `surname` (VARCHAR, 255)
- `password` (VARCHAR, 255)
- `email` (VARCHAR, 255)
- `rol` (alumnat, professorat) (ENUM)
- `active` (si l'usuari està actiu o bloquejat) (BOOL)

La pràctica constarà de:

- Un fitxer HTML pel formulari. Contindrà el formulari segons els camps indicats anteriorment. S'enviarà la informació a través de POST al fitxer PHP.
- Un fitxer PHP per les gestions de les bases de dades. Contindrà la connexió i les queries a les BBDD, codi defensiu i el tancament de la connexió.
- Un fitxer PHP pel resultat. Informarà del resultat final del procés d'afegir un usuari. Si tot el procés ha anat bé un cop feta la inserció de l'usuari a les BBDD s'ha de redireccionar a una pàgina simple on només apareixerà el text "S'ha guardat l'usuari correctament".

```php
header('Location: mostrar.php');
![Antes BD](BDAntes.jpg)
![Datos rellenos](Datos.png)
![Redireccionamiento](redireccion.jpg)
![Despues BD](DespuesBD.jpg)