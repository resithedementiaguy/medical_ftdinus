<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Magnetik</h3>
                <p class="text-subtitle text-muted">Silahkan edit data magnetik di bawah ini</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Magnetik</li>
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
                        <form action="" id="editMagnetikForm" action="<?= base_url('pasien/update_magnetik')?>" method="POST">
                            <div class="form-body">
                                <div class="row">
                                    
                                    <!-- Fields untuk Magnetik -->
                                    <div id="magnetikFieldsDetail">
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="button" id="magnetikEditLeftBtn" class="btn btn-light-primary me-1 mb-1 px-5">Left Hand</button>
                                            <button type="button" id="magnetikEditRightBtn" class="btn btn-light-primary me-1 mb-1 px-5">Right Hand</button>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $magnetik['id']?>">
                                        <div>
                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Jantung</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag1" class="form-control" id="edit_jtg_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag2" class="form-control" id="edit_jtg_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag3" class="form-control" id="edit_jtg_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag4" class="form-control" id="edit_jtg_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag5" class="form-control" id="edit_jtg_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag6" class="form-control" id="edit_jtg_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag7" class="form-control" id="edit_jtg_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag8" class="form-control" id="edit_jtg_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag9" class="form-control" id="edit_jtg_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="jtg_mag10" class="form-control" id="edit_jtg_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                        </div>

                                        <div>
                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Sistem Saraf</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag1" class="form-control" id="edit_srf_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag2" class="form-control" id="edit_srf_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag3" class="form-control" id="edit_srf_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag4" class="form-control" id="edit_srf_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag5" class="form-control" id="edit_srf_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag6" class="form-control" id="edit_srf_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag7" class="form-control" id="edit_srf_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag8" class="form-control" id="edit_srf_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag9" class="form-control" id="edit_srf_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="srf_mag10" class="form-control" id="edit_srf_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                        </div>

                                        <div>
                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Darah dan Metabolisme</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag1" class="form-control" id="edit_drh_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag2" class="form-control" id="edit_drh_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag3" class="form-control" id="edit_drh_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag4" class="form-control" id="edit_drh_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag5" class="form-control" id="edit_drh_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag6" class="form-control" id="edit_drh_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag7" class="form-control" id="edit_drh_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag8" class="form-control" id="edit_drh_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag9" class="form-control" id="edit_drh_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="drh_mag10" class="form-control" id="edit_drh_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                        </div>

                                        <div>
                                            <h6 class="h6 mt-4 mb-4">Magnetik Analisis Molekuler dan Sel</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag1" class="form-control" id="edit_sel_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag2" class="form-control" id="edit_sel_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag3" class="form-control" id="edit_sel_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag4" class="form-control" id="edit_sel_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag5" class="form-control" id="edit_sel_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag6" class="form-control" id="edit_sel_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag7" class="form-control" id="edit_sel_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag8" class="form-control" id="edit_sel_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag9" class="form-control" id="edit_sel_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="sel_mag10" class="form-control" id="edit_sel_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                        </div>

                                        <div>
                                            <h6 class="h6 mt-4 mb-4">Magnetik Frekuensi Tinggi</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="mag1"><strong>Data Magnetik 1</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag1" class="form-control" id="edit_tgi_mag1" rows="5" placeholder="Data Magnetik 1"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag2"><strong>Data Magnetik 2</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag2" class="form-control" id="edit_tgi_mag2" rows="5" placeholder="Data Magnetik 2" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag3"><strong>Data Magnetik 3</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag3" class="form-control" id="edit_tgi_mag3" rows="5" placeholder="Data Magnetik 3" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag4"><strong>Data Magnetik 4</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag4" class="form-control" id="edit_tgi_mag4" rows="5" placeholder="Data Magnetik 4" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag5"><strong>Data Magnetik 5</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag5" class="form-control" id="edit_tgi_mag5" rows="5" placeholder="Data Magnetik 5" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag6"><strong>Data Magnetik 6</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag6" class="form-control" id="edit_tgi_mag6" rows="5" placeholder="Data Magnetik 6" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag7"><strong>Data Magnetik 7</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag7" class="form-control" id="edit_tgi_mag7" rows="5" placeholder="Data Magnetik 7" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag8"><strong>Data Magnetik 8</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag8" class="form-control" id="edit_tgi_mag8" rows="5" placeholder="Data Magnetik 8" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag9"><strong>Data Magnetik 9</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag9" class="form-control" id="edit_tgi_mag9" rows="5" placeholder="Data Magnetik 9" readonly></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="mag10"><strong>Data Magnetik 10</strong></label>
                                        </div>
                                        <div class="col mb-3">
                                            <textarea name="tgi_mag10" class="form-control" id="edit_tgi_mag10" rows="5" placeholder="Data Magnetik 10" readonly></textarea>
                                        </div>
                                    </div>                                                                    
                                </div>
                            </div>
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
        $('#magnetikEditLeftBtn').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_magnetik_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit_jtg_mag1').val(data.jtg_mag1);
                        $('#edit_jtg_mag2').val(data.jtg_mag2);
                        $('#edit_jtg_mag3').val(data.jtg_mag3);
                        $('#edit_jtg_mag4').val(data.jtg_mag4);
                        $('#edit_jtg_mag5').val(data.jtg_mag5);

                        $('#edit_srf_mag1').val(data.srf_mag1);
                        $('#edit_srf_mag2').val(data.srf_mag2);
                        $('#edit_srf_mag3').val(data.srf_mag3);
                        $('#edit_srf_mag4').val(data.srf_mag4);
                        $('#edit_srf_mag5').val(data.srf_mag5);

                        $('#edit_drh_mag1').val(data.drh_mag1);
                        $('#edit_drh_mag2').val(data.drh_mag2);
                        $('#edit_drh_mag3').val(data.drh_mag3);
                        $('#edit_drh_mag4').val(data.drh_mag4);
                        $('#edit_drh_mag5').val(data.drh_mag5);

                        $('#edit_sel_mag1').val(data.sel_mag1);
                        $('#edit_sel_mag2').val(data.sel_mag2);
                        $('#edit_sel_mag3').val(data.sel_mag3);
                        $('#edit_sel_mag4').val(data.sel_mag4);
                        $('#edit_sel_mag5').val(data.sel_mag5);

                        $('#edit_tgi_mag1').val(data.tgi_mag1);
                        $('#edit_tgi_mag2').val(data.tgi_mag2);
                        $('#edit_tgi_mag3').val(data.tgi_mag3);
                        $('#edit_tgi_mag4').val(data.tgi_mag4);
                        $('#edit_tgi_mag5').val(data.tgi_mag5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#magnetikEditRightBtn').on('click', function(){
            var id = 1;  // Ambil ID dari hidden input
            $.ajax({
                url: '<?= base_url('pasien/get_magnetik_data/') ?>' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if(data) {
                        $('#edit_jtg_mag6').val(data.jtg_mag1);
                        $('#edit_jtg_mag7').val(data.jtg_mag2);
                        $('#edit_jtg_mag8').val(data.jtg_mag3);
                        $('#edit_jtg_mag9').val(data.jtg_mag4);
                        $('#edit_jtg_mag10').val(data.jtg_mag5);

                        $('#edit_srf_mag6').val(data.srf_mag1);
                        $('#edit_srf_mag7').val(data.srf_mag2);
                        $('#edit_srf_mag8').val(data.srf_mag3);
                        $('#edit_srf_mag9').val(data.srf_mag4);
                        $('#edit_srf_mag10').val(data.srf_mag5);

                        $('#edit_drh_mag6').val(data.drh_mag1);
                        $('#edit_drh_mag7').val(data.drh_mag2);
                        $('#edit_drh_mag8').val(data.drh_mag3);
                        $('#edit_drh_mag9').val(data.drh_mag4);
                        $('#edit_drh_mag10').val(data.drh_mag5);

                        $('#edit_sel_mag6').val(data.sel_mag1);
                        $('#edit_sel_mag7').val(data.sel_mag2);
                        $('#edit_sel_mag8').val(data.sel_mag3);
                        $('#edit_sel_mag9').val(data.sel_mag4);
                        $('#edit_sel_mag10').val(data.sel_mag5);

                        $('#edit_tgi_mag6').val(data.tgi_mag1);
                        $('#edit_tgi_mag7').val(data.tgi_mag2);
                        $('#edit_tgi_mag8').val(data.tgi_mag3);
                        $('#edit_tgi_mag9').val(data.tgi_mag4);
                        $('#edit_tgi_mag10').val(data.tgi_mag5);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
</script>