@extends('layouts.admin')

@section('title')
    Editing {{ $user->name }}
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Editing {{ $user->name }}
                        </div>

                        @if(Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('adminEditUserPost', $user->id) }}" method="POST">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Name</label>
                                            <input id="normal-input" class="form-control" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Email</label>
                                            <input id="normal-input" class="form-control" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Author</label>
                                            <input style="width: auto;" id="normal-input" type="checkbox" class="form-control" name="author" {{ $user->author == true ? 'checked' : '' }}>
                                            <label for="normal-input" class="form-control-label">Admin</label>
                                            <input style="width: auto;" id="normal-input" type="checkbox" class="form-control" name="admin" {{ $user->admin == true ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Update user</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection