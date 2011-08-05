<?php
$settings_prefix = "brunelleschi_settings_";
$settings_fields = array(
	array(
		'type' => 'start'
	),
	array(
		'type' => 'icon'
	),
	array(
		'type' => 'title',
		'value' => 'Brunelleschi Theme Settings'
	),
	array(
		'type' => 'form-start'
	),
	array(
		'type' => 'section-start',
		'heading' => 'Display Settings'
	),
	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'fonts',
		'label' => 'Use Alternative Fonts?',
		'description' => 'Check to use alternative fonts.',
		'std' => ''
	),
	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'site-title',
		'label' => 'Hide Site Title?',
		'description' => 'Check to hide the Site Title.',
		'std' => ''
	),
	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'site-description',
		'label' => 'Hide Site Description?',
		'description' => 'Check to hide the Site Description.',
		'std' => ''
	),
	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'left-heading',
		'label' => 'Use Left Aligned Header Text?',
		'description' => 'Check to left align header text.',
		'std' => ''
	),
	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'use-header-image',
		'label' => 'Enable Header Image?',
		'description' => 'Check to include a Header Image.',
		'std' => ''
	),
	array(
		'type' => 'select',
		'name' => $settings_prefix . 'header-order',
		'label' => 'Header Text or Banner Image on Top?',
		'description' => 'Choose the order you want the header to display.',
		'options' => array(
			'Text on Top',
			'Text on the Left',
			'Text on the Right',
			'Text on the Bottom'
		),
		'std' => 'Text on Top'
	),
	array(
		'type' => 'select',
		'name' => $settings_prefix . 'sidebar',
		'label' => 'Left, Right, or No Sidebar?',
		'description' => 'Pick which side you want the sidebar on. Choose none for no sidebar.',
		'options' => array(
			'left',
			'right',
			'none'
		),
		'std' => 'right'
	),
	array(
		'type' => 'select',
		'name' => $settings_prefix . 'sidebar-width',
		'label' => 'How Many Columns Should the Sidebar Occupy?',
		'description' => 'Pick a number between two and eight.',
		'options' => array(
			'two',
			'three',
			'four',
			'five',
			'six',
			'seven',
			'eight'
		),
		'std' => 'three'
	),
	array(
		'type' => 'select',
		'name' => $settings_prefix . 'content-width',
		'label' => 'Content Width:',
		'description' => 'Choose the overall Content Width in pixels.',
		'std' => '960',
		'options' => array(
			'800',
			'960',
			'1024',
			'1140'
		)
	),
	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'box-shadow',
		'label' => 'Use box shadow?',
		'description' => 'Check to add a groovy box shadow (new browsers only)',
		'std' => ''
	),
	array(
		'type' => 'textarea',
		'name' => $settings_prefix . 'extra-css',
		'label' => 'Enter additional CSS here:',
		'description' => 'Caution! CSS is very powerful!',
		'std' => ''
	),
	array(
		'type' => 'section-end'
	),
	array(
		'type' => 'form-end'
	),
	array(
		'type' => 'end'
	)
);

function brunelleschi_settings_render_fields() {
	global $settings_fields,$settings_prefix;
	foreach ( $settings_fields as $field ) {
		switch( $field['type'] ) {
			case 'start':?>
				<div class="wrap">
				<?php if ( isset( $_GET['settings-updated'] ) && 'true' == esc_attr( $_GET['settings-updated'] ) ) echo '<div class="updated fade below-h2" style="padding: 5px 10px; margin: 15px 0 0 0;"><strong>' . __( 'Settings saved.', 'brunelleschi') . '</strong></div>'; ?>
				<?php
				break;
			case 'end':?>
				</div><!-- .wrap --><?php
				break;
			case 'icon':?>
				<div id="icon-options-general" class="icon32">
					<br />
				</div><?php
				break;
			case 'title':?>
				<h2><?php echo $field['value']; ?></h2><?php
				break;
			case 'form-start':?>
				<div class="metabox-holder">
				<form method="post" action="options.php">
				<?php
				settings_fields($settings_prefix . 'group');
				do_settings_sections($settings_prefix . 'group');
				break;
			case 'form-end':?>
					<p class="submit">
						<input type="submit" class="button-primary" value="Save Changes" />
					</p>
				</form>
				</div><!-- .metabox-holder --><?php
				break;
			case 'section-start':?>
				<div class="postbox-container" style="width:100%">
					<div class="meta-box-sortables">
						<div class="postbox " > 
							<div class="handlediv" title="Click to toggle">
								<br />
							</div><!-- .handlediv -->
							<h3 class='hndle'><?php echo $field['heading']; ?></h3> 
							<div class="inside">
   								<table class="form-table"><tbody><?php
				break;
			case 'section-end':?>
				</tbody></table></div><!-- .inside --></div><!-- .postbox --></div><!-- .meta-box-sortables --></div><!-- postbox-container --><?php
				break;
			case 'text':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<input type="text" class="regular-text" value="<?php if ( $opt = get_option($field['name']) ) { echo $opt; } else { echo $field['std']; } ?>" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" />
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
 			case 'checkbox':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<input type="checkbox" class="checkbox" value="checked" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" <?php checked( get_option($field['name']) , 'checked' ); ?> />
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
			case 'select':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<select class="select" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" />
							<?php foreach($field['options'] as $option){ ?>
							<?php if(get_option($field['name'])) { $opt = get_option($field['name']); } else { $opt = $field['std']; } ?>
								<option value="<?php echo $option; ?>" <?php selected( $opt, $option ); ?>><?php echo $option; ?></option>
							<?php } ?>
						</select>
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
			case 'textarea':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<textarea class="textarea" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" cols="50" rows="4"><?php if(!get_option($field['name'])) { echo get_option($field['std']); } else { echo get_option($field['name']); } ?></textarea>
						<br/>
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
		}
	}
}
add_action('admin_menu',$settings_prefix . 'menu');

function brunelleschi_settings_menu() {
	global $settings_prefix;
	add_theme_page('Brunelleschi Settings','Brunelleschi Settings','manage_options','brunelleschi-settings',$settings_prefix . 'render_fields');
	add_action('admin_init',$settings_prefix . 'register');
}

function brunelleschi_settings_register() {
	global $settings_fields,$settings_prefix;
	foreach ( $settings_fields as $field ) {
		if ( isset($field['name']) ) {
			register_setting($settings_prefix . 'group',$field['name']);
			add_option($field['name'],$field['std']);
		}
	}
}