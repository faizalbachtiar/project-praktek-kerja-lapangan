<?php
class Jadwal extends CI_Controller
{

    public function index()
    {
        $level = $this->session->userdata('level');

        if ($level == 'kesmas' || $level == 'super') {
            $data['jadwal'] = $this->Jadwal_model->getjadwalaks();
            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            // $this->load->view('public/jadwal/index', $data);
            $this->load->view('public/jadwal/index');
            $this->load->view('templates/footer_admin');
        } elseif ($level == 'visitasi') {
            $data['jadwal'] = $this->Jadwal_model->getavisitasijadwal();
            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('public/jadwal/index', $data);
            $this->load->view('templates/footer_admin');
        } elseif ($level = 'pengguna') {
            $nik_pengguna = $this->session->userdata('nik_pengguna');
            echo $nik_pengguna;
            $data['jadwal'] = $this->Jadwal_model->getjadwalpengguna($nik_pengguna);
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/jadwal/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/jadwal/index');
            $this->load->view('templates/footer');
        }
    }

    public function create($id_permohonan)
    {
        $data['permohonan'] = $this->Permohonan_model->view($id_permohonan);
        $data['puskesmas']  = $this->Permohonan_model->fetchpuskesmas($id_permohonan);
        $data['visitasi']   = $this->Permohonan_model->fetchvisitasi('PSKSMS014');

        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('public/jadwal/create', $data);
        $this->load->view('templates/footer_admin');
    }

    public function simpan()
    {

        $puskesmas      = $this->input->post('puskesmas');
        $anggota        = $this->input->post('hidden_anggota');
        $tgl            = $this->input->post('tgl_visitasi');
        $id_permohonan  = $this->input->post('id_permohonan');
        $username       = $this->session->userdata('username');

        $query          = $this->Jadwal_model->simpan($id_permohonan, $puskesmas, $anggota, $tgl, $username);
        $ubah_status    = $this->Permohonan_model->updatestatus($id_permohonan);

       
        $this->session->set_flashdata('succes_jadwal', 'Permohonan Telah Berhasil di Jadwalkan.');
          
    }

    public function buat_jadwal()
    {
        $output = '';
        $query  = '';

        // var_dump($this->input->post('query'));

        if (!empty($this->input->post('query'))) {
            // echo $this->input->post('query');
            $query = $this->input->post('query');
        }

        // $query = "Puskesmas Dinoyo";
        $data = $this->Jadwal_model->ambil_nama_anggota_visitasi($query);
        // var_dump($data);

        foreach ($data as $row) {
            $output .= '<option value="' . $row->nama . '">' . $row->nama . '</option>';
        }

        echo $output;
    }

    public function addjadwal()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('public/jadwal/add');
        $this->load->view('templates/footer_admin');
    }

    // search for pengguna
    public function fetchdata()
    {
        $output = '';
        $query  = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Jadwal_model->sp_jadwal($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Detail</th>
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
                                        <p>' . $row->nama . '</p>
                                    </div>
                                </div>
                            </td>
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
                                        <p>' . $row->kategori . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="alert-warning p-2 rounded">' . $row->status . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->created_at . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a href="' . base_url('permohonan/view/' . $row->id_permohonan) . '" class="btn btn-info">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </td>';
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

    // search for user
    public function s_u_jadwalsearch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Jadwal_model->su_jadwal($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Usaha</th>
                            <th>Puskesmas</th>
                            <th>Tanggal Visitasi</th>
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
                                        <p>' . $row->nama_puskesmas . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->tglvisitasi . '</p>
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

    // search for admin visitasi
    public function avisit_jadwalsearch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data jadwal
        $data = $this->Jadwal_model->avisit_searchjadwal($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Alamat</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi</th>
                        </tr>
                    </thead>
            ';

        // table body
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                    <tr>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                    <p>' . $row->nama . '</p>
                                </div>
                            </div>
                        </td>
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
                                    <p>' . $row->alamat_usaha . '</p>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <p>' . $row->tim_visit . '</p>
                            </div>
                        </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                    <p>' . $row->tglvisitasi . '</p>
                                </div>
                            </div>
                        </td>
                       
                    </tr>
                ';
            }
        } else {
            // 404 data not found
            $output .= '
                <tr>
                    <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <br>
                                <p class="text-danger p-3 text-center">Jadwal tidak ditemukan</p>
                            </div>
                        </div>
                     </td>
                </tr>
            ';
        }

        $output .= '</table>';

       
        // print result
        echo $output;
    }

    // search for Kesmas & Super
    public function aks_jadwalsearch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Jadwal_model->aks_jadwalsearch($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Puskesmas</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi</th>
                        </tr>
                    </thead>
            ';

        // table body
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
                        <tr>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->nama . '</p>
                                    </div>
                                </div>
                            </td>
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
                                        <p>' . $row->nama_puskesmas . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->tim_visit . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->tglvisitasi . '</p>
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
                                <p class="text-center text-danger">Jadwal tidak ditemukan</p>
                            </div>
                        </div>
                    </td>
                </tr>';
        }

        $output .= '</table>';

        // if ($data->num_rows() > 0) {
        //     foreach ($data->result() as $row) {
        //         $output .= '
        //                     <div class="modal fade" id="anggotalModal" tabindex="-1" role="dialog" aria-labelledby="anggotaModalTitle" aria-hidden="true">
        //                         <div class="modal-dialog modal-dialog-centered" role="document">
        //                             <div class="modal-content">
        //                                 <div class="modal-header">
        //                                     <h5 class="modal-title" id="anggotaModalTitle">Angota Tim Visitasi</h5>
        //                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        //                                         <span aria-hidden="true">&times;</span>
        //                                     </button>
        //                                 </div>
        //                                 <div class="modal-body">
        //                                     <p>' . $row->tim_visit . '</p>
        //                                 </div>
        //                             </div>
        //                         </div>
        //                     </div>';
        //     }
        // }
        // print result
        echo $output;
    }
}
