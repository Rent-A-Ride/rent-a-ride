<?php
	class M_Pages
	{
		private $db;

		function __construct()
		{
			$this->db = new Database();
		}

        public function getCustomers(){
            $this->db->query("SELECT * FROM CUSTOMER");

            return $this->db->resultSet();
        }

        public function getDrivers(){
            $this->db->query("SELECT * FROM CUSTOMER");

            return $this->db->resultSet();
        }

        public function getDriverById($driverID){
            $this->db->query("SELECT * FROM driver WHERE driverID = :driverID ");
            $this->db->bind(':driverID', $driverID);

            $row = $this->db->single();

            return $row;
        }

        // Update the user
        public function Update($driverID, $data) {

            $this->db->query('UPDATE `driver` SET `NIC`=:NIC,`firstName`= :firstName,`lastName`= :lastName,`email`=:email,`phoneNo`=:phoneNo,`address`=:address,`area`=:area,`licenseNo`=:licenseNo,`license_scanned_copy`=:license_scanned_copy,`password`=:password WHERE `driverID` = :driverID');
            $this->db->bind(':driverID', $driverID);
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
	}
?>