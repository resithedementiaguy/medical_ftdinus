<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Edit Penduduk</h3>
                <p class="text-subtitle text-muted">Silahkan untuk edit form di bawah sesuai dengan KTP</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('pasien/detail/' . $penduduk['nik']) ?>">Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Penduduk</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger">
                                    <?= validation_errors() ?>
                                </div>
                            <?php endif; ?>
                            <form class="form form-horizontal" id="analisisForm" action="<?= base_url('penduduk/update/' . $penduduk['id']) ?>" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div>
                                            <h5 class="h5 mb-4">Informasi Penduduk</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nik">NIK</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nik" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" value="<?php echo htmlspecialchars($penduduk['nik'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo htmlspecialchars($penduduk['nama'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($penduduk['email'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="no_hp">Nomor HP</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="no_hp" class="form-control" name="no_hp" placeholder="Nomor HP" value="<?php echo htmlspecialchars($penduduk['no_hp'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo htmlspecialchars($penduduk['tempat_lahir'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?php echo htmlspecialchars($penduduk['tanggal_lahir'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input type="radio" id="jenis_kelamin_l" class="form-check-input" name="jenis_kelamin" value="L" <?php echo (isset($penduduk['jenis_kelamin']) && $penduduk['jenis_kelamin'] === 'L') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input type="radio" id="jenis_kelamin_p" class="form-check-input" name="jenis_kelamin" value="P" <?php echo (isset($penduduk['jenis_kelamin']) && $penduduk['jenis_kelamin'] === 'P') ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <h5 class="h5 mt-5 mb-4">Informasi Alamat</h5>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="alamat">Alamat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea id="alamat" class="form-control" name="alamat" rows="3" placeholder="Alamat Lengkap"><?php echo htmlspecialchars($penduduk['alamat'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rt">RT</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="rt" class="form-control" name="rt" placeholder="RT" value="<?php echo htmlspecialchars($penduduk['rt'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="rw">RW</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="rw" class="form-control" name="rw" placeholder="RW" value="<?php echo htmlspecialchars($penduduk['rw'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kelurahan">Kelurahan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kelurahan" class="form-control" name="kelurahan" placeholder="Kelurahan" value="<?php echo htmlspecialchars($penduduk['kelurahan'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kecamatan">Kecamatan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kecamatan" class="form-control" name="kecamatan" placeholder="Kecamatan" value="<?php echo htmlspecialchars($penduduk['kecamatan'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="kota">Kota</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kota" class="form-control" name="kota" placeholder="Kota" value="<?php echo htmlspecialchars($penduduk['kota'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-md-4">
                                            <label for="provinsi">Provinsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="provinsi" class="form-control" name="provinsi" placeholder="Provinsi" value="<?php echo htmlspecialchars($penduduk['provinsi'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>