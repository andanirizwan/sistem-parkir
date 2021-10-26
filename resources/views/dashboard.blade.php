  @extends('layout.template')

@section('content2')

<div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><br><i class="fa fa-car"></i></div>
                  <div class="count">{{ $total }}</div>
                  <h3><a href="/parkir/kendaraan">Kendaraan</a></h3>
                </div>
</div>


<div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><br><i class="fa fa-motorcycle"></i></div>
                  <div class="count">{{ $motor }}</div>
                  <h3><a href="/parkir/kendaraan">Motor</a></h3>
                </div>
</div>

<div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><br><i class="fa fa-car"></i></div>
                  <div class="count">{{ $mobil }}</div>
                  <h3><a href="/parkir/kendaraan">Mobil</a></h3>
                </div>
</div>

@endsection

@section('content')
  <div class="col-md-3">
  <form class="form-horizontal form-label-left" method="post" action="/parkir/simpan"> 
          <div class="form-group">
            <label class="control-label" for="first-name">Nomor Kendaran <span class="required">*</span>
            </label>
            <div class=" ">
              <input type="text" id="first-name" required="required" class="form-control " name="no_kendaraan" required>
            </div>
          </div>

        <div class="form-group">
          
          <label class="control-label" for="first-name">Jenis Kendaran <span class="required"></span>
            <select name="j_kendaraan" class="form-control" id="exampleFormControlSelect1" required>
              <option value="motor">--pilih---</option>
              <option value="motor">Motor</option>
              <option value="mobil">Mobil</option>
            </select>
          </label>
        </div>

        <div class="form-group">
          
          <label class="control-label" for="first-name">gedung <span class="required"></span>
            <select name="j_kendaraan" class="form-control" id="exampleFormControlSelect1">
              <option >--pilih---</option>
              <option value="pusat">pusat</option>
              <option value="balairung_b">balairung b</option>
              <option value="balairung_a">balairung a</option>
              <option value="pusat">pusat</option>
              <option value="d">d</option>
              <option value="pasca">pasca</option>
            </select>
          </label>
        </div>

        <div class="form-group">
          
          <label class="control-label" for="first-name">hari <span class="required"></span>
            <select name="j_kendaraan" class="form-control" id="exampleFormControlSelect1">
              <option >--pilih---</option>
              <option value="pertama">pertama</option>
              <option value="kedua">kedua</option>
              <option value="ketiga">ketiga</option>
            </select>
          </label>
        </div>

          <div class="form-group">
            <label class="control-label  " for="first-name">Masuk <span class="required">*</span>
            </label>
            <div class="">
              <input type='text' class="form-control" name="masuk" required/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label " for="first-name">Masuk <span class="required">*</span>
            </label>
            <div class="">
              <input type='text' class="form-control" name="keluar" required/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
          </div>
                        
       {{ csrf_field() }}

                    <center><button type="submit" name="submit" class="btn btn-success">Tambah</button></center>
                      </form>
  </div>

  <div class="col-md-9">
    <table id="kendaraan" class="table table-striped table-bordered">
    <thead>
      <th>#</th>
      <th>no kendaraan</th>
      <th>masuk</th>
      <th>keluar</th>
      <th>action</th>
    </thead>


  </table>
  </div>

@endsection

@push('scripts')
       <script>
      $(function() {
          $('#kendaraan').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('json') !!}',
              "fnCreatedRow": function (row, data, index) {
        $('td', row).eq(0).html(index + 1);
        },
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'no_kendaraan', name: 'no_kendaraan' },
                  { data: 'masuk', name: 'masuk' },
                  { data: 'keluar', name: 'keluar' },
                  { data: 'action', name: 'action'}
              ]
          });
      });
    </script>
@endpush


