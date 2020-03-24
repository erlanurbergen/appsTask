@extends('layouts.main')
@section('insides')
    @if(session('successMsg'))
        <div class="alert alert-success" role="alert" style="text-align: center">
            {{session('successMsg')}}
        </div>
    @endif
<div class="container mt-3">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phonenumber</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->first_name}}</td>
                <td>{{$student->last_name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->phone}}</td>
                <td><a href=" {{ route('edit', $student->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                    or

                    <form method="POST" id="delete-form- {{ $student->id }}" action="{{ route('delete', $student->id) }}" style="display: none">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                    </form>

                    <button onclick="if (confirm('Are you sure to delete this field')){

                        event.preventDefault();

                        document.getElementById('delete-form- {{ $student->id }}').submit();
                            }else {
                                event.preventDefault();
                        }

                          "><i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $students->links() }}
</div>
@endsection

