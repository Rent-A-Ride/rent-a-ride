<?php
class Driver extends Controller {
    public function __construct()
    {
        $this->driverModel = $this->model('M_Driver');
    }

    public function addDriver() {
        $data = [];

        $this->view('drivers/v_addDriver', $data);
    }

    public function profile() {
        $data = [
            'NIC' => '991131175V'
        ];

        $this->view('driver/v_profile', $data);
    }

}
?>