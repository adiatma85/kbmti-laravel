{{--  Modal  --}}
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="center-modal-title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Konfirmasi Penghapusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="{{$domFormId}}">
                <div class="modal-body">
                    <p>Apakah Anda yakin menghapus {{$topic}} ini?</p>
                    <label for="{{$itemName}}">Nama {{$topic}}</label>
                    <input type="text" class="form-control" id="{{$itemName}}" value="{{old('name') ?? ''}}" disabled>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>