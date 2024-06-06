<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormController extends Controller
{
    function kategoriGoster()
    {
        return view('front.kategori');
    }
    public function kaydet2(Request $request){
        $post1 = new categories();
        $post1->kategori=$request->kategori;
        $post1->save();
        return redirect()->back()->with('status', 'Kayıt Başarılı!');
    }
}



