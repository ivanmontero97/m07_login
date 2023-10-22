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

# ACTIVITAT

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



