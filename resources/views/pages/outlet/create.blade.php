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
                            <div class="card-header">
                                <h4>outlet baru</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('outlet.store') }}" method="post">

                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Create outlet</button>
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
