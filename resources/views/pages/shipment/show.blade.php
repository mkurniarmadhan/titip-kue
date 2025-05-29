<x-appLayout>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Info Penitipan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Invoice</div>
                </div>
            </div>

            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">Kode Penitipan {{ $shipment->kode }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Outlet:</strong><br>
                                            {{ $shipment->outlet->name }}<br>
                                            {{ $shipment->outlet->address }}<br>
                                            <strong>Status Titipan :</strong><br>
                                            {{ $shipment->status }}<br>

                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Pengirim</strong><br>
                                            Nama Pengiriman<br>
                                            <strong>Tanggal di kiirm</strong><br>
                                            tanggal<br>

                                        </address>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Item </div>
                                <p class="section-lead">All items  </p>
                                <div class="table-responsive">
                                    <table class="table-striped table-hover table-md table">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-right">Totals</th>
                                        </tr>

                                        @foreach ($shipment->items as $item)

                                            <tr>
                                                <td>1</td>
                                                <td>{{$item->product->name}}</td>
                                                <td class="text-center">{{$item->product->price}}</td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-right">{{$item->product->price * $item->quantity}}</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <td>
                                                <div class="invoice-detail-name">Subtotal</div>
                                            </td>
                                            <td>
                                                <div class="invoice-detail-value">{{$subTotal}}</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                            <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i>
                                Buat Laporan Penjualan</button>
                            {{-- <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i>
                                Ba</button> --}}
                        </div>
                        <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Cetak</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-appLayout>
