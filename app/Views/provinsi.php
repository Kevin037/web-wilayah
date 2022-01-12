<?= $this->extend('template');?>

<?= $this->section('isi');?>

<section style="margin:4% 2% 0 2%">
<div class="container-fluid">
<div class="row">
  <div class="col-md-3">
  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  + Tambah
</button>
  </div>
  <div class="col-md-4">
  <form action="/provinsi/cari" method="POST" class="d-flex">
        <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</div>
<br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Provinsi</th>
    </tr>
  </thead>
  <tbody>
      <?php $no=1;?>
  <?php foreach($p as $pp) : ?>
    <tr>
      <th scope="row"><?php echo $no?></th>
      <td><?php echo $pp["nama_provinsi"];?></td>
    </tr>
    <?php
    $no++;
    endforeach;  ?>
  </tbody>
</table>
</div>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data provinsi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/provinsi/tambah" method="POST">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama provinsi</label>
                <input type="text" name="nama_provinsi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endsection();?>