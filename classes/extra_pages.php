<?php

class extra_page extends geoSite
{

    function __construct($db, $page_id, $language_id, $user_id, $product_configuration)
    {
        $this->page_id = (int)$page_id;
        parent::__construct();
    }

    function setup_filters($filter_id, $state_filter, $zip_filter, $zip_distance_filter)
    {
        $this->state_filter = $state_filter;
        $this->zip_filter = $zip_filter;
        $this->zip_filter_distance = $zip_distance_filter;
        $this->filter_id = $filter_id;
    }

    function build_extra_page()
    {
        //let display page know to treat this as an extra page
        $this->using_extra = true;
        //set the view's language id
        geoView::getInstance()->setLanguage($this->language_id);

        return true;
    }

    function display_extra_page()
    {
        // Build the body of the extra page
        if (!$this->build_extra_page()) {
            return false;
        }

        // Do anything thats needed before here

        return $this->display_page();
    }
}
