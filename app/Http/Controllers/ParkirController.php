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
         $motor =ParkirModel::where('jenis_kendaraan' , '=' , 'motor')->count();
         $mobil =ParkirModel::where('jenis_kendaraan' , '=' , 'mobil')->count();
         $title ='Dashboard';

    	return view('dashboard',['total' => $total,'title' => $title,'motor' => $motor,'mobil' => $mobil]);
    }
    function simpan(Request $request)
    {
        //selisih
        $date1=date_create($request->keluar);
        $date2=date_create($request->masuk);
        $selisih=date_diff($date1,$date2);
        $jam=$selisih->h*60;
        $menit=$selisih->i;
        $hasil=$jam+$menit;

    	//insert mass assigment
    	ParkirModel::create([

    		'no_kendaraan'=> $request->no_kendaraan,
            'jenis_kendaraan'=> $request->no_kendaraan,
            'gedung'=> $request->no_kendaraan,
            'hari'=> $request->no_kendaraan,
    		'masuk'=> $request->masuk,
    		'keluar'=> $request->keluar,
            'jam'=> $jam,
            'menit'=> $menit,
            'selisih'=>$hasil

    	]);
    	return redirect('/parkir')->with('status', 'Data tersimpan  ');
    }
    function json_kendaraan()
    {
         // return Datatables::of(ParkirModel::all())->make(true);

        $parkir = ParkirModel::select(['id', 'no_kendaraan', 'masuk', 'keluar']);

        return Datatables::of($parkir)
            ->addColumn('action', function ($parkir) {
                return '<a href="parkir/kendaraan/'.$parkir->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);

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

         //selisih
        $date1=date_create($request->keluar);
        $date2=date_create($request->masuk);
        $selisih=date_diff($date1,$date2);
        $jam=$selisih->h*60;
        $menit=$selisih->i;
        $hasil=$jam+$menit;

         $edit = ParkirModel::where('id', $id)
                    ->update(['no_kendaraan' => $request->no_kendaraan,
                             'jenis_kendaraan'=> $request->no_kendaraan,
                             'gedung'=> $request->no_kendaraan,
                             'hari'=> $request->no_kendaraan,
                             'masuk' => $request->masuk,
                             'keluar' => $request->keluar,
                             'jam'=> $jam,
                             'menit'=> $menit,
                             'selisih'=>$hasil
                         ]);
        return redirect('/parkir');
    }
    function hapus_kendaraan(Request $request ,$id )
    {
        
         $kendaraan =ParkirModel::find($id);
         $title ='kendaraan';

         $hapus = ParkirModel::destroy($id);
         return redirect('/parkir');
    }
    function laporan_motor()
    {
        $title ='Laporan Motor';

    	$selisih1 = ParkirModel::whereBetween('selisih' , [0,30])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih2 = ParkirModel::whereBetween('selisih' , [31,60])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih3 = ParkirModel::whereBetween('selisih' , [61,90])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih4 = ParkirModel::whereBetween('selisih' , [91,120])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih5 = ParkirModel::whereBetween('selisih' , [121,150])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih6 = ParkirModel::whereBetween('selisih' , [151,180])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih7 = ParkirModel::whereBetween('selisih' , [181,220])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih8 = ParkirModel::whereBetween('selisih' , [221,250])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih9 = ParkirModel::whereBetween('selisih' , [251,280])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih10 = ParkirModel::whereBetween('selisih' , [281,320])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih11 = ParkirModel::whereBetween('selisih' , [321,350])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih12 = ParkirModel::whereBetween('selisih' , [351,380])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih13 = ParkirModel::whereBetween('selisih' , [381,420])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih14 = ParkirModel::whereBetween('selisih' , [421,450])->where('jenis_kendaraan' , '=', 'motor')->get();
        $selisih15 = ParkirModel::where('selisih' , '>=', 451)->where('jenis_kendaraan' , '=', 'motor')->get();

    	return view('laporan',['title' => $title,'selisih1'=>$selisih1,'selisih2'=>$selisih2,'selisih3'=>$selisih3,'selisih4'=>$selisih4,'selisih5'=>$selisih5,'selisih6'=>$selisih6,'selisih7'=>$selisih7,'selisih8'=>$selisih8,'selisih9'=>$selisih9,'selisih10'=>$selisih10,'selisih11'=>$selisih11,'selisih12'=>$selisih12,'selisih13'=>$selisih13,'selisih14'=>$selisih14,'selisih15'=>$selisih15]);
    }
    function laporan_motor_hasil(Request $request)
    {
        $title ='Laporan Motor '.'gedung'.' '.$request->gedung.' '.'hari'.' '.$request->hari;
        $gedung = $request->gedung;
        $hari = $request->hari;

        $selisih1 = ParkirModel::whereBetween('selisih' , [0,30])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih2 = ParkirModel::whereBetween('selisih' , [31,60])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih3 = ParkirModel::whereBetween('selisih' , [61,90])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih4 = ParkirModel::whereBetween('selisih' , [91,120])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih5 = ParkirModel::whereBetween('selisih' , [121,150])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih6 = ParkirModel::whereBetween('selisih' , [151,180])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih7 = ParkirModel::whereBetween('selisih' , [181,220])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih8 = ParkirModel::whereBetween('selisih' , [221,250])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih9 = ParkirModel::whereBetween('selisih' , [251,280])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih10 = ParkirModel::whereBetween('selisih' , [281,320])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih11 = ParkirModel::whereBetween('selisih' , [321,350])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih12 = ParkirModel::whereBetween('selisih' , [351,380])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih13 = ParkirModel::whereBetween('selisih' , [381,420])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih14 = ParkirModel::whereBetween('selisih' , [421,450])->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih15 = ParkirModel::where('selisih' , '>=', 451)->where('jenis_kendaraan' , '=', 'motor')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();

       // dd($selisih1);

        return view('laporan',['title' => $title,'selisih1'=>$selisih1,'selisih2'=>$selisih2,'selisih3'=>$selisih3,'selisih4'=>$selisih4,'selisih5'=>$selisih5,'selisih6'=>$selisih6,'selisih7'=>$selisih7,'selisih8'=>$selisih8,'selisih9'=>$selisih9,'selisih10'=>$selisih10,'selisih11'=>$selisih11,'selisih12'=>$selisih12,'selisih13'=>$selisih13,'selisih14'=>$selisih14,'selisih15'=>$selisih15]);
    }
    function laporan_mobil()
    {
        $title ='Laporan Mobil';

        $selisih1 = ParkirModel::whereBetween('selisih' , [0,30])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih2 = ParkirModel::whereBetween('selisih' , [31,60])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih3 = ParkirModel::whereBetween('selisih' , [61,90])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih4 = ParkirModel::whereBetween('selisih' , [91,120])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih5 = ParkirModel::whereBetween('selisih' , [121,150])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih6 = ParkirModel::whereBetween('selisih' , [151,180])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih7 = ParkirModel::whereBetween('selisih' , [181,220])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih8 = ParkirModel::whereBetween('selisih' , [221,250])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih9 = ParkirModel::whereBetween('selisih' , [251,280])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih10 = ParkirModel::whereBetween('selisih' , [281,320])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih11 = ParkirModel::whereBetween('selisih' , [321,350])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih12 = ParkirModel::whereBetween('selisih' , [351,380])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih13 = ParkirModel::whereBetween('selisih' , [381,420])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih14 = ParkirModel::whereBetween('selisih' , [421,450])->where('jenis_kendaraan' , '=', 'mobil')->get();
        $selisih15 = ParkirModel::where('selisih' , '>=', 451)->where('jenis_kendaraan' , '=', 'mobil')->get();

        return view('laporan2',['title' => $title,'selisih1'=>$selisih1,'selisih2'=>$selisih2,'selisih3'=>$selisih3,'selisih4'=>$selisih4,'selisih5'=>$selisih5,'selisih6'=>$selisih6,'selisih7'=>$selisih7,'selisih8'=>$selisih8,'selisih9'=>$selisih9,'selisih10'=>$selisih10,'selisih11'=>$selisih11,'selisih12'=>$selisih12,'selisih13'=>$selisih13,'selisih14'=>$selisih14,'selisih15'=>$selisih15]);
    }
    function laporan_mobil_hasil(Request $request)
    {
        $title ='Laporan Mobil '.'gedung'.' '.$request->gedung.' '.'hari'.' '.$request->hari;
        $gedung = $request->gedung;
        $hari = $request->hari;

        $selisih1 = ParkirModel::whereBetween('selisih' , [0,30])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih2 = ParkirModel::whereBetween('selisih' , [31,60])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih3 = ParkirModel::whereBetween('selisih' , [61,90])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih4 = ParkirModel::whereBetween('selisih' , [91,120])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih5 = ParkirModel::whereBetween('selisih' , [121,150])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih6 = ParkirModel::whereBetween('selisih' , [151,180])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih7 = ParkirModel::whereBetween('selisih' , [181,220])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih8 = ParkirModel::whereBetween('selisih' , [221,250])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih9 = ParkirModel::whereBetween('selisih' , [251,280])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih10 = ParkirModel::whereBetween('selisih' , [281,320])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih11 = ParkirModel::whereBetween('selisih' , [321,350])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih12 = ParkirModel::whereBetween('selisih' , [351,380])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih13 = ParkirModel::whereBetween('selisih' , [381,420])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih14 = ParkirModel::whereBetween('selisih' , [421,450])->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();
        $selisih15 = ParkirModel::where('selisih' , '>=', 451)->where('jenis_kendaraan' , '=', 'mobil')->where('gedung' , '=', $gedung)->where('hari' , '=', $hari)->get();

      // dd($selisih1);

        return view('laporan2',['title' => $title,'selisih1'=>$selisih1,'selisih2'=>$selisih2,'selisih3'=>$selisih3,'selisih4'=>$selisih4,'selisih5'=>$selisih5,'selisih6'=>$selisih6,'selisih7'=>$selisih7,'selisih8'=>$selisih8,'selisih9'=>$selisih9,'selisih10'=>$selisih10,'selisih11'=>$selisih11,'selisih12'=>$selisih12,'selisih13'=>$selisih13,'selisih14'=>$selisih14,'selisih15'=>$selisih15]);
    }
    
}


// $masuk2 = ParkirModel::whereBetween('masuk' , ['07:31:00','08:00:00'])->count();
        // $keluar2 = ParkirModel::whereBetween('keluar' , ['07:31:00','08:00:00'])->count();

        // $masuk3 = ParkirModel::whereBetween('masuk' , ['08:01:00','08:30:00'])->count();
        // $keluar3 = ParkirModel::whereBetween('keluar' , ['08:01:00','08:30:00'])->count();

        // $masuk4 = ParkirModel::whereBetween('masuk' ,  ['08:31:00','09:00:00'])->count();
        // $keluar4 = ParkirModel::whereBetween('keluar' , ['08:31:00','09:00:00'])->count();

        // $masuk5 = ParkirModel::whereBetween('masuk' ,  ['09:01:00','09:30:00'])->count();
        // $keluar5 = ParkirModel::whereBetween('keluar' , ['09:01:00','09:30:00'])->count();

        // $masuk6 = ParkirModel::whereBetween('masuk' ,  ['09:31:00','10:00:00'])->count();
        // $keluar6 = ParkirModel::whereBetween('keluar' , ['09:31:00','10:00:00'])->count();

        // $masuk7 = ParkirModel::whereBetween('masuk' ,  ['10:01:00','10:30:00'])->count();
        // $keluar7 = ParkirModel::whereBetween('keluar' , ['10:01:00','10:30:00'])->count();

        // $masuk8 = ParkirModel::whereBetween('masuk' ,  ['10:31:00','11:00:00'])->count();
        // $keluar8 = ParkirModel::whereBetween('keluar' , ['10:31:00','11:00:00'])->count();

        // $masuk9 = ParkirModel::whereBetween('masuk' ,  ['11:01:00','11:30:00'])->count();
        // $keluar9 = ParkirModel::whereBetween('keluar' , ['11:01:00','11:30:00'])->count();

        // $masuk10 = ParkirModel::whereBetween('masuk' ,  ['11:31:00','12:00:00'])->count();
        // $keluar10 = ParkirModel::whereBetween('keluar' , ['11:31:00','12:00:00'])->count();

        // $masuk11 = ParkirModel::whereBetween('masuk' ,  ['12:01:00','12:30:00'])->count();
        // $keluar11 = ParkirModel::whereBetween('keluar' , ['12:01:00','12:30:00'])->count();

        // $masuk12 = ParkirModel::whereBetween('masuk' ,  ['12:31:00','13:00:00'])->count();
        // $keluar12 = ParkirModel::whereBetween('keluar' , ['12:31:00','13:00:00'])->count();

        // $masuk13 = ParkirModel::whereBetween('masuk' ,  ['13:01:00','13:30:00'])->count();
        // $keluar13 = ParkirModel::whereBetween('keluar' , ['13:01:00','13:30:00'])->count();

        // $masuk14 = ParkirModel::whereBetween('masuk' ,  ['13:31:00','14:00:00'])->count();
        // $keluar14 = ParkirModel::whereBetween('keluar' , ['13:31:00','14:00:00'])->count();

        // $masuk15 = ParkirModel::whereBetween('masuk' ,  ['14:01:00','14:30:00'])->count();
        // $keluar15 = ParkirModel::whereBetween('keluar' , ['14:01:00','14:30:00'])->count();

        // $masuk16 = ParkirModel::whereBetween('masuk' ,  ['14:31:00','15:00:00'])->count();
        // $keluar16 = ParkirModel::whereBetween('keluar' , ['14:31:00','15:00:00'])->count();

        // $masuk17 = ParkirModel::whereBetween('masuk' ,  ['15:01:00','15:30:00'])->count();
        // $keluar17 = ParkirModel::whereBetween('keluar' , ['15:01:00','15:30:00'])->count();

        // $masuk18 = ParkirModel::whereBetween('masuk' ,  ['15:31:00','16:00:00'])->count();
        // $keluar18 = ParkirModel::whereBetween('keluar' , ['15:31:00','16:00:00'])->count();
