@extends('layouts.backend.app')

@section('content')
    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            
                
                {{-- edit slider --}}
                <div class="col-md-10 col-lg-10 col-sm-12">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Edit SLider
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ url('slider/'.$slider->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- old image --}}
                                <input type="hidden"  value="{{ $slider->image }}" name="old_image" id="">

                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" name="title" id="title"  placeholder="Title ..." 
                                  aria-describedby="nameError" value="{{ $slider->title }}">
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
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" name="description" id="description"  placeholder="Description ..." 
                                    aria-describedby="nameError" >
                                        {{  $slider->description }}
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

                                <div class="form-group">
                                    <label for="image">Image</label>                                    
                                    <input type="file" class="form-control" name="image" id="image" 
                                    aria-describedby="imageError" >  
                                    <br><br>                                    
                                    @error('image')
                                    <small id="imageError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>                                          
                                
                                <div class="form-group">
                                    <img src="{{ asset($slider->image) }}" width="300" height="300" class="img img-responsive" alt="">
                                </div>
  
                                <input type="submit" value="Update Slider" class="btn btn-success btn-md btn-block"> 
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd edit Slider --}}

            </div>
        </div> 
    </div>

@endsection