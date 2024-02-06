<?php

/**
 *
 * Plugin Name:     Cuestionario
 * Plugin URI:      https://puraweb.com.ar
 * Description:     Selector de cuestionario simple utilizando ACF
 * Version:         1.0
 * Author:          Pura Web - Marcos Tomassi
 * Author URI:      https://puraweb.com.ar
 * Text Domain:     cuestionario-pw
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

define( 'PN_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'PN_PLUGIN_ABSOLUTE', __FILE__ );

function cargar_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'cargar_jquery');



function check_some_other_plugin() {
    if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) || is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
        return;
    }
  }
add_action( 'admin_init', 'check_some_other_plugin' );

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', plugin_dir_path(__FILE__) . '/includes/acf/' );
define( 'MY_ACF_URL', plugin_dir_path(__FILE__) . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the URL setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', '__return_false');

add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_65c147abec609',
	'title' => 'Tipo de Mascota',
	'fields' => array(
		array(
			'key' => 'field_65c147ac1eeec',
			'label' => 'Mascota',
			'name' => 'mascota',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Perro' => 'Perro',
				'Gato' => 'Gato',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_65c147c61eeed',
			'label' => 'Raza',
			'name' => 'raza',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Pequeña' => 'Pequeña',
				'Mediana' => 'Mediana',
				'Grande' => 'Grande',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_65c147db1eeee',
			'label' => 'Edad',
			'name' => 'edad',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Cachorro' => 'Cachorro',
				'Adulto' => 'Adulto',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_65c147f11eeef',
			'label' => 'Condicion',
			'name' => 'condicion',
			'aria-label' => '',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Esterilizado' => 'Esterilizado',
				'Piel Sensible' => 'Piel Sensible',
				'Sobrepeso' => 'Sobrepeso',
				'Ninguna' => 'Ninguna',
			),
			'default_value' => false,
			'return_format' => 'value',
			'multiple' => 0,
			'allow_null' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'cuestionario',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );

add_action( 'init', function() {
	register_post_type( 'cuestionario', array(
	'labels' => array(
		'name' => 'Cuestionarios',
		'singular_name' => 'Cuestionario',
		'menu_name' => 'Cuestionario',
		'all_items' => 'All Cuestionario',
		'edit_item' => 'Edit Cuestionario',
		'view_item' => 'View Cuestionario',
		'view_items' => 'View Cuestionario',
		'add_new_item' => 'Add New Cuestionario',
		'add_new' => 'Add New Cuestionario',
		'new_item' => 'New Cuestionario',
		'parent_item_colon' => 'Parent Cuestionario:',
		'search_items' => 'Search Cuestionario',
		'not_found' => 'No cuestionario found',
		'not_found_in_trash' => 'No cuestionario found in Trash',
		'archives' => 'Cuestionario Archives',
		'attributes' => 'Cuestionario Attributes',
		'insert_into_item' => 'Insert into cuestionario',
		'uploaded_to_this_item' => 'Uploaded to this cuestionario',
		'filter_items_list' => 'Filter cuestionario list',
		'filter_by_date' => 'Filter cuestionario by date',
		'items_list_navigation' => 'Cuestionario list navigation',
		'items_list' => 'Cuestionario list',
		'item_published' => 'Cuestionario published.',
		'item_published_privately' => 'Cuestionario published privately.',
		'item_reverted_to_draft' => 'Cuestionario reverted to draft.',
		'item_scheduled' => 'Cuestionario scheduled.',
		'item_updated' => 'Cuestionario updated.',
		'item_link' => 'Cuestionario Link',
		'item_link_description' => 'A link to a cuestionario.',
	),
	'public' => true,
	'show_in_rest' => true,
	'supports' => array(
		0 => 'title',
		1 => 'thumbnail',
	),
	'delete_with_user' => false,
) );
} );

// Función para manejar la solicitud AJAX
add_action('wp_ajax_buscar_mascota', 'buscar_mascota');
add_action('wp_ajax_nopriv_buscar_mascota', 'buscar_mascota');

function buscar_mascota() {
    // Obtener datos del formulario enviado por AJAX
    parse_str($_POST['form_data'], $form_data);


    // Realizar la búsqueda con los datos del formulario
    $args = array(
        'post_type' => 'cuestionario', // Cambia 'mascota' al nombre de tu tipo de post personalizado
        'meta_query' => array(
            'relation' => 'AND', // Relación entre las condiciones de búsqueda
            array(
                'key' => 'mascota', // Cambia 'mascota' al nombre de tu campo personalizado ACF
                'value' => $form_data['tipo_mascota'],
                'compare' => '='
            ),
            array(
                'key' => 'raza', // Cambia 'raza' al nombre de tu campo personalizado ACF
                'value' => $form_data['raza'],
                'compare' => '='
            ),
            array(
                'key' => 'edad', // Cambia 'edad' al nombre de tu campo personalizado ACF
                'value' => $form_data['edad'],
                'compare' => '='
            ),
            array(
                'key' => 'condicion', // Cambia 'condicion' al nombre de tu campo personalizado ACF
                'value' => $form_data['condicion'],
                'compare' => '='
            )
        )
    );

    $query = new WP_Query($args);

    // Verificar si se encontraron mascotas
    if ($query->have_posts()) {
        // El primer post que coincide con los criterios de búsqueda
        $query->the_post();

        // Obtener la imagen destacada de la mascota
        $imagen_destacada = get_the_post_thumbnail_url(get_the_ID(), 'full');

        // Mostrar la imagen destacada
        if ($imagen_destacada) {
            echo '<img src="' . esc_url($imagen_destacada) . '" alt="Imagen destacada">';
        } else {
            echo 'No se encontró una imagen destacada para esta mascota.';
        }
    } else {
        echo 'No se encontraron mascotas que coincidan con los criterios de búsqueda.';
    }

    // Es importante salir después de enviar la respuesta
    wp_die();
}


function mostrar_formulario_mascota() {
    ob_start();
    ?>
    <style>

        .container {
            max-width: 100%;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
            background-image: url('https://titcangross.puraweb.com.ar/wp-content/uploads/2024/02/Vector.png');
            padding: 4em;
            position: relative;
        }

        form {
            display: flex;
            width: 100% !important;
            gap: 1em;
            max-width: 1600px; /* Limita el ancho máximo del formulario */
            margin: auto; /* Centra el formulario horizontalmente */
            padding: 2em;
            background-color: #D20000;
            color: white;
        }

        .selector {
            width: 100%;
            padding: 2em 3em 2em 3em;
            margin: 0.5em 0;
            background-color: #D20000;
            color: white;
            border: 1px white solid;
            border-radius: 25px;
            text-align: center;
            appearance: none; /* Elimina los estilos nativos del sistema */
        }

        .selector:hover {
            background: white; /* Elimina el borde de enfoque en los select */
            color: #D20000;
        }

        div#resultado-mascota {
            display: flex;
            justify-content: center;
            padding: 3em 0px;
        }

    </style>
    <div class="container">
        <form id="formulario-mascota">
            <select class="selector" title="Mascota" name="tipo_mascota" id="tipo-mascota">
                <option disabled selected>Mascota</option>
                <option value="Perro">Perro</option>
                <option value="Gato">Gato</option>
            </select>

            <select class="selector" title="Raza" name="raza" id="raza">
                <option disabled selected>Raza</option>
                <option value="Pequeña">Pequeña</option>
                <option value="Mediana">Mediana</option>
                <option value="Grande">Grande</option>
            </select>

            <select class="selector" title="Edad" name="edad" id="edad">
                <option disabled selected>Edad</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Adulto">Adulto</option>
            </select>

            <select class="selector" title="Condicion" name="condicion" id="condicion">
                <option disabled selected>Condición</option>
                <option value="Esterilizado">Esterilizado</option>
                <option value="Piel Sensible">Piel Sensible</option>
                <option value="Sobrepeso">Sobrepeso</option>
                <option value="Ninguna">Ninguna</option>
            </select>
        </form>
    </div>
    <div id="resultado-mascota"></div>

    <script>

jQuery(document).ready(function($) {
    var selects = $('#formulario-mascota select');

    selects.last().change(function() {
        var allFieldsFilled = true;

        selects.each(function() {
            if ($(this).val() === '') {
                allFieldsFilled = false;
                return false; // Salir del bucle si un campo está vacío
            }
        });

        if (allFieldsFilled) {
            var formData = $('#formulario-mascota').serialize();

            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'buscar_mascota',
                    form_data: formData
                },
                success: function(response) {
                    $('#resultado-mascota').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error al procesar la solicitud AJAX. Por favor, inténtalo de nuevo.');
                }
            });
        }
    });
});
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('formulario_mascota', 'mostrar_formulario_mascota');