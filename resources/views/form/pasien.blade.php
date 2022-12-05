@extends('landing-page.index')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
        	@if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
			<form method="POST" action="{{ route('pasien.store')}}" enctype="multipart/form-data">
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Pasien</label>
			    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
			    name="nama_pasien" value="{{ old('nama_pasien') }}">
			    @error('nama_pasien')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
			  </div>
			  <div class="form-group col-md-4">
      			<fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-10">
                        @foreach($ar_gender as $gender)
                        @php
                            $cek = (old('gender') == $gender)? 'checked':'';
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input @error('gender') is-invalid @enderror"  type="radio" name="gender" value="{{ $gender }}" {{ $cek }}>
                            <label class="form-check-label" for="gridRadios1">
                                {{ $gender }}
                            </label>
                        </div>
                        @endforeach
                        @error('gender')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </fieldset>
    		  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Tempat Lahir</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tmp_lahir" value="{{ old('tmp_lahir') }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Tanggal Lahir</label>
			    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
			    name="tgl_lahir" value="{{ old('tgl_lahir') }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
			    name="email" value="{{ old('email') }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">No Telepon</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_hp" value="{{ old('no_hp') }}">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Alamat</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ old('alamat') }}</textarea>
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlFile1">Foto</label>
			    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
			  </div>
			  <div class="form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div>
				<a class="btn btn-danger" title="Export to PDF Pasien" href="{{ url('pasien-pdf') }}">
					<i class="bi bi-file-earmark-pdf"></i>
				</a>&nbsp;
				<a class="btn btn-success" title="Export to Excel Pasien" href="{{ url('pasien-excel') }}">
					<i class="bi bi-file-earmark-excel"></i>
				</a>&nbsp;
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	  </div>
	</section>

@endsection