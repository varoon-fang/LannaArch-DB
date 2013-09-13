<?php
class main_view extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('main_form_view');
    }

    public function result()
    {
        $this->load->model('Fruits');
        $data['fruitname'] = $this->Fruits->what_fruits(); 

    }
}

?>