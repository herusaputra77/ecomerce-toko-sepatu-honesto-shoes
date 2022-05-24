@extends('admin.app')
@section('judul', 'User')
@section('content')
    {{-- <div class="container"> --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $s)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $s->name }}</td>
                                <td>{{ $s->email }}</td>
                                <td>{{ $s->role }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}



@endsection
