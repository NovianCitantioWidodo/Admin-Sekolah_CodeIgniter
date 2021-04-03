<div class="container-fluid">
    <div class="row">
        <h4>DETAIL DOSEN</h4>

        <table class="table">
            <tr>
                <th>Nama Lengkap</th>
                <td><?php echo $detail->nama ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?php echo $detail->nim ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $detail->tgl_lahir ?></td>
            </tr>
            <tr>
                <th>Jurusan</th>
                <td><?php echo $detail->jurusan ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $detail->alamat ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $detail->email ?></td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td><?php echo $detail->no_telp ?></td>
            </tr>
        </table>
        
        <a class="btn btn-primary" href="<?php echo site_url('admin_dosen') ?>">Kembali</a>
        <a class="btn btn-warning ml-2" href="<?php echo site_url('admin_dosen/edit/'.$detail->id) ?>">Edit</a>
        <a onclick="javascript: return confirm('Apakah anda ingin menghapusnya?')" class="btn btn-danger ml-2" href="<?php echo site_url('admin_dosen/hapus/'.$detail->id) ?>">Hapus</a>    
    </div>
</div>