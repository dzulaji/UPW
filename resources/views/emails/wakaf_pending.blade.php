<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Pembayaran Wakaf</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 0; line-height: 1.6; color: #333; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f4f6f9; padding-bottom: 40px; }
        .main-content { background-color: #ffffff; margin: 0 auto; max-width: 600px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .header { background-color: #198754; padding: 20px; text-align: center; color: #ffffff; }
        .body-content { padding: 30px; }
        .amount-box { background-color: #e8f5e9; border: 1px dashed #198754; padding: 20px; text-align: center; border-radius: 8px; margin: 20px 0; }
        .amount-text { font-size: 28px; font-weight: bold; color: #198754; margin: 0; }
        .bank-details { background-color: #fafafa; padding: 15px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #eee; }
        .btn { display: inline-block; padding: 12px 25px; background-color: #198754; color: #ffffff !important; text-decoration: none; border-radius: 50px; font-weight: bold; margin-top: 10px; }
        
        /* 👇 STYLE BARU BUAT INFO ORDER ID */
        .info-box { background-color: #e7f1ff; border-left: 4px solid #0d6efd; padding: 15px; margin: 20px 0; font-size: 14px; color: #084298; border-radius: 4px; }
        .order-id-large { font-family: monospace; font-size: 18px; font-weight: bold; color: #0d6efd; letter-spacing: 1px; display: block; margin-top: 5px; }

        .footer { text-align: center; font-size: 12px; color: #999; margin-top: 20px; }
        .table-info td { padding: 5px 0; vertical-align: top; }
        .label { color: #666; font-size: 14px; width: 120px; }
        .value { font-weight: 600; font-size: 14px; }
        
        @media only screen and (max-width: 600px) {
            .body-content { padding: 20px; }
            .amount-text { font-size: 24px; }
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <br>
        <div class="main-content">
            
            <div class="header">
                <h2 style="margin:0;">Menunggu Pembayaran</h2>
                <p style="margin:5px 0 0 0; font-size: 14px; opacity: 0.9;">{{ $donation->created_at->format('d M Y') }}</p>
            </div>

            <div class="body-content">
                <p>Assalamualaikum <strong>{{ $donation->donor_name }}</strong>,</p>
                
                <p>Terima kasih atas wakaf Anda untuk program <strong>"{{ $donation->program->title ?? 'Program Wakaf' }}"</strong>.</p>
                
                {{-- NOMINAL --}}
                <div class="amount-box">
                    <p style="margin: 0 0 5px 0; font-size: 13px; color: #666;">Total Nominal Wakaf</p>
                    <p class="amount-text">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                </div>

                {{-- INFO BANK --}}
                <div class="bank-details">
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 60px;">
                                @if(isset($pathLogo) && $pathLogo)
                                    <img src="{{ $message->embed($pathLogo) }}" alt="Bank" style="height: 30px; display: block;">
                                @else
                                    <span style="font-weight:bold; color:#555;">BANK</span>
                                @endif
                            </td>
                            <td>
                                <div style="font-size: 14px; color: #666;">{{ $rekening->nama_bank ?? 'Bank Transfer' }}</div>
                                <div style="font-size: 18px; font-weight: bold; color: #333; letter-spacing: 1px;">
                                    {{ $rekening->nomor_rekening ?? '-' }}
                                </div>
                                <div style="font-size: 13px; color: #666;">a.n {{ $rekening->atas_nama ?? '-' }}</div>
                            </td>
                        </tr>
                    </table>
                </div>

                {{-- QRIS --}}
                @if(isset($pathQris) && $pathQris)
                    <div style="text-align: center; margin-bottom: 25px;">
                        <p style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">Atau Scan QRIS:</p>
                        <div style="display: inline-block; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                            <img src="{{ $message->embed($pathQris) }}" alt="QRIS Code" style="width: 200px; height: auto; display: block;">
                        </div>
                        {{-- INFO LIMIT QRIS --}}
                        <div style="margin-top: 15px; padding: 10px; background-color: #fff3cd; border: 1px solid #ffeeba; border-radius: 6px; color: #856404; font-size: 13px;">
                            <strong>⚠️ Penting:</strong> Maksimal pembayaran via QRIS adalah <strong>Rp 10.000.000</strong> per transaksi.
                        </div>
                    </div>
                @endif

                <div style="border-top: 1px solid #eee; margin: 20px 0;"></div>

                {{-- 👇 FITUR BARU: INFO PENTING ORDER ID --}}
                <div class="info-box">
                    <strong>💡 Informasi Penting:</strong><br>
                    Simpan <strong>Kode Order</strong> ini. Anda dapat menggunakannya untuk mengecek status pembayaran kapan saja melalui menu <em>"Cek Status Wakaf"</em> di website.
                    
                    {{-- ID YANG GAMPANG DI COPY --}}
                    <span class="order-id-large">{{ $donation->order_id }}</span>
                </div>

                <div style="text-align: center; margin-top: 20px;">
                    {{-- Link ini langsung otomatis ngisi order_id pas diklik --}}
                    <a href="{{ route('donations.check', ['order_id' => $donation->order_id]) }}" class="btn">
                        Cek Status Pembayaran
                    </a>
                </div>

            </div>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Wakaf Uang Universitas Andalas.<br>
            Jazakumullah Khairan Katsiran.</p>
        </div>
        <br>
    </div>

</body>
</html>