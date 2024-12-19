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
        <form action="/mahasiswa/edit/update/{{ $data->mahasiswa_id }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="npm" class="form-label">npm</label>
                <input name="npm" type="text" class="form-control" id="npm" disabled value="{{ $data->npm }}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $data->username }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">fakultas</label>
                <input name="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror" id="fakultas" value="{{ $data->fakultas }}">
                @error('fakultas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">jurusan</label>
                <input name="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" value="{{ $data->jurusan }}">
                @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="born" class="form-label">born</label>
                <input name="born" type="date" class="form-control @error('born') is-invalid @enderror" id="born" value="{{ $data->born }}">
                @error('born')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">phone</label>
                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $data->phone }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">address</label>
               <textarea name="address" id="address" rows="10" class="form-control @error('address') is-invalid @enderror">{{ $data->address}}</textarea>
               @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning w-100">Update</button>

        </form>
    </div>
    

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
</body>
</html>