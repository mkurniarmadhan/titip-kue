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
                                <div class="section-title">
                                    
                                    <a href="{{ route('outlet.create') }}" class="btn btn-primary mb-3">Tambah outlet</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-sm table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @forelse ($outlets as $outlet)
                                                <tr>
                                                    <th scope="row">{{ $outlet->id }}</th>
                                                    <td>{{ $outlet->name }}</td>
                                                    <td>{{ $outlet->address }}</td>
                                                    <td>
                                                      <a href="{{ route('outlet.edit', $outlet) }}"
                                                            class="btn btn-sm btn-success">LIhat</a>            </td>
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


    @push('scripts')
        

    <script>

        $("#btn-edit").on('click', function(){

            alert('oke')
        })
    </script>
    @endpush
</x-appLayout>
