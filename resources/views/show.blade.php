<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container py-5">
        <div class="header mb-3">
            <h1>Detail Data Mahasiswa</h1>
        </div>
        <div>
            <div class="mb-3">
                <label for="npm" class="form-label">npm</label>
                <input name="npm" type="text" class="form-control" disabled id="npm" value="{{ $data->npm }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input name="username" type="text" class="form-control" disabled id="username" value="{{ $data->username }}">
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">fakultas</label>
                <input name="fakultas" type="text" class="form-control" disabled id="fakultas" value="{{ $data->fakultas }}">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">jurusan</label>
                <input name="jurusan" type="text" class="form-control" disabled id="jurusan" value="{{ $data->jurusan }}">
            </div>
            <div class="mb-3">
                <label for="born" class="form-label">born</label>
                <input name="born" type="date" class="form-control" disabled id="born" value="{{ $data->born }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">phone</label>
                <input name="phone" type="text" class="form-control" disabled id="phone" value="{{ $data->phone }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">address</label>
               <textarea name="address" id="address" rows="10" class="form-control" disabled>{{ $data->address}}</textarea>
            </div>

        </div>
    </div>
    

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>