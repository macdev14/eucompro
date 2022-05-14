<?php

class optional10ImportItem extends geoImportItem
{
    protected $_name = "Registration Optional Field 10";
    protected $_description; //set in constructor (field label from DB)
    private $_fieldNum = 10;

    public function __construct()
    {
        $this->_description = DataAccess::getInstance()->GetOne("SELECT `registration_optional_{$this->_fieldNum}_field_name` FROM " . geoTables::registration_configuration_table);
        $this->displayOrder = $this->_fieldNum;
    }

    protected $_fieldGroup = self::USER_OPTIONAL_FIELDGROUP;

    final protected function _cleanValue($value)
    {
        $value = addslashes(trim($value));
        return $value;
    }

    final protected function _updateDB($value, $groupId)
    {
        geoImport::$tableChanges['userdata']['optional_field_' . $this->_fieldNum] = " `optional_field_{$this->_fieldNum}` = '{$value}' ";
        return true;
    }
}