<?php 
    if($ADMIN->fulltree){
        
        $name = 'theme_photo/loginbackgroundimage';                                                                                     
        $title = get_string('loginbackgroundimage', 'theme_photo');                                                                     
        $description = get_string('loginbackgroundimage_desc', 'theme_photo');                                                          
        // This creates the new setting.                                                                                                
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');                             
        // This means that theme caches will automatically be cleared when this setting is changed.                                     
        $setting->set_updatedcallback('theme_reset_all_caches');                                                                        
        // We always have to add the setting to a page for it to have any effect.                                                       
        $page->add($setting);
    }