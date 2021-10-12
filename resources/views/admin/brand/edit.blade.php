<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Brand') }}
            
            <strong class="float-right"> 
                Total Brands
                <span class="badge badge-danger"></span>
            </strong>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            
                <div class="col-md-3"></div>
                {{-- edit brnad --}}
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Edit Brand
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                   
                            @endif
                            <form method="POST" action="{{ url('brand/'.$brand->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- old image --}}
                                <input type="hidden"  value="{{ $brand->brand_image }}" name="old_image" id="">

                                <div class="form-group">
                                  <label for="brand_name">Brand Name</label>
                                  <input type="text" class="form-control" name="brand_name" id="brand_name"  placeholder="Brand Name ..." 
                                  aria-describedby="nameError" value="{{ $brand->brand_name }}">
                                    @error('brand_name')
                                    <small id="nameError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>

                                <div class="form-group">
                                    <label for="brand_image">Brand Image</label>                                    
                                    <input type="file" class="form-control" name="brand_image" id="brand_image" 
                                    aria-describedby="imageError" value="{{ asset($brand->brand_image) }}">    
                                    @error('brand_image')
                                    <small id="imageError" class="alert alert-danger form-text alert-dismissible fade show  mb-2" role="alert">                                       
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </small>                                            
                                    @enderror        
                                </div>                                          
                                
                                <div class="form-group">
                                    <img src="{{ asset($brand->brand_image) }}" width="300" height="300" class="img img-responsive" alt="">
                                </div>
  
                                <input type="submit" value="Update Brand" class="btn btn-success btn-md btn-block"> 
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd edit brnad --}}

            </div>
        </div> 
    </div>
</x-app-layout>
