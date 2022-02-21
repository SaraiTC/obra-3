# OBRA SOL - DEMO 2

## Creación de un nuevo proyecto + Instalación de dependencias

Pasos hechos en conjunto con el grupo (laragon/www/):

- mkdir obra-2
- cd obra-2
- npm init -y
- npm install bootstrap
- npm i bootstrap-icons
- npm install autoprefixer -D
- npm install node-sass -D
- npm install nodemon -D
- npm install npm-run-all -D
- npm install postcss -D
- npm install postcss-cli -D
- npm install purgecss -D
- npm install serve -D
- npm install stylelint -D
- npm install stylelint-config-twbs-bootstrap -D
- copiar código de scripts de compilación (en package.json)
- crear index.html
- crear los siguientes archivos con su contenido:
  - .browserslistrc
  - .stylelintrc
  - .stylelintignore
  - .editorconfig

Parte de estilos (sass):

- copiar carpeta de scss
- npm install -g sass
- npm run build

Hacer .gitignore con todo menos nuestras carpetas originales.

## Creación de árbol de directorios propio de la app

La organización se hace por carpetas para evitar confusiones o duplicación de código:

- index.php -> pantalla principal a la que se accede tras logearse -> SIN ESTILOS, SOLO LINKS DE PRUEBA
- conexion (conexion.php + sesion.php) -> HECHO
- login (login.php + logout.php) -> HECHO
- citas, persoas, empresas (aún no completas)

Carpetas de dependencias: assets, node_modules, scss.
Archivos sueltos de dependencias.

## Extensión de la base de datos y Modificación de Código

Registros (persoas y empresas): Sarai

Formación (persoas): Ángela y Fernando

Experiencia (persoas): Xabi

Ofertas:

Método (JS) para tener varias pestañas en una misma página: Noe, ver en nuevo.php de persoas o empresas

- Implementación de formularios en la estructura de pestañas
- Sin header, footer ni estilos que no sean de bootstrap (de momento cdn)
