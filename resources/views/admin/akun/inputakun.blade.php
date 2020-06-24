@extends('layouts.master')

@section('content')

<div class="panel panel-headline">				
    <div class="panel-heading">
		<h3 class="panel-title">Input Akun</h3>
	</div>
 
    

    	<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
                        <form action="{{(isset($akun))?route('akun.update', $akun->id):route('akun.store')}}" method="POST">
                            @csrf
                            @if(isset($akun))?@method('PUT')@endif
                        <div class="panel-body">
                        <label for="exampleFormControlInput1">Nama </label>
							<input type="text" value="{{(isset($akun))?$akun->name:old('name')}}" name="name" class="form-control" placeholder="Nama ... ">   
                            @error('name')<small style="color:red">{{$message}}</small>@enderror
                          <br>

                          <label for="exampleFormControlInput1">Email </label>
                            <input type="email" value="{{(isset($akun))?$akun->email:old('email')}}" name="email" class="form-control" placeholder="Email......">   
                            @error('email')<small style="color:red">{{$message}}</small>@enderror
                          <br>

                          <label for="exampleFormControlInput1">Tipe User</label>
							<select class="form-control" name="roles" value="{{(isset($akun))?$akun->roles:old('roles')}}">
								<option value="">Pilih Tipe User</option>
								<option value='["admin"]'>Admin</option>
								<option value='["kepala"]'>Kepala</option>
							</select>
                            @error('roles')<small style="color:red">{{$message}}</small>@enderror
								<br>

                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" value="{{(isset($akun))?$akun->password:old('password')}}" name="password" class="form-control"  placeholder="Password ... ">
                            @error('password')<small style="color:red">{{$message}}</small>@enderror
                                <br>
                            <input type="submit" class="btn btn-primary" value="Simpan">
						</div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    
</div>
@endsection