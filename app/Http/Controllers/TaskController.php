<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use function Laravel\Prompts\alert;

class TaskController extends Controller
{
    public function kategoriGetir(){
        return $this->hasMany('app/Models/Task', 'id', 'category_id');
    }
    function form()
    {
        $kategori =  categories::all();
        return view('adminPanel.form',compact('kategori'));
    }
    public function data()
    {
        $tasks = Task::all();
        $kategori =  categories::all();
        return view('front.data', compact('tasks','kategori'));

    }
    public function edit($id)
    {

        $kayit = Task::find($id);
        $kategori =  categories::all();
        return view('front.edit', compact('kayit', 'kategori'));
    }


    public function kaydet(Request $request){

        $post = new Task();
        $post->gorevAdi=$request->gorevAdi;
        $post->category_id=$request->kategori;
        $post->gorevTarih=$request->gorevTarih;
        $post->save();
        return redirect()->back()->with('status', 'Kayıt Başarılı!');
    }
    public function sil($id){
        $task = Task::find($id);
        if (!$task) {
            return redirect()->back()->with('error', 'Görev bulunamadı!');
        }
        $task->delete();
        return redirect()->back();

    }
    public function sil2(request $request){
        $kat = categories::find($request->id);
        if (!$kat) {
            return response()->json(['error'=> 'Görev bulunamadı!'],404);
        }
        if($kat->getTasks->count() != 0){
            foreach ($kat->getTasks as $task){
                $task->delete();
            }
        }
        $kat->delete();
        return response()->json(['success'=> 'Kategori başarıyla silindi']);

    }
    public function guncelle(Request $request, $id)
    {

        $kayit = Task::find($id);

        if (!$kayit) {
            return redirect()->back()->with('error', 'Görev bulunamadı!');
        }

        $kayit->gorevAdi = $request->gorevAdi;
        $kayit->category_id=$request->kategori;
        $kayit->gorevTarih = $request->gorevTarih;

        $kayit->save();
        return redirect()->route('data');

    }
    public function guncelle2(Request $request, $id)
    {

    }

    public function filtrele(Request $request){
        $tasks = Task::where('category_id', $request->kategori )->get();
        $categories = categories::all();
        return view('front.filtrele', compact('tasks', 'categories'));
    }

    public function getData()
    {
        $taskTable = Task::all();
        return DataTables::of($taskTable)
            ->editColumn('gorevTarih', function ($data) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data->gorevTarih)->format('d-m-Y');
            })
            ->editColumn('created_at', function ($data) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y');
            })
            ->addColumn('getKatgori', function ($data) {
                if (isset($data->kategori_getir)){
                    return $data->kategori_getir->kategori;
                }else{
                    return "-";
                }

            })
            ->addColumn('guncelle_button', function ($data) {
                return '<a class="button btn-primary" href="'.route('edit', ['id' => $data->id]).'">Güncelle</a>';
            })
            ->addColumn('sil', function ($data) {
                return '<button class="button btn-danger" onclick= "confirmDelete('. $data->id .')">sil</button>';
            })
            ->rawColumns(['gorevTarih','getKatgori','created_at','guncelle_button','sil'])
            ->make(true);
    }


    public function getShowKategori()
    {
        $katTable = categories::all();
        return DataTables::of($katTable)
            ->addColumn('getKatgori', function ($data) {
                return $data->kategori;
            })
            ->addColumn('guncelle_button', function ($data) {
                return '<button class="button btn-primary" onclick= "confirmEdit('. $data->id .')">güncelle</button>';
            })
            ->addColumn('sil', function ($data) {
                return '<button class="button btn-danger" onclick= "confirmDelete2('. $data->id .')">sil</button>';
            })
            ->rawColumns(['getKatgori','guncelle_button','sil'])
            ->make(true);
    }
}

