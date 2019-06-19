<?php

$config = array(
    'head' => array(
        array(
            'field' => 'head_name',
            'label' => 'Head',
            'rules' => 'required'
        )
    ),
    'sub_head' => array(
        array(
            'field' => 'head_id',
            'label' => 'Select Head',
            'rules' => 'required'
        ),
        array(
            'field' => 'sub_head_name',
            'label' => 'Sub Head',
            'rules' => 'required'
        )
    ),
    'income_expense' => array(
        array(
            'field' => 'head_id',
            'label' => 'Select Head',
            'rules' => 'required'
        ),
//        array(
//            'field' => 'sub_head_id',
//            'label' => 'Select Sub Head',
//            'rules' => 'required'
//        ),
        array(
            'field' => 'type_name',
            'label' => 'Select Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'amount',
            'label' => 'Amount',
            'rules' => 'required'
        )
    ),

//    'email' => array(
//        array(
//            'field' => 'emailaddress',
//            'label' => 'EmailAddress',
//            'rules' => 'required|valid_email'
//        ),
//        array(
//            'field' => 'name',
//            'label' => 'Name',
//            'rules' => 'required|alpha'
//        ),
//        array(
//            'field' => 'title',
//            'label' => 'Title',
//            'rules' => 'required'
//        ),
//        array(
//            'field' => 'message',
//            'label' => 'MessageBody',
//            'rules' => 'required'
//        )
//    )
);



?>