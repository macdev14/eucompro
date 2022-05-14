<?php

//addons/social_connect/admin.php

# Facebook Connect

require_once ADDON_DIR . 'social_connect/info.php';

class addon_social_connect_setup extends addon_social_connect_info
{
    public function install()
    {
        $db = DataAccess::getInstance();

        $db->Execute("ALTER TABLE `geodesic_logins` ADD `facebook_id` VARCHAR( 32 ) NOT NULL ");
        $db->Execute("ALTER TABLE `geodesic_logins` ADD INDEX `facebook_id` ( `facebook_id` ) ");

        //facebook reveal to userdata
        $db->Execute("ALTER TABLE `geodesic_userdata` ADD `facebook_reveal` ENUM( 'Yes', 'No' ) NOT NULL DEFAULT 'Yes'");

        return true;
    }

    public function upgrade($from_ver)
    {
        if (version_compare($from_ver, '2.1.2', '<=')) {
            //expand facebook ID column to account for new, longer IDs
            DataAccess::getInstance()->Execute("ALTER TABLE `geodesic_logins` CHANGE `facebook_id` `facebook_id` VARCHAR( 32 ) NOT NULL");
        }
        return true;
    }

    public function uninstall()
    {
        $db = DataAccess::getInstance();

        $db->Execute("ALTER TABLE `geodesic_logins` DROP `facebook_id` ");

        return true;
    }
}
