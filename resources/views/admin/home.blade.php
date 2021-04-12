@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <p style="text-align: center;color: green;font-weight: bold;font-size: medium;"> {{ $message }}</p>
                @endif
                <div class="card">
                    <div class="card-header">Students List</div>

                    <div class="card-body">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <th scope="row">{{ $student->studentId }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->birthDate }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->email }}</td>
                                <td>@if(!$student->isActive)
                                        <div class="mng-icons"><form style="display: inline-block;" action="{{ route('approveStudent', $student->studentId) }}" method="post">
                                                @csrf
                                                <button class="btn btn-default" type="submit"><i class="fas fa-check"></i></button>
                                            </form>
                                        <form style="display: inline-block;" action="{{ route('removeStudent', $student->studentId) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-default" type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form></div>
                                    @else
                                        <p style="color: green;font-weight: bold;font-size: medium;"> Approved</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
