@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset( $user ) ? 'Edit User Info' : 'Add User' }}</div>

                <div class="card-body">
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                    <form method="POST" action="{{ isset( $user ) ? route('user.update',$user->id) : route('user.store') }}">
                        @if(isset( $user ))
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$user->id}}">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ isset( $user ) ? $user->name : ''}}" class="form-control"placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" value="{{ isset( $user ) ? $user->email : '' }}"  class="form-control" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ isset( $user ) ? 'Update User' : 'Add User' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection