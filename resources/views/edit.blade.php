@extends('layouts.main')
@section('insides')
    <div class="container mt-2">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif

        <div class="alert alert-dark" role="alert" style="text-align: center">
            Edit Students
        </div>
        <form action="{{route('update', $student->id)}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputText">First Name</label>
                <input class="form-control" type="text" value="{{$student->first_name}}" placeholder="first name" name="firstname">
            </div>
            <div class="form-group">
                <label for="exampleInputText">Last Name</label>
                <input class="form-control" type="text" value="{{$student->last_name}}" placeholder="last name" name="lastname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" value="{{$student->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputText">Phone number</label>
                <input class="form-control" type="text" value="{{$student->phone}}" placeholder="phone number" name="phonenumber">
            </div>

            <button type="submit" class="btn btn-primary">Update data</button>
        </form>
    </div>
@endsection
