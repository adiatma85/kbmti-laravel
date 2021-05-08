<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Ajax File Upload with Progress Bar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <form method="POST" action="{{route('progress-bar.post')}}" enctype="multipart/form-data">
                    @csrf
                    Product name:
                    <br>
                    <input type="text" name="name">
                    <br><br>
                    Product photos (can add more than one):
                    <br>
                    <input type="file" class="fileupload" id="fileupload" name="photos[]" 
                        data-url="{{ route('progress-bar.upload') }}"
                        multiple="">
                    <br>
                    <div id="files_list"></div>
                    <p id="loading"></p>
                    <input type="hidden" name="file_ids" id="file_ids" value="">
                    <input type="submit" value="Upload">
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.ui.widget@1.10.3/jquery.ui.widget.js"></script>
    <script src="{{ asset('plugins/jquery-upload/js/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('plugins/jquery-upload/js/jquery.fileupload-image.js') }}"></script>
    <script src="{{ asset('plugins/jquery-upload/js/jquery.iframe-transport.js') }}"></script>

    <script>
        $(function () {
            $('#fileupload').fileupload({
                dataType: 'json',
                add: function (e, data) {
                    alert("Tambah Data he")
                    $('#loading').text('Uploading...');
                    data.submit();
                },
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        $('<p/>').html(file.name + ' (' + file.size + ' KB)').appendTo($('#files_list'));
                        if ($('#file_ids').val() != '') {
                            $('#file_ids').val($('#file_ids').val() + ',');
                        }
                        $('#file_ids').val($('#file_ids').val() + file.fileID);
                    });
                    $('#loading').text('');
                }
            });
        });
    </script>
</body>

</html>