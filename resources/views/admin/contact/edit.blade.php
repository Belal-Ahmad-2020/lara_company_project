@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            
                
                {{-- edit slider --}}
                <div class="col-md-10 col-lg-10 col-sm-12">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Edit Contact Information
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ url('contact/'.$contact->id) }}" >
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" value="{{ $contact->email }}" name="email" id="email"  placeholder="Email Address" aria-describedby="emailErr" required>
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
                                    <input type="text" class="form-control" value="{{ $contact->phone }}" name="phone" id="phone"  placeholder="Phone" aria-describedby="phoneErr" required>
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
                                        {{ $contact->address }}
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
                                
                            

                                <input type="submit" value="Update Contact Information" class="btn btn-success btn-md btn-block"> 
                              </form>                
                        </div>
                      </div>
                </div>
                {{-- ENd edit Slider --}}

            </div>
        </div> 
    </div>

@endsection