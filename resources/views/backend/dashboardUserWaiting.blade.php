<div class="page-header">
    <h1 class="page-title">User Detail</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('wbsCategory.index') }}">User Detail</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Detail Tabel</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form User Detail</h3>
            </div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{ route('storeUserDetail') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="number" class="form-control" required value="{{ @old('phone') }}" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" required class="form-control" id="">{{ @old('address') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control" id="" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            @foreach ($genders as $gender)
                                <option @selected(@old('gender')) value="{{ $gender }}">{{ $gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" value="{{ @old('jabatan') }}"
                            id="">
                    </div>
                    <div class="form-group">
                        <label>Instansi</label>
                        <input type="text" class="form-control" name="instansi" value="{{ @old('instansi') }}"
                            id="">
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
