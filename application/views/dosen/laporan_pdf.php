<!DOCTYPE html>
<html><head></head><body>
    <table>
        <tr>
            <th>NO</th>
            <th>NAMA MAHASISWA</th>
            <th>NIM</th>
            <th>TANGGAL LAHIR</th>
            <th>JURUSAN</th>
            <th>ALAMAT</th>
            <th>EMAIL</th>
            <th>NOMOR TELEPON</th>

            <?php
                $no= 1;
                foreach($dosen as $dsn) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $dsn->nama ?></td>
                <td><?php echo $dsn->nim ?></td>
                <td><?php echo $dsn->tgl_lahir ?></td>
                <td><?php echo $dsn->jurusan ?></td>
                <td><?php echo $dsn->alamat ?></td>
                <td><?php echo $dsn->email ?></td>
                <td><?php echo $dsn->no_telp ?></td>
            </tr>

            <?php endforeach; ?>
        </tr>
    </table>
</body></html>