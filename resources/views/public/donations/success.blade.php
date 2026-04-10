@push('scripts')
    <script>
        function copyOrderId(text) {
            // Cara modern nyalin teks ke clipboard
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(function() {
                    tampilkanNotifCopy();
                }).catch(function(err) {
                    console.error('Gagal menyalin text: ', err);
                });
            } else {
                // Fallback untuk browser lama
                var textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    tampilkanNotifCopy();
                } catch (err) {
                    console.error('Gagal menyalin text', err);
                }
                document.body.removeChild(textArea);
            }
        }

        function tampilkanNotifCopy() {
            var tooltip = document.getElementById('copied-tooltip');
            var icon = document.getElementById('icon-copy');

            // Tampilkan tooltip "Tersalin!"
            tooltip.style.display = 'block';

            // Ubah icon jadi centang hijau biar ada feedback visual
            icon.classList.remove('bi-files', 'text-secondary');
            icon.classList.add('bi-check-circle-fill', 'text-success');

            // Sembunyikan lagi setelah 2 detik
            setTimeout(function() {
                tooltip.style.display = 'none';
                icon.classList.remove('bi-check-circle-fill', 'text-success');
                icon.classList.add('bi-files', 'text-secondary');
            }, 2000);
        }
    </script>
@endpush

<x-layouts.app>
    <x-slot:title>Instruksi Pembayaran</x-slot:title>

    <div class="container py-5" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                {{-- KARTU INVOICE --}}
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-warning text-dark text-center py-3">
                        <h5 class="m-0 fw-bold"><i class="bi bi-clock-history me-2"></i>Menunggu Pembayaran</h5>
                    </div>
                    <div class="card-body p-4">

                        {{-- 1. Total Tagihan --}}
                        <div class="text-center mb-4">
                            <small class="text-muted text-uppercase fw-bold ls-1">Total Wakaf</small>
                            <h2 class="display-4 fw-bold text-success my-1">
                                Rp{{ number_format($donation->amount, 0, ',', '.') }}
                            </h2>

                            {{-- AREA COPY ORDER ID --}}
                            <div class="mt-3">
                                {{--
                                PERUBAHAN CSS:
                                1. 'd-flex' (bukan inline-flex) biar lebar menyesuaikan container
                                2. 'flex-column' (default HP: numpuk ke bawah)
                                3. 'flex-md-row' (Laptop: sejajar ke samping)
                                4. 'rounded-4' (biar bagus saat numpuk, jangan rounded-pill)
                                --}}
                                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center py-2 px-3 px-md-4 rounded-4 border border-2 bg-light position-relative copy-badge text-center"
                                    style="cursor: pointer; border-style: dashed !important; transition: all 0.2s;"
                                    onclick="copyOrderId('{{ $donation->order_id }}')">

                                    {{-- Label: Ada margin bawah (mb-1) di HP, tapi hilang di Laptop --}}
                                    <span class="text-muted small fw-bold mb-1 mb-md-0 me-md-2 text-uppercase">
                                        Order ID:
                                    </span>

                                    {{-- ID: Font fs-5 (sedang) di HP, fs-4 (besar) di Laptop --}}
                                    {{-- text-break: Jaga-jaga kalau ID kepanjangan banget biar ga nabrak layar --}}
                                    <span
                                        class="fs-5 fs-md-4 fw-bold text-dark mb-1 mb-md-0 me-md-3 font-monospace text-break">
                                        {{ $donation->order_id }}
                                    </span>

                                    {{-- Icon Copy --}}
                                    <i class="bi bi-files fs-5 text-secondary" id="icon-copy"></i>

                                    {{-- Tooltip "Tersalin" --}}
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"
                                        id="copied-tooltip" style="display: none;">
                                        Tersalin!
                                    </span>
                                </div>

                                <div class="small text-muted mt-1 fst-italic" style="font-size: 0.8rem;">
                                    <i class="bi bi-hand-index-thumb"></i> Klik kode di atas untuk menyalin
                                </div>
                            </div>
                        </div>

                        {{-- 2. Area QRIS --}}
                        <div class="text-center border rounded p-3 mb-4 bg-light shadow-sm">
                            <p class="mb-2 fw-bold text-dark">
                                @if ($donation->program_id == 1)
                                    Scan QRIS untuk melakukan Wakaf :
                                @else
                                    Scan QRIS Donasi Program:
                                @endif
                            </p>

                            <img src="{{ $donation->program_id == 1 ? asset('frontend/img/up-wakaf-unand.jpeg') : asset('frontend/img/wakaf-unand(bank-nagari).jpeg') }}"
                                alt="QRIS Code" 
                                class="img-fluid rounded border bg-white p-2 w-100 h-auto mb-3" 
                                style="max-width: 350px; object-fit: contain;">

                            {{-- NOTIFIKASI LIMIT QRIS --}}
                            <div class="alert alert-warning py-2 px-3 mb-0 d-inline-block rounded-pill" style="font-size: 0.85rem;">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                <strong>Info:</strong> Maksimal pembayaran via QRIS adalah <strong>Rp10.000.000</strong> per transaksi.
                            </div>
                        </div>

                        {{-- 2.5 Informasi Rekening Bank (Jika di atas limit atau prefer transfer manual) --}}
                        @if($donation->program->rekening)
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-bank me-2 text-primary"></i>Alternatif Transfer Bank:</h6>
                            <div class="card border-0 bg-light p-3 rounded-4">
                                <div class="d-flex align-items-center mb-2">
                                    <!-- @if($donation->program->rekening->logo)
                                        <img src="{{ asset('frontend/img/' . $donation->program->rekening->logo) }}" 
                                            alt="Logo Bank" height="25" class="me-2">
                                    @endif -->
                                    <span class="fw-bold text-dark">{{ $donation->program->rekening->nama_bank }}</span>
                                </div>
                                
                                <div class="bg-white p-3 rounded-3 border">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="text-muted small">Nomor Rekening:</span>
                                        <button class="btn btn-sm py-0 text-primary fw-bold" 
                                                onclick="copyOrderId('{{ $donation->program->rekening->nomor_rekening }}')">
                                            Salin
                                        </button>
                                    </div>
                                    <div class="fs-5 fw-bold text-dark font-monospace">
                                        {{ $donation->program->rekening->nomor_rekening }}
                                    </div>
                                    <hr class="my-2">
                                    <div class="text-muted small">Atas Nama:</div>
                                    <div class="fw-bold text-dark">
                                        {{ $donation->program->rekening->atas_nama }}
                                    </div>
                                </div>
                                <small class="text-muted mt-2 fst-italic" style="font-size: 0.75rem;">
                                    *Gunakan <strong>Order ID</strong> ({{ $donation->order_id }}) sebagai berita transfer bila memungkinkan.
                                </small>
                            </div>
                        </div>
                        @endif

                        {{-- 3. Instruksi --}}
                        <div class="alert alert-info border-0 d-flex align-items-start" role="alert">
                            <i class="bi bi-info-circle-fill me-2 mt-1"></i>
                            <div class="small">
                                Setelah melakukan pembayaran, sistem akan memverifikasi otomatis dalam 1x24 jam (atau
                                manual oleh Admin).
                                <br><strong>Simpan Order ID Anda untuk pengecekan.</strong>
                            </div>
                        </div>

                        {{-- 4. Tombol Aksi --}}
                        <div class="d-grid gap-2">
                            {{-- Tombol Konfirmasi WA (Opsional tapi berguna banget) --}}
                            <a href="https://wa.me/6281234567890?text=Assalamualaikum,%20saya%20sudah%20wakaf%20dengan%20Order%20ID:%20{{ $donation->order_id }}"
                                target="_blank" class="btn btn-success fw-bold">
                                <i class="bi bi-whatsapp me-2"></i> Konfirmasi ke Admin
                            </a>

                            <a href="{{ route('donations.check') }}" class="btn btn-outline-secondary">
                                Cek Status Pembayaran
                            </a>
                        </div>

                    </div>
                    <div class="card-footer bg-light text-center py-3">
                        <small class="text-muted">Terima kasih atas kontribusi Anda</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
