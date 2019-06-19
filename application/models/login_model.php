<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {


        function  login($username){
          //  $pass = md5($password);
           $query =  $this->db->select()
                ->where(['username'=>$username])
                ->get('users');
//         echo "<pre>";
//        print_r($query->result_array());
//         //   print_r($query->row());
//        echo "</pre>";

          //  print_r($query->result()); die();

            return $query->row();
          //  return $query->result();


        }

    function users_Data(){
        $qry = $this->db->select('*')
            ->get('users');

//         echo "<pre>";
//         print_r($this->uri->segment(3));
//         echo "</pre>";
//         exit();
        return $qry->result_array();

    }


}