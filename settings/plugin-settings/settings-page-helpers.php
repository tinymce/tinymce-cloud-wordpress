<?php
function insert_checkbox($settings_name, $isChecked) {
    ?>
    <input type="checkbox" name="tinymce_enterprise_options[<?php echo $settings_name ?>]" id="<?php echo $settings_name ?>"
        <?php if($isChecked == "on"){ ?>
            checked
        <?php } ?>
    >
    <?php
}
?>

<?php
function insert_select_list($settings_name, $isEnabled, $currentValue, $values) {
    ?>
    <select name="tinymce_enterprise_options[<?php echo $settings_name ?>]"
        <?php if(!$isEnabled){ ?>
            disabled
        <?php } ?>
    >
        <?php foreach ($values as $value) { ?>
            <option value='<?php echo $value ?>'
                <?php if($currentValue == $value){ ?>
                    selected
                <?php } ?>>
                <?php echo ucfirst($value); ?>
        <?php
        }
        ?>
    </select>
<?php
}
?>

<?php
function insert_text_field($settings_name, $isEnabled, $currentValue) {
    ?>
    <input type="text" name="tinymce_enterprise_options[<?php echo $settings_name ?>]" size="70"
           value="<?php echo $currentValue; ?>"
        <?php if(!$isEnabled){ ?>
            readonly
        <?php } ?>
    />
<?php
}
?>






