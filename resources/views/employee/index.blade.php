@extends('layouts.app')

@section('content')
<div class="container">
        
    @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
    <div class="row">

            <a href="{{ route('employee.create') }}" class="btn btn-success">Add Employee</a>
        
        
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Birthdate</th>
                <th>Gender</th>
                <th>Contact</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($emps as $emp)
            <tr>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->birthdate }}</td>
                <td>{{ $emp->gender }}</td>
                <td>{{ $emp->contact }}</td>
                <td>{{ $emp->department }}</td>
                <td>{{ $emp->status }}</td>
                <td>
                    <form action="{{ route('employee.destroy', $emp->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('employee.edit', $emp->id) }}">UPDATE </a>
                        <a class="btn btn-primary" href="{{ route('employee.show', $emp->id) }}">SHOW </a>

                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger"> DELETE </button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

     {!! $emps->links() !!}
</div>
@endsection