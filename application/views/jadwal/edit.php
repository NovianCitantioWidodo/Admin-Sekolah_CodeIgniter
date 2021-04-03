<div class="container-fluid">
    <div class="content">
        <?php foreach($jadwal as $jdw){ ?>
            <form action="<?php echo site_url('admin_jadwal/update') ?>" method="post">
                <div class="form-group">
                    <label for="">Nama Mahasiswa</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $jdw->id ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $jdw->nama ?>">
                </div>
                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?php echo $jdw->nim ?>">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $jdw->tgl_lahir ?>">
                </div>
                <div class="form-group">
                    <label for="">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $jdw->jurusan ?>">
                </div>
                <a class="btn btn-primary" href="<?php echo site_url('admin_jadwal/detail/'.$jdw->id) ?>">Kembali</a>
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        <?php } ?>
    </div>
</div>