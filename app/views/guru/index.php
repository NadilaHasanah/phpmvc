<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash_guru(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Guru
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/guru/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari guru..." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Data Guru</h3>
            <ul class="list-group">
                <?php foreach ($data['guru'] as $guru) : ?>
                    <li class="list-group-item">
                        <?= $guru['nama']; ?>
                        <a href="<?= BASEURL; ?>/guru/hapus/<?= $guru['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">hapus</a>
                        <a href="<?= BASEURL; ?>/guru/ubah/<?= $guru['id']; ?>" class="badge badge-warning float-right tampilModalUbahG ml-1" data-toggle="modal" data-target="#formModal" data-id="<?= $guru['id']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/guru/detail/<?= $guru['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalG" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalG">Tambah Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/guru/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="mapel">Mapel</label>
                        <input type="text" class="form-control" id="mapel" name="mapel">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {

        $('.tombolTambahData').on('click', function() {
            $('#judulModalG').html('Tambah Data Guru');
            $(".modal-footer button[type=submit]").html("Tambah Data");
        })

        $('.tampilModalUbahG').on('click', function() {
            $('#judulModalG').html('Ubah Data Guru');
            $('.modal-footer button[type=submit]').html("Ubah Data");
            $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/guru/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: 'http://localhost/phpmvc/public/guru/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $("#nama").val(data.nama);
                    $("#mapel").val(data.mapel);
                    $("#id").val(data.id);

                },
            });
        });

    });
</script>