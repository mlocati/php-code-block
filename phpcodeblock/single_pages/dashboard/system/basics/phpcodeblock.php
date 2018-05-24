<?php      defined('C5_EXECUTE') or die("Access Denied.");

$form = \Core::make('helper/form' );
$ui   = \Core::make('helper/concrete/ui');
$dash = \Core::make('helper/concrete/dashboard');

$action = $this->action('save_global_settings');
?>

<form id="phpcodeblock-global-settings" method="post" action="<?php    echo $action?>">
    <div class="alert alert-info"><?php   echo t('Change global settings for Php Code Blocks.')?></div>
    <fieldset>
        <div class="clearfix ccm-pane-body">
            <div class="form-group">
            <div>
                <label style="margin-right:4em" for="activate" title="<?php   echo t("Enable/Disable all Php Code Blocks from your website (in case something went wrong).")?>"><?php   echo t('Activate Php Code Blocks:')?></label>
                 <label><?php    echo $form->radio('activate', 1, $active); ?><span><?php    echo t('Yes');?></span></label>
                 <label><?php    echo $form->radio('activate', 0, $active); ?><span><?php    echo t('No');?></span></label>
					</div><div>              
                 <label style="margin-right:4em" for="interpret" title="<?php   echo t("Enable/Disable block interpretation when blocks are disabled (they are not activated also in edit mode).")?>"><?php   echo t('Interpret code when deactivated:')?></label>
                 <label><?php    echo $form->radio('interpret', 1, $interpreted); ?><span><?php    echo t('Yes');?></span></label>
                 <label><?php    echo $form->radio('interpret', 0, $interpreted); ?><span><?php    echo t('No');?></span></label>
            	</div>
            </div>
			<div class="form-group">
			<?php   echo $form->label('lbltheme', t('Editor theme:')); ?>
			<div class="input">
				<?php   echo $form->select('themeace', array('chrome'=> 'chrome', 'clouds'=> 'clouds','crimson_editor'=> 'crimson_editor','dawn'=> 'dawn','dreamweaver'=> 'dreamweaver', 'eclipse'=> 'eclipse', 'xcode'=> 'xcode','github'=> 'github','solarized_light'=> 'solarized_light','textmate'=> 'textmate','tomorrow'=> 'tomorrow','clouds_midnight'=> 'clouds_midnight','cobalt'=> 'cobalt','idle_fingers'=> 'idle_fingers','kr_theme'=> 'kr_theme','merbivore'=> 'merbivore','merbivore_soft'=> 'merbivore_soft', 'mono_industrial'=> 'mono_industrial', 'monokai'=> 'monokai', 'pastel_on_dark'=> 'pastel_on_dark', 'solarized_dark'=> 'solarized_dark', 'terminal'=> 'terminal', 'tomorrow_night'=> 'tomorrow_night', 'tomorrow_night_blue'=> 'tomorrow_night_blue', 'tomorrow_night_bright'=> 'tomorrow_night_bright', 'tomorrow_night_eighties'=> 'tomorrow_night_eighties', 'twilight'=> 'twilight', 'vibrant_ink'=> 'vibrant_ink'), $themeace, array('style'=> 'width: auto; margin-left: 20px')); ?>
			</div>
    </div>
        </div>
    </fieldset>
    <div class="ccm-pane-footer">
    </div>
    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <?php   echo  $ui->submit(t('Save'), 'save','right','btn-primary'); ?>
        </div>
    </div>

</form>
