<?php
class Users extends Controller {

    public function __construct() {
        $this->userModel = $this->model('M_Users');
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Form is submitting

            // Validate the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Input data
            $data = [
                'driverID' => uniqid('D'),
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

            // Validate NIC


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
            }else {
                // check email is already registered or not
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = "* Email is already registered!";
                }
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

                // Register user
                if ($this->userModel->register($data)) {
                    // create a flash message
                    flash('reg_flash', "You're successfully registered!");

                    redirect('Users/login');
                }else {
                    die('Something went wrong!');
                }
            }else {
                // Load View
                $this->view('customers/v_register', $data);
            }


        }else {
            // Initial form
            $data = [
                'driverID' => uniqid('D'),
                'NIC' => '',
                'firstName' => '',
                'lastName' => '',
                'email' => '',
                'phoneNo' => '',
                'address' => '',
                'area' => '',
                'licenseNo' => '',
                'license_scanned_copy' => '',
                'password' => '',
                'confirm_password' => '',

                'first_name_err' => '',
                'last_name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load View
            $this->view('customers/v_register', $data);
        }

    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Form is submitting
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err' => '',
                'password_err' => ''
            ];

            // Validate the email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter the email';
            }else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    // User is found
                }else {
                    // User is not found
                    $data['email_err'] = 'User not found';
                }
            }

            // Validate the password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter the password';
            }

            // If no errors were found log the user
            if (empty($data['email_err']) && empty($data['password_err']) ) {
                // log the user
                $userLogged = $this->userModel->login($data['email'], $data['password']);

                if ($userLogged) {
                    // User the authenticated
                    // Create user session

                    $this->createUserSession($userLogged);

                } else {
                    $data['password_err'] = 'Password Incorrect';

                    // Load view with errors
                    $this->view('customers/v_login', $data);
                }
            } else {
                // Load view with errors
                $this->view('customers/v_login', $data);
            }
        }else {
            // initial form
            $data = [
                'email' => '',
                'password' => '',

                'email_err' => '',
                'password_err' => ''
            ];

            // Load view
            $this->view('customers/v_login', $data);
        }



    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->driverID;
        $_SESSION['user_NIC'] = $user->NIC;
        $_SESSION['user_name'] = $user->firstName;
        $_SESSION['user_lastName'] = $user->lastName;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_phoneNo'] = $user->phoneNo;
        $_SESSION['user_address'] = $user->	address;
        $_SESSION['user_area'] = $user->area;
        $_SESSION['user_licenseNo'] = $user->licenseNo;
        $_SESSION['user_license_scanned_copy'] = $user->license_scanned_copy;



        redirect('pages/profile');

    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_NIC']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_lastName']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_phoneNo']);
        unset($_SESSION['user_address']);
        unset($_SESSION['user_area']);
        unset($_SESSION['user_licenseNo']);
        unset($_SESSION['user_license_scanned_copy']);

        session_destroy();

        redirect('Users/login');
    }

    public function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>