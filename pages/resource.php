<?php
header("Content-Type: text/javascript");
?>
<!-- ----- ----- Bootstrap Datepicker (start) ----- ----- -->
    jQuery(document).ready(function () {
        jQuery('select[name $= "_year"]').each(function () {
            var name = jQuery(this).attr('name');
            name = name.substring(0, name.length - 5);
            var year = jQuery(this).parents(':first').find('[name$="_year"]').val();
            var month = jQuery(this).parents(':first').find('[name$="_month"]').val();
            var day = jQuery(this).parents(':first').find('[name$="_day"]').val();
            if (month.length == 1)
                month = '0' + month;
            if (day.length == 1)
                day = '0' + day;
            jQuery(this).parents(':first')
                    .empty()
                    .append('<input type="hidden" name="' + name + '_year" value="' + year + '"/>')
                    .append('<input type="hidden" name="' + name + '_month" value="' + month + '"/>')
                    .append('<input type="hidden" name="' + name + '_day" value="' + day + '"/>')
                    .append('<div class = "input-group date"><div class = "input-group-addon"><span class = "fa fa-calendar"></span></div><input type = "text" class = "dateFld" name="' + name + '" ></div>')
                    .find('.dateFld').datepicker(<?php echo plugin_config_get('OPTIONS') ?>).change(function () {
                var val = jQuery(this).datepicker('getDate');
                console.log(jQuery(this).parents('td'));
                jQuery(this).parents('td')
                        .find('input[name$="_year"]').val(val.getFullYear()).end()
                        .find('input[name$="_month"]').val(val.getMonth() + 1).end()
                        .find('input[name$="_day"]').val(val.getDate()).end()
                        ;
            })
                    ;
            if (year != '0')
                jQuery('input[name=' + name + ']').val(year + '-' + month + '-' + day);
        });
    });
<!-- ----- ----- Bootstrap Datepicker (end) ----- ----- -->
