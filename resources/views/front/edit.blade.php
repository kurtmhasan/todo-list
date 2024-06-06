@extends('layouts.app')

@section('guncelle')
    <h1>Görev Düzenle</h1>

    <form action="{{ route('guncelle', $kayit->id)}}" method="GET">
        @csrf
        <div class="form-group">
            <label for="name">Görev Adı</label>
            <input type="text" class="form-control" id="gorevAdi" name="gorevAdi" value="{{ $kayit->gorevAdi}}">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" class="form-control">
                @foreach ($kategori as $kategori)
                    <option value="{{$kategori->id}}" {{($kayit!=null) ? ($kayit->category_id==$kategori->id ? 'selected':''): ''}}>{{$kategori->kategori}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="gorevTarih">gorev tarihi</label>
            <textarea class="form-control" id="gorevTarih" name="gorevTarih">{{ $kayit->gorevTarih }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Görev Güncelle</button>
    </form>
@endsection


