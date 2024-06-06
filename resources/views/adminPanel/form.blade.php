@extends('layouts.app')
@section('content')
<link rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl mx-auto flex-grow-1 container-p-y">
        <h4 class="fw-bold mx-auto py-3 mb-4">TODO_LİST</h4>

        <!-- Basic Layout & Basic with Icons -->
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
                                                    @foreach ($kategori as $kategori)
                                                        <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
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
@endsection
