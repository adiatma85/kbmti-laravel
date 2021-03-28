{{-- For Swal2 docs, read here =>  https://sweetalert2.github.io/ --}}

<script>
    $(function () {
        $('document').ready(function () {
            Swal.fire({
                title: "{{$response['title']}}",
                text: "{{$response['text']}}",
                icon: "{{$response['icon']}}"
            });
        });
    });
</script>