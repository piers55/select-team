<?php 
	$status = null;
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$mensaje = $_POST["mensaje"];
		$to = $_POST["email-advisor"];
		$from = get_current_user_id();
		
		$status = register_mensaje($mensaje, $from, $to);
	}

?>
<?php get_header(); ?>
<?php if($status != null){ ?> 
	<?php if($status){ ?> 
		<p>TODO BIEN</p>
	<?php } else { ?>
		<p>TODO MAL</p>
	<?php } ?>
<?php } ?>
<form role="form" class="" method="post" >
	<select name="email-advisor">
		<?php 
			$users = get_advisors_basic_info(); 
			foreach ($users as $key => $user) 
			{
		?>
			<option value="<?php echo $user->ID; ?>"><?php echo $user->full_name; ?></option>
		<?php } ?>
	</select>
	<div class="clear"></div>
	<textarea rows="4" cols="50" name="mensaje"></textarea>
	<div class="clear"></div>
	<?php if (qtrans_getLanguage() == 'es'){ ?>
		<button type="submit" class=" [ btn-enviar ]">Enviar</button>
	<?php } else { ?>
		<button type="submit" class="[ btn-enviar ]">Send</button>
	<?php } ?>
</form>
<?php get_footer(); ?>