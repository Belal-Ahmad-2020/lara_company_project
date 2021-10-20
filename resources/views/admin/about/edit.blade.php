@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            
                
                {{-- edit slider --}}
                <div class="col-md-10 col-lg-10 col-sm-12">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Edit About Data
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ url('about/'.$about->id) }}" >
                                @csrf
                                @method('PUT')                                                                

                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" name="title" id="title"  placeholder="Title ..." 
                                  aria-describedby="nameError" value="{{ $about->title }}">
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
                                    <label for="description">Short Description</label>
                                    <textarea type="text" class="form-control" name="short_des" id="description"  placeholder="Short Description ..." 
                                    aria-describedby="nameError" >
                                        {{  $about->short_des }}
                                    </textarea>
                                      @error('short_des')
                                      <small id="nameError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                          {{ $message }}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>                                    
                                      </small>                                            
                                      @enderror        
                                  </div>


                                  <div class="form-group">
                                    <label for="description">Long Description</label>
                                    <textarea type="text" class="form-control" name="long_des" id="description"  placeholder="Long Description ..." 
                                    aria-describedby="desError" >
                                        {{  $about->long_des }}
                                    </textarea>
                                      @error('long_des')
                                      <small id="desError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                          {{ $message }}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>                                    
                                      </small>                                            
                                      @enderror        
                                  </div>

                        
  
                                <input type="submit" value="Update About Data" class="btn btn-success btn-md btn-block"> 
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd edit Slider --}}

            </div>
        </div> 
    </div>

@endsection