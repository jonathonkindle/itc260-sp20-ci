<?php

//application/models/Pics_model.php

class Pics_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        // public function search_tag(){

        // }

        public function get_tags($slug = FALSE)
        {

                if ($slug === FALSE)
                {
                        $query = $this->db->get('sp20_pics');
                        return $query->result_array();
                }

                $query = $this->db->get_where('sp20_pics', array('slug' => $slug));
                return $query->row_array();
               
        }

        public function get_pics($tags = FALSE)
        {
                //tags should be passed in via querystring/controller

                $api_key = $this->config->item('flickrKey');
                $perPage = 100;
                $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
                $url.= '&api_key=' . $api_key;
                $url.= '&tags=' . $tags;
                $url.= '&per_page=' . $perPage;
                $url.= '&format=json';
                $url.= '&nojsoncallback=1';
                
                $response = json_decode(file_get_contents($url));
                $pics = $response->photos->photo;
                return $pics;
        }

}