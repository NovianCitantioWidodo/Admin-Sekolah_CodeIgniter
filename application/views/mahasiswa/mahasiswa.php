<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        
            <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa
            <small> Control Panel</small></h1>
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
    </div>

    <div class="row">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Mahasiswa</button>
        <a class="ml-1" href="<?php echo site_url('admin_mahasiswa/print') ?>"><button type="button" class="btn btn-danger mb-3"><i class="fa fa-print"></i> Cetak</button></a>
        
        <div class="btn-grup ml-1">
            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-download"></i>  Unduh</button>
            <div class="dropdown-menu bg-warning">
                <a class="dropdown-item bg-warning text-light" href="<?php echo site_url('admin_mahasiswa/pdf') ?>"><i class="fa fa-download"></i>  Unduh PDF</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item bg-warning text-light" href="<?php //echo site_url('admin_mahasiswa/excel') ?>"><i class="fa fa-download"></i>  Unduh Excel</a>
            </div>
        </div>
        
        <!-- Topbar Search -->
        <form method="post" action="<?php echo site_url('admin_mahasiswa/search') ?>" class="d-none d-sm-inline-block form-inline ml-auto mr-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control bg-light border-1 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button>
                </div>
            </div>
        </form>

        <table class="table">
            <tr>
                <th>NO</th>
                <th>NAMA MAHASISWA</th>
                <th>NIM</th>
                <th>TANGGAL LAHIR</th>
                <th>JURUSAN</th>
                <th>AKSI</th>
            </tr>

            <?php
            $no=1;
            foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $mhs->nama ?></td>
                <td><?php echo $mhs->nim ?></td>
                <td><?php echo $mhs->tgl_lahir ?></td>
                <td><?php echo $mhs->jurusan ?></td>
                <td><?php echo anchor('admin_mahasiswa/detail/'.$mhs->id, '<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i> Detail</div>') ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
