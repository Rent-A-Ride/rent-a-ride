<?php
    class Pages extends Controller {
        public function __construct()
        {
           $this->pagesModel = $this->model('M_Pages');
        }

        public function index() {
            $data = [];

            $this->view('pages/v_index', $data);
        }

        public function about() {
            $customer = $this->pagesModel->getCustomers();
            $data = [
                'customer' => $customer
            ];

            $this->view('v_about', $data);
        }

        public function profile()
        {
            $d1= $this->pagesModel->getDriverById($_SESSION['user_id']);

            $data['driver'] = $d1;

            $this->view('driver/v_profile', $data);
        }

        public function editProfile()
        {
            $driver= $this->pagesModel->getDriverById($_SESSION['user_id']);


            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Form is submitting

                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Input data
                $data = [
                    'NIC' => trim($_POST['NIC']),
                    'firstName' => trim($_POST['firstName']),
                    'lastName' => trim($_POST['lastName']),
                    'email' => trim($_POST['email']),
                    'phoneNo' => trim($_POST['phoneNo']),
                    'address' => trim($_POST['address']),
                    'area' => trim($_POST['area']),
                    'licenseNo' => trim($_POST['licenseNo']),
                    'license_scanned_copy' => trim($_POST['license_scanned_copy']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate each input

                // Validate the name
                if(empty($data['firstName'])) {
                    $data['first_name_err'] = '* Please enter your name';
                }else if (!preg_match ("/^([a-zA-Z' ]+)$/", $data['firstName']) ) {
                    $data['first_name_err'] = '* Only alphabets and whitespace are allowed.';
                }

                if(empty($data['lastName'])) {
                    $data['last_name_err'] = '* Please enter your Last name';
                }else if (!preg_match ("/^([a-zA-Z' ]+)$/", $data['firstName']) ) {
                    $data['last_name_err'] = '* Only alphabets and whitespace are allowed.';
                }

                // Validate the email
                if(empty($data['email'])) {
                    $data['email_err'] = '* Please enter a email';
                }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "* Invalid email format";
                }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = "Invalid email format";
                }

                // Validate Password

                // Validate password strength
                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number    = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);

                if (empty($data['password'])) {
                    $data['password_err'] = '* Please enter a Password';
                }else if (strlen($data['password']) < 8) {
                    $data['password_err'] = '* Password should be at least 8 characters in length';
                }else if ( !$uppercase || !$lowercase || !$number || !$specialChars) {
                    $data['password_err'] = '* Password should include at least one upper case letter, one number, and one special character.';
                }elseif (empty($data['confirm_password'])) {
                    $data['password_err'] = '* Please confirm the Password';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = '* Passwords are not matching!';
                    }
                }

                // Validations are completed and no error then register the user
                if (empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ) {
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Update the Driver
                    if ($this->pagesModel->Update($_SESSION['user_id'],$data)) {
                        // create a flash message
                        flash('reg_flash', "Updated Successfully!");

                        redirect('pages/profile');
                    }else {
                        die('Something went wrong!');
                    }
                }else {
                    // Load View
                    $this->view('driver/v_editProfile', $data);
                }


            }else {
                // Initial form
                $data = [
                    'NIC' => $driver->NIC,
                    'firstName' => $driver->firstName,
                    'lastName' => $driver->lastName,
                    'email' => $driver->email,
                    'phoneNo' => $driver->phoneNo,
                    'address' => $driver->address,
                    'area' => $driver->area,
                    'licenseNo' => $driver->licenseNo,
                    'license_scanned_copy' => $driver->license_scanned_copy,
                    'password' => '',
                    'confirm_password' => '',

                    'first_name_err' => '',
                    'last_name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load View
                $this->view('driver/v_editProfile', $data);
            }
        }
    }