<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Settings</h3>
                <p class="text-subtitle text-muted">Atur semua pengaturan dan konfigurasi Anda</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="email-tab" data-bs-toggle="tab" href="#email" role="tab"
                                    aria-controls="email" aria-selected="false">Email</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form class="form form-horizontal mt-5" id="profileForm" action="<?= base_url('settings/update_user/' . $user->id) ?>" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="h5 mb-4">Form Edit Profile</h5>
                                            </div>
                                            <?php echo form_open('settings/update_user', ['method' => 'POST']); ?>
                                            <input type="hidden" name="id" value="<?php echo set_value('id', $user->id); ?>" />

                                            <div class="col-md-3">
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username', $user->username); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="nama">Nama</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama', $user->nama); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="password1">Password Baru</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password Baru">
                                            </div>

                                            <div class="col-md-3">
                                                <label for="password2">Konfirmasi Password</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1 px-5">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                <form class="form form-horizontal mt-5" id="emailForm" action="<?= base_url('settings/update_email/' . $email->id) ?>" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="h5 mb-4">Form Edit Email</h5>
                                            </div>
                                            <input type="hidden" name="id" value="<?= $email->id; ?>" />

                                            <div class="col-md-3">
                                                <label for="host">Host</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="text" class="form-control" id="host" name="host" value="<?= set_value('host', $email->host); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email', $email->email); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password', $email->password); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="nama_pengirim">Nama Pengirim</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?= set_value('nama_pengirim', $email->nama_pengirim); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="subject">Subject</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject', $email->subject); ?>" required>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="Body">Body Email</label>
                                            </div>
                                            <div class="col-md-9 form-group">
                                                <textarea id="Body" class="form-control" name="body" rows="10" placeholder="Body Email"><?= set_value('body', $email->body); ?></textarea>
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
        </div>
    </section>
</div>

<script>
    $('#profileForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Your data has been saved.',
                    icon: 'success',
                    confirmButtonText: 'Okay'
                });
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong.',
                    icon: 'error',
                    confirmButtonText: 'Okay'
                });
            }
        });
    });

    $('#emailForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json', // Specify the data type expected from the server
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Okay'
                    }).then(() => {
                        // Optionally redirect to another page or refresh
                        window.location.href = '<?= base_url('settings'); ?>';
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Okay'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong.',
                    icon: 'error',
                    confirmButtonText: 'Okay'
                });
            }
        });
    });
</script>