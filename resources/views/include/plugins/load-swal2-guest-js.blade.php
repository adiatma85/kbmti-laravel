{{-- Normal Sweet2Alert --}}
<script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

{{-- Response --}}
@if (\Session::has('response'))
    @include('include.modals.swal2-guest-modal', [
        'response' => \Session::get('response'),
    ])
@endif