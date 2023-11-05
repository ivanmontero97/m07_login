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

# ACTIVITAT 3

Després de desenvolupar la pàgina SignIn (per crear usuaris) haurem de desenvolupar la pàgina del login. 

Haurem de fer:

- Un fitxer html pel login.
  - Serà un formulari amb el mail i el password.
  - Ha de tenir un checkbox “Remember me”
  - El formulari haurà de fer servir el mètode POST.
  - La pàgina tindrà un enllaç per poder crear un usuari (pàgina de la pràctica anterior)
- Totes les pàgines de la pràctica anterior hauran de tenir un enllaç per anar a `login.html`

- Un fitxer php per validar l’usuari i contrasenya a les bases de dades.
  - Consultarà la informació introduïda en la pàgina de login per comprovar si l’usuari i el password coincideixen amb un registre de les BBDD.
  - El tractament serà:
    - Si la consulta retorna un resultat:
      - Si el rol és estudiant; mostrarà per pantalla: el nom, cognom, email
      - Si el rol és professor, mostrarà el nom i cognom del professor i mostrarà la informació de tots els usuaris de les BBDD.
    - En el cas de que no sigui correcte:
      - Tornarà a la pàgina de login i apareixerà un error de “Login incorrecte”.
  - Haureu de crear i fer servir una funció per fer la consulta de tots els usuaris quan el rol és professor.
  - Les constants de la connexió s haurà de fer servir a través d’un fitxer 'dbConf.php'
  - S’haurà de fer servir el `try`, `catch`, i `finally` almenys en un dels casos.
# ACTIVITAT 6

Aquesta activitat serà la continuació de la pràctica del login.

## Refactoritzar el fitxer de la validar.php:

Després del login només haurem de validar que l’usuari existeix a les bases de dades. (S’ha de posar sempre codi defensiu).
En el cas de que el login no sigui correcte tornarem a la pàgina del login, igual que la pràctica anterior.
En canvi, en el cas de que el login sigui correcte:
- Guardarem en sessió:
  - Una variable de sessió per ‘LoggedIn” igual a true.
  - Una variable de sessió pel nom.
  - Una variable de sessió pel rol.
  - Una variable de de sessió pel user_id.
- Ens dirigirem en una nova pàgina d’inici: index.php

## Bones pràctiques:

L’objectiu d’aquest punt és la de millorar el codi, la seva estructura i entendre que s’ha de separar la lògica de negoci amb mostrar la informació de l’usuari per pantalla.

- Crear una pàgina d’inici de l’aplicació (index.php)
  - Mostrarem amb una etiqueta H2: “Hola” . $variable_sessio_nom. “ ets un ”.$variable_sessio_rol.

En el cas de ser un professor, s’haurà de fer una consulta per mostrar tots els usuaris de la BBDD (igualment que a la pràctica anterior però l’haurem de fer en la pàgina d’inici), en aquest cas es mostrarà a través d’una taula.

- Afegirem dos enllaços a la pàgina:
  1. Mostrar informació detallada de l’usuari.
     - Anirem a una pàgina on consultarem a les bases de dades tots els camps de les bases de dades de l’usuari.
     - Aquest enllaç s’haurà de fer a través del mètode GET passant el valor de ID de l’usuari.
  2. Desconnectar. (Tancarem la sessió)
     - Serà un fitxer php on farem el procés de tancar sessió.
     - Un cop fet tots els passos correctament ens redirigirà a la pàgina d’inici.

**Important:** Totes les pàgines que ens trobem després de fer el login, han de tenir el control de que si no hem fet un login han de redireccionar a la pantalla del login.

# ACTIVITAT 7

Seguint la pràctica anterior:

## Modificació de les pàgines:

- index.php
- mostrar info.php

## Creació de dos fitxers nous:

- idioma.php: on guardarem el valor de l idioma seleccionat en una cookie.
- delete.php: Per eliminar la cookie.

El funcionament serà igual fins arribar a la pàgina de index.php.

### A index.php:

- Afegirem 4 enllaços: Cat, Es, Eng i Eliminar.
- Per defecte, un dels idiomes haurà d estar seleccionat de color vermell.
- Al seleccionar l idioma s haurà de mostrar el títol de la pàgina, els enllaços de la pàgina i les capçaleres amb l idioma seleccionat.
- S haurà de quedar de color vermell l enllaç de l idioma seleccionat.
- Al seleccionar eliminar cookies,  haurà de quedar la pàgina per defecte.

### A mostrarinfo.php:

- S haurà de traduir l idioma de la pàgina segons l idioma seleccionat en l index.php.

### idioma.php:

- Al seleccionar un idioma de la pàgina index.php haurem d anar a parar a aquesta pàgina.
- Recuperarem el valor de l idioma pel mètode GET.
- Guardarem en una cookie el valor de l idioma seleccionat que durarà 10 minuts.
- Redireccionem a la pantalla index.php.
- Segons l idioma guardat en la cookie haurem de traduir el títol, els enllaços "mostrar informació" i "desconnectar" a l idioma seleccionat.
- L enllaç de l idioma seleccionat ha de quedar de color vermell. Els altres han de quedar de color negre.

### delete.php

- Al seleccionar del cookies, eliminarem la cookie i la pantalla haurà de quedar de la forma habitual.


  ![Registro Alumno](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/RegistroAlumno.png)
  ![Registro Alumno P3](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/usuarioGuardado.)
  ![Registro Alumno BD](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/registroBDAlumno.png)
  ![Registro Alumno Login](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/RegistroAlumno.png)
  ![Registro Alumno Datos rellenos mal](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/datosNoRellenados.png)
  ![Registro Alumno Datos inválidos](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/datosMal.png)
  ![Registro Alumno Results](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/RegistroProfe.png)
  ![Registro Profesor P3](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/RegistroProfe.png)
  ![Registro Profesor BD](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/profesorBD.png)
  ![Registro Profesor Login](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/profesorLogin.png)
  ![Registro Profesor Results](/IvanMonteroFernandez/capturasParaReadMe/PracticaLogin/alumnoResults2.png)



