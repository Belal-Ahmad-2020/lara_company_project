@extends('layouts.backend.app')

@section('content')
<div class="py-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">                
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Add About Data
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ route('about.store') }}" >
                                @csrf
                                <div class="form-group">
                                  <label for="title">Title</label>
                                  <input type="text" class="form-control" name="title" id="title"  placeholder="Title ..." aria-describedby="titleErr">
                                    @error('title')
                                    <small id="titleErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>

                                <div class="form-group">
                                    <label for="short_des">Short Description</label>
                                    <textarea type="text" class="form-control" name="short_des" id="description" placeholder="Short Description" aria-describedby="desErr">
                                    </textarea> 
                                    @error('short_des')
                                    <small id="desErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div> 
                                
                                <div class="form-group">
                                    <label for="short_des">Long Description</label>
                                    <textarea rows="10" type="text" class="form-control" name="long_des" id="description" placeholder="Short Description" aria-describedby="desLonErr">                                        
                                    </textarea> 
                                    @error('long_des')
                                    <small id="desLonErr" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div> 
   

                                <input type="submit" value="Add About" class="btn btn-success btn-md btn-block"> 
                              </form>                       
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection