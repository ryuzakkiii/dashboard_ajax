<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Acceuil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('acceuil_model');
    }

    public function index(){  
        $data['agent'] = $this->acceuil_model->agent();
        $this->load->view('page/dashboard/content',$data);
    }
    public function valeur(){

        $dates = $this->input->post('dates'); 
        $data['totappel'] = $this->acceuil_model->total_appel($dates);    
        $data['aqualifie'] = $this->acceuil_model->appel_qualifié($dates);
        $data['repondeur'] = $this->acceuil_model->repondeur($dates);
        $data['rappel'] = $this->acceuil_model->rappel($dates);
        $data['injoign'] = $this->acceuil_model->injoignable($dates);
        $data['test'] = $this->acceuil_model->appel_test($dates);

        echo json_encode($data);
    }

    public function filtre(){
        $agentname = $this->input->post('agentname'); 
        $dates = $this->input->post('dates');
     
        $data = $this->acceuil_model->filtre($agentname,$dates);
        echo json_encode($data);

    }

}