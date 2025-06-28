<?php echo view('_partials/header') ?>
<?php echo view('_partials/sidebar') ?>

<div class="content-wrapper">
    <?php if (session()->getFlashdata()): ?>
    <?php foreach (session()->getFlashdata() as $key => $message): ?>
    <div class="alert alert-<?= esc($key); ?> alert-dismissible fade show" role="alert">
        <?= esc($message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    <h3 class="page-title text-primary fw-bold"> Data Komponen Komputer</h3>
                </div>
                <div class="col-md-6 text-end">
                    <form method="get" action="" class="d-flex justify-content-end">
                        <div class="input-group" style="max-width: 400px;">
                            <label class="input-group-text bg-primary text-white fw-bold" for="filter_lab">
                                <i class="fas fa-filter"></i> Filter Lab
                            </label>
                            <select name="filter_lab" id="filter_lab" class="form-select">
                                <option value="">-- Pilih Lab --</option>
                                <?php foreach ($labs as $lab): ?>
                                <option value="<?= $lab['id_lab']; ?>"
                                    <?= ($filter_lab == $lab['id_lab']) ? 'selected' : ''; ?>>
                                    <?= $lab['nama_lab']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered text-center">
                            <thead class="text-white" style="background: #007bff;">
                                <tr>
                                    <th>No</th>
                                    <th>Label Komputer</th>
                                    <th>Lab</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($komponen as $key => $row): ?>
                                <tr>
                                    <td><?= $key + 1; ?></td>
                                    <td><?= esc($row['label']); ?></td>
                                    <td><?= esc($row['nama_lab']); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="<?= base_url('komponen/show/'. $row['id_komponen']); ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-eye"></i> Detail
                                            </a>
                                            <a href="<?= base_url('komponen/edit/' . $row['id_komponen']); ?>"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="<?= base_url('komponen/delete/' . $row['id_komponen']); ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <i class="fa fa-trash-alt"></i> Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>