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

@section('content')
<div class="panel panel-default col-md-12">
    <div class="panel-heading"> Anggota
        <a href="{{ route('jenis.index') }}" class="btn btn-default" style="float: right;"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <form role="form" action="{{ route('jenis.update',$jenis->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Id Card</label>
                    <input class="form-control boxed" placeholder="Id Card" required="required" name="id_card" type="text" value="{{ $id_card }}" id="id_card" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Pengurus</label>
                    <input value="{{ $jenis->nama_anggota }}" type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input value="{{ $jenis->no_telepon }}" type="text" name="no_telepon" class="form-control" placeholder="No Telepon">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="5" placeholder="Alamat">{{ $jenis->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-default" type="reset">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

@endsection
