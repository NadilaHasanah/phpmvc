<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Kelas
        </button>
      </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
        <h3>Kelas</h3>
          <ul class="list-group">
            <?php foreach( $data['kelas'] as $kelas ) : ?>
              <li class="list-group-item">
                  <?= $kelas['nama']; ?>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="judulModalK">Tambah Kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
            <form action="<?= BASEURL; ?>/kelas/tambah" method="post">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="nama">Kelas</label>
                    <input type="text" class="form-control" id="nama" name="nama">
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

$('.tombolTambahData').on('click', function() {
    $('#judulModalK').html('Tambah Data Kelas');
    $(".modal-footer button[type=submit]").html("Tambah Data");  
})

})
</script>