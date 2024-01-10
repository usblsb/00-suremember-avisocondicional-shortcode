# Suremembers Aviso Condicional - Plugin WordPress

## Descripción
El plugin "Suremembers Aviso Condicional" para WordPress introduce un shortcode `[suremember-aviso-condicional]` que muestra de forma condicional un aviso de contenido restringido. Este aviso se personaliza en función del estado de inicio de sesión del usuario y de su membresía activa en el plugin SUREMEMBER, ofreciendo botones para acceder o suscribirse según sea necesario.

## Tabla de Contenidos
1. Instalación
2. Uso
3. Personalización
4. Documentación Adicional
5. Advertencias
6. Licencia
7. Estado del Proyecto
8. Créditos
9. Capturas de Pantalla

## Instalación
1. Descarga el plugin desde [webyblog.es](https://webyblog.es/).
2. Accede al área de administración de WordPress y ve a 'Plugins' > 'Añadir Nuevo'.
3. Elige 'Subir Plugin', carga el archivo descargado y haz clic en 'Instalar Ahora'.
4. Activa el plugin tras la instalación.

## Uso
Para utilizar el aviso condicional, inserta el shortcode `[suremember-aviso-condicional]` en cualquier página, entrada o widget donde desees mostrar el mensaje. El aviso se adaptará automáticamente según el estado de membresía y de inicio de sesión del usuario.

En este caso, el shortcode [suremember-aviso-condicional] se puede usar para mostrar un aviso de contenido restringido en función de diferentes condiciones del plugin de membresía SUREMEMBER.

Cuando el shortcode es llamado, se ejecuta la función cta_suremember_aviso_condicional_shortcode.

Esta función utiliza la función is_user_logged_in para verificar si un usuario está registrado. Dependiendo del resultado, se mostrarán diferentes tipos de contenido.

Si el usuario está registrado, el plugin verifica el rol del usuario utilizando la función jl_has_user_role.

Si el usuario es un 'sc_customer' y también un 'suremember-usuario-activo', el plugin no muestra ningún contenido.

Si el usuario es un 'sc_customer', pero no es un 'suremember-usuario-activo', se muestra un aviso que indica que no pueden ver el contenido privado porque su membresía no está activa.

Si el usuario está registrado, pero no es un 'sc_customer', se muestra un aviso indicando que es extraño que estén registrados pero no sean clientes. Además, se muestra una advertencia de contenido restringido, con enlaces a la página de Acceder y Suscribirse.

Si el usuario no está registrado, solo se muestra la advertencia de contenido restringido, con botones y enlaces a las páginas de Acceder y Suscribirse.


## Personalización
Puedes personalizar el estilo del aviso editando el archivo CSS incluido (`style-suremember-avisocondicional-new.css`). Además, puedes ajustar los mensajes y los enlaces de los botones directamente en el código del shortcode.

## Documentación Adicional
Para más detalles sobre la creación y gestión de shortcodes en WordPress, puedes visitar la [documentación oficial de WordPress](https://developer.wordpress.org/plugins/shortcodes/).

## Advertencias
Este plugin se proporciona "tal cual", sin garantías. El uso del plugin es bajo la responsabilidad del usuario.

## Licencia
Este plugin está licenciado bajo la Licencia Pública General de GNU, versión 2 (GPL2).

## Estado del Proyecto
El proyecto está en su versión 1.0, con fecha de última actualización el 04-01-2024. Se recomienda revisar actualizaciones periódicas para mejoras y correcciones.

## Créditos
Desarrollado por Juan Luis Martel. Para más información y otros proyectos interesantes, visita su sitio web [webyblog.es](https://webyblog.es/).

## Capturas de Pantalla
*Capturas de pantalla mostrando el funcionamiento del plugin serán añadidas próximamente.*