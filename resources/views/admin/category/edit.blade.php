<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}            
   
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="containser">
            <div class="row">                            
                <div class="col-md-4"></div>
                {{-- add category --}}
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Edit Category
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
                            <form method="POST" action="/category/{{ $cat->id }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="cat_name">Category Name</label>
                                  <input type="text" class="form-control" name="category_name" value="{{ $cat->category_name }}" id="cat_name" 
                                   placeholder="Category Name ..." aria-describedby="nameError">
                                    {{-- @error('category_name')
                                        <small id="nameError" class="form-text text-danger">{{ $message }}</small>      
                                    @enderror                                   --}}
                                </div>
  
                                <input type="submit" value="Update Category" class="btn btn-success btn-md btn-block">
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd Add Category --}}
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>
</x-app-layout>
