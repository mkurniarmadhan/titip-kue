<x-appLayout>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penitipan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">penitipan</a></div>
                    <div class="breadcrumb-item">Penitipan baru</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Penitipan</h2>
                <p class="section-lead">lengkapi data .</p>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">


                                <div class="wizard">
                                    <!-- Step 1: Pilih Outlet -->
                                    <div class="step active" id="step-1">
                                    <div class="card-header">
                                <h4>1. PIlih Outlet</h4>
                            </div>
                                        <select id="outlet-select" style="width: 100%;"></select>
                                    </div>

                                    <!-- Step 2: Pilih Barang -->
                                    <div class="step" id="step-2">
                                         <div class="card-header">
                                <h4>2. PIlih Items</h4>
                            </div>
                                      
                                        <input type="search"
                                        class="form-control" id="item-search" placeholder="Cari barang..."
                                            style="width: 100%; margin-bottom: 10px;" />
                                        <table id="item-table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <div style="margin-top: 10px;">
                                            <button id="prev-page" class="btn btn-sm btn-secondary">«</button>
                                            <span id="page-info"></span>
                                            <button id="next-page" class="btn btn-sm btn-secondary">»</button>
                                        </div>
                                    </div>

                                    <!-- Step 3: Review -->
                                    <div class="step" id="step-3">
                                         <div class="card-header">
                                <h4>3. Konfirmasi Data </h4>
                            </div>
                                        <div id="review-outlet"></div>
                                        <table>
                                           
                                            
                                            <tbody id="review-items"></tbody>
                                        </table>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="step-buttons">
                                        <button id="prev-btn" class="btn btn-lg btn-primary" disabled>Kembali</button>
                                        <button id="next-btn"  class="btn btn-lg btn-primary">Lanjut</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .step {
                display: none;
            }

            .step.active {
                display: block;
            }

            .step-buttons {
                margin-top: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            th,
            td {
                padding: 8px;
                border: 1px solid #ccc;
                text-align: left;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                let currentStep = 1;
                const maxStep = 3;
                let currentPage = 1;
                const perPage = 5;

                const adminId = 1; // <- kamu bisa ganti pakai user login
                const shipmentDate = new Date().toISOString().slice(0, 10); // YYYY-MM-DD



                const selectedItems = [];
                let items = [];

                function showStep(step) {
                    $('.step').removeClass('active');
                    $('#step-' + step).addClass('active');
                    $('#prev-btn').prop('disabled', step === 1);
                    $('#next-btn').text(step === maxStep ? 'Kirim' : 'Lanjut');
                }

                $('#prev-btn').click(() => {
                    if (currentStep > 1) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });

                $('#next-btn').off('click').click(() => {

                    if (currentStep === 3) {
                        const payload = {
                            admin_id: adminId,
                            outlet_id: $('#outlet-select').val(),
                            shipment_date: shipmentDate,
                            items: getSelectedItems()
                        };

                        if (!payload.outlet_id || payload.items.length === 0) {
                            alert('Outlet dan minimal 1 item harus dipilih!');
                            return;
                        }

                        // Kirim via AJAX ke Laravel
                        $.ajax({
                            url: '/api/shipments',
                            type: 'POST',
                            data: JSON.stringify(payload),
                            contentType: 'application/json',
                              processData: false, 
                            success: function(res) {
                                alert('Pengiriman berhasil disimpan!');
                                console.log(res);
                                window.location.replace(res.url);

                            },
                            error: function(err) {
                                alert('Gagal menyimpan. Cek konsol.');
                                console.error(err.responseJSON);
                            }
                        });
                    } else {
                        if (currentStep === 2) renderReview();
                        currentStep++;
                        showStep(currentStep);
                    }
                });

                // Initialize outlet select2
                $('#outlet-select').select2({
                    placeholder: 'Pilih Outlet',
                    ajax: {
                        url: '/api/outlets',
                        processResults: function(data) {
                            return {
                                results: data.map(outlet => ({
                                    id: outlet.id,
                                    text: outlet.name
                                }))
                            };
                        }
                    }
                });

                // Cari barang
                function loadItems() {
                    $.get('/api/items', function(data) {
                        items = data.map(item => ({
                            ...item,
                            qty: 0
                        }));
                        renderTable();
                    });
                }

                function renderTable() {
                    const search = $('#item-search').val().toLowerCase();
                    const filtered = items.filter(i => i.name.toLowerCase().includes(search));
                    const totalPages = Math.ceil(filtered.length / perPage);
                    const paged = filtered.slice((currentPage - 1) * perPage, currentPage * perPage);

                    $('#item-table tbody').html(paged.map(item => `
      <tr>
        <td>${item.name}</td>
        <td>Rp${item.price}</td>
        <td>
          <input type="number" min="0" class="qty-input form-control" 
                 data-id="${item.id}" style="width: 90px;" value="${item.qty}" />
        </td>
      </tr>
    `).join(''));

                    $('#page-info').text(`Halaman ${currentPage} dari ${totalPages}`);
                    $('#prev-page').prop('disabled', currentPage === 1);
                    $('#next-page').prop('disabled', currentPage === totalPages || totalPages === 0);
                }

                $('#item-search').on('input', function() {
                    currentPage = 1;
                    renderTable();
                });
                $('#prev-page').click(() => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderTable();
                    }
                });
                $('#next-page').click(() => {
                    currentPage++;
                    renderTable();
                });
                // Input jumlah barang
                $(document).on('input', '.qty-input', function() {
                    const id = $(this).data('id');
                    const qty = parseInt($(this).val()) || 0;
                    const index = items.findIndex(i => i.id == id);
                    if (index > -1) {
                        items[index].qty = qty;
                    }
                });

                function getSelectedItems() {
                    return items.filter(i => i.qty > 0).map(i => ({
                        product_id: i.id,
                        quantity: i.qty
                    }));
                }

                function renderReview() {

                    const outletName = $('#outlet-select').select2('data')[0]?.text || 'Tidak dipilih';
                    $('#review-outlet').html(`<strong>Outlet:</strong> ${outletName}`);

                    const selectedItems = items
                        .filter(i => i.qty > 0)
                        .map(i => ({
                            name: i.name,
                            price: i.price,
                            qty: i.qty,
                            total: i.price * i.qty
                        }));

                    const rows = selectedItems.map(item => `
    <tr>
      <td>${item.name}</td>
      <td>${item.qty}</td>
      <td>Rp${item.price}</td>
      <td>Rp${item.total}</td>
    </tr>
  `).join('');

                    $('#review-items').html(`
    <tr><th>Nama</th><th>Jumlah</th><th>Harga</th><th>Total</th></tr>
    ${rows}
  `);
                }

                loadItems();

                showStep(currentStep);
            });
        </script>
    @endpush
</x-appLayout>
