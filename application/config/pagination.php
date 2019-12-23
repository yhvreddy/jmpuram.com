    <?php
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    /**
     * Pagination Config
     * 
     * Just applying codeigniter's standard pagination config with twitter 
     * bootstrap stylings
     *
     * @author      TechArise Team
     * @link        http://codeigniter.com/user_guide/libraries/pagination.html
     * @email       info@techarise.com
     * 
     * @file        pagination.php
     * @version     1.0.0.1
     * @date        24/09/2017
     * 
     * Copyright (c) 2017
     */
    /* -------------------------------------------------------------------------- */



    $config['per_page'] = 9;
    $config['num_links'] = 2;

    $config['use_page_numbers'] = TRUE;
    $config['page_query_string'] = FALSE;

    $config['query_string_segment'] = '';
    $config['full_tag_open'] = '<ul class="pagination pagination-md" style="margin: 20px;">';
    $config['full_tag_close'] = '</ul><!--pagination-->';

    $config['first_link'] = '&laquo; First';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&rarr;';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&larr;';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';

    $config['anchor_class'] = 'follow_link';












    // $config['per_page'] = 10;
    // $config['num_links'] = 2;

    // $config['use_page_numbers'] = TRUE;
    // $config['page_query_string'] = FALSE;

    // $config['query_string_segment'] = '';
    // $config['full_tag_open'] = '<ul class="pagination">';
    // $config['full_tag_close'] = '</ul>';

    // $config['first_link'] = '&laquo; First';
    // $config['first_tag_open'] = '<li class="prev page">';
    // $config['first_tag_close'] = '</li>';

    // $config['last_link'] = 'Last &raquo;';
    // $config['last_tag_open'] = '<li class="next page">';
    // $config['last_tag_close'] = '</li>';

    // $config['next_link'] = '';
    // $config['next_tag_open'] = '<li class="next page"><span class="ti-angle-right">';
    // $config['next_tag_close'] = '</span></li>';

    // $config['prev_link'] = '';
    // $config['prev_tag_open'] = '<li class="prev page"><span class="ti-angle-left">';
    // $config['prev_tag_close'] = '</span></li>';

    // $config['cur_tag_open'] = '<li class="active"><a href="">';
    // $config['cur_tag_close'] = '</a></li>';

    // $config['num_tag_open'] = '<li class="page">';
    // $config['num_tag_close'] = '</li>';

    // $config['anchor_class'] = 'follow_link';
?>