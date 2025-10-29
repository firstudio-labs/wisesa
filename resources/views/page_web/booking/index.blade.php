@extends('template_web.layout')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="{{ asset('css/booking-form.css') }}">
    <style>
        /* Styles yang spesifik untuk index page, tidak untuk create */
        .booking-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 19px;
        }

        @media (min-width: 1400px) {
            .booking-container {
                max-width: 1920px;
                padding: 0 80px;
            }
        }

        .booking-form-container {
            background: #ffffff;
            padding: 60px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .booking-form-container {
                padding: 40px 30px;
            }
        }
    </style>
@endsection
@section('content')
    <main>
        <section class="booking-section">
            <div class="booking-container">
                <div class="booking-form-container">
                    <!-- Header Section -->
                    <div class="booking-header">
                        <h1 class="booking-title">My Orders</h1>

                        <div class="header-actions">
                            <!-- Layanan Dropdown -->
                            <div class="layanan-dropdown-container">
                                <div class="layanan-select-wrapper">
                                    <label for="layanan-select" class="layanan-select-label">
                                        <i class="fas fa-download"></i> Download Pricelist
                                    </label>
                                    <select id="layanan-select" class="layanan-select" onchange="filterByLayanan()">
                                        <option value="">Pilih Layanan</option>
                                        @foreach ($layanans as $layanan)
                                            <option value="{{ $layanan->id }}">{{ $layanan->judul }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="pdf-container" class="pdf-container"></div>
                            </div>

                            <!-- Booking Button -->
                            <a href="{{ route('booking.create') }}" class="action-btn btn-primary-custom">
                                <i class="fas fa-plus"></i> Booking
                            </a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('info'))
                        <div class="alert alert-info">{{ session('info') }}</div>
                    @endif

                    @if ($bookings->count() > 0)
                        <div class="orders-grid">
                            @foreach ($bookings as $booking)
                                <div class="order-card">
                                    <!-- Order Header -->
                                    <div class="order-card-header">
                                        <h3 class="order-id">Order #{{ $booking->id }}</h3>
                                        <span class="status-badge status-{{ strtolower($booking->status) }}">
                                            {{ $booking->status }}
                                        </span>
                                    </div>

                                    <!-- Order Body -->
                                    <div class="order-card-body">
                                        <!-- Order Information -->
                                        <div class="order-info">
                                            <div class="order-info-label">Booking Date</div>
                                            <div class="order-info-value">
                                                {{ $booking->booking_date->format('d M Y') }},
                                                @if ($booking->booking_end_time)
                                                    {{ date('H:i', strtotime($booking->booking_time)) }} -
                                                    {{ date('H:i', strtotime($booking->booking_end_time)) }}
                                                @else
                                                    {{ date('H:i', strtotime($booking->booking_time)) }}
                                                @endif
                                            </div>
                                        </div>

                                        <div class="order-info">
                                            <div class="order-info-label">Services</div>
                                            <div class="order-info-value">
                                                {{ $booking->layanan->judul ?? '-' }}
                                                @if ($booking->subLayanan)
                                                    - {{ $booking->subLayanan->judul }}
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Payment Information (only for Diterima status) -->
                                        @if ($booking->status == 'Diterima' && $booking->payment)
                                            <div class="order-info">
                                                <div class="order-info-label">Status Payment</div>
                                                <div class="order-info-value">
                                                    @if ($booking->payment->status == 'pending')
                                                        <span class="text-warning">Menunggu Verifikasi</span>
                                                    @elseif($booking->payment->status == 'verified')
                                                        <span class="text-success">Lunas</span>
                                                    @else
                                                        <span class="text-danger">Kekurangan</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="order-info">
                                                <div class="order-info-label">Full Payment</div>
                                                <div class="order-info-value">Rp
                                                    {{ number_format($booking->biaya ?? 0, 0, ',', '.') }}</div>
                                            </div>
                                        @endif

                                        <!-- Action Buttons -->
                                        <div class="order-actions">
                                            <div class="action-buttons">
                                                @if ($booking->status == 'Selesai')
                                                    <a href="#" class="btn-action btn-invoice">
                                                        <i class="fas fa-print"></i> Cetak Invoice
                                                    </a>
                                                @elseif($booking->status == 'Ditolak')
                                                    <a href="#" class="btn-action btn-notes">
                                                        <i class="fas fa-sticky-note"></i> Catatan
                                                    </a>
                                                @elseif ($booking->status == 'Diterima' && !$booking->payment)
                                                    <button type="button" class="btn-action btn-payment"
                                                        onclick="openPaymentModal({{ $booking->id }})">
                                                        <i class="fas fa-credit-card"></i> Payment
                                                    </button>
                                                @elseif (
                                                    $booking->status != 'Selesai' &&
                                                        $booking->status != 'Ditolak' &&
                                                        $booking->status != 'Diproses' &&
                                                        $booking->status != 'Dibatalkan')
                                                    <button type="button" class="btn-action btn-cancel"
                                                        onclick="confirmCancel({{ $booking->id }})">
                                                        <i class="fas fa-times"></i> Cancel Order
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="action-buttons">
                                                @if ($booking->status == 'Ditolak')
                                                    <a href="{{ route('booking.create') }}" class="btn-action btn-update">
                                                        <i class="fas fa-edit"></i> Update
                                                    </a>
                                                @else
                                                    <a href="{{ route('booking.show', $booking->id) }}"
                                                        class="btn-action btn-detail">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $bookings->links() }}
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <h3 class="empty-state-title">Belum ada booking</h3>
                            <p class="empty-state-text">Silakan buat booking pertama Anda!</p>
                            <a href="{{ route('booking.create') }}" class="action-btn btn-primary-custom">
                                <i class="fas fa-plus"></i> Buat Booking
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
    @include('page_web.booking.modal.payment')

    <script>
        // Data layanan untuk diakses oleh JavaScript
        const layananData = @json($layanans);

        function filterByLayanan() {
            const layananId = document.getElementById('layanan-select').value;
            const pdfContainer = document.getElementById('pdf-container');

            if (layananId) {
                const layanan = layananData.find(l => l.id == layananId);

                if (layanan && layanan.price_list_pdf) {
                    const pdfUrl = '{{ asset('upload/layanan/pdf') }}/' + layanan.price_list_pdf;
                    pdfContainer.innerHTML = `
                        <a href="${pdfUrl}" target="_blank" class="pdf-link">
                            <i class="fas fa-file-pdf"></i> Download PDF
                        </a>
                    `;
                } else {
                    pdfContainer.innerHTML =
                        '<span class="no-pdf-message"><i class="fas fa-info-circle"></i> Belum Diupload</span>';
                }
            } else {
                pdfContainer.innerHTML = '';
            }
        }

        // Jalankan filter saat halaman dimuat jika ada parameter layanan
        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const layananId = urlParams.get('layanan');
            if (layananId) {
                document.getElementById('layanan-select').value = layananId;
                filterByLayanan();
            }
        });
    </script>

@endsection
