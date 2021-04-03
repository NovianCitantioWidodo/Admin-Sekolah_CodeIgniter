<div class="container-fluid">
    <div class="content">
        <?php foreach($dosen as $dsn){ ?>
            <form action="<?php echo site_url('admin_dosen/update') ?>" method="post">
                <div class="form-group">
                    <label for="">Nama Dosen</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $dsn->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $dsn->nama ?>">
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?php echo $dsn->nim ?>">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dsn->tgl_lahir ?>">
                </div>
                <div class="form-group">
                    <label for="">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $dsn->jurusan ?>">
                </div>
                <a class="btn btn-primary" href="<?php echo site_url('admin_dosen/detail/'.$dsn->id) ?>">Kembali</a>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        <?php } ?>
    </div>
</div>