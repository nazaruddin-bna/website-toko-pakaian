
    <div class="container">

        <div class="card o-hidden col-lg-6 border-0 shadow-lg my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Halaman Registrasi</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url ('auth/register'); ?>">
                                <div class="form-group row">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap"
                                     name="nama_lengkap"   placeholder="Nama Lengkap" value="<?= set_value('nama_lengkap'); ?>">
                                   <?= form_error('nama_lengkap', '<small class="text-danger pl-4">', '</small>') ?>  
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap"
                                     name="email"   placeholder="Email" value="<?= set_value('email'); ?>">
                                     <?= form_error('email', '<small class="text-danger pl-4">', '</small>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger pl-4">', '</small>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi Password">
                                            
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Sudah punya Akun? Silahkan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    