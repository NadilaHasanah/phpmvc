<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash_jurusan(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahDataJurusan" data-toggle="modal" data-target="#formModal">
          Tambah Data Jurusan
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/jurusan/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari data jurusan..." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar Jurusan</h3>
          <ul class="list-group">
            <?php foreach( $data['jurusan'] as $jurusan ) : ?>
              <li class="list-group-item">
                  <?= $jurusan['nama']; ?>
                  <a href="<?= BASEURL; ?>/jurusan/hapus/<?= $jurusan['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/jurusan/detail/<?= $jurusan['id']; ?>" class="badge badge-primary float-right ml-1">detail</a>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModalJurusan" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalJurusanJurusan">Tambah Data Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/jurusan/tambah" method="post">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
            </div>     
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

$('.tombolTambahDataJurusan').on('click', function() {
    $('#judulModalJurusan').html('Tambah Data Siswa');
    $(".modal-footer button[type=submit]").html("Tambah Data");  
})

});
</script>