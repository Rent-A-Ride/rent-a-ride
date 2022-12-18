<?php
//    class Customers extends Controller {
//        public function __constructor() {
//            $this->usermodel = $this->model('M_Users');
//        }
//
//        public function register(){
//            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//               // Form is submitting
//
//                // Validate the data
//                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//
//                // Input data
//                $data = [
//                    'name' => trim($_POST['name']),
//                    'email' => trim($_POST['email']),
//                    'password' => trim($_POST['password']),
//                    'confirm_password' => trim($_POST['confirm_password']),
//
//                    'name_err' => '',
//                    'email_err' => '',
//                    'password_err' => '',
//                    'confirm_password_err' => ''
//                ];
//
//                // Validate each input
//
//                // Validate the name
//                if(empty($data['name'])) {
//                    $data['name_err'] = 'Please enter your name';
//                }
//
//                // Validate the email
//                if(empty($data['email'])) {
//                    $data['email_err'] = 'Please enter a email';
//                }
//
//
//            }else {
//                // Initial form
//                $data = [
//                    'name' => '',
//                    'email' => '',
//                    'password' => '',
//                    'confirm_password' => '',
//
//                    'name_err' => '',
//                    'email_err' => '',
//                    'password_err' => '',
//                    'confirm_password_err' => ''
//                ];
//
//                // Load View
//                $this->view('customers/v_register', $data);
//            }
//
//        }
//
//        public function login(){
//            $data = [];
//
//            $this->view('customers/v_login', $data);
//        }
//    }
//?>