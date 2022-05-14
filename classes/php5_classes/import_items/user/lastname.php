<?php

class lastnameImportItem extends geoImportItem
{
    protected $_name = "Last Name";
    protected $_description = "The user's last name (surname)";
    protected $_fieldGroup = self::USER_GENERAL_FIELDGROUP;

    public $displayOrder = 1;

    final protected function _cleanValue($value)
    {
        $value = addslashes(trim($value));
        return $value;
    }

    final protected function _updateDB($value, $groupId)
    {
        geoImport::$tableChanges['userdata']['lastname'] = " `lastname` = '{$value}' ";
        return true;
    }
}
