@extends('layouts.app')
@section('data')
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4 mt-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kategori">Kategoriye göre filtreleyin</label>
                            <form id="filterForm" method="POST" action="{{ route('filtrele') }}">
                                @csrf
                                <select id="kategori" name="kategori" class="form-control">
                                    @foreach ($kategori as $m)
                                        <option value="{{$m->id}}">{{$m->kategori}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="route" value="{{ route('filtrele') }}">
                            </form>

                            <li class="menu-item mt-3">
                                <button type="button" class="btn btn-primary" onclick="submitFilterForm()">
                                    <div>Filtrele</div>
                                </button>
                            </li>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taskCreat">
                            task oluştur
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="taskCreat" tabindex="-1" role="dialog" aria-labelledby="taskCreatTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="taskCreatLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xxl">
                                                <div class="card mb-4">
                                                    <div class="card-header d-flex align-items-center justify-content-between">
                                                        <div class="card-body">
                                                            <form action="{{route('kaydet')}}" method="POST">
                                                                @csrf
                                                                <div class="card-body">
                                                                    <table class="table table-striped">
                                                                        <tbody>
                                                                        <div class="form-group">
                                                                            <td>Kategori</td>
                                                                            <select id="kategori" name="kategori" class="form-control">
                                                                                @foreach ($kategori as $kategorik)
                                                                                    <option value="{{$kategorik->id}}">{{$kategorik->kategori}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="gorevAdi" class="form-label" >Görev Adı:</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">
                                                                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                                                                            <input type="text" class="form-control" name = "gorevAdi" id="gorevAdi" placeholder="Yapılacak bir şey girin"  required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="gorevTarih" class="form-label">görev tarihi:</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group input-group-merge">
                                                                            <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                                                            <input type="date" class="form-control" name="gorevTarih" id="gorevTarih" placeholder="tarih girin" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-end">
                                                                    <div class="col-sm-10">
                                                                        <button type="submit" class="btn btn-primary">kaydet</button>
                                                                        @if (session('status'))
                                                                            <div class="alert alert-success text-center mt-3" >
                                                                                {{ session('status') }}
                                                                            </div>
                                                                        @endif
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">kapat</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="taskCreat" tabindex="-1" role="dialog" aria-labelledby="taskCreatTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="taskCreatLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped" id="task-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kategori</th>
                                <th>Görev Adı</th>
                                <th>Görev Tarihi</th>
                                <th>Oluşturma Tarihi</th>
                                <th>güncelle</th>
                                <th>sil</th>
                            </tr>
                            </thead>

                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Kategori</th>
                                <th>Görev Adı</th>
                                <th>Görev Tarihi</th>
                                <th>Oluşturma Tarihi</th>
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

<script>
    function submitFilterForm(id) {
        document.getElementById('filterForm').submit();
    }
</script>
<script type="text/javascript">
    $(function () {
        $('#task-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('getData') }}',
            columns: [
                {  data: 'id' },
                { data: 'getKatgori' },
                {  data: 'gorevAdi' },
                { data: 'gorevTarih' },
                { data: 'created_at' },
                { data: 'guncelle_button'},
                { data: 'sil'},
            ]
        });
    });
    function confirmDelete(taskId) {
        Swal.fire({
            title: "Emin Misin?",
            text: "Bunu geri alamazsınız!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#7cb9f3",
            cancelButtonColor: "#d33",
            confirmButtonText: "Veri Silindi!"
        }).then((result) => {
            if (result.isConfirmed) {
                var silRoute = "{{ route('sil',['id'=>':id']) }}".replace(':id',taskId); // Laravel tarafından oluşturulan silme rotası

                // AJAX isteği göndererek DELETE işlemini gerçekleştirme
                fetch(silRoute, {
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {'id':taskId}
                })
                    .then(response => {
                        if (response.ok) {
                            Swal.fire({
                                title: "Silindi!",
                                text: "veri başarılı şekilde silindi.",
                                icon: "success"
                            }).then(ok =>{
                                $('#task-table').DataTable().ajax.reload()
                            });

                        } else {
                            Swal.fire({
                                title: "Hata!",
                                text: "Veri silinirken bir hata oluştu.",
                                icon: "error"
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            title: "Hata!",
                            text: "Veri silinirken bir hata oluştu.",
                            icon: "error"
                        });
                    });
            }
        });
    }
</script>





