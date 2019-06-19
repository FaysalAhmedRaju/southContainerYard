<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
       // $this->load->library('encrypt');
        $this->load->library('encryption');
        $this->load->helper('string');

        $id = $this->session->userdata('id');
        if(!$id){
            return redirect('login_controller');
        }
        $this->load->model('head_model');
        $this->load->database();


    }

    function  index(){

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');

              $id = $this->session->userdata('id');
              $username = $this->session->userdata('username');
             //  echo  $username; exit();

             $this->load->view('admin/index');
        }


        function logout(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        return redirect('login_controller');
        //    echo "Logout"; exit();
        }

    function getSubHeadName()
    {
        $head_id = $_GET["head_id"];
        // echo  $head_id; exit();
        $query = "SELECT * FROM sub_heads WHERE sub_heads.head_id='$head_id'";


        $rtnAssignmentList = $this->head_model->ajax_income_expense_show_data($query);
      // print_r($rtnAssignmentList); exit();




//        $data   =   array();
//        foreach ($rtnAssignmentList as $row):
//          //  print_r($row['id']);
//            $data[] = array(
//                'id' => $row['id'],
//                'sub_head' => $row['sub_head'],
//            );
//            //echo $data['name']; //I get all the values in a column
//        endforeach;

      //  echo $data['name']; //I get only the last value

//        echo "<pre>";
//         print_r($rtnAssignmentList);
//         echo "</pre>";
//         exit();

        echo json_encode($rtnAssignmentList);
    }

    function  income_expenditure_report_view_fun(){


       // $this->load->library('pagination');
//        $query="  SELECT transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
//  transactions.debit AS debit,DATE(transactions.created_at) AS created_at
//  FROM transactions
//INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
//INNER JOIN heads ON heads.id = sub_heads.head_id
//ORDER BY id DESC";

      //  $result = $this->head_model->income_expense_show_data($query);
        $result2 =   $this->head_model->dropdown_head_data();

        //  $result =   $this->head_model->show_head_data_model();
        //   echo  $query2->num_rows(); exit();
        // echo "<pre>"; print_r($result); echo "</pre>"; exit();

//        $query2 =   $this->head_model->count_income_expense_data($query);
//        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/income_expenditure_form_view';
//        $config['total_rows'] = $query2;
//        $config['per_page'] = 10;
//        $config['full_tag_open'] = '<ul class="pagination">';
//        $config['full_tag_close'] = '</ul>';
//        $config['first_tag_open'] = '<li>';
//        $config['last_tag_open'] = '<li>';
//        $config['next_tag_open'] = '<li>';
//        $config['prev_tag_open'] = '<li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $config['first_tag_close'] = '</li>';
//        $config['last_tag_close'] = '</li>';
//        $config['next_tag_close'] = '</li>';
//        $config['prev_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
//        $config['cur_tag_close'] = '</b></span></li>';
//        $this->pagination->initialize($config);

        $this->load->view('admin/header');
        $this->load->view('admin/income_expenditure_report_view',['dropData'=>$result2]);
        //   $this->load->view('admin/head_entry_form');
        $this->load->view('admin/footer');


    }

    function user_registration_view(){
        $this->load->library('pagination');
        $result =   $this->head_model->show_user_reg_data_model();
        $query2 =   $this->head_model->count_user_reg_head_data();
        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/user_registration_view';
        $config['total_rows'] = $query2;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';
        $this->pagination->initialize($config);


        $this->load->view('admin/header');
        $this->load->view('admin/registration_form',['data'=>$result]);
        $this->load->view('admin/footer');
    }



    function edit_user($id){

        $this->load->library('pagination');
        $result =   $this->head_model->show_user_reg_update_data_model();
        $query2 =   $this->head_model->count_user_reg_head_data();
        $result_edit = $this->head_model->update_user_reg($id);
        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/edit_user';
        $config['total_rows'] = $query2;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';
        $this->pagination->initialize($config);


        $this->load->view('admin/header');
        $this->load->view('admin/registration_form_update',['data'=>$result,'edata'=>$result_edit]);
        $this->load->view('admin/footer');


    }
    function searchUser(){
        $key = $this->input->post('search');
       // print_r($key); exit();

        $id =  $this->session->userdata('id');
        //  print_r($id); exit();
        $this->load->library('pagination');
        if($id == 1){
            $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
  FROM transactions
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
INNER JOIN users ON users.id = transactions.created_by 
WHERE (heads.head_name LIKE '%$key%' OR sub_heads.sub_head LIKE '%$key%' OR transactions.type LIKE '%$key%')  
ORDER BY id DESC";
        }else{
            $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
  FROM transactions
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
INNER JOIN users ON users.id = transactions.created_by WHERE transactions.created_by='$id' AND 
(heads.head_name LIKE '%$key%' OR sub_heads.sub_head LIKE '%$key%' OR transactions.type LIKE '%$key%')  
ORDER BY id DESC";
        }

        $result = $this->head_model->income_expense_show_data($query);
        $query2 =   $this->head_model->count_income_expense_data($query);
        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/dataListView';
        $config['total_rows'] = $query2;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';
        $this->pagination->initialize($config);

        $this->load->view('admin/header');
        $this->load->view('admin/data_list_view',['data'=>$result]);
        $this->load->view('admin/footer');

    }

    function dataListView(){
        $id =  $this->session->userdata('id');
        //  print_r($id); exit();
        $this->load->library('pagination');
        if($id == 1){
            $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
  FROM transactions
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
INNER JOIN users ON users.id = transactions.created_by 
ORDER BY id DESC";
        }else{
            $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
  FROM transactions
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
INNER JOIN users ON users.id = transactions.created_by WHERE transactions.created_by='$id'
ORDER BY id DESC";
        }

        $result = $this->head_model->income_expense_show_data($query);
        $query2 =   $this->head_model->count_income_expense_data($query);
        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/dataListView';
        $config['total_rows'] = $query2;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';
        $this->pagination->initialize($config);

        $this->load->view('admin/header');
        $this->load->view('admin/data_list_view',['data'=>$result]);
        $this->load->view('admin/footer');

    }

        function  income_expenditure_form_view(){

          // $id =  $this->session->userdata('id');
          //  print_r($id); exit();
//            $this->load->library('pagination');
//            if($id == 1){
//                $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
//  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
//  FROM transactions
//INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
//INNER JOIN heads ON heads.id = sub_heads.head_id
//INNER JOIN users ON users.id = transactions.created_by
//ORDER BY id DESC";
//            }else{
//                $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
//  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
//  FROM transactions
//INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
//INNER JOIN heads ON heads.id = sub_heads.head_id
//INNER JOIN users ON users.id = transactions.created_by WHERE transactions.created_by='$id'
//ORDER BY id DESC";
//            }


          //  $result = $this->head_model->income_expense_show_data($query);
            $result2 =   $this->head_model->dropdown_head_data();

//            $query2 =   $this->head_model->count_income_expense_data($query);
//            $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/income_expenditure_form_view';
//            $config['total_rows'] = $query2;
//            $config['per_page'] = 10;
//            $config['full_tag_open'] = '<ul class="pagination">';
//            $config['full_tag_close'] = '</ul>';
//            $config['first_tag_open'] = '<li>';
//            $config['last_tag_open'] = '<li>';
//            $config['next_tag_open'] = '<li>';
//            $config['prev_tag_open'] = '<li>';
//            $config['num_tag_open'] = '<li>';
//            $config['num_tag_close'] = '</li>';
//            $config['first_tag_close'] = '</li>';
//            $config['last_tag_close'] = '</li>';
//            $config['next_tag_close'] = '</li>';
//            $config['prev_tag_close'] = '</li>';
//            $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
//            $config['cur_tag_close'] = '</b></span></li>';
//            $this->pagination->initialize($config);

            $this->load->view('admin/header');
            $this->load->view('admin/income_expenditure_form_view',[/*'data'=>$result,*/'dropData'=>$result2]);
            $this->load->view('admin/footer');


        }




       function sub_head_view_form(){


           $this->load->library('pagination');
           $query="SELECT sub_heads.id AS id,heads.head_name AS head_name,sub_heads.sub_head AS sub_head  FROM heads
INNER JOIN sub_heads ON sub_heads.head_id = heads.id
ORDER BY id DESC";

           $result = $this->head_model->sub_head_show_data($query);
           $result2 =   $this->head_model->dropdown_head_data();

        //  $result =   $this->head_model->show_head_data_model();
           //   echo  $query2->num_rows(); exit();
          // echo "<pre>"; print_r($result); echo "</pre>"; exit();

           $query2 =   $this->head_model->count_sub_head_data($query);
           $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/sub_head_view_form';
           $config['total_rows'] = $query2;
           $config['per_page'] = 10;
           $config['full_tag_open'] = '<ul class="pagination">';
           $config['full_tag_close'] = '</ul>';
           $config['first_tag_open'] = '<li>';
           $config['last_tag_open'] = '<li>';
           $config['next_tag_open'] = '<li>';
           $config['prev_tag_open'] = '<li>';
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['first_tag_close'] = '</li>';
           $config['last_tag_close'] = '</li>';
           $config['next_tag_close'] = '</li>';
           $config['prev_tag_close'] = '</li>';
           $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
           $config['cur_tag_close'] = '</b></span></li>';
           $this->pagination->initialize($config);

           $this->load->view('admin/header');
           $this->load->view('admin/sub_head_entry_form',['data'=>$result,'dropData'=>$result2]);
           //   $this->load->view('admin/head_entry_form');
           $this->load->view('admin/footer');


       }

        function head_view(){
//----------------------- testing encription key --------------------
            $this->load->library('encryption');
            $key = $this->encryption->create_key(16);
           // echo  $key; exit();
            $keyVale = bin2hex($key);
           // echo  $keyVale; exit();
            // echo hex2bin('501cbb8f8595c43723f1d898e4170761'); exit();
            // echo hex2bin($keyVale); exit();
//----------------------- testing encription key end ------------------



            $this->load->library('pagination');

            $result =   $this->head_model->show_head_data_model();
            //$data['heads'] = $this->head_model->show_head_data_model();
            $query2 =   $this->head_model->count_head_data();
            //echo "<pre>"; print_r($result); echo "</pre>"; exit();

         //   echo  $query2->num_rows(); exit();
        // echo "<pre>"; print_r($query2->num_rows()); echo "</pre>"; exit();


            $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/head_view';
            $config['total_rows'] = $query2;
            $config['per_page'] = 10;

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';

            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';

            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';

            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';


            $config['next_tag_close'] = '</li>';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
            $config['cur_tag_close'] = '</b></span></li>';
            $this->pagination->initialize($config);

            $this->load->view('admin/header');
            $this->load->view('admin/head_entry_form',['data'=>$result]); //only pass the $data like view('path',$data);
         //   $this->load->view('admin/head_entry_form');
            $this->load->view('admin/footer');

        }

        function  income_expenditure_edit($id){

//            $this->load->library('pagination');
//            $id_session =  $this->session->userdata('id');
//            if($id_session == 1){
//                $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
//  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
//  FROM transactions
//INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
//INNER JOIN heads ON heads.id = sub_heads.head_id
//INNER JOIN users ON users.id = transactions.created_by
//ORDER BY id DESC";
//            }else{
//                $query="SELECT users.username,transactions.id AS id,heads.head_name,sub_heads.sub_head,transactions.type AS t_type,transactions.credit AS credit,
//  transactions.debit AS debit,DATE(transactions.created_at) AS created_at,transactions.created_by
//  FROM transactions
//INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
//INNER JOIN heads ON heads.id = sub_heads.head_id
//INNER JOIN users ON users.id = transactions.created_by WHERE transactions.created_by='$id_session'
//ORDER BY id DESC";
//            }

            $edit_row ="SELECT transactions.id AS id,DATE(transactions.created_at) AS created_at,transactions.created_by,
transactions.comment,
sub_heads.sub_head,transactions.sub_head_id AS sub_head_id,transactions.type AS t_type,
transactions.credit AS credit, transactions.debit AS debit,heads.id AS h_id  FROM transactions 
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
WHERE transactions.id='$id'";

         //   $result = $this->head_model->income_expense_show_data($query);
            $result_edit_row = $this->head_model->income_expense_edit($edit_row);
            $result2 =   $this->head_model->dropdown_head_data();
            //echo "<pre>"; print_r($result_edit_row); echo "</pre>"; exit();
            //  $result =   $this->head_model->show_head_data_model();
            //   echo  $query2->num_rows(); exit();


//            $query2 =   $this->head_model->count_income_expense_data($query);
//            $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/income_expenditure_edit';
//            $config['total_rows'] = $query2;
//            $config['per_page'] = 10;
//            $config['full_tag_open'] = '<ul class="pagination">';
//            $config['full_tag_close'] = '</ul>';
//            $config['first_tag_open'] = '<li>';
//            $config['last_tag_open'] = '<li>';
//            $config['next_tag_open'] = '<li>';
//            $config['prev_tag_open'] = '<li>';
//            $config['num_tag_open'] = '<li>';
//            $config['num_tag_close'] = '</li>';
//            $config['first_tag_close'] = '</li>';
//            $config['last_tag_close'] = '</li>';
//            $config['next_tag_close'] = '</li>';
//            $config['prev_tag_close'] = '</li>';
//            $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
//            $config['cur_tag_close'] = '</b></span></li>';
//            $this->pagination->initialize($config);

            $this->load->view('admin/header');
            $this->load->view('admin/income_expenditure_form_update',[/*'data'=>$result,*/'dropData'=>$result2,'result_edit_row'=>$result_edit_row]);
            //   $this->load->view('admin/head_entry_form');
            $this->load->view('admin/footer');

        }

    function  edit_sub_head($id){


        $this->load->library('pagination');

        $query="SELECT sub_heads.id AS id,heads.head_name AS head_name,sub_heads.sub_head AS sub_head  FROM heads
INNER JOIN sub_heads ON sub_heads.head_id = heads.id
ORDER BY id DESC";

        $result_edit = $this->head_model->sub_head_edit($id);
        $result = $this->head_model->sub_head_show_data($query);
        $result2 =   $this->head_model->dropdown_head_data();

        //  $result =   $this->head_model->show_head_data_model();
        //   echo  $query2->num_rows(); exit();
        // echo "<pre>"; print_r($result); echo "</pre>"; exit();

        $query2 =   $this->head_model->count_sub_head_data($query);
        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/edit_sub_head';
        $config['total_rows'] = $query2;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';
        $this->pagination->initialize($config);

        $this->load->view('admin/header');
        $this->load->view('admin/sub_head_entry_form_edit',['data'=>$result,'dropData'=>$result2,'edata'=>$result_edit]);
        //   $this->load->view('admin/head_entry_form');
        $this->load->view('admin/footer');

    }




    function edit($id){
        $this->load->model('head_model');
        $this->load->library('pagination');

        $result_edit = $this->head_model->when_press_edit($id);
        //$data['heads'] = $this->head_model->show_head_data_model();
        // echo "<pre>"; print_r($res); echo "</pre>";
        //  return redirect('admin_controller/head_view');

        $result =   $this->head_model->show_head_edit_data_model();
        //echo "<pre>"; print_r($result); echo "</pre>"; exit();
        //$data['heads'] = $this->head_model->show_head_data_model();
        $query2 =   $this->head_model->count_head_data();

        //   echo  $query2->num_rows(); exit();
        // echo "<pre>"; print_r($query2->num_rows()); echo "</pre>"; exit();
        $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/edit';
        $config['total_rows'] = $query2;
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';
        $this->pagination->initialize($config);

        $this->load->view('admin/header');
        $this->load->view('admin/head_entry_form_edit',['data'=>$result,'edata'=>$result_edit]); //only pass the $data like view('path',$data);
        //   $this->load->view('admin/head_entry_form');
        $this->load->view('admin/footer');
    }

    public function update_user_registration(){


        $username = $this->session->userdata('username');


            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $created_at = date("Y-m-d");
            $id = $this->input->post('id');
            //   print_r($password); exit();



                $data = array(
                    'id' =>$id,
                    'name' =>$name,
                    'email' =>$email,
                    'username' =>$username,
                    'password' => $this->encrypt->encode($password),
                    'created_at' => $created_at,
                    'created_by' => $this->session->userdata('username')
                );
              //  print_r($data); exit();
                $result =  $this->head_model->update_user($data);
                if($result){
                    $this->load->library('session');
                    $this->session->set_flashdata('success','Successfully User Updated.');
                    return redirect('admin_controller/user_registration_view');
                }else{
                    $this->load->library('session');
                    $this->session->set_flashdata('error','Something Went Wrong.');
                }


    }

    public  function save_user_registration(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[1]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'User Name', 'required|min_length[1]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $username = $this->session->userdata('username');

        if ($this->form_validation->run() == FALSE)
        {
           // echo validation_errors();
            $this->load->library('session');
            $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');

            $this->load->library('pagination');
            $result =   $this->head_model->show_user_reg_data_model();
            $query2 =   $this->head_model->count_user_reg_head_data();
            $config['base_url'] = 'http://localhost/southContainerYardProject/admin_controller/user_registration_view';
            $config['total_rows'] = $query2;
            $config['per_page'] = 10;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class=\"active\"><span><b>';
            $config['cur_tag_close'] = '</b></span></li>';
            $this->pagination->initialize($config);


            $this->load->view('admin/header');
            $this->load->view('admin/registration_form',['data'=>$result]);
            $this->load->view('admin/footer');

        }
        else
        {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $created_at = date("Y-m-d");
         //   print_r($password); exit();

            $resultModel = $this->head_model->user_registration($username,$password);
            if($resultModel){
                $this->load->library('session');
                $this->session->set_flashdata('error','User Already Created.');
                return redirect('admin_controller/user_registration_view');
            }else{

                $data = array(
                    'name' =>$name,
                    'email' =>$email,
                    'username' =>$username,
                    'password' => $this->encrypt->encode($password),
                    'created_at' => $created_at,
                    'created_by' => $this->session->userdata('username')
                );
                // print_r($data); exit();
                $result =  $this->head_model->save_registration_user($data);
                if($result){
                    $this->load->library('session');
                    $this->session->set_flashdata('success','Successfully User Created.');
                    return redirect('admin_controller/user_registration_view');
                }else{
                    $this->load->library('session');
                    $this->session->set_flashdata('error','Something Went Wrong.');
                }
            }
        }

        }

    function save_income_expenditure(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

       // $username = $this->session->userdata('username');
        $userId = $this->session->userdata('id');

        if ($this->form_validation->run('income_expense') == FALSE)
        {
            $this->load->library('session');
            $this->session->set_flashdata('error','Fields Are Required !');

            return redirect('admin_controller/income_expenditure_form_view');
        }else{
           // $this->load->library('encryption');
            $this->load->library('encrypt');


            $sub_head_id = $this->input->post('sub_head_id');
            $type_name = $this->input->post('type_name');
            $amount = $this->input->post('amount');
            $i_e_date = $this->input->post('i_e_date');
            $comment = $this->input->post('comment');


            if($i_e_date == ''){
                $created_at = date("Y-m-d"); //date('d:m:y');
            }else{
                $created_at = $this->input->post('i_e_date');
            }
          //print_r($created_at); exit();

            if($type_name == 'Income'){
                $data = array(
                    'sub_head_id' => $sub_head_id,
                    'type' =>$type_name,
                    'credit' =>$this->encrypt->encode($amount),
                    'created_at' => $created_at,
                    'comment' => $comment,
                    'created_by' => $userId
                );
            }else{
                $data = array(
                    'sub_head_id' => $sub_head_id,
                    'type' =>$type_name,
                    'debit' =>$this->encrypt->encode($amount),
                    'created_at' => $created_at,
                    'comment' => $comment,
                    'created_by' => $userId
                );
            }

           // print_r($data); exit();



            $this->load->model('head_model');
            $result =  $this->head_model->save_income_expense($data);

            if($result){
                $this->load->library('session');
                $this->session->set_flashdata('success','Successfully Saved.');
                return redirect('admin_controller/income_expenditure_form_view');
            }else{


                $this->load->library('session');
                $this->session->set_flashdata('error','Something Went Wrong.');
            }
        }


    }

        function Save_sub_head(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
           // $this->form_validation->set_rules('head_id', 'Select Head', 'required');
           // $this->form_validation->set_rules('sub_head_name', 'Sub Head', 'required|min_length[1]');
            if ($this->form_validation->run('sub_head') == FALSE)
            {
               // $this->form_vlidation->set_error_delimiters('<div class="error" style="color: red">','</div>');
                $this->load->library('session');
                $this->session->set_flashdata('error','Fields Are Required !');

               // $this->load->library('session');
               // $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');


                return redirect('admin_controller/sub_head_view_form');
//                $result =   $this->head_model->show_head_data_model();
//                $this->load->view('admin/header');
//                $this->load->view('admin/head_entry_form',['data'=>$result]);
//                $this->load->view('admin/footer');
            }else{
                $sub_head_name = $this->input->post('sub_head_name');
                $head_id = $this->input->post('head_id');

                $date = date('d:m:y h:m:s');
                $data = array(
                    'sub_head' =>$sub_head_name,
                    'head_id' =>$head_id,
                    'created_at' =>$date
                );
                // print_r($data); exit();

                $this->load->model('head_model');
                $result =  $this->head_model->save_sub_head($data);

                if($result){
                    $this->load->library('session');
                    $this->session->set_flashdata('success','Successfully Saved.');
                    return redirect('admin_controller/sub_head_view_form');
                }else{


                    $this->load->library('session');
                    $this->session->set_flashdata('error','Something Went Wrong.');
                }
            }
        }

        function insert_head(){
            $this->load->library('form_validation');
            if ($this->form_validation->run('head') == FALSE)
            {
                $this->load->library('session');
                $this->session->set_flashdata('error','Head Required');


                return redirect('admin_controller/head_view');
//                $result =   $this->head_model->show_head_data_model();
//                $this->load->view('admin/header');
//                $this->load->view('admin/head_entry_form',['data'=>$result]);
//                $this->load->view('admin/footer');
            }
            else
            {
                $this->load->helper(array('form', 'url'));
                $this->load->library('encrypt');


                $head = $this->input->post('head_name');
                $date = date('d:m:y h:m:s');
                $data = array(
                    'head_name' =>$head,
                    'created_at' =>$date
                );
               // print_r($data); exit();

                $this->load->model('head_model');
               $result =  $this->head_model->insert_head($data);

               if($result){
                   $this->load->library('session');
                   $this->session->set_flashdata('success','Successfully Saved.');
                  return redirect('admin_controller/head_view');
               }else{
                   echo  'error';
               }
            }
        }

        function update_income_expenditure(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $userId = $this->session->userdata('id');
            $id = $this->input->post('id');
            $edit_row ="SELECT transactions.id AS id,sub_heads.sub_head,transactions.sub_head_id AS sub_head_id,transactions.type AS t_type,
transactions.credit AS credit, transactions.debit AS debit,heads.id AS h_id  FROM transactions 
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
WHERE transactions.id='$id'";


            $result_edit_row = $this->head_model->income_expense_edit($edit_row);
           // print_r($result_edit_row); exit();

           // echo  $result_edit_row->sub_head_id; exit();
            if ($this->form_validation->run('income_expense') == FALSE)
            {
                $this->load->library('session');
                $this->session->set_flashdata('error','Fields Are Required !');

                return redirect('admin_controller/income_expenditure_edit/'.$id);
            }else{
                $id = $this->input->post('id');
                $sub_head_id = $this->input->post('sub_head_id');
               // echo $sub_head_id; exit();
                if($sub_head_id == ''){
                    $sub_head_id = $result_edit_row->sub_head_id;
                   // echo $sub_head_id; exit();
                }
                $type_name = $this->input->post('type_name');
                $amount = $this->input->post('amount');
                $i_e_date = $this->input->post('i_e_date');
                $comment = $this->input->post('comment');
                if($i_e_date == ''){
                    $created_at = date("Y-m-d"); //date('d:m:y');
                }else{
                    $created_at = $this->input->post('i_e_date');
                }

                if($type_name == 'Income'){
                    $data = array(
                        'id' => $id,
                        'sub_head_id' =>$sub_head_id,
                        'type' =>$type_name,
                        'credit' =>$this->encrypt->encode($amount),
                        'created_at' => $created_at,
                        'comment' => $comment,
                        'created_by' => $userId
                    );
                }else{
                    $data = array(
                        'id' => $id,
                        'sub_head_id' =>$sub_head_id,
                        'type' =>$type_name,
                        'debit' =>$this->encrypt->encode($amount),
                        'created_at' =>$created_at,
                        'comment' => $comment,
                        'created_by' => $userId
                    );
                }

               // print_r($data); exit();



                $this->load->model('head_model');
                $result =  $this->head_model->update_income_expense($data);

                if($result){
                    $this->load->library('session');
                    $this->session->set_flashdata('success','Successfully Updated.');
                    return redirect('admin_controller/income_expenditure_form_view');
                }else{


                    $this->load->library('session');
                    $this->session->set_flashdata('error','Something Went Wrong.');
                }
            }


        }

     function  update_sub_head(){
         $id = $this->input->post('id');
         $res = $this->head_model->sub_head_edit($id);

         $this->load->library('form_validation');
         if ($this->form_validation->run('sub_head') == FALSE)
         {
             $this->load->library('session');
             $this->session->set_flashdata('error','Fields Are Required !');

             return redirect('admin_controller/edit_sub_head/'.$id);

         }else{

             $id = $this->input->post('id');
             $head_id = $this->input->post('head_id');
             $sub_head_name = $this->input->post('sub_head_name');
             $result = $this->head_model->update_sub_head($id,$head_id,$sub_head_name);

             if($result){

                 $this->load->library('session');
                 $this->session->set_flashdata('success','Successfully Updated.');
                 return redirect('admin_controller/sub_head_view_form');

             }else{

                 $this->load->library('session');
                 $this->session->set_flashdata('error','Not Updated.');
                 return redirect('admin_controller/sub_head_view_form');

             }

         }

         }


    function update_head(){
        $id = $this->input->post('id');
        $res = $this->head_model->when_press_edit($id);

        if ($this->form_validation->run('head') == FALSE)
        {

            $this->load->library('session');
            $this->session->set_flashdata('error','Head Required');
            return redirect('admin_controller/edit/'.$id);

//            $this->form_validation->set_error_delimiters('<div
//            class="error" style="color: red">', '</div>');

//            $result =   $this->head_model->show_head_data_model();
//            $this->load->view('admin/header');
//            $this->load->view('admin/head_entry_form',['data'=>$result]);
//            $this->load->view('admin/footer');
        }else{

            $id = $this->input->post('id');
            $name = $this->input->post('head_name');
            $result = $this->head_model->update_head($id,$name);

            if($result){

                $this->load->library('session');
                $this->session->set_flashdata('success','Successfully Updated.');
                return redirect('admin_controller/head_view');

            }else{

                $this->load->library('session');
                $this->session->set_flashdata('error','Not Updated.');
                return redirect('admin_controller/head_view');

            }
        }
    }

    function delete_Income_expense($id){
        $result =  $this->head_model->delete_income_expense($id);
        if($result){
            $this->load->library('session');
            $this->session->set_flashdata('error','Deleted Successfully');
            return redirect('admin_controller/income_expenditure_form_view');
        }

    }

    function delete_sub_head($id){
        $result =  $this->head_model->delete_sub_head($id);
        if($result){
            $this->load->library('session');
            $this->session->set_flashdata('error','Deleted Successfully');
            return redirect('admin_controller/sub_head_view_form');
        }

    }

        function delete($id){
             $result =  $this->head_model->delete_head($id);
            if($result){
                $this->load->library('session');
                $this->session->set_flashdata('error','Deleted Successfully');
                return redirect('admin_controller/head_view');
            }

        }


        function delete_user($id){
            $result =  $this->head_model->delete_user($id);
            if($result){
                $this->load->library('session');
                $this->session->set_flashdata('error','Deleted Successfully');
                return redirect('admin_controller/user_registration_view');
            }

        }

    function income_expense_report_action()
    {

        $id = $this->session->userdata('id');
        $head_id = $this->input->post('head_id');
      // print_r($id); exit();
       if($id == 1){
           $sql_icd_report_datewise="SELECT users.username, transactions.id,transactions.comment,transactions.created_by,
heads.head_name AS head_name,transactions.id AS id,sub_heads.sub_head,transactions.type AS t_type,DATE(transactions.created_at) AS created_at,transactions.credit AS credit,
  transactions.debit AS debit
  FROM transactions
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
INNER JOIN users ON users.id = transactions.created_by
WHERE heads.id='$head_id'
GROUP BY transactions.id ASC";
       }else{
           $sql_icd_report_datewise="SELECT users.username, transactions.id,transactions.comment,
heads.head_name AS head_name,transactions.id AS id,sub_heads.sub_head,transactions.type AS t_type,DATE(transactions.created_at) AS created_at,transactions.credit AS credit,
  transactions.debit AS debit
  FROM transactions
INNER JOIN sub_heads ON sub_heads.id = transactions.sub_head_id
INNER JOIN heads ON heads.id = sub_heads.head_id
INNER JOIN users ON users.id = transactions.created_by WHERE transactions.created_by='$id' AND heads.id='$head_id'
GROUP BY transactions.id ASC";

       }



         $rslt_icd_report_datewise = $this->head_model->report_select_query($sql_icd_report_datewise);

        // echo "<pre>"; print_r($rslt_icd_report_datewise); echo "</pre>"; exit();
       // echo print_r($rslt_icd_report_datewise[0]['head_name']); exit();

              $this->load->library('m_pdf');
              $mpdf->use_kwt = true;
            $this->data['rslt_icd_report_datewise']= $rslt_icd_report_datewise;
        $date = date('d:m:y h:m:s');
        $this->data['icd_entry_date']=$date;
            // $pdf = $this->m_pdf->load();
           $mpdf->showImageErrors = true;
            $this->m_pdf->pdf->SetWatermarkText('DataSoft');
             $this->m_pdf->pdf->showWatermarkText = true;

//        $this->m_pdf->pdf->AddPage('P', // L - landscape, P - portrait
//                '', '', '', '',
//                5, // margin_left
//                5, // margin right
//                10, // margin top
//                10, // margin bottom
//                10, // margin header
//                10); // margin footer

             // $this->load->view('head_wise_income_expenditure_report_pdf'/*,$this->data*/);
              $html=$this->load->view('admin/head_wise_income_expenditure_report_pdf',$this->data, true);
              $pdfFilePath ="head_wise_income_expenditure_report-".$date."-download.pdf";

//        $this->m_pdf->pdf->useSubstitutions = true;
//        $this->m_pdf->pdf->setFooter('|Page {PAGENO} of {nb}|');
            //  $pdf->WriteHTML($html,2);
             $this->m_pdf->pdf->WriteHTML($html,2);
            //  $pdf->Output($pdfFilePath, "I");
             $this->m_pdf->pdf->Output($pdfFilePath,"I");

    }



//        function show_head_data(){
//          $result =   $this->head_model->show_head_data_model();
//
//          if($result){
////              echo "<pre>";
////              print_r($result);
////              echo "</pre>";
//              $this->load->view('admin/head_entry_form',['data'=>$result]);
//
//
//          }else{
//              echo "no data";
//
//          }
//        }



    // echo "<pre>"; print_r($res); echo "</pre>";
}