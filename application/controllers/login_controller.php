<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('encrypt');
        if ($this->session->userdata('id')) {
            return redirect('admin_controller');
        }
    }

    function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->view('admin/admin_login/login');
    }

    function login_form_action()
    {

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('Username', 'User Name', 'required|min_length[1]');
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->library('session');
            $this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
            $this->load->view('admin/admin_login/login');
        } else {
            $this->load->library('encrypt');
            $this->load->library('session');
            $username = $this->input->post('Username');
            $password = $this->input->post('Password');
            $this->load->model('login_model');
            // $resultModel =   $this->login_model->login($username,$password);
            $resultModel = $this->login_model->login($username);
            //$usersData = $this->login_model->users_Data();
            // print_r($resultModel);  exit();
            //  password_verify($password,$usersData[3]->password);
            //  print_r(password_verify($password,$usersData[3]->password)); exit();


//            $data   =   array();
//            foreach ($usersData as $row):
//            if($this->encrypt->decode($row['password']) == $password && $this->encrypt->decode($row['username']) == $username ){
//                 $data[] = array(
//                    'id' => $row['id'],
//                    'username' => $this->encrypt->decode($row['username']),
//                );
//            }
//            endforeach;

            if ($resultModel) {
                if ($password == $this->encrypt->decode($resultModel->password)){
                    $username = $resultModel->username;
                    $id = $resultModel->id;
                    $this->session->set_userdata('id', $id);
                    $username = $this->session->set_userdata('username', $username);
                    return redirect('admin_controller');
                }else{
                    $this->load->library('session');
                    $this->session->set_flashdata('login_error', 'Invalide User');
                    return redirect('Login_controller');
                }
            } else {
                $this->load->library('session');
                $this->session->set_flashdata('login_error', 'Invalide User');
                return redirect('Login_controller');

            }
        }
    }
}