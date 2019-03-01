@extends('layout.template')

@section('content')

<div class="form-group">
 <form class="form-horizontal form-label-left" method="post" action="/parkir/laporan/mobil/hasil"> 
    <div class="col-md-3">
    	<div class="form-group">
          Gedung :
            <select name="gedung" class="form-control " >
            <option >-- pilih --</option>
              <option value="gedung_pusat">pusat</option>
              <option value="balairung_b">balairung bawah</option>
              <option value="balairung_a">balairung atas</option>
              <option value="d">D</option>
              <option value="utama">Utama</option>
              <option value="pasca">pasca</option>
            </select>
        </div> 
    </div>
    <div class="col-md-3">
        <div class="form-group">
           Hari :
            <select name="hari" class="form-control " >
            <option >-- pilih --</option>
              <option value="pertama">pertama</option>
              <option value="kedua">kedua</option>
              <option value="ketiga">ketiga</option>
            </select>
		
		</div>
	</div> <br>
            {{ csrf_field() }}
    <div class="col-md-3">
    	<div class="form-group">
       		<button type="submit" name="submit" class="btn btn-success btn-sm">Filter</button> <a href="/parkir/laporan/mobil/" class="btn btn-info  btn-sm">Reset</a>
   		</div>
    </div>

 </form>

<table id="tableparkir" class="table table-striped table-bordered">
	<thead>
		<th>No</th>
		<th>Durasi Waktu (Menit)</th>
		<th>jumlah</th>
	</thead>
	<tbody>
		<tr>
			<td>1.</td>
			<td>0-30</td>
			<td>
				{{count($selisih1)}}
			</td>
		</tr>
		<tr>
			<td>2.</td>
			<td>31-60</td>
			<td>
				{{count($selisih2)}}
			</td>
		</tr>
		<tr>
			<td>3.</td>
			<td>61-90</td>
			<td>
				{{count($selisih3)}}
			</td>
		</tr>
		<tr>
			<td>4.</td>
			<td>91-120</td>
			<td>
				{{count($selisih4)}}
			</td>
		</tr>
		<tr>
			<td>5.</td>
			<td>121-150</td>
			<td>
				{{count($selisih5)}}
			</td>
		</tr>
		<tr>
			<td>6.</td>
			<td>151-180</td>
			<td>
				{{count($selisih6)}}
			</td>
		</tr>
		<tr>
			<td>7.</td>
			<td>181-220</td>
			<td>
				{{count($selisih7)}}
			</td>
		</tr>
		<tr>
			<td>8.</td>
			<td>221-250</td>
			<td>
				{{count($selisih8)}}
			</td>
		</tr>
		<tr>
			<td>9.</td>
			<td>251-280</td>
			<td>
				{{count($selisih9)}}
			</td>
		</tr>
		<tr>
			<td>10.</td>
			<td>281-320</td>
			<td>
				{{count($selisih10)}}
			</td>
		</tr>
		<tr>
			<td>11.</td>
			<td>321-350</td>
			<td>
				{{count($selisih11)}}
			</td>
		</tr>
		<tr>
			<td>12.</td>
			<td>351-380</td>
			<td>
				{{count($selisih12)}}
			</td>
		</tr>
		<tr>
			<td>13.</td>
			<td>381-420</td>
			<td>
				{{count($selisih13)}}
			</td>
		</tr>
		<tr>
			<td>14.</td>
			<td>421-450</td>
			<td>
				{{count($selisih14)}}
			</td>
		</tr>
		<tr>
			<td>15.</td>
			<td>>451</td>
			<td>
				{{count($selisih15)}}
			</td>
		</tr>

		
















		{{-- <tr>
			<td>2.</td>
			<td>07:31 - 08:00</td>
			<td>{{$masuk2}}</td>
			<td>{{$keluar2}}</td>
		</tr>
		<tr>
			<td>3.</td>
			<td>08:01 - 08:30</td>
			<td>{{$masuk3}}</td>
			<td>{{$keluar3}}</td>
		</tr>
		<tr>
			<td>4.</td>
			<td>08:31 - 09:00</td>
			<td>{{$masuk4}}</td>
			<td>{{$keluar4}}</td>
		</tr>
		<tr>
			<td>5.</td>
			<td>09:01 - 09:30</td>
			<td>{{$masuk5}}</td>
			<td>{{$keluar5}}</td>
		</tr>
		<tr>
			<td>6.</td>
			<td>09:31 - 10:00</td>
			<td>{{$masuk6}}</td>
			<td>{{$keluar6}}</td>
		</tr>
		<tr>
			<td>7.</td>
			<td>10:01 - 10:30</td>
			<td>{{$masuk7}}</td>
			<td>{{$keluar7}}</td>
		</tr>
		<tr>
			<td>8.</td>
			<td>10:31 - 11:00</td>
			<td>{{$masuk8}}</td>
			<td>{{$keluar8}}</td>
		</tr>
		<tr>
			<td>9.</td>
			<td>11:01 - 11:30</td>
			<td>{{$masuk9}}</td>
			<td>{{$keluar9}}</td>
		</tr>
		<tr>
			<td>10.</td>
			<td>11:31 - 12:00</td>
			<td>{{$masuk10}}</td>
			<td>{{$keluar10}}</td>
		</tr>
		<tr>
			<td>11.</td>
			<td>12:01 - 12:30</td>
			<td>{{$masuk11}}</td>
			<td>{{$keluar11}}</td>
		</tr>
		<tr>
			<td>12.</td>
			<td>12:31 - 13:00</td>
			<td>{{$masuk12}}</td>
			<td>{{$keluar12}}</td>
		</tr>
		<tr>
			<td>13.</td>
			<td>13:01 - 13:30</td>
			<td>{{$masuk13}}</td>
			<td>{{$keluar13}}</td>
		</tr>
		<tr>
			<td>14.</td>
			<td>13:31 - 14:00</td>
			<td>{{$masuk14}}</td>
			<td>{{$keluar14}}</td>
		</tr>
		<tr>
			<td>15.</td>
			<td>14:01 - 14:30</td>
			<td>{{$masuk15}}</td>
			<td>{{$keluar15}}</td>
		</tr>
		<tr>
			<td>16.</td>
			<td>14:31 - 15:00</td>
			<td>{{$masuk16}}</td>
			<td>{{$keluar16}}</td>
		</tr>
		<tr>
			<td>17.</td>
			<td>15:01 - 15:30</td>
			<td>{{$masuk17}}</td>
			<td>{{$keluar17}}</td>
		</tr>
		<tr>
			<td>18.</td>
			<td>15:31 - 16:00</td>
			<td>{{$masuk18}}</td>
			<td>{{$keluar18}}</td>
		</tr> --}}

		
	</tbody>
</table>

@endsection