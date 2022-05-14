<?php

if (!defined('IN_GEO_API')) {
    exit('No access.');
}

if (!isset($args['username']) && !isset($args['email'])) {
    //username or email not specified?
    return $this->failure('Error:  No username or email specified.  Please provide either a username or an e-mail address to get user details.');
}

if (isset($args['username']) && strlen(trim($args['username'])) == 0) {
    //string length 0
    return $this->failure('Invalid username.');
} elseif (isset($args['email']) && strlen(trim($args['email'])) == 0) {
    return $this->failure('Invalid email.');
}

$field_name = (isset($args['username'])) ? 'username' : 'email';

if (isset($args['password'])) {
    //validate password while we're at it...
    if (!$this->product_configuration->verify_credentials($args[$field_name], $args['password'])) {
        //invalid password
        return $this->failure("Invalid $field_name/pass.", 1001);
    }
}

$sql = 'SELECT id FROM `geodesic_userdata` WHERE `' . $field_name . '` = ? AND `id` != 1 LIMIT 1';
$row = $this->db->GetRow($sql, array(trim($args[$field_name])));

if (!$row || !$row['id']) {
    //db error:
    return $this->failure('Could not find user.');
}
$user = geoUser::getUser($row['id']);
if (!$user) {
    return $this->failure('Could not find user.');
}
$data = $user->toArray();

if ($args['login_data']) {
    $sql = "SELECT * FROM " . geoTables::logins_table . " WHERE `id`=?";
    $logins = $this->db->GetRow($sql, array($row['id']));
    if ($logins) {
        $data = array_merge($data, $logins);
    }
}

return $data;
