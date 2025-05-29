<x-appLayout>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>outlet </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">outlet</a></div>
                    <div class="breadcrumb-item">daftar outlet</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">outlet</h2>
                <p class="section-lead">

                    Daftar outlet
                </p>

                <div class="row">


                    <div class="col-12">
                        <div class="card">


                            <div class="card-body">

                                <form action="{{ route('kurir.update', $profile->user_id) }}" method="post">

                                    @csrf

                                    @method('PUT')

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="full_name" class="form-control"
                                                value="{{ old('full_name', $profile->full_name) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="place_of_birth" class="form-control"
                                                value="{{ old('place_of_birth', $profile->place_of_birth) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ old('date_of_birth', $profile->date_of_birth) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="gender" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="male" {{ old('gender', $profile->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="female" {{ old('gender', $profile->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                                <option value="other" {{ old('gender', $profile->gender) == 'other' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telepon</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="phone_number" class="form-control"
                                                value="{{ old('phone_number', $profile->phone_number) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="address" class="form-control"
                                                value="{{ old('address', $profile->address) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="city" class="form-control"
                                                value="{{ old('city', $profile->city) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="province" class="form-control"
                                                value="{{ old('province', $profile->province) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="postal_code" class="form-control"
                                                value="{{ old('postal_code', $profile->postal_code) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK / No. KTP</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="national_id_number" class="form-control"
                                                value="{{ old('national_id_number', $profile->national_id_number) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Pernikahan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="marital_status" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="single" {{ old('marital_status', $profile->marital_status) == 'single' ? 'selected' : '' }}>Belum Menikah</option>
                                                <option value="married" {{ old('marital_status', $profile->marital_status) == 'married' ? 'selected' : '' }}>Menikah</option>
                                                <option value="divorced" {{ old('marital_status', $profile->marital_status) == 'divorced' ? 'selected' : '' }}>Cerai</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="occupation" class="form-control"
                                                value="{{ old('occupation', $profile->occupation) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan Terakhir</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="education" class="form-control"
                                                value="{{ old('education', $profile->education) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12 col-md-7 offset-md-3">
                                            <button type="submit" class="btn btn-primary">
                                              Update
                                            </button>
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
