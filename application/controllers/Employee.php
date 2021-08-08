<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
    }

    public function index()
    {
        $data ['title'] = 'Employee';
        $data ['employee'] = $this->employee_model->get_data('baf_emplo')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('employee', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data ['title'] = 'Add Employee';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_employee');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();

        if  ($this->form_validation->run() == FALSE){
            $this->tambah();
        } else {
            $data = array(
                'employee_name' => $this->input->post('employee_name'),
                'div' => $this->input->post('div'),
                'mobile_no' => $this->input->post('mobile_no'),
            );

            $this->employee_model->insert_data($data, 'baf_emplo');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Succesfully added!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('employee');
         }
    }

    public function edit($nik)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'nik'=> $nik,
                'employee_name' => $this->input->post('employee_name'),
                'div' => $this->input->post('div'),
                'mobile_no' => $this->input->post('mobile_no'),
            );
            $this->employee_model->update_data($data, 'baf_emplo');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Succesfully updated!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('employee');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('employee_name', 'Employee Name','required', array(
            'required' => ' You should fill this form!!'
        ));
        $this->form_validation->set_rules('div', 'Division Name','required', array(
            'required' => ' You should fill this form!!'
        ));
        $this->form_validation->set_rules('mobile_no', 'Phone Number','required', array(
            'required' => ' You should fill this form!!'
        ));
    }


    public function delete($id)
    {
        $where = array('nik' => $id);

        $this->employee_model->delete($where, 'baf_emplo');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Succesfully Deleted!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('employee');
    }
}
?>