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
                            <div class="card-body">
                                <div class="section-title">

                                    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Tambah
                                        Produk</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-sm table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-product">


                                            @forelse ($products as $product)
                                                <tr id="index_{{ $product->id }}">
                                                    <th scope="row">{{ $product->id }}</th>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>
                                                        <a href="{{ route('product.edit', $product) }}"
                                                            class="btn btn-sm btn-success">LIhat</a>
                                                 


                                                    </td>
                                                </tr>
                                            @empty <tr>

                                                    <td> Masih kosng</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>





    </div>


    @push('scripts')
     
    
    @endpush
</x-appLayout>
