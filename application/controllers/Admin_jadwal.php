<?php
class Admin_jadwal extends CI_Controller {
    public function index()
    {
        $data['jadwal']  = $this->Admin_modeljadwal->tampil_data()->result();
        $this->load->view('jadwal/_partials/header');
        $this->load->view('jadwal/_partials/sidebar');
        $this->load->view('jadwal/jadwal', $data);
        $this->load->view('jadwal/_partials/footer');
    }

    public function tambah_aksi()
    {
        $nama       = $this->input->post('nama');
        $nim        = $this->input->post('nim');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $jurusan    = $this->input->post('jurusan');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $no_telp    = $this->input->post('no_telp');

        $data = array(
            'nama'      => $nama,
            'nim'       => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan'   => $jurusan,
            'alamat'    => $alamat,
            'email'     => $email,
            'no_telp'   => $no_telp
        );

        $this->Admin_modeljadwal->input_data($data, 'tb_jadwal');
        redirect('admin_jadwal/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->Admin_modeljadwal->hapus_data($where, 'tb_jadwal');
        redirect('admin_jadwal/index');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['jadwal']  = $this->Admin_modeljadwal->edit_data($where, 'tb_jadwal')->result();

        $this->load->view('jadwal/_partials/header');
        $this->load->view('jadwal/_partials/sidebar');
        $this->load->view('jadwal/edit', $data);
        $this->load->view('jadwal/_partials/footer');
    }

    public function update()
    {
        $id         = $this->input->post('id');
        $nama       = $this->input->post('nama');
        $nim        = $this->input->post('nim');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $jurusan    = $this->input->post('jurusan');
        $alamat     = $this->input->post('alamat');
        $email      = $this->input->post('email');
        $no_telp    = $this->input->post('no_telp');

        $data = array(
            'nama'      => $nama,
            'nim'       => $nim,
            'tgl_lahir' => $tgl_lahir,
            'jurusan'   => $jurusan,
            'alamat'    => $alamat,
            'email'     => $email,
            'no_telp'   => $no_telp
        );

        $where = array(
            'id' => $id
        );

        $this->Admin_modeljadwal->update_data($where, $data, 'tb_jadwal');
        redirect('admin_jadwal/index');
    }

    public function detail($id)
    {
        $this->load->model('Admin_modeljadwal');
        $detail = $this->Admin_modeljadwal->detail_data($id);
        $data['detail'] = $detail;

        $this->load->view('jadwal/_partials/header');
        $this->load->view('jadwal/_partials/sidebar');
        $this->load->view('jadwal/detail', $data);
        $this->load->view('jadwal/_partials/footer');
    }

    public function print()
    {
        $data['jadwal']  = $this->Admin_modeljadwal->tampil_data('tb_jadwal')->result();
        $this->load->view('jadwal/print', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['jadwal'] = $this->Admin_modeljadwal->tampil_data('tb_jadwal')->result();

        $this->load->view('laporan_pdf', $data);

        $paper_size     = 'A4';
        $orientation    = 'landscape';
        $html           = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_jadwal.pdf", array('attachment'=>0));

        //ganti __upload() pada dompdf
        //hmtl, head, body dibuat sejajat (</head><body)
    }

    // public function excel()
    // {
    //     $data['jadwal'] = $this->Admin_modeljadwal->tampil_data('tb_jadwal')->result();

    //     require(APPPATH. 'PHPExcel/Classes/PHPExcel.php');
    //     require(APPPATH. 'PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

    //     $object = new PHPExcel();

    //     $object->getProperties()->setCreator("User");
    //     $object->getProperties()->setLastModifyBy("User");
    //     $object->getProperties()->setTitle("Daftar jadwal");

    //     $object->setActiveSheetIndex([0]);

    //     $object->getActiveSheet()->setCellValue('A1', 'NO');
    //     $object->getActiveSheet()->setCellValue('B1', 'NAMA jadwal');
    //     $object->getActiveSheet()->setCellValue('C1', 'NIM');
    //     $object->getActiveSheet()->setCellValue('D1', 'TANGGAL LAHIR');
    //     $object->getActiveSheet()->setCellValue('E1', 'JURUSAN');
    //     $object->getActiveSheet()->setCellValue('F1', 'ALAMAT');
    //     $object->getActiveSheet()->setCellValue('G1', 'EMAIL');
    //     $object->getActiveSheet()->setCellValue('H1', 'NOMOR TELEPON');

    //     $baris=2;
    //     $no =1;
    //     foreach ($data['jadwal'] as $mhs)
    //     {
    //         $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    //         $object->getActiveSheet()->setCellValue('B'.$baris, $mhs->nama);
    //         $object->getActiveSheet()->setCellValue('C'.$baris, $mhs->nim);
    //         $object->getActiveSheet()->setCellValue('D'.$baris, $mhs->tgl_lahir);
    //         $object->getActiveSheet()->setCellValue('E'.$baris, $mhs->jurusan);
    //         $object->getActiveSheet()->setCellValue('F'.$baris, $mhs->alamat);
    //         $object->getActiveSheet()->setCellValue('G'.$baris, $mhs->email);
    //         $object->getActiveSheet()->setCellValue('H'.$baris, $mhs->no_telp);

    //         $baris++;
    //     }
    //     $filename="Data_jadwal".'.xlsx';

    //     $object->getActiveSheet()->setTitle("Data jadwal");

    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename"'.$filename.'"');
    //     header('Cache-Control: max-age=0');

    //     $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    //     $writer->save('php://output');

    //     exit;
    // }

    public function search()
    {
        $keyword            = $this->input->post('keyword');
        $data['jadwal']  = $this->Admin_modeljadwal->get_keyword($keyword);

        $this->load->view('jadwal/_partials/header');
        $this->load->view('jadwal/_partials/sidebar');
        $this->load->view('jadwal/jadwal', $data);
        $this->load->view('jadwal/_partials/footer');
    }
}
?>