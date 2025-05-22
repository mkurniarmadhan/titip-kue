<x-appLayout>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">daftar produk</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Produk</h2>
                <p class="section-lead">

                    Daftar produk
                </p>

                <div class="row">


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('product.destroy', $product) }}" method="post">

                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger" type="submit">Hapus Produk</button>
                                </form>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('product.update', $product) }}" method="post">

                                    @csrf

                                    @method('PUT')

                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" value="{{ old('name') ?? $product->name }}"
                                                name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" value="{{ old('price') ?? $product->price }}"
                                                name="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary" type="submit">Ubah Produk</button>
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
