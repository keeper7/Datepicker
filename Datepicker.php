<?php

/**
 * Bootstrap Datepicker plugin for Mantisbt 2.0 
 *
 * @author Radoslav Frankovic <rfrankovic at foxconn.cz>
 */
class DatepickerPlugin extends MantisPlugin
{


    public function register()
    {
        $this->name = plugin_lang_get("title");
        $this->description = plugin_lang_get("description");
        $this->version = "1.0.0";
        $this->requires = array('MantisCore' => '2.0.0');
        $this->author = "Radoslav Frankovic";
    }


    function hooks()
    {
        return [
            'EVENT_REPORT_BUG_FORM' => 'resources',
            'EVENT_UPDATE_BUG_FORM' => 'resources',
            'EVENT_UPDATE_BUG_STATUS_FORM' => 'resources',
        ];
    }


    function config()
    {
        return [
            'OPTIONS' => '{'
            . 'format:"yyyy-mm-dd",'
            . 'calendarWeeks: true,'
            . 'autoclose: true,'
            . 'clearBtn: true,'
            . '}',
        ];
    }


    function resources($p_evt, $p_param)
    {
        echo '<script type="text/javascript" src="' . plugin_file('bootstrap-datepicker.js') . '"></script>';
        echo '<link rel="stylesheet" type="text/css" href="' . plugin_file('bootstrap-datepicker3.css') . '" />';
        echo '<script type="text/javascript" src="' . plugin_page('resource') . '"></script>';
    }


}
