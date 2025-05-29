<x-appLayout>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>kurir </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">kurir</a></div>
                    <div class="breadcrumb-item">daftar kurir</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">kurir</h2>
                <p class="section-lead">

                    Daftar kurir
                </p>

                <div class="row">


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>kurir baru</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('kurir.store') }}" method="post">

                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="full_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="place_of_birth" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" name="date_of_birth" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="gender" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="male">Laki-laki</option>
                                                <option value="female">Perempuan</option>
                                                <option value="other">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telepon</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="phone_number" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="province" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="postal_code" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK / No. KTP</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="national_id_number" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Pernikahan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="marital_status" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="single">Belum Menikah</option>
                                                <option value="married">Menikah</option>
                                                <option value="divorced">Cerai</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="occupation" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan Terakhir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="education" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12 col-md-7 offset-md-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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

</x-appLayout>
