@extends('layout.template')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Data Mahasiswa</h2>

        <!-- Tabel dengan variasi -->
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Eka</td>
                    <td>1234</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Nafi</td>
                    <td>1234</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Prameysti</td>
                    <td>1234</td>
                    <td>A</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>emm siapa lagi yak</td>
                    <td>1234</td>
                    <td>B</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
