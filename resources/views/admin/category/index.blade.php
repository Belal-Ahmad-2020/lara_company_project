<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Categories') }}
            
            <strong class="float-right"> 
                Total Categories
                <span class="badge badge-danger"></span>
            </strong>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container-fluid">
            <div class="row">                            

                {{-- all categories --}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                          All Categories
                        </div>
                        <div class="card-body text-center">
                          {{-- alert --}}
                              @if (session('success'))                                                              
                                <div class="alert alert-success alert-dismissible fade show  mb-2" role="alert">                               
                                  <strong>{{ session('success') }}</strong>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>                                  
                                </div>
                              @endif                            
                                <table class="table table-hover  text-center">
                                    <thead>
                                      <tr class="text-secondary ">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>                                                                                
                                        <th scope="col">User</th>                                                                                
                                        <th scope="col">Create At</th>                                                                                
                                        <th scope="col" colspan="2">Action</th>                                                                                
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($cat as $c)
                                      <tr class="text-info  bg-white">
                                        <th scope="row">{{ $c->id }}</th>
                                        <td>{{ $c->category_name }}</td>
                                        <td>{{ $c->user->name }}</td>
                                        <td>
                                          @if ($c->created_at == NULL)
                                            <p class="text-danger">No Date</p>
                                          @else
                                            {{ $c->created_at->diffForHumans() }}  
                                          @endif                                          
                                        </td>
                                        <td>
                                          <a href="{{ url('category/'.$c->id.'/edit') }}" class="btn btn-info">Edit</a>
                                        </td>
                                        <td>  
                                          <form action="/category/{{ $c->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>                                        
                                          </form>                                                                                      
                                        </td>
                                        
                                    </tr>
                                      @empty
                                        <p>
                                          No Category Found!
                                        </p>
                                      @endforelse                                      
                                    </tbody>
                                  </table>   
                                  
                                  {{-- pagination --}}
                                  {{ $cat->links() }}
                              </div>
                      </div>
                </div>
                {{-- end all categories --}}

                {{-- add category --}}
                <div class="col-md-3">
                    <div class="card ">
                        <div class="card-header bg-success text-center text-white">
                          Add Category
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
                            <form method="POST" action="{{ route('category.store') }}">
                                @csrf
                                <div class="form-group">
                                  <label for="cat_name">Category Name</label>
                                  <input type="text" class="form-control" name="category_name" id="cat_name"  placeholder="Category Name ..." aria-describedby="nameError">
                                    {{-- @error('category_name')
                                        <small id="nameError" class="form-text text-danger">{{ $message }}</small>      
                                    @enderror                                   --}}
                                </div>
  
                                <input type="submit" value="Add Category" class="btn btn-success btn-md btn-block">
                              </form>
                        </div>
                      </div>
                </div>
                {{-- ENd Add Category --}}

            </div>
        </div>

        <br><br><br><hr>
        {{-- Trash List --}}
        <div class="container">
          <div class="row">                            

              <div class="col-md-10">
                  <div class="card">
                      <div class="card-header text-center bg-warning text-white">
                        Trash List
                      </div>
                      <div class="card-body text-center">
                        {{-- alert --}}
                             @if (session('forceDelete'))                                                              
                              <div class="alert alert-success alert-dismissible fade show  mb-2" role="alert">                               
                                <strong>{{ session('forceDelete') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>                                  
                              </div>
                            @endif                             
                              <table class="table table-hover  text-center">
                                  <thead>
                                    <tr class="text-secondary ">
                                      <th scope="col">#</th>
                                      <th scope="col">Name</th>                                                                                
                                      <th scope="col">User</th>                                                                                
                                      <th scope="col">Create At</th>                                                                                
                                      <th scope="col" colspan="2">Action</th>                                                                                
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @forelse ($trashCat as $trash)
                                    <tr class="text-info  bg-white">
                                      <th scope="row">{{ $trash->id }}</th>
                                      <td>{{ $trash->category_name }}</td>
                                      <td>{{ $trash->user->name }}</td>
                                      <td>
                                        @if ($trash->created_at == NULL)
                                          <p class="text-danger">No Date</p>
                                        @else
                                          {{ $trash->created_at->diffForHumans() }}  
                                        @endif                                          
                                      </td>
                                      <td>                                                                             
                                        <a href="{{ url('/categoryRestore/'.$trash->id) }}" class="btn btn-success">Restore</a>                                                      
                                      </td>
                                      <td>
                                        <a href="{{ url('/categoryForceDelete/'.$trash->id) }}" class="btn btn-danger">Delete</a>                                                      
                                      </td>
                                  </tr>
                                    @empty
                                      <p>
                                        No Category Found!
                                      </p>
                                    @endforelse                                      
                                  </tbody>
                                </table>   
                                
                                {{-- pagination --}}
                                {{ $trashCat->links() }}
                            </div> 
                    </div>
              </div>


          </div>
      </div>
      {{-- end Trash LIst --}}
    </div>
</x-app-layout>
