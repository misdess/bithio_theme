<?php

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingbithio', get_string('configtitle', 'theme_bithio'));
    $page = new admin_settingpage('theme_bithio_general', get_string('generalsettings', 'theme_bithio'));

    // Unaddable blocks.
    // Blocks to be excluded when this theme is enabled in the "Add a block" list: Administration, Navigation, Courses and
    // Section links.
    $default = 'navigation,settings,course_list,section_links';
    $setting = new admin_setting_configtext('theme_bithio/unaddableblocks',
        get_string('unaddableblocks', 'theme_bithio'), get_string('unaddableblocks_desc', 'theme_bithio'), $default, PARAM_TEXT);
    $page->add($setting);

    // Preset.
    $name = 'theme_bithio/preset';
    $title = get_string('preset', 'theme_bithio');
    $description = get_string('preset_desc', 'theme_bithio');
    $default = 'default.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_bithio', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'bithio');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_bithio/presetfiles';
    $title = get_string('presetfiles','theme_bithio');
    $description = get_string('presetfiles_desc', 'theme_bithio');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Background image setting.
    $name = 'theme_bithio/backgroundimage';
    $title = get_string('backgroundimage', 'theme_bithio');
    $description = get_string('backgroundimage_desc', 'theme_bithio');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Login Background image setting.
    $name = 'theme_bithio/loginbackgroundimage';
    $title = get_string('loginbackgroundimage', 'theme_bithio');
    $description = get_string('loginbackgroundimage_desc', 'theme_bithio');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $body-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_bithio/brandcolor';
    $title = get_string('brandcolor', 'theme_bithio');
    $description = get_string('brandcolor_desc', 'theme_bithio');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_bithio_advanced', get_string('advancedsettings', 'theme_bithio'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_bithio/scsspre',
        get_string('rawscsspre', 'theme_bithio'), get_string('rawscsspre_desc', 'theme_bithio'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_bithio/scss', get_string('rawscss', 'theme_bithio'),
        get_string('rawscss_desc', 'theme_bithio'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
