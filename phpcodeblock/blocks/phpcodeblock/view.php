<?php   defined('C5_EXECUTE') or die("Access Denied.");

// Activation check
if ( $editMode )
{
	if ( !$activated )
	{
		echo '<div style="color:#d00; background-color:#fdd; border: 1px solid #d00">' . t('Php Code Block is disabled.') . '</div>';
		if ( !$interpreted ) {	
			echo '<div>' . t('PHP/HTML code not interpreted.') . '</div>';
			return;
		}
	}
}
else if ( !$activated ) return;

?>

<div id="PhpCodeBlock<?php   echo intval($bID)?>" class="PhpCodeBlock">
<?php   eval('?>' . $content); ?>
</div>