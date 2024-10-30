<div class="wrap">
<div id="icon-plugins" class="icon32"><br /></div>
<h2>Mootools Configuration</h2>

<?php if( $isPost ): ?>
	<div class="updated"><p><strong>
		<?php _e('Options saved.'); ?>
	</strong></p></div>
<?php endif;?>

	<form name="form1" method="post" action="">
	<div id="poststuff" class="metabox-holder">
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
		
		<div id="post-body">
		<div id="post-body-content">
		<div id="namediv" class="stuffbox">		
		<h3>Mootools Dependency</h3>
		
		<div class="inside">
		<table>
		<tr>
			<td width="35%" nowrap="nowrap">Include in every pages?</td>
			<td>
				<input type="radio" name="allpages" value="1"
				<?php if ($options['allpages']) echo 'checked="checked"'; ?> />
				Yup! Always

				<input type="radio" name="allpages" value="0"
				<?php if (!$options['allpages']) echo 'checked="checked"'; ?> />
				Nope! Called by dependency
			</td>
		</tr>		
		<tr>
			<td nowrap="nowrap">Javascript Libraries Path</td>
			<td><input	type="text" size="20" name="path"
						value="<?php echo $options['path'];?>"/>
			</td>
		</tr>
		<tr>
			<td nowrap="nowrap">Core script filename</td>
			<td><input	type="text" size="25" name="core"
						value="<?php echo $options['core'];?>"/>
			</td>
		</tr>
		<tr>
			<td nowrap="nowrap">More script filename</td>
			<td><input	type="text" size="25" name="more"
						value="<?php echo $options['more'];?>"/>
			</td>
		</tr>
		<tr>
			<td>Handle name</td>
			<td>mootools-more, mootools-more</td>
		</tr>
		<tr>
			<td>Shortcode</td>
			<td>[mootools]</td>
		</tr>		
		</table>
		<br/>
		Note: you can use external script like 
		`http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js`
		</div>
		</div></div></div><!-- post body -->

		<div id="post-body">
		<div id="post-body-content">
		<div id="namediv" class="stuffbox">			
		<h3>Registration: ClientCide</h3>
		
		<div class="inside">
		<table>
		<tr>
			<td width="35%">Script Filename</td>
			<td><input	type="text" size="25" name="cide"
						value="<?php echo $options['cide'];?>"/>
			</td>
		</tr>
		<tr>
			<td>Handle name</td>
			<td>clientcide</td>
		</tr>
		<tr>
			<td>Shortcode</td>
			<td>[clientcide]</td>
		</tr>		
		</table></div>
		</div></div></div><!-- post body -->

		<div id="post-body">
		<div id="post-body-content">
		<div id="namediv" class="stuffbox">			
		<h3>Registration: Mediabox Advance</h3>
		
		<div class="inside">
		<table>
		<tr>
			<td width="35%" nowrap="nowrap">Script Filename</td>
			<td><input	type="text" size="25" name="mbox"
						value="<?php echo $options['mbox'];?>"/>
			</td>
		</tr>
		<tr>
			<td nowrap="nowrap">Style Filename</td>
			<td><input	type="text" size="25" name="style-mbox"
						value="<?php echo $options['style-mbox'];?>"/>
			</td>
		</tr>	
		<tr>
			<td>Handle name</td>
			<td>mediabox-advance</td>
		</tr>
		<tr>
			<td>Shortcode</td>
			<td>[mediabox-advance]</td>
		</tr>							
		</table></div>
		</div></div></div><!-- post body -->	

		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options') ?>" />
		</p>
		
	</div><!-- metabox -->	
	</form>
</div>	
<?php 
