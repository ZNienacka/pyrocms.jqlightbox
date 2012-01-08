<section class="title">
	<h4><?php echo lang('jqlightbox:settings_label'); ?></h4>
</section>

<section class="item">
	
	<?php echo form_open(uri_string(), 'id="jqlightbox" class="crud"'); ?>
	
		<div class="form_inputs">
			
			<fieldset>
				<ul>
					<li class="<?php echo alternator('', 'even'); ?>">
						<label for="published"><?php echo lang('jqlightbox:published_label'); ?></label>
						<div class="input type_radio">
							<label class="inline"><?php echo form_radio('published', '1', $settings->published == 1)." ".lang('jqlightbox:published_yes_label'); ?></label>
							<label class="inline"><?php echo form_radio('published', '0', $settings->published == 0)." ".lang('jqlightbox:published_no_label'); ?></label>
						</div>
					</li>
					
					<li>
						<label for="css"><?php echo lang('jqlightbox:css_label'); ?></label><br>
						<div class="input">
							<?php echo form_textarea('css', $settings->css, 'class="css_editor"'); ?>
						</div>
					</li>
					
					<li>
						<label for="js"><?php echo lang('jqlightbox:js_label'); ?></label><br>
						<div class="input">
							<?php echo form_textarea('js', $settings->js, 'class="js_editor"'); ?>
						</div>
					</li>
				</ul>
			</fieldset>
	
		</div>
	
		<div class="buttons align-right padding-top">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save') )); ?>
		</div>
	
	<?php echo form_close(); ?>
	
	<script type="text/javascript">
		css_editor('css_editor', '100%');
		js_editor('js_editor', '100%');
	</script>
</section>