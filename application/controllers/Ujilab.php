<?php
class Ujilab extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header_admin');
        $this->load->view('templates/topmenu_admin');
        $this->load->view('templates/sidebar_admin');
        $this->load->view('admin/ujilab/index');
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
        $data = $this->Ujilab_model->search($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon </th>
                            <th>Usaha</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi </th>
                            <th>Hasil Uji Kelaikan</th>
                            <th>Hasil Uji Lab</th>
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
                                        <p>' . $row->tim_visit . '</p>
                                    </div>
                                </div>
                            </td>
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->tglvisit . '</p>
                                    </div>
                                </div>
                            </td>';
                if ($row->kategori == 'dam') { } else if ($row->kategori == 'hotel') {
                    $output .= '<td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                        </div>
                                    </div>
                                </td>';
                } else if ($row->kategori == 'jasaboga') {
                    $output .= '<td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                        </div>
                                    </div>
                                </td>';
                } else if ($row->kategori == 'tpm') {
                    $output .= '<td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                        </div>
                                    </div>
                                </td>
                                <td ng-repeat="col in columns" class="ng-scope">
                                    <div ng-switch="" on="col.renderType">
                                        <div ng-switch-when="primaryLink" class="ng-scope">
                                            <a href="" class="btn btn-primary p-3">Cek Berkas</a>
                                        </div>
                                    </div>
                                </td>';
                }
                $output .= '</tr>
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
                            <p class="text-center p-3 text-danger">Data tidak ditemukan</p>
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

    public function akssearch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Ujilab_model->aks_search($query);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon </th>
                            <th>Usaha</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi </th>
                            <th>status</th>
                            <th>Hasil Uji Kelaikan</th>
                            <th>Hasil Uji Lab</th>
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
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->status . '</p>
                                    </div>
                                </div>
                            </td>';
                if ($row->kategori == 'dam') {
                    if($row->status =="validasi" || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    } else if ($row->kategori == 'hotel') {
                        if($row->status =="validasi" || $row->status =="selesai"){
                            $output .= '<td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                 <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>';
        
                        }
                        else if($row->status !="validasi" &&  $row->status !="selesai"){
                            $output .= '<td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                    <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>';
        
                        }
                   
                } else if ($row->kategori == 'jasaboga') {
                    if($row->status =="validasi" || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi" && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                } else if ($row->kategori == 'tpm') {
                    if($row->status =="validasi" || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi" && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
    
                }
                $output .= '</tr>';
            }
        } else {
            // 404 data not found
            $output .= '
            <tr>
                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                    <div ng-switch="" on="col.renderType">
                        <div ng-switch-when="primaryLink" class="ng-scope">
                            <br>
                            <p class="text-center p-3 text-danger">Data tidak ditemukan</p>
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

    public function avisitsearch()
    {
        
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $username= $_SESSION['username'];
        $d = $this->Admin_model->ambilnip($username);
        foreach($d as $dt)
        $nip = $dt->nip;
        // get data pengguna
        $data = $this->Ujilab_model->avisitsearch($query , $nip);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon </th>
                            <th>Usaha</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi </th>
                            <th>status</th>
                            <th>Hasil Uji Kelaikan</th>
                            <th>Hasil Uji Lab</th>
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
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->status . '</p>
                                    </div>
                                </div>
                            </td>';
                if ($row->kategori == 'dam') {
                    if($row->status =="validasi" ||  $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    } else if ($row->kategori == 'hotel') {
                        if($row->status =="validasi" || $row->status =="selesai"){
                            $output .= '<td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                 <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>';
        
                        }
                        else if($row->status !="validasi"  && $row->status !="selesai"){
                            $output .= '<td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                    <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>';
        
                        }
                   
                } else if ($row->kategori == 'jasaboga') {
                    if($row->status =="validasi" || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                } else if ($row->kategori == 'tpm') {
                    if($row->status =="validasi"  || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
    
                }
                $output .= '</tr>';
            }
        } else {
            // 404 data not found
            $output .= '
            <tr>
                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                    <div ng-switch="" on="col.renderType">
                        <div ng-switch-when="primaryLink" class="ng-scope">
                            <br>
                            <p class="text-center p-3 text-danger">Data tidak ditemukan</p>
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
public function search_uji()
    {
        $username = $_SESSION['username'];
        $n=$this->User_model->ambil_nik_pemohon($username);
        foreach($n as $d)
        $nik = $d->nik_pengguna;
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        // get data pengguna
        $data = $this->Ujilab_model->pengguna_search($query,$nik);
        // table header
        $output .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pemohon </th>
                            <th>Usaha</th>
                            <th>Tim Visitasi</th>
                            <th>Tanggal Visitasi </th>
                            <th>status</th>
                            <th>Hasil Uji Kelaikan</th>
                            <th>Hasil Uji Lab</th>
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
                            <td ng-repeat="col in columns" class="ng-scope">
                                <div ng-switch="" on="col.renderType">
                                    <div ng-switch-when="primaryLink" class="ng-scope">
                                        <p>' . $row->status . '</p>
                                    </div>
                                </div>
                            </td>';
                if ($row->kategori == 'dam') {
                    if($row->status =="validasi" || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/dam/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    } else if ($row->kategori == 'hotel') {
                        if($row->status =="validasi" || $row->status =="selesai"){
                            $output .= '<td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                 <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>';
        
                        }
                        else if($row->status !="validasi"  && $row->status !="selesai"){
                            $output .= '<td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                    <a href="assets/file/berkas_visitasi/hotel/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>
                        <td ng-repeat="col in columns" class="ng-scope">
                            <div ng-switch="" on="col.renderType">
                                <div ng-switch-when="primaryLink" class="ng-scope">
                                <a href="assets/file/berkas_visitasi/hotel/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                                </div>
                            </div>
                        </td>';
        
                        }
                   
                } else if ($row->kategori == 'jasaboga') {
                    if($row->status =="validasi" || $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/jasaboga/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                } else if ($row->kategori == 'tpm') {
                    if($row->status =="validasi"|| $row->status =="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_lab/' . $row->ujilab . '" class="btn btn-primary p-2" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
                    else if($row->status !="validasi"  && $row->status !="selesai"){
                        $output .= '<td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_kelaikan/' . $row->tinjauan . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>
                    <td ng-repeat="col in columns" class="ng-scope">
                        <div ng-switch="" on="col.renderType">
                            <div ng-switch-when="primaryLink" class="ng-scope">
                            <a href="assets/file/berkas_visitasi/tpm/uji_lab/' . $row->ujilab . '" class="btn btn-secondary p-2 disabled" target="_blank">Cek Berkas</a>
                            </div>
                        </div>
                    </td>';
    
                    }
    
                }
                $output .= '</tr>';
            }
        } else {
            // 404 data not found
            $output .= '
            <tr>
                <td ng-repeat="col in columns" class="ng-scope" colspan="6">
                    <div ng-switch="" on="col.renderType">
                        <div ng-switch-when="primaryLink" class="ng-scope">
                            <br>
                            <p class="text-center p-3 text-danger">Data tidak ditemukan</p>
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
}