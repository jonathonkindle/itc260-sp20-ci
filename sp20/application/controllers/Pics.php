<?php

//application/controllers/Pics.php

class Pics extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->config->set_item('banner', 'Flickr Pics');
                $this->load->model('pics_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $this->config->set_item('title', 'Flickr API Pics');

                $nav1 = $this->config->item('nav1');

                $data['title'] = 'Flickr Pics';
                // $data['search'] = $this->pics_model->search_tag();
                $data['pics'] = $this->pics_model->get_tags();
                
                $this->load->view($this->config->item('theme') . 'header');
                $this->load->view('pics/index', $data);
                $this->load->view($this->config->item('theme') . 'footer');           
        }

        public function view($slug = NULL)
        {      

                $dashless_slug = ucwords(str_replace("_", " ", $slug));

                $this->config->set_item('title', $dashless_slug . ' Pics');
                
                $data['pictures'] = $this->pics_model->get_pics($slug);
                $data['title'] =  'Pictures of ' . $dashless_slug;
                
                if (empty($data['pictures']))
                {
                        show_404("Please try another search");
                }
    
                $this->load->view($this->config->item('theme') . 'header');
                $this->load->view('pics/view', $data);
                $this->load->view($this->config->item('theme') . 'footer');

        }

        // public function index() {

        //         $data['title'] = 'Flicker API Pics';
        //         $data['size'] = 'm';

                
        // }

        public function pic_search($search)
        {
                $params['tags'] = $search;
                
                // //slug without dashes
                // $dashless_slug = str_replace("-", " ", $slug);

                // //uppercase slug words
                // $dashless_slug = ucwords($dashless_slug);

                // //use slug for title
                // $this->config->set_item('title', $dashless_slug);

                // //add 'News Flash - '
                // $this->config->set_item('title', 'News Flash - ' . $dashless_slug);

                // $data['news_item'] = $this->news_model->get_news($slug);
        
                // if (empty($data['news_item']))
                // {
                //         show_404();
                // }
        
                // $data['title'] = $data['news_item']['title'];
        
                // $this->load->view('news/view', $data);
        }
}