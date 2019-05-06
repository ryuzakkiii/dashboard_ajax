<?php

class Acceuil_model extends CI_Model {

    public function total_appel($dates){


        $totappels = $this->db->query("SELECT count(*) as toppel
        FROM ct_NOMINATION_AUDE where typecall is not null and calling_date = '$dates'");
        $totappel = $totappels->result();
        //var_dump($vendus);die();
         return $totappel;
    }

    public function appel_qualifié($dates){
        $aqualifies = $this->db->query("SELECT COUNT(*) as aqualifie
        FROM ct_NOMINATION_AUDE where typecall = '571_QUALIFICATION_TOTALE' and calling_date = '$dates'"); 
        $aqualifie = $aqualifies->result();
        return $aqualifie;
    }

    public function appel_test($dates){
        $tests = $this->db->query("SELECT COUNT(*) as test
        FROM ct_NOMINATION_AUDE where typecall = '571_TEST' and calling_date = '$dates'"); 
        $test = $tests->result();
        return $test;
    }

    public function repondeur($dates){
        $repondeurs = $this->db->query("SELECT COUNT(*) as repondeur
        FROM ct_NOMINATION_AUDE where typecall = '571_REPONDEUR' and calling_date = '$dates'"); 
        $repondeur = $repondeurs->result();
        return $repondeur;
    }

    public function rappel($dates){
        $rappels = $this->db->query("SELECT COUNT(*) as rappel
        FROM ct_NOMINATION_AUDE where typecall like '571_RAPPEL%' and calling_date = '$dates'"); 
        $rappel = $rappels->result();
        return $rappel;
    }
    

    public function injoignable($dates){
        $injoigns = $this->db->query("SELECT COUNT(*) as injoign
        FROM ct_NOMINATION_AUDE where typecall = '571_INJOIGNABLE' and calling_date = '$dates'"); 
        $injoign = $injoigns->result();
        return $injoign;
    }

    
    
    public function filtre($agentname, $dates){
        $agent = array();
        $agents = $this->db->query("SELECT  agentname, COUNT(typecall) as tous, (select COUNT(typecall)
         FROM ct_NOMINATION_AUDE where agentname
        = '$agentname' and calling_date = '$dates' and typecall = '571_QUALIFICATION_TOTALE') as qualifie,
        (select COUNT(typecall) FROM ct_NOMINATION_AUDE where agentname
        = '$agentname' and calling_date = '$dates' and typecall = '571_REPONDEUR') as repondeur,
        (select COUNT(typecall) FROM ct_NOMINATION_AUDE where agentname
        = '$agentname' and calling_date = '$dates' and typecall = '571_INJOIGNABLE') as ijoign,
        (select COUNT(typecall) FROM ct_NOMINATION_AUDE where agentname
        = '$agentname' and calling_date = '$dates' and typecall = '571_RAPPEL') as rappel,
        (select COUNT(typecall) FROM ct_NOMINATION_AUDE where agentname
        = '$agentname' and calling_date = '$dates' and typecall = '571_RAPPEL_PROGRAMME') as rappelp
                FROM ct_NOMINATION_AUDE  where agentname = '$agentname' and calling_date = '$dates' and agentname is not null
                 group by agentname");
        $agent = $agents->result_array();
        return $agent;
    }
    

    public function agent(){
        $noms = $this->db->query("select distinct agentname from [easy].[dbo].[ct_NOMINATION_AUDE] where agentname is not null");
        $nom = $noms->result();
        return $nom;
    }

    /*public function produit(){
        $detail = $this->db->query("SELECT [designation_produit]
        ,[prix_unitaire]
        ,[quantite]
    FROM [wallboard].[dbo].[produit]");

    $details = $detail->result();
    return $details;  
    }


    public function filtre_par_produit($var){
        $valeur = array();
        $this->db->select('*');
        $this->db->from('commande');
        $this->db->join('client', 'commande.matricule_client = client.matricule_client');
        $this->db->join('produit', 'produit.designation_produit = commande.designation_produit');
        $this->db->where('produit.designation_produit' , $var['designation_produit']);
        $this->db->order_by('date_commande', 'DESC');
        $q = $this->db->get();

        $valeur = $q->result_array();

        return $valeur;

    
    }

    public function filtre_par_date($dates){
        $date = array();
        $this->db->select('*');
        $this->db->from('commande');
        $this->db->join('client', 'commande.matricule_client = client.matricule_client');
        $this->db->where('commande.date_commande', $dates['date_commande']);
        
        $q = $this->db->get();
        $date = $q->result_array();

        return $date;

    }*/


}


