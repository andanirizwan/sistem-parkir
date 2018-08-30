@extends('layout.template')

@section('content')

<table id="kendaraan" class="table table-striped table-bordered">
	<thead>
		<th>#</th>
		<th>no_kendaraan</th>
		<th>masuk</th>
		<th>keluar</th>
	</thead>


</table>
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
              ]
          });
      });
    </script>
    @endpush