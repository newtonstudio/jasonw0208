<?php
class Mypagination {

    public function getPagination($url, $total_rows, $item_per_page){

        $ci =& get_instance();

        $ci->load->library("pagination");
        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $item_per_page;
        $config['use_page_numbers'] = true;
        $config['attributes'] = array('class' => 'page-link');

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';

        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        
        $ci->pagination->initialize($config);
    
        return $ci->pagination->create_links();

    }

}
?>