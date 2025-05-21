@extends('layout.template')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Database Points</h2>

        <!-- Tabel dengan variasi -->
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <!--loop points data-->
                @foreach ($points as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->description }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $p->image) }}" alt=""
                            width="200" title="{{ $p->image }}">
                        </td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
