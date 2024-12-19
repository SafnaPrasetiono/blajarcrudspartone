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
            <h1>Mahasiswa Data</h1>
        </div>

        <div class="mb-3">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">TAMBAH</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">npm</th>
                        <th scope="col">username</th>
                        <th scope="col">fakultas</th>
                        <th scope="col">juruan</th>
                        <th scope="col">born</th>
                        <th scope="col">phone</th>
                        <th scope="col">address</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $index => $items)
                        <tr class="">
                            <td scope="row">{{ $index + 1 }}</td>
                            <td>{{ $items->npm }}</td>
                            <td>{{ $items->username }}</td>
                            <td>{{ $items->fakultas }}</td>
                            <td>{{ $items->jurusan }}</td>
                            <td>{{ $items->born }}</td>
                            <td>{{ $items->phone }}</td>
                            <td>{{ $items->address }}</td>
                            <td>
                                <a href="/mahasiswa/lihat/{{ $items->mahasiswa_id }}" class="btn btn-primary">lihat</a>
                                <a href="/mahasiswa/edit/{{ $items->mahasiswa_id }}" class="btn btn-warning">Edit</a>
                                <button type="button" onclick="deleteitm({{ $items->mahasiswa_id }})"
                                    class="btn btn-danger">delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>


    <script src="{{ asset('assets/dist/js/jquery.js') }}"></script>
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


    <script>
        function deleteitm(e) {
            console.log(e);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be delete this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/mahasiswa/delete/" + e,
                    }).done(function() {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                        window.location.href = '{{ route('index') }}';
                    });
                }
            });
        }
    </script>
</body>

</html>
