<?php
class Permohonan extends CI_Controller
{
    // permohonan list for all level user
    public function index()
    {
        $level = $this->session->userdata('level');

        if ($level == "pengguna") {
            $data['permohonan'] = $this->Permohonan_model->getpermohonan('pengguna');
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/permohonan/index', $data, $level);
            $this->load->view('templates/footer');
        } else {
            $data['permohonan'] = $this->Permohonan_model->getpermohonan('admin');
            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('public/permohonan/index', $data);
            $this->load->view('templates/footer_admin');
        }
    }
    public function permohonan_validasi(){
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Permohonan_model->ambil_permohonan_validasi($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIK Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Kategori</th>
                            <th>Tanggal Pengajuan</th>
                            <th></th>
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
                                        <p>' . $row->nik_pemohon . '</p>
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
                                        <p>' . $row->created_at . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a href="' . base_url('csertifikat/' . $row->id_permohonan) . '" class="btn btn-info">
                                            Buat Sertifikat
                                        </a>
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
            </tr>
            ';
        }

        // end of table
        $output .= '
            </table>
            ';

        // print result
        echo $output;
    
    }
    // It works, dont fucking touch it
    // detail permohonan
    public function view($id_permohonan)
    {
        $data['permohonan'] = $this->Permohonan_model->view($id_permohonan);
        $data['keterangan'] = $this->Permohonan_model->keterangan($id_permohonan);
        $data['rekap'] =  $this->Permohonan_model->rekap($id_permohonan);
        $data['jadwal'] =  $this->Permohonan_model->jadwal($id_permohonan);
        if ($this->session->userdata('level') == "pengguna") {
            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/permohonan/view', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header_admin');
            $this->load->view('templates/topmenu_admin');
            $this->load->view('templates/sidebar_admin');
            $this->load->view('admin/permohonan/view', $data);
            $this->load->view('templates/footer_admin');
        }
    }

    // It works, dont fucking touch it
    // live search for permohonan
    public function search()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Permohonan_model->fetch_data($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIK Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th></th>
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
                                        <p>' . $row->nik_pemohon . '</p>
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
                                    <p class="alert-success p-2 rounded">' . $row->status . '</p>
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
                            </td>
                        </tr>';

                // if ($row->kategori == 'diproses') {
                //     $output .= '
                //             <td ng-repeat="col in columns" class="ng-scope">
                //                 <div ng-switch="" on="col.renderType">
                //                     <div ng-switch-when="primaryLink" class="ng-scope">
                //                         <p class="alert-info p-2">Diproses</p>
                //                     </div>
                //                 </div>
                //             </td>
                //         </tr>';
                // }
                // if ($row->kategori == 'ditolak') {
                //     $output .= '
                //             <td ng-repeat="col in columns" class="ng-scope">
                //                 <div ng-switch="" on="col.renderType">
                //                     <div ng-switch-when="primaryLink" class="ng-scope">
                //                         <button class="btn btn-danger p-2">Keterangan Penolakan</button>
                //                     </div>
                //                 </div>
                //             </td>
                //         </tr>';
                // }
                // if ($row->kategori == 'terverifikasi') {
                //     $output .= '
                //             <td ng-repeat="col in columns" class="ng-scope">
                //                 <div ng-switch="" on="col.renderType">
                //                     <div ng-switch-when="primaryLink" class="ng-scope">
                //                         <button class="btn btn-primary p-2">Lihat Jadwal</button>
                //                     </div>
                //                 </div>
                //             </td>
                //         </tr>';
                // }
                // if ($row->kategori == 'validasi') {
                //     $output .= '
                //             <td ng-repeat="col in columns" class="ng-scope">
                //                 <div ng-switch="" on="col.renderType">
                //                     <div ng-switch-when="primaryLink" class="ng-scope">
                //                         <p class="alert-info p-2">Tervalidasi</p>
                //                     </div>
                //                 </div>
                //             </td>
                //         </tr>';
                // }
                // if ($row->kategori == 'lolos') {
                //     $output .= '
                //             <td ng-repeat="col in columns" class="ng-scope">
                //                 <div ng-switch="" on="col.renderType">
                //                     <div ng-switch-when="primaryLink" class="ng-scope">
                //                         <p class="alert-success p-2">Lolos</p>
                //                     </div>
                //                 </div>
                //             </td>
                //         </tr>';
                // }
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
            </tr>
            ';
        }

        // end of table
        $output .= '
            </table>
            ';

        // print result
        echo $output;
    }

    // admin search for processed permohonan
    public function a_p_search()
    {
        $output = '';
        $query = '';

        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Permohonan_model->ap_permohonan($query);
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
                                        <p>' . $row->kategori . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p class="alert-info p-2 rounded">' . $row->status . '</p>
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
            </tr>
            ';
        }

        // end of table
        $output .= '
            </table>
            ';

        // print result
        echo $output;
    }

    public function verifiedpermohonan()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Permohonan_model->verifiedpermohonan($query);
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
            </tr>
            ';
        }

        // end of table
        $output .= '
            </table>
            ';

        // print result
        echo $output;
    }

    // admin search for scored permohonan
    public function p_s_search()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Permohonan_model->ps_permohonan($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIK Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Kategori</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Detail</th>
                            <th></th>
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
                                        <p>' . $row->nik_pemohon . '</p>
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
                                        <p>' . $row->created_at . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a href="' . base_url('jadwal/view/' . $row->id_permohonan) . '" class="btn btn-info">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <a href="' . base_url('jadwal/create/' . $row->id_permohonan) . '" class="btn btn-info">
                                            Lihat Detail
                                        </a>
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
            </tr>
            ';
        }

        // end of table
        $output .= '
            </table>
            ';

        // print result
        echo $output;
    }

    public function aks_newpermohonansearch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Permohonan_model->aks_newpermohonansearch($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon</th>
                            <th>Nama Usaha</th>
                            <th>Kategori</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Detail</th>
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
                                        <p>' . $row->kategori . '</p>
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
            </tr>
            ';
        }

        // end of table
        $output .= '
            </table>
            ';

        // print result
        echo $output;
    }

    public function tolak($id_permohonan)
    {
        $username=$_SESSION['username'];
        $d = $this->Admin_model->ambilnip($username);
        foreach($d as $n){
            $nip = $n->nip;
        echo print_r($nip);
        }
        $permohonan = $this->Permohonan_model->view($id_permohonan);

        if ($permohonan) {
            foreach ($permohonan as $data) {
                $query = $this->Permohonan_model->tolak(
                    $data['id_permohonan'],
                    $data['created_by'],
                    $nip
                );
            }
        }
        redirect('permohonan');
    }

    public function setujui()
    {
        $this->Permohonan_model->setujui();
        redirect('cjadwal');
    }

    // get visitasi personel by puskesmas id
    public function fetchvisitasi()
    {
        $output = '';
        $query = '';
        if ($this->input->post('id_puskesmas')) {
            $query = $this->input->post('id_puskesmas');
        }

        $result = $this->Permohonan_model->fetchvisitasi($query);
        var_dump($result);
        if ($result) {
            foreach ($result as $data) {
                $output .= '
                    <output value= ' . $data->nip . '>' . $data->nama . ' < / output >';
            }
        }
        echo $output;
    }

    // download certification file requirements
    public function download()
    {
        $name = "BerkasLengkap.zip";
        $data = file_get_contents('assets/file/BerkasLengkap/BerkasLengkap.zip');
        force_download($name, $data);
    }
}
