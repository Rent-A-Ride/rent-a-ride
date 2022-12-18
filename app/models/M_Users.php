<?php
    class M_Users {
        private $db;

        function __construct()
        {
            $this->db = new Database();
        }

        // Register the user
        public function register($data) {

            $this->db->query('INSERT INTO driver(driverID, NIC, firstName, lastName, email, phoneNo, address, area, licenseNo, license_scanned_copy, password) VALUES (:driverID,:NIC,:firstName,:lastName,:email,:phoneNo,:address,:area,:licenseNo,:license_scanned_copy,:password)');
            $this->db->bind(':driverID', $data['driverID']);
            $this->db->bind(':NIC', $data['NIC']);
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phoneNo', $data['phoneNo']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':area', $data['area']);
            $this->db->bind(':licenseNo', $data['licenseNo']);
            $this->db->bind(':license_scanned_copy', $data['license_scanned_copy']);
            $this->db->bind(':password', $data['password']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }

        //find the user
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM driver WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            if ($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }

        }

        // Log in the user
        public function login($email, $password) {
            $this->db->query('SELECT * FROM driver WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;

            if (password_verify($password, $hashed_password)) {
                return $row;
            }else {
                return false;
            }

        }
    }
?>






