<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<!-- Table with stripped rows -->
<table class="table datatable mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($category)) : ?>
            <?php foreach ($category as $index => $kategori) : ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $kategori['nama'] ?></td>
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $kategori['id'] ?>">
                            Ubah
                        </button>
                        <a href="<?= base_url('kategori/delete/' . $kategori['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                            Hapus
                        </a>
                    </td>
                </tr>

                <!-- Edit Modal Begin -->
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal-<?= $kategori['id'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Data Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('kategori/edit/' . $kategori['id']) ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $kategori['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                                    <button type="submit" class="btn btn-primary">simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Modal End -->

            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<!-- End Table -->

<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('kategori') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Barang" required>
                    </div>
                </div> <!-- <- tutup modal-body yang sebelumnya hilang -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Modal End -->

<?= $this->endSection() ?>