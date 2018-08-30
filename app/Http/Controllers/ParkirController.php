<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\ParkirModel;
use Datatables;


class ParkirController extends Controller
{
    
    function index()
    {
         $total =ParkirModel::all()->count();
         $title ='Dashboard';
    	return view('dashboard',['total' => $total,'title' => $title]);
    }
    function simpan(Request $request)
    {
    	//insert mass assigment
    	ParkirModel::create([

    		'no_kendaraan'=> $request->no_kendaraan,
    		'masuk'=> $request->masuk,
    		'keluar'=> $request->keluar
    	]);
    	return redirect('/parkir');
    }
    function json_kendaraan()
    {
         return Datatables::of(ParkirModel::all())->make(true);

    }
    function kendaraan()
    {
         $title ='kendaraan';
        return view('kendaraan',['title' => $title]);
    }
    function edit($id)
    {
         $kendaraan =ParkirModel::find($id);
         $title ='kendaraan';
        return view('editkendaraan',['kendaraan' => $kendaraan,'title' => $title]);
    }
    function simpan_kendaraan(Request $request ,$id )
    {
        
         $kendaraan =ParkirModel::find($id);
         $title ='kendaraan';

         $edit = ParkirModel::where('id', $id)
                    ->update(['no_kendaraan' => $request->no_kendaraan,
                             'masuk' => $request->masuk,
                             'keluar' => $request->keluar]);
        return redirect('/parkir');
    }
    function hapus_kendaraan(Request $request ,$id )
    {
        
         $kendaraan =ParkirModel::find($id);
         $title ='kendaraan';

         $hapus = ParkirModel::destroy($id);
         return redirect('/parkir');
    }
    function laporan()
    {
        $title ='Laporan';

    	$masuk1 = ParkirModel::whereBetween('masuk' , ['07:00:00','07:30:00'])->count();
    	$keluar1 = ParkirModel::whereBetween('keluar', ['07:00:00','07:30:00'])->count();

    	$masuk2 = ParkirModel::whereBetween('masuk' , ['07:31:00','08:00:00'])->count();
    	$keluar2 = ParkirModel::whereBetween('keluar' , ['07:31:00','08:00:00'])->count();

    	$masuk3 = ParkirModel::whereBetween('masuk' , ['08:01:00','08:30:00'])->count();
    	$keluar3 = ParkirModel::whereBetween('keluar' , ['08:01:00','08:30:00'])->count();

    	$masuk4 = ParkirModel::whereBetween('masuk' ,  ['08:31:00','09:00:00'])->count();
    	$keluar4 = ParkirModel::whereBetween('keluar' , ['08:31:00','09:00:00'])->count();

    	$masuk5 = ParkirModel::whereBetween('masuk' ,  ['09:01:00','09:30:00'])->count();
    	$keluar5 = ParkirModel::whereBetween('keluar' , ['09:01:00','09:30:00'])->count();

    	$masuk6 = ParkirModel::whereBetween('masuk' ,  ['09:31:00','10:00:00'])->count();
    	$keluar6 = ParkirModel::whereBetween('keluar' , ['09:31:00','10:00:00'])->count();

    	$masuk7 = ParkirModel::whereBetween('masuk' ,  ['10:01:00','10:30:00'])->count();
    	$keluar7 = ParkirModel::whereBetween('keluar' , ['10:01:00','10:30:00'])->count();

    	$masuk8 = ParkirModel::whereBetween('masuk' ,  ['10:31:00','11:00:00'])->count();
    	$keluar8 = ParkirModel::whereBetween('keluar' , ['10:31:00','11:00:00'])->count();

    	$masuk9 = ParkirModel::whereBetween('masuk' ,  ['11:01:00','11:30:00'])->count();
    	$keluar9 = ParkirModel::whereBetween('keluar' , ['11:01:00','11:30:00'])->count();

    	$masuk10 = ParkirModel::whereBetween('masuk' ,  ['11:31:00','12:00:00'])->count();
    	$keluar10 = ParkirModel::whereBetween('keluar' , ['11:31:00','12:00:00'])->count();

    	$masuk11 = ParkirModel::whereBetween('masuk' ,  ['12:01:00','12:30:00'])->count();
    	$keluar11 = ParkirModel::whereBetween('keluar' , ['12:01:00','12:30:00'])->count();

    	$masuk12 = ParkirModel::whereBetween('masuk' ,  ['12:31:00','13:00:00'])->count();
    	$keluar12 = ParkirModel::whereBetween('keluar' , ['12:31:00','13:00:00'])->count();

    	$masuk13 = ParkirModel::whereBetween('masuk' ,  ['13:01:00','13:30:00'])->count();
    	$keluar13 = ParkirModel::whereBetween('keluar' , ['13:01:00','13:30:00'])->count();

    	$masuk14 = ParkirModel::whereBetween('masuk' ,  ['13:31:00','14:00:00'])->count();
    	$keluar14 = ParkirModel::whereBetween('keluar' , ['13:31:00','14:00:00'])->count();

    	$masuk15 = ParkirModel::whereBetween('masuk' ,  ['14:01:00','14:30:00'])->count();
    	$keluar15 = ParkirModel::whereBetween('keluar' , ['14:01:00','14:30:00'])->count();

    	$masuk16 = ParkirModel::whereBetween('masuk' ,  ['14:31:00','15:00:00'])->count();
    	$keluar16 = ParkirModel::whereBetween('keluar' , ['14:31:00','15:00:00'])->count();

    	$masuk17 = ParkirModel::whereBetween('masuk' ,  ['15:01:00','15:30:00'])->count();
    	$keluar17 = ParkirModel::whereBetween('keluar' , ['15:01:00','15:30:00'])->count();

    	$masuk18 = ParkirModel::whereBetween('masuk' ,  ['15:31:00','16:00:00'])->count();
    	$keluar18 = ParkirModel::whereBetween('keluar' , ['15:31:00','16:00:00'])->count();

    	return view('laporan',['title' => $title,'masuk1'=>$masuk1,'keluar1'=>$keluar1,'masuk2'=>$masuk2,'keluar2'=>$keluar2,'masuk3'=>$masuk3,'keluar3'=>$keluar3,'masuk4'=>$masuk4,'keluar4'=>$keluar4,'masuk5'=>$masuk5,'keluar5'=>$keluar5,'masuk6'=>$masuk6,'keluar6'=>$keluar6,'masuk7'=>$masuk7,'keluar7'=>$keluar7,'masuk8'=>$masuk8,'keluar8'=>$keluar8,'masuk9'=>$masuk9,'keluar9'=>$keluar9,'masuk10'=>$masuk10,'keluar10'=>$keluar10,'masuk11'=>$masuk11,'keluar11'=>$keluar11,'masuk12'=>$masuk12,'keluar12'=>$keluar12,'masuk13'=>$masuk13,'keluar13'=>$keluar13,'masuk14'=>$masuk14,'keluar14'=>$keluar14,'masuk15'=>$masuk15,'keluar15'=>$keluar15,'masuk16'=>$masuk16,'keluar16'=>$keluar16,'masuk17'=>$masuk17,'keluar17'=>$keluar17,'masuk18'=>$masuk18,'keluar18'=>$keluar18]);
    }
    
}
