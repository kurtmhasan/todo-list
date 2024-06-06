@extends('layouts.app')
@section('kategori')
    <div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div class="card-body">
                    <form action="{{route('kaydet2')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="kategori" class="form-label">Kategori:</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name = "kategori" id="kategori" placeholder="kategori tanımlayınız" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-4 mt-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">kaydet</button>
                                                @if (session('status'))
                                                    <div class="alert alert-success text-center mt-3" >
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped" id="goster-kategori">
                        <thead>
                        <tr>

                            <th>Kategori</th>
                            <th>güncelle</th>
                            <th>sil</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Kategori</th>
                            <th>güncelle</th>
                            <th>sil</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('#goster-kategori').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('getShowKategori') }}',
            columns: [
                { data: 'getKatgori'},
                { data: 'guncelle_button'},
                { data: 'sil'},
            ]
        });
    });
    function confirmDelete2(taskId) {
        Swal.fire({
            title: "Emin Misin?",
            text: "Bunu geri alamazsınız!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7cb9f3",
            cancelButtonColor: "#d33",
            confirmButtonText: "Veriyi Sil!"
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX isteği göndererek DELETE işlemini gerçekleştirme
                $.ajax({
                    url: '{{ route('sil2', ['id' => ':id']) }}'.replace(':id', taskId),
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },

                    success: function(response) {
                        Swal.fire('Başarılı',response.success,'success')
                        console.log('Başarıyla silindi:', response);
                        $('#goster-kategori').DataTable().ajax.reload()
                        // Başarı durumunda sayfayı yenileyebilir veya gerekli işlemleri gerçekleştirebilirsiniz.
                    },
                    error: function(xhr, status, error) {
                        console.error('Hata:', error);
                    }
                });
            }
        });
    }
</script>




