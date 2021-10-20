@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            
                
                {{-- edit slider --}}
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Edit Service
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ url('service/'.$service->id) }}" >
                                @csrf
                                @method('PUT')                                                                

                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" name="title" id="title"  placeholder="Title ..." 
                                  aria-describedby="nameError" value="{{ $service->title }}">
                                    @error('title')
                                    <small id="nameError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>

                                
                                <div class="form-group">
                                    <label for="description" Description</label>
                                    <textarea rows="10" cols="80" type="text" class="form-control" name="description" id="description"  placeholder="Short Description ..." 
                                    aria-describedby="nameError" >
                                        {{  $service->description }}
                                    </textarea>
                                      @error('description')
                                      <small id="nameError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                          {{ $message }}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>                                    
                                      </small>                                            
                                      @enderror        
                                  </div>


                        
  
                                <input type="submit" value="Update Service " class="btn btn-success btn-md btn-block"> 
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd edit Slider --}}

            </div>
        </div> 
    </div>

@endsection