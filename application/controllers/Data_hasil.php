<?php
class Data_hasil extends CI_Controller {
	
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


?>

