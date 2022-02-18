@extends('layouts.app')

@section('header')
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Anggota</li>
			</ol>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Anggota</h1>
			</div>
		</div><!--/.row-->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#jenis').DataTable();
    });
    </script>
    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script src="{{asset('js/delete.js')}}"></script>
@endsection

@section('content')
    <div class="panel panel-default col-md-12">
        <div class="panel-heading">Anggota
            <a href="{{ route('jenis.create') }}" class="btn btn-primary" style="float: right;"><span class="fa fa-plus">&nbsp;</span> tambah</a>
        </div>
        <div class="panel-body">
            <table id="jenis" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                    <th class="text-center">No</th>
                        <th class="text-center">Id_Card</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">No Telepon</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Pengurus</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- data palsu -->
                    @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($jenis as $data)
                    <tr>
                    <td class="text-center">{{$no++}}</td>
                            <td class="text-center">{{$data->id_card}}</td>
                            <td class="text-center">{{$data->nama_anggota}}</td>
                            <td class="text-center">{{$data->no_telepon}}</td>
                            <td class="text-center">{{$data->alamat}}</td>
                            <td class="text-center">{{$data->supplier->nama_supplier}}</td>
                        <td class="text-center">
                            <form class="text-center" action="{{route('jenis.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('jenis.edit',$data->id)}}" class="btn btn-warning fa fa-edit"></a>
                                    <button type="submit" class="btn btn-danger fa fa-trash delete-confirm"></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
