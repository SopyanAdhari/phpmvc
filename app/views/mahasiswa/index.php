<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary mb-4 tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah data mahasiswa
            </button>   
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari mahasiswa..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" id="keyword" autocomplete="off">
                <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
            </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
       
            <h3>Daftar Mahasiswa</h3>
                <?php foreach($data['mhs'] as $mhs) : ?>
                    <div class="col-6">
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="d-inline"><?= $mhs['nama'] ?></p>
                                <div>
                                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id'] ?>"><span class="badge text-bg-danger text-white mx-1 p-2" onclick="return confirm('Yakin?')">Hapus</span></a>
                                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" data-bs-toggle="modal" data-bs-target="#formModal"><span class="badge text-bg-success text-white mx-1 p-2 tampilModalUbah" data-id="<?= $mhs['id'] ?>">Ubah</span></a>
                                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>"><span class="badge text-bg-info text-white mx-1 p-2">Detail</span></a>
                                </div>
                            </li>
                         </ul>
                     </div>
                <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="formModalLabel">Tambah data mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
        <input type="hidden" name="id" id="id">
            <div class="form-group mb-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group mb-4">
                <label for="nrp" class="form-label">NRP</label>
                <input type="number" class="form-control" id="nrp" name="nrp">
            </div>
            <div class="form-group mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group mb-4">
                <label for="jurusan">Jurusan</label>
                <select class="form-select mt-2" aria-label="Default select example" id="jurusan" name="jurusan">
                    <option value="Teknik Mesin" selected>Teknik mesin</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Industri">Teknik industri</option>
                    <option value="Teknik Pangan">Teknik pangan</option>
                    <option value="Teknik Planalogi">Teknik Planalogi</option>
                    <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                </select>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah data</button>
            </div>
    </form>
    </div>
  </div>
</div>