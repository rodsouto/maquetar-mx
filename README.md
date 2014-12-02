## ¿Porque?
Porque al incorporar PHP en la maquetación puedes reutilizar elementos en distintas páginas y evitar la duplicacion del mismo html en distintos archivos, generar loops para repetir secciones, crear funciones específicas para generar markup dummy, etc. Además dispones de algunas utilidades para facilitar la maquetación que veras mas abajo.

## ¿Cómo usar este repositorio?
Simplemente clonalo o descargate el zip. Cada página que maquetes debe ir en el root (puedes usar `example-page.php` como base).

Cualquier otro archivo PHP que crees y que no sea una página propiamente dicha sino una sección en particular, un elemento común a muchas paginas, etc., ponlo dentro de `/inc` así al momento de exportar los HTMLs no generará ningún archivo extra.

## ¿Puedo generar HTMLs a partir de los PHPs?
Si, es mas te recomiendo que lo hagas. Simplemente ingresa a `/export.php` y automáticamente se copiarán todos los archivos necesarios en el directorio `/html`, que luego puedes comprimir y enviar al cliente. Todos los archivos PHP ubicados en el root (a excepción de `export.php` y `pages.php`) serán exportados con el mismo nombre pero cambiando la extensión a html.

## ¿Como puedo ver todas las páginas existentes?
Ingresando a `/pages.php`.

## ¿De qué utilidades para maquetar más fácilmente dispongo?
La más importante la puedes activar entrando a la página que quieres maquetar con el parámetro `?maqueta={imagen.jpg}`, donde imagen.jpg es el nombre de una imagen que contiene el diseño de la página que estás maquetando, ubicada en el directorio `/maqueta`. 

También verás que a la izquierda aparecen 4 botones para mover la imagen, cambiarle la opacidad y ocultarla.

En browsers que soporten LocalStorage, se recordará la ubicación de la imagen en cada pagina asi que cada vez que actualices la página la veras en el mismo lugar.

Por último, como las imágenes tienen un ancho fijo generalmente menor a la resolución que estés usando, para empezar la maquetación seguramente quieras usar `?force-container=1` para forzar que el ancho de la página sea 970px (puedes cambiarlo en `footer.php` si el ancho que necesitas es otro), una vez que la página esté correctamente maquetada puedes quitar este parámetro y revisar que se vea bien a resoluciones mayores.

Por último, en todas las páginas puedes usar la variable `$phpFile` que tendrá el nombre del archivo actual, para de esta manera agregar o quitar contenido de acuerdo al archivo que se esta ejecutando (por ejemplo en una pagina se puede querer mostrar el menu para usuarios anonimos y en otra mostrar la version para usuarios registrados y diferenciar una de otra con un if() adentro de header.php)
