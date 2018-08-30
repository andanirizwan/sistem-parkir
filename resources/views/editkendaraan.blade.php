@extends('layout.template')

@section('content')
<form class="form-horizontal form-label-left" method="post" action="/parkir/edit/{{ $kendaraan->id }}"> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Kendaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="no_kendaraan" required value="{{ $kendaraan->no_kendaraan }}">
                        </div>
                      </div>
                      <div class="form-group">
		                <div class='input-group date' id='datetimepicker3'>
		                    Masuk :<input type='text' class="form-control" name="masuk" required value="{{ $kendaraan->masuk }}" />
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-time"></span>
		                    </span>
		                </div>
		            </div>
                      
                      <div class="form-group">
		                <div class='input-group date' id='datetimepicker4'>
		                    Keluar :<input type='text' class="form-control" name="keluar" required value="{{ $kendaraan->keluar }}" />
		                    <span class="input-group-addon">
		                        <span class="glyphicon glyphicon-time"></span>
		                    </span>
		                </div>
		            </div>

		            {{ csrf_field() }}

                      <center><button type="submit" name="submit" class="btn btn-success">Edit</button></center>
                    </form>

@endsection