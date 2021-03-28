{{-- Sweet2Alert --}}
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
{{-- Toastr --}}
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

{{-- Response --}}
@if (\Session::has('response'))
    @include('include.modals.swal2-admin-modal', [
        'response' => \Session::get('response'),
    ])
@endif