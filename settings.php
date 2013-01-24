<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configtext('gsb/help', get_string('urltext', 'block_gsb'),
                   get_string('urltext', 'block_gsb'), "$CFG->wwwroot/blocks/gsb/gsb_explained.htm", PARAM_TEXT));


}