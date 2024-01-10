<?php
/**
 * Plugin Name: 00 Suremembers Aviso Condicional ON
 * Plugin URI: https://webyblog.es/
 * Description: Shortcode [suremember-aviso-condicional] muestra si es necesario un aviso de contenido restringido condicionalmente, en funcion de su estado de logeado y de su membresia activa. Y botones para acceder o suscribirse con el plugin de membresía SUREMEMBER
 * Version: 04-01-2024
 * Author: Juan Luis Martel
 * Author URI: https://webyblog.es/
 * License: GPL2
 */


if ( ! defined( 'ABSPATH' ) ) exit;


/* Cargamos el CSS externo y le añadimos dinamicamente la version del propio plugin */
function enqueue_avisocondincional_styles() {
    $css_file = 'style-suremember-avisocondicional-new.css';
    $plugin_data = get_plugin_data( __FILE__ );
    $plugin_version = $plugin_data['Version'];

    wp_enqueue_style( 'suremember-avisocondicional', plugins_url( $css_file, __FILE__ ), array(), $plugin_version );
}
add_action( 'wp_enqueue_scripts', 'enqueue_avisocondincional_styles' );





/* Función personalizada *jl_tiene_el_role* para comprobar si el usuario tiene un rol específico */
function jl_tiene_el_role($check_role){
    $user = wp_get_current_user();
    if(in_array( $check_role, (array) $user->roles )){
        return true;
    }
    return false;
}

function cta_suremember_aviso_condicional_shortcode() {
    ob_start();
?>

<!-- Inicio plugin 00 Suremembers Aviso Condicional -->
<?php if ( is_user_logged_in() ) { ?>
<!-- Usuario esta logueado: SI -->
	<?php if(jl_tiene_el_role('sc_customer') ) { ?>
		<!-- Usuario esta logueado: SI y es cliente: SI -->
		<?php if(jl_tiene_el_role('suremember-usuario-activo') ) { ?>
			<!-- Usuario esta logueado: SI es cliente: SI y tiene membresia activa: SI -->
		<?php } else { ?>
			<!-- Usuario esta logueado: SI ,es cliente: SI, pero NO tiene membresia activa o ha caducado-->
<div class="jl-alerta-main-membresia-noactiva-aviso-condicional">
	<div class="jl-alerta-membresia-noactiva-aviso-condicional" data-ga-label="jl-alerta-membresia-noactiva-aviso-condicional">
		<span class="suremember-aviso-condicional-texto-header-h1">No puedes ver el contenido Privado</span><br>
		<span class="suremember-aviso-condicional-texto-header-h2">Error 001: No tienes una membresía Activa</span><br>
		<div class="jl-alerta-membresia-noactiva-aviso-condicional-lista">
			<ol class="aviso-condicional-mi-lista">
				<li class="aviso-condicional-mi-item">Es posible que hayas cancelado tu membresía.</li>
				<li class="aviso-condicional-mi-item">Quizás has detenido los pagos desde tu banco.</li>
				<li class="aviso-condicional-mi-item">Tal vez no disponías de suficiente saldo cuando se intentaron los cobros.</li>
				<li class="aviso-condicional-mi-item">Puede que la fecha de vencimiento de tu tarjeta haya pasado.</li>
				<li class="aviso-condicional-mi-item">Por favor, dirígete al menú de "Escritorio" y comprueba la fecha de vencimiento de tu tarjeta. Si es necesario, agrega una nueva tarjeta con saldo suficiente.</li>
				<li class="aviso-condicional-mi-item">En el menú "Escritorio", puedes revisar el "Historial de pedidos" para ver si algún "Pago ha Fallado".</li>
				<li class="aviso-condicional-mi-item">Si requieres asistencia, no dudes en "Contactar con Soporte".</li>
			</ol>
		</div>
	<div class="div-suremember-aviso-condicional-botones-error001">	
		<div class="div-suremember-aviso-condicional-button-error001">	
			<div class="div-suremember-aviso-condicional-button-ayuda">
				<a class="a-button-aviso-condicional a-button-aviso-condicional-ayuda" rel="noopener noreferrer nofollow" data-ga-label="Ayuda" target="_self" href="/web-preguntas-frecuentes/">¿Ver Ayudas?</a>
			</div>
		</div>
		<div class="div-suremember-aviso-condicional-button-error001">	
			<div class="div-suremember-aviso-condicional-button-soporte">
				<a class="a-button-aviso-condicional a-button-aviso-condicional-soporte" rel="noopener noreferrer nofollow" data-ga-label="Soporte" target="_self" href="/web-soporte/">¡Contactar con Soporte!</a>
			</div>
		</div>
	</div>
	</div>
</div>
		<?php } ?>
	<?php } else { ?>
<!-- Usuario esta logueado: SI pero NO es cliente -->
<div class="jl-alerta-main-membresia-noactiva-aviso-condicional">
<div class="jl-alerta-membresia-noactiva-aviso-condicional" data-ga-label="jl-alerta-membresia-noactiva-aviso-condicional">
	<span class="suremember-aviso-condicional-texto-header-h2">ESTO ES MUY EXTRAÑO</span></br>
	<span class="suremember-aviso-condicional-texto-header-h2">ESTAS LOGUEADO</span></br>
	<span class="suremember-aviso-condicional-texto-parrafo-h3">TÚ NO ERES CLIENTE SUSCRIBETE PARA VER TODO EL CONTENIDO PRIVADO</span></br>
		<div class="div-suremember-aviso-condicional-button-ayuda">
			<a class="a-button-aviso-condicional a-button-aviso-condicional-ayuda" rel="noopener noreferrer nofollow" data-ga-label="Ayuda" target="_self" href="/web-preguntas-frecuentes/">¿Ayuda?</a>
		</div>
</div>
</div>
<!-- Muestro aviso de contenido restringido  -->	
<div class="suremember-aviso-condicional-main">
	<div class="suremember-aviso-condicional-texto">		
		<div class="suremember-aviso-condicional-texto-header-div">
			<span class="suremember-aviso-condicional-texto-header">Contenido Restringido</span>
		</div>
		<div class="suremember-aviso-condicional-texto-parrafo-div">
			<span class="suremember-aviso-condicional-texto-parrafo">Parte del contenido es solo visible a los suscritores.</span>
		</div>
	</div>
	<div class="suremember-aviso-condicional-botones">
		<div class="div-suremember-aviso-condicional-button">
			<a class="a-button-aviso-condicional a-button-aviso-condicional-acceder" rel="noopener noreferrer nofollow" data-ga-label="Acceder" target="_self" href="/customer-dashboard/">Acceder</a>
		</div>
		<div class="div-suremember-aviso-condicional-button">
			<a class="a-button-aviso-condicional a-button-aviso-condicional-sustibirse" rel="noopener noreferrer nofollow" data-ga-label="Suscribirse" target="_self" href="/registro-mensual/">Suscribirse</a>
		</div>
	</div>
</div>

		
	<?php } ?>
<?php } else { ?>
	<!-- Usuario esta logueado: NO  -->	
	<!-- Muestro aviso de contenido restringido  -->	
<div class="suremember-aviso-condicional-main">
	<div class="suremember-aviso-condicional-texto">		
		<div class="suremember-aviso-condicional-texto-header-div">
			<span class="suremember-aviso-condicional-texto-header">Contenido Restringido</span>
		</div>
		<div class="suremember-aviso-condicional-texto-parrafo-div">
			<span class="suremember-aviso-condicional-texto-parrafo">Parte del contenido es solo visible a los suscritores.</span>
		</div>
	</div>
	<div class="suremember-aviso-condicional-botones">
		<div class="div-suremember-aviso-condicional-button">
			<a class="a-button-aviso-condicional a-button-aviso-condicional-acceder" rel="noopener noreferrer nofollow" data-ga-label="Acceder" target="_self" href="/customer-dashboard/">Acceder</a>
		</div>
		<div class="div-suremember-aviso-condicional-button">
			<a class="a-button-aviso-condicional a-button-aviso-condicional-sustibirse" rel="noopener noreferrer nofollow" data-ga-label="Suscribirse" target="_self" href="/registro-mensual/">Suscribirse</a>
		</div>
	</div>
</div>

	
<?php } ?>


<!-- FIN plugin 00 Suremembers Aviso Condicional -->
<?php
	return ob_get_clean();
}
add_shortcode( 'suremember-aviso-condicional', 'cta_suremember_aviso_condicional_shortcode' );
?>