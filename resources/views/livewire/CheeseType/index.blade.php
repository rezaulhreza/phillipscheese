<x-app-layout>
  <form action="" method="get">
            <div class="w-1/3 h-10 pl-3 pr-2 m-2 bg-white mx-auto py-6 px-8   flex justify-between items-center relative">
              <input type="search" name="search" id="search" placeholder="Search"
                     class="appearance-none w-full outline-none focus:outline-none active:outline-none"
                     value=""
                     />
              <button type="submit" class="ml-1 outline-none focus:outline-none active:outline-none">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24" class="w-6 h-6">
                  <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </button>
            </div>
          </form>
          <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-sm mx-8">
        <h1 class="max-w-7xl mx-auto py-6 px-8 m-4 sm:px-6 lg:px-8 mb-8 text-xl">
             {{'Manage Cheese Type'}}
    </div>
    
    <div>
      

   
    
      
      
    
          @include('livewire.CheeseType.create')
        
      
        <table class="table table-bordered mt-5 mx-auto py-6 px-8">
            <thead>
                <tr>
                    
                    <th>Type Name</th>
                    <th>Created</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
  @foreach ($cheesetype as $type)
      

                <tr>
                    
                    <td>{{ $type->type }}</td>
                    <td>{{ $type->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('cheesetype.edit', $type->id)}}" class="btn bg-gray-700 text-white btn-sm">Edit</a>
                    <form action="{{ route('cheesetype.destroy', $type->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </td>
            
                </tr>
                @endforeach
                {{ $cheesetype->links() }}
            </tbody>
        </table>
    </div>
            </div>
          </div>
    </x-app-layout>