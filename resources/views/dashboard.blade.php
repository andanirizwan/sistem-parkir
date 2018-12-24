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

@endsection

@section('content')
<form class="form-horizontal form-label-left" method="post" action="/parkir/simpan"> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Kendaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="no_kendaraan" required>
                        </div>
                      </div>
                      <div class="form-group">
		                <div class='input-group date' id='datetimepicker3'>
		                    Masuk :<input type='text' class="form-control" name="masuk" required/>
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-time"></span>
		                    </span>
		                </div>
		            </div>
                      
                      <div class="form-group">
		                <div class='input-group date' id='datetimepicker4'>
		                    Keluar :<input type='text' class="form-control" name="keluar" required/>
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-time"></span>
		                    </span>
		                </div>
		            </div>

		            {{ csrf_field() }}

                      <center><button type="submit" name="submit" class="btn btn-success">Tambah</button></center>
                    </form>


 @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


@endsection


