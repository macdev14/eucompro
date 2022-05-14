<?php

class addressImportItem extends geoImportItem
{
    protected $_name = "Address";
    protected $_description = "The user's street address";
    protected $_fieldGroup = self::USER_LOCATION_FIELDGROUP;

    public $displayOrder = 0;

    final protected function _cleanValue($value)
    {
        $value = addslashes(trim($value));
        return $value;
    }

    final protected function _updateDB($value, $groupId)
    {
        geoImport::$tableChanges['userdata']['address'] = " `address` = '{$value}' ";
        return true;
    }
}
