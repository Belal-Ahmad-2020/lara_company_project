<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            <strong>Hi ...</strong> {{ Auth::user()->name }}
            <strong class="float-right"> 
                Total Users
                <span class="badge badge-danger">{{ count($users) }}</span>
            </strong>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="containser">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered  text-center">
                            <thead>
                              <tr class="text-secondary bg-white">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Registeration Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php($i=1)
                              @foreach ($users as $user)                                                                
                                <tr class="text-info  bg-white">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    {{-- <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>  while using Query builder  --}}
                                </tr>
                              @endforeach  
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</x-app-layout>
