<script>
  $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      $('document').ready( function () {
        Toast.fire({
          icon: '{{$response['icon']}}',
          title: '{{$response['title']}}'
        })  
      });  ;
    });
</script>