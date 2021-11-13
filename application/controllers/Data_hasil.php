<?php
class Data_hasil extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "login") {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                Login terlebih dahulu
                </div>
                </div>'
            );
            redirect(base_url("login"));
        }
    }    
    public function index()
    {
       $data['hasil'] = $this->titian_model->get_data('hasil')->result();      

       $hasil=$this->titian_model->pembagi();
       //insert data ke db temp
       
       for ($i=0; $i < count($hasil); $i++) { 
           $this->titian_model->insert_data($hasil[$i],'tmp_pembagi');
       }
       die();
       
    //    $data_json = json_encode($data);
    //    echo '<pre>';
    //    print_r($data_json);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('hitung/data_hasil',$data);
        $this->load->view('template/footer');
 //json_endcode($pembagi);
    }


    public function ternormalisasi()
    {
    $ternormalisasi=$this->titian_model->Matrik_ternormalisasi();
    // insert data ke db temp
       
       for ($i=0; $i < count($ternormalisasi); $i++) { 
           $this->titian_model->insert_data($ternormalisasi[$i],'tmp_ternormalisasi');
       }
       die();
    }
    
    
}
