<?php

$links = array();
if ($page->classified_user_id) {
    $links[] = array (
        'href' => $page->configuration_data['classifieds_url'] . "?a=17",
        'class' => 'login_register_logout_link',
        'label' => $page->messages[749]
    );
    $links[] = array (
        'href' => $page->configuration_data['classifieds_url'] . "?a=4",
        'class' => 'login_register_my_account_link',
        'label' => $page->messages[748]
    );
} else {
    $links[] = array (
        'href' => $page->configuration_data['classifieds_url'] . "?a=10",
        'class' => 'login_register_login_link',
        'label' => $page->messages[746]
    );
    if ($page->configuration_data['use_ssl_in_registration']) {
        $registerURL = $page->configuration_data['registration_ssl_url'];
    } else {
        $registerURL = $page->configuration_data['registration_url'];
    }
    $links[] = array (
        'href' => $registerURL,
        'class' => 'login_register_register_link',
        'label' => $page->messages[747]
    );
}

$view->setModuleTpl($show_module['module_replace_tag'], 'index')
    ->setModuleVar($show_module['module_replace_tag'], 'links', $links);
