@extends('frontend.layouts.app')

@section('title', 'Scan & Pay')

@section('content')
    <div class="scan-qr">
        <div class="card">
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-danger alert-dismissible p-2 fade show" role="alert">
                        <p class="mb-0 d-inline align-middle mx-2">{{ session('message') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="text-center">
                    <img src="{{ asset('images/img/qr-code-scan.png') }}" class="mx-auto" alt="" style="width: 220px;display:block;">
                    <p class="mb-1 mt-3">Click button, put QR code in the frame and pay.</p>
                    <button class="btn btn-theme scan mt-2" data-bs-toggle="modal" data-bs-target="#scanModal">
                        <img src="{{ asset('images/img/qr-scan.png') }}" class="mx-2" alt="">
                        <span class="mx-2">Scan</span>
                    </button>
                </div>
                
                <div class="modal fade" id="scanModal" tabindex="-1" aria-labelledby="scanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="scanModalLabel">Scan & Pay</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <video id="scanner" width="100%" height="200px"></video>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('plugins/qr_scanner/qr-scanner.umd.min.js') }}"></script>

    <script>
        $(() => {

            let scanner = document.getElementById('scanner');
            let sModal = document.getElementById('scanModal');
            
            const qrScanner = new QrScanner(scanner, function(result) {
                if(result) {
                    qrScanner.stop();
                    $('#scanModal').modal('hide');

                    window.location.replace(`scan-and-pay-form?to_phone=${result}`)
                }
            });

            sModal.addEventListener('show.bs.modal', event => {
                qrScanner.start();
            })

            sModal.addEventListener('hidden.bs.modal', event => {
                qrScanner.stop();
            })

        })
    </script>
@endpush