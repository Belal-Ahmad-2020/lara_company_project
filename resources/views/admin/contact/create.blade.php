@extends('layouts.backend.app')

@section('content')
<div class="py-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">                
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Contact Profile
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ route('contact.store') }}" >
                                @csrf
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" name="email" id="email"  placeholder="Email Address" aria-describedby="emailErr" required>
                                    @error('email')
                                    <small id="emailErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"  placeholder="Phone" aria-describedby="phoneErr" required>
                                      @error('phone')
                                      <small id="phoneErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                          {{ $message }}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>                                    
                                      </small>                                            
                                      @enderror        
                                  </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" name="address" id="address" placeholder="Address" aria-describedby="desErr">
                                    </textarea> 
                                    @error('address')
                                    <small id="desErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div> 
                                
                            

                                <input type="submit" value="Add Contact Information" class="btn btn-success btn-md btn-block"> 
                              </form>                       
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection