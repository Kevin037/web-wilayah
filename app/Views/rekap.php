<?= $this->extend('template');?>

<?= $this->section('isi');?>


<section style="margin:4% 2% 0 2%">
<div class="container-fluid">
  
      <br><br>
<table class="table">
  <thead>
  
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Provinsi</th>
      <th scope="col">Jumlah penduduk</th>
    </tr>
  </thead>
  <tbody>
  <?php $no=1;?>
  <?php foreach($k as $kk) : ?>
    <tr>
      <td scope="row"><?php echo $no?></td>
      <td><?php echo $kk["nama_provinsi"]?></td>
      <td><?php echo $kk["total"]?></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah data kabupaten</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kabupaten/tambah" method="POST">
            <?= csrf_field(); ?>
            <select class="form-select" name="provinsi_id" aria-label="Default select example">
            <option selected>-- Pilih provinsi --</option>
            <?php foreach($p as $pp) : ?>
            <option value="<?php echo $pp["id"]?>"><?php echo $pp["nama_provinsi"]?></option>
          <?php endforeach;  ?>
          </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama kabupaten</label>
                <input type="text" name="nama_kabupaten" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">jumlah penduduk</label>
                <input type="number" name="jumlah_penduduk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
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