<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Images') }}                 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            

                {{-- all images --}}
                <div class="col-md-8">                                                              
                          {{-- alert --}}
                              @if (session('success'))                                                              
                                <div class="alert alert-success alert-dismissible fade show  mb-2" role="alert">                               
                                  <strong>{{ session('success') }}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>                                  
                                </div>
                              @endif                            
                              
                              @forelse ($images as $image)                                
                                    <img src="{{ asset($image->image) }}" name="img img-responsive"  class="card-img-top" alt="..." 
                                    style="width:260px; height:200px; margin-left:5px; display:inline">                                   
                              @empty
                                  <p>No Images!</p>
                              @endforelse
                      
                </div>
                {{-- end all images --}}

                {{-- add images --}}
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Add New Image
                        </div>
                        <div class="card-body ">
                            @if ($errors->any())                            
                            <div class="alert alert-danger alert-dismissible fade show  mb-2" role="alert">
                                @foreach ($errors->all() as $error)
                                <strong>{{ $error }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                @endforeach
                              </div>
                            @endif
                            <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="image">Image</label>
                                  <input type="file" class="form-control" name="image[]" id="image"   aria-describedby="nameError" multiple>
                                    {{-- @error('image')
                                        <small id="nameError" class="form-text text-danger">{{ $message }}</small>      
                                    @enderror                                   --}}
                                </div>
  
                                <input type="submit" value="Add Image" class="btn btn-success btn-md btn-block">
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd Add Category --}}

            </div>
        </div>
    </div>
</x-app-layout>
