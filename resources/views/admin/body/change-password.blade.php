@extends('layouts.backend.app')

@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom text-center bg-success text-white">
        <h2 class=" text-white ">Change Password</h2>
    </div>
    <div class="card-body">
        {{-- alert --}}
        @if (session('error'))                                                              
        <div class="alert alert-danger alert-dismissible fade show  mb-2" role="alert">                               
            <strong>{{ session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>                                  
        </div>
        @endif
  
        <form class="form-pill" method="GET" action="{{ route('password.update')  }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password" required>

                @error('current')
                <small id="desErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                                    
                </small>                                            
                @enderror    
            </div>

            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="New Password" required>

                @error('new')
                <small id="desErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                                    
                </small>                                            
                @enderror    
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect3">Confirm Password </label>     
                <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation" placeholder="Confirm Password" required>

                @error('confirm')
                <small id="desErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>                                    
                </small>                                            
                @enderror    
            </div>

            <input type="submit" class="btn btn-success btn-block" value="Submit">
        </form>
    </div>
</div>
@endsection    
