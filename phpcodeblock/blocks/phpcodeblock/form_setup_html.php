<?php   defined('C5_EXECUTE') or die("Access Denied."); ?>  

<h5><?php   echo t('Add HTML and/or PHP code below:')?></h5>

<fieldset>
    <div class="form-group">
        <div class="input">
            <?php  
			echo $form->label('lbltheme', t('Editor theme:'));
			echo $form->select('themeace', array('chrome'=> 'chrome', 'clouds'=> 'clouds','crimson_editor'=> 'crimson_editor','dawn'=> 'dawn','dreamweaver'=> 'dreamweaver', 'eclipse'=> 'eclipse', 'xcode'=> 'xcode','github'=> 'github','solarized_light'=> 'solarized_light','textmate'=> 'textmate','tomorrow'=> 'tomorrow','clouds_midnight'=> 'clouds_midnight','cobalt'=> 'cobalt','idle_fingers'=> 'idle_fingers','kr_theme'=> 'kr_theme','merbivore'=> 'merbivore','merbivore_soft'=> 'merbivore_soft', 'mono_industrial'=> 'mono_industrial', 'monokai'=> 'monokai', 'pastel_on_dark'=> 'pastel_on_dark', 'solarized_dark'=> 'solarized_dark', 'terminal'=> 'terminal', 'tomorrow_night'=> 'tomorrow_night', 'tomorrow_night_blue'=> 'tomorrow_night_blue', 'tomorrow_night_bright'=> 'tomorrow_night_bright', 'tomorrow_night_eighties'=> 'tomorrow_night_eighties', 'twilight'=> 'twilight', 'vibrant_ink'=> 'vibrant_ink'), $themeace, array('style'=> 'width: auto; margin-left: 20px', 'onChange' => 'combo(this)')); ?>
        </div>
    </div>
	
	<div class="form-group">
		<div id="ccm-block-phpcodeblock-value"><?php   echo h($content); ?></div>
		<textarea style="display: none" id="ccm-block-phpcodeblock-value-textarea" name="content" autofocus></textarea>
	</div>
</fieldset>
  
<style type="text/css">
    #ccm-block-phpcodeblock-value {
        width: 100%;
        border: 1px solid #eee;
        height: 380px; /* future version: make this dynamic */
    }
</style>

<script type="text/javascript">
document.aceEditor_;

    $(function() {
        var editor = ace.edit( "ccm-block-phpcodeblock-value");
		document.aceEditor_ = editor;
        editor.setTheme( "ace/theme/<?php   echo $themeace;?>");
		$( '#themeAce').val( "<?php   echo $themeace;?>");
        editor.getSession().setMode( "ace/mode/php");
        editor.getSession().on( 'change', function() {
            $( '#ccm-block-phpcodeblock-value-textarea').val( editor.getValue());
        });
		
		$( "#ccm-block-phpcodeblock-value-textarea").focus();
		$( '#ccm-block-phpcodeblock-value-textarea').val( editor.getValue());
    });
	
	function combo( element) {
		var idx=element.selectedIndex;
		var val=element.options[idx].value;
		document.aceEditor_.setTheme( "ace/theme/" + val);
	}
</script>
