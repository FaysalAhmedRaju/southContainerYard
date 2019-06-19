<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Head_model extends CI_Model {


    function  insert_head($data){
        $this->load->database();
        //$data poriborte ['column_name' =>$value, '2ndcoloum' => $value]
        $query =  $this->db->insert('heads',$data);
          return $query;
        // echo "<pre>";
        // print_r($query->result_array());
        //  print_r($query->row());
        // echo "</pre>";

        //  print_r($query->result()); die();

     //   return $query->row();
        //  return $query->result();


    }

    function  save_income_expense($data){

        $this->load->database();
        //$data poriborte ['column_name' =>$value, '2ndcoloum' => $value]
        $query =  $this->db->insert('transactions',$data);
        return $query;

    }

    function  save_registration_user($data){

        $this->load->database();
        $query =  $this->db->insert('users',$data);
        return $query;

    }

    function update_income_expense($data){
       // echo $data['id'];
//                 echo "<pre>";
//         print_r($data);
//         echo "</pre>";
    //     exit();
        //$this->load->library('encrypt');
        $null = null;
        if($data['type'] == 'Income'){

            $qry = $this->db
                ->where('id',$data['id'])
                ->update('transactions',['sub_head_id'=>$data['sub_head_id'],'type'=>$data['type'],'credit'=>$data['credit'],'debit'=>$null,'created_at'=>$data['created_at'],'comment'=>$data['comment'],'created_by'=>$data['created_by']]);
        }else{
            $qry = $this->db
                ->where('id',$data['id'])
                ->update('transactions',['sub_head_id'=>$data['sub_head_id'],'type'=>$data['type'],'debit'=>$data['debit'],'credit'=>$null,'created_at'=>$data['created_at'],'comment'=>$data['comment'],'created_by'=>$data['created_by']]);
        }




        return $qry;

    }

    function  save_sub_head($data){

        $this->load->database();
        //$data poriborte ['column_name' =>$value, '2ndcoloum' => $value]
        $query =  $this->db->insert('sub_heads',$data);
        return $query;

    }

    function update_user($data){
       //  echo $data['id'];
//                 echo "<pre>";
//         print_r($data);
//         echo "</pre>";
  //           exit();


        $qry = $this->db
            ->where('id',$data['id'])
            ->update('users',['name'=>$data['name'],'email'=>$data['email'],'username'=>$data['username'],
                'password'=>$data['password'],'created_at'=>$data['created_at'],'created_by'=>$data['created_by']]);
        return $qry;

    }

    function update_head($id, $name){
        $qry = $this->db
            ->where('id',$id)
            ->update('heads',['head_name'=>$name]);
        return $qry;

    }

    function update_sub_head($id,$head_id,$sub_head_name){
        $qry = $this->db
            ->where('id',$id)
            ->update('sub_heads',['head_id'=>$head_id,'sub_head'=>$sub_head_name]);
        return $qry;

    }

    function show_head_data_model(){
        $qry = $this->db->select('*')
           ->order_by("id", "desc")
            ->get('heads','10',$this->uri->segment(3));

//         echo "<pre>";
//         print_r($this->uri->segment(3));
//         echo "</pre>";
//         exit();
       return $qry->result();

    }

    function show_user_reg_data_model(){
        $qry = $this->db->select('*')
            ->order_by("id", "desc")
            ->get('users','10',$this->uri->segment(3));

//         echo "<pre>";
//         print_r($this->uri->segment(3));
//         echo "</pre>";
//         exit();
        return $qry->result();

    }

    function show_user_reg_update_data_model(){
        $qry = $this->db->select('*')
            ->order_by("id", "desc")
            ->get('users');
          //  ->get('users','10',$this->uri->segment(3));

//         echo "<pre>";
//         print_r($this->uri->segment(3));
//         echo "</pre>";
//         exit();
        return $qry->result();

    }

    function  user_registration($username,$password){

        $pass = md5($password);
       // print_r($pass); exit();
        $query =  $this->db->select()
            ->where(['username'=>$username,'password'=>$pass])
            ->get('users');
//         echo "<pre>";
//         print_r($query->row());
//         echo "</pre>"; exit();

        //  print_r($query->result()); die();

        return $query->row();
        //  return $query->result();


    }

    function ajax_income_expense_show_data($str){

        $query = $this->db->query($str);
        $query->result_array();


//         echo "<pre>";
//         print_r($query->result_array());
//         echo "</pre>";
//         exit();
        return $query->result_array();

    }

    function income_expense_show_data($str){

        $query = $this->db->query($str);
        $query->result_array();


//         echo "<pre>";
//         print_r($query->result_array());
//         echo "</pre>";
//         exit();
        return $query->result_array();

    }

    function  report_select_query($str){
        $query = $this->db->query($str);
        $query->result_array();


//         echo "<pre>";
//         print_r($query->result_array());
//         echo "</pre>";
//         exit();
        return $query->result_array();

    }


    function sub_head_show_data($str){

        $query = $this->db->query($str);
        $query->result_array();


//         echo "<pre>";
//         print_r($query->result_array());
//         echo "</pre>";
//         exit();
        return $query->result_array();

    }

    function count_income_expense_data($str){
        $query = $this->db->query($str);
        $query->num_rows();

//         echo "<pre>";
//        print_r($query->num_rows());
//         //print_r($query->num_rows());
//         echo "</pre>";
//         exit();
        return $query->num_rows();
    }

    function count_sub_head_data($str){
        $query = $this->db->query($str);
        $query->num_rows();

//         echo "<pre>";
//        print_r($query->num_rows());
//         //print_r($query->num_rows());
//         echo "</pre>";
//         exit();
        return $query->num_rows();
    }

    function show_head_edit_data_model(){
        $qry = $this->db->select('*')
            ->order_by("id", "desc")
            ->get('heads');
          //  ->get('heads','10',$this->uri->segment(3));

//         echo "<pre>";
//         print_r($this->uri->segment(3));
//         echo "</pre>";
//         exit();
        return $qry->result();

    }



    function dropdown_head_data(){
        $this->db->order_by('head_name','ASC');
        $query = $this->db->get('heads');

//                 echo "<pre>";
//         print_r($query->result());
//         echo "</pre>";
//         exit();
        return $query->result();
    }

    function count_user_reg_head_data(){
        $q2 = $this->db->get('users');

//                 echo "<pre>";
//        print_r($q2->num_rows());
//
//         //print_r($q2->result());
//         echo "</pre>";
//         exit();
        return $q2->num_rows();
    }

    function count_head_data(){
        $q2 = $this->db->get('heads');

//                 echo "<pre>";
//        print_r($q2->num_rows());
//
//         //print_r($q2->result());
//         echo "</pre>";
//         exit();
        return $q2->num_rows();
    }

    function when_press_edit($id){
        $q = $this->db->select('*')
            ->where('id',$id)
            ->get('heads');
        return $q->row();

    }


    function update_user_reg($id){
        $q = $this->db->select('*')
            ->where('id',$id)
            ->get('users');
        return $q->row();

    }

    function sub_head_edit($id){
        $q = $this->db->select('*')
            ->where('id',$id)
            ->get('sub_heads');
        return $q->row();

    }

    function  delete_sub_head($id){
        $qry = $this->db
            ->delete('sub_heads',['id'=>$id]);
        return $qry;

    }

    function  delete_income_expense($id){
        $qry = $this->db
            ->delete('transactions',['id'=>$id]);
        return $qry;

    }

    function  delete_head($id){
        $qry = $this->db
            ->delete('heads',['id'=>$id]);
        return $qry;

    }

    function  delete_user($id){
        $qry = $this->db
            ->delete('users',['id'=>$id]);
        return $qry;

    }

    function income_expense_edit($str){

            $query = $this->db->query($str);
            $query->num_rows();

//         echo "<pre>";
//         print_r($query->row());
//         echo "</pre>";
//         exit();
            return $query->row();

    }



}