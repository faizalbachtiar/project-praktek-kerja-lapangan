<?php
class Sertifikat extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/sertifikat/index');
        $this->load->view('templates/footer_admin');
    }
    public function cetak_laporan(){
        $dari= $this->input->post('awal');
        $akhir =$this->input->post('akhir');
        $data['permohonan'] = $this->Permohonan_model->ambil_data_permohonan($dari,$akhir);
        $data['jumlah_sertifikat']=$this->Sertifikat_model->calculate();
        $data['jumlah_permohonan']=$this->Permohonan_model->jumlah_permohonan();
        $data['tglhariini']=$tgl=date('d-m-Y');;
        $data['awal']=$dari;
        $data['akhir']=$akhir;
        $this->load->view('admin/laporan/s_print_laporan',$data);
       
    }
    public function view($id_permohonan)
    {
        $level = $this->session->userdata('level');
        if($level == "kesmas" || $level=="super"){
            $data['sertifikat'] = $this->Sertifikat_model->view($id_permohonan);

            $this->load->view('admin/sertifikat/s_print', $data);
            
        }
        else{
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('nik_pengguna');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            $this->session->set_flashdata('user_loggedout', 'Maaf Anda Belum Login.');
            // set failed login message
            redirect('admin/login');
        }
    }

    public function add()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/sertifikat/add');
        $this->load->view('templates/footer_admin');
    }

    public function addview($id_permohonan)
    {
        $level = $this->session->userdata('level');
        if($level == "kesmas" || $level=="super"){
            $data['rekap'] = $this->Sertifikat_model->addview($id_permohonan);

            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('admin/sertifikat/view_add', $data);
            $this->load->view('templates/footer_admin');
        
        }
        else {
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('nik_pengguna');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            $this->session->set_flashdata('user_loggedout', 'Maaf Anda Belum Login.');
            // set failed login message
            redirect('admin/login');
        }
       }

    public function create($id_permohonan)
    {
        $data['permohonan'] = $this->Permohonan_model->create_certificate($id_permohonan);

        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/sertifikat/create', $data);
        $this->load->view('templates/footer_admin');
    }

    public function search()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Sertifikat_model->search($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Usaha</th>
                            <th>Diterbitkan Pada</th>
                            <th>Berlaku Hingga</th>
                            <th></th>
                        </tr>
                    </thead>';

        // table body
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->nama_usaha . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->tglterbit . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->batastgl . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a class="btn btn-info p-2" href="' . base_url('sertifikat/' . $row->id_permohonan) . '" target="blank">Lihat Sertifikat</a>
                                    </div>
                                </div>
                            </td>
                        </tr>';
            }
        } else {
            // 404 data not found
            $output .= '
            <tr>
                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                    <div ng-switch="" on="col.renderType">
                        <div ng-switch-when="primaryLink" class="ng-scope">
                            <br>
                            <p class="text-center text-danger">Data tidak ditemukan</p>
                        </div>
                    </div>
                </td>
            </tr>';
        }

        // end of table
        $output .= '</table>';

        // print result
        echo $output;
    }

    // public function search()
    // {
    //     $output = '';
    //     $query  = '';
    //     if ($this->input->post('query')) {
    //         $query = $this->input->post('query');
    //     }
    //     // get data pengguna
    //     $data = $this->Sertifikat_model->search($query);

    //     // table header
    //     $output .= '
    //             <table class="table">
    //                 <thead>
    //                     <tr>
    //                         <th>Nama Usaha</th>
    //                         <th>Diterbitkan Pada</th>
    //                         <th>Berlaku Hingga</th>
    //                         <th></th>
    //                     </tr>
    //                 </thead>';

    //     // table body
    //     if ($data->num_rows() > 0) {
    //         foreach ($data->result() as $row) {
    //             $output .= '
    //                     <tr>
    //                         <td ng-repeat="col in columns" class="ng-scope">
    //                             <div ng-switch="" on="col.renderType">
    //                                 <div ng-switch-when="primaryLink" class="ng-scope">
    //                                     <p>' . $row->nama_usaha . '</p>
    //                                 </div>
    //                             </div>
    //                         </td>
    //                         <td ng-repeat="col in columns" class="ng-scope">
    //                             <div ng-switch="" on="col.renderType">
    //                                 <div ng-switch-when="primaryLink" class="ng-scope">
    //                                     <p>' . $row->tglterbit . '</p>
    //                                 </div>
    //                             </div>
    //                         </td>
    //                         <td ng-repeat="col in columns" class="ng-scope">
    //                             <div ng-switch="" on="col.renderType">
    //                                 <div ng-switch-when="primaryLink" class="ng-scope">
    //                                     <p>' . $row->batastgl . '</p>
    //                                 </div>
    //                             </div>
    //                         </td>
    //                         <td ng-repeat="col in columns" class="ng-scope">
    //                             <div ng-switch="" on="col.renderType">
    //                                 <div ng-switch-when="primaryLink" class="ng-scope">
    //                                     <a href="' . base_url('sertifikat/' . $row->id_permohonan) . '" class="btn btn-info">
    //                                         Lihat Detail
    //                                     </a>
    //                                 </div>
    //                             </div>
    //                         </td>';
    //         }
    //     } else {
    //         // 404 data not found
    //         $output .= '
    //         <tr>
    //             <td ng-repeat="col in columns" class="ng-scope" colspan="6">
    //                 <div ng-switch="" on="col.renderType">
    //                     <div ng-switch-when="primaryLink" class="ng-scope">
    //                         <br>
    //                         <p class="text-center text-danger">Data tidak ditemukan</p>
    //                     </div>
    //                 </div>
    //             </td>
    //         </tr>';
    //     }

    //     // end of table
    //     $output .= '</table>';

    //     // print result
    //     echo $output;
    // }
}
