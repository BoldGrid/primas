<?php 
function boldgrid_theme_framework_config( $boldgrid_framework_configs ) {
	/**
	 * General Configs
	 */
	$boldgrid_framework_configs['theme_name'] = 'boldgrid-primas'; // Text domain
	$boldgrid_framework_configs['customizer-options']['typography']['enabled'] = true;
	$boldgrid_framework_configs['temp']['attribution_links'] = true;

	/**
	 * Customizer Configs
	 */
	$boldgrid_framework_configs['customizer-options']['colors']['enabled'] = true;
	$boldgrid_framework_configs['customizer-options']['colors']['defaults'] = array (
		array (
			'default' => true,
			'format' => 'palette-primary',
			'colors' => array(
                '#12baa9',
                '#36d7b7',
                '#ffffff',
			)
		),
		array (
			'format' => 'palette-primary',
			'colors' => array(
                '#cc6326',
                '#f8872e',
                '#ffffff',
			)
		),
		array (
			'format' => 'palette-primary',
			'colors' => array(
                '#69d2e7',
                '#0b486b',
                '#ffffff',
			)
		),
		array (
			'format' => 'palette-primary',
			'colors' => array(
                '#99958e',
                '#cb2e41',
                '#8d2138',
			)
		),
		array (
			'format' => 'palette-primary',
			'colors' => array(
                '#73587f',
                '#9f8899',
                '#00102d',
			)
		)
	);

	// Get Subcategory ID from the Database
	$boldgrid_install_options = get_option( 'boldgrid_install_options', array() );
	$subcategory_id = null;
	if ( !empty( $boldgrid_install_options['subcategory_id'] ) ) {
		$subcategory_id = $boldgrid_install_options['subcategory_id'];
	}

	// Override Options per Subcategory
	switch ( $subcategory_id ) {
		case 14: //<-- Fashion
			$boldgrid_framework_configs['customizer-options']['colors']['defaults'][4]['default'] = true;
			break;
		
		// Default Behavior
		default:
			$boldgrid_framework_configs['customizer-options']['colors']['defaults'][0]['default'] = true;
			break;
	}

	// Text Contrast Colors
	$boldgrid_framework_configs['customizer-options']['colors']['light_text'] = '#ffffff';
	$boldgrid_framework_configs['customizer-options']['colors']['dark_text'] = '#333333';

	// Typography Headings
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['headings_font_family'] = 'Raleway';
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['headings_font_size'] = 16;
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['headings_text_transform'] = 'uppercase';

	// Typography Alternate Headings
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['alternate_headings_font_family'] = 'Raleway';
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['alternate_headings_font_size'] = 18;
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['alternate_headings_text_transform'] = 'uppercase';

	// Typography Navigation
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['navigation_font_family'] = 'Oswald';
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['navigation_font_size'] = 14;
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['navigation_text_transform'] = 'uppercase';

	// Typography Body
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['body_font_family'] = 'Raleway';
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['body_font_size'] = 14;
	$boldgrid_framework_configs['customizer-options']['typography']['defaults']['body_line_height'] = 175;

	// Typography Relationships
	$boldgrid_framework_configs['customizer-options']['typography']['selectors']['.wc-gallery .gallery-caption h2' ]= array(
		'type' => 'headings',
		'round' => 'floor',
		'amount' => 3.8, 
	);
	$boldgrid_framework_configs['customizer-options']['typography']['selectors']['.mod-gamma-1 h2' ]= array(
		'type' => 'headings',
		'round' => 'floor',
		'amount' => 1.1, 
	);

	// Fonts & Icons
	$boldgrid_framework_configs['social-icons']['type'] = 'icon';
	$boldgrid_framework_configs['social-icons']['size'] = 'large';

	// Menu Locations
	$boldgrid_framework_configs['menu']['locations']['secondary'] = "Above Header";
	$boldgrid_framework_configs['menu']['locations']['tertiary'] = "Above Social Media";
	$boldgrid_framework_configs['menu']['locations']['social'] = "Top Right Social Media";

	// Background
	$boldgrid_framework_configs['customizer-options']['background']['defaults']['boldgrid_background_type'] = 'pattern';
	$boldgrid_framework_configs['customizer-options']['background']['defaults']['boldgrid_background_pattern'] = 'maze-white.png';
	$boldgrid_framework_configs['customizer-options']['background']['defaults']['background_image'] = false;
	$boldgrid_framework_configs['scripts']['boldgrid-sticky-footer'] = true;
	
	/**
	 * Widgets
	 */
	$boldgrid_framework_configs['widget']['widget_instances']['call-to-action'] = <<<HTML
		<div class="row call-to-action-wrapper">
			<div class="col-md-12">
				<div class="call-to-action">
					<a class="button-primary" href="/about-us">Learn More</a>
				</div>
			</div>
		</div>
HTML;

	// Widget 1
	/**
	 * Widget Content Generally Goes Here
	 */

	// Name Widget Areas
	$boldgrid_framework_configs['widget']['sidebars']['boldgrid-widget-1']['name'] = 'Above Header';
	$boldgrid_framework_configs['widget']['sidebars']['boldgrid-widget-2']['name'] = 'Above Primary Menu';
	
	// Configs above will override framework defaults
	return $boldgrid_framework_configs;
}
add_filter( 'boldgrid_theme_framework_config', 'boldgrid_theme_framework_config' );

/**
 * Site Title & Logo Controls
 */
function filter_logo_controls( $controls ) {
	$controls['logo_font_size']['default'] = 30;

	// Controls above will override framework defaults
	return $controls;
}
add_filter( 'kirki/fields', 'filter_logo_controls' );
