<?php defined('C5_EXECUTE') or die('Access Denied.');

// Activation check
if ($editMode) {
    if (!$activated) {
        echo '<div style="color:#d00; background-color:#fdd; border: 1px solid #d00">' . t('Php Code Block is disabled.') . '</div>';
        if (!$interpreted) {
            echo '<div>' . t('PHP/HTML code not interpreted.') . '</div>';

            return;
        }
    }
} elseif (!$activated) {
    return;
}
?>
<div id="PhpCodeBlock<?php echo (int) $bID?>" class="PhpCodeBlock">
<?php eval('?>' . $content); ?>
</div>