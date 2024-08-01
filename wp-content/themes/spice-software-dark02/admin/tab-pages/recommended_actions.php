<?php 
	$spice_software_dark_actions = $this->recommended_actions;
	$spice_software_dark_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="spice-software-dark-tab-pane panel-close">
<div class="action-list">
	<?php if($spice_software_dark_actions): foreach ($spice_software_dark_actions as $key => $spice_software_dark_action): ?>
	<div class="col-md-6">
	<div class="action" id="<?php echo esc_attr($spice_software_dark_action['id']); ?>">
		<div class="action-watch">
		<?php if(!$spice_software_dark_action['is_done']): ?>
			<?php if(!isset($spice_software_dark_actions_todo[$spice_software_dark_action['id']]) || !$spice_software_dark_actions_todo[$spice_software_dark_action['id']]): ?>
				<span class="dashicons dashicons-visibility"></span>
			<?php else: ?>
				<span class="dashicons dashicons-hidden"></span>
			<?php endif; ?>
		<?php else: ?>
			<span class="dashicons dashicons-yes"></span>
		<?php endif; ?>
		</div>
		<div class="action-inner">
			<h3 class="action-title"><?php echo esc_html($spice_software_dark_action['title']); ?></h3>
			<div class="action-desc"><?php echo esc_html($spice_software_dark_action['desc']); ?></div>
			<?php echo wp_kses_post($spice_software_dark_action['link']); ?>
		</div>
	</div>
	</div>
	<?php endforeach; endif; ?>
</div>
</div>