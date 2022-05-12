<x-app-layout>

<div class="mt-5">
    <form action="{{route('cheese.store')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form  mx-8">

        <div class="text-2xl font-bold">Create Cheese</div>
        <div class="md:flex flex-row justify-items space-between md:space-x-4 w-full text-xs">
            <div class="row text-lg">
                <div class="col-span-6 sm:col-span-4">
                    <label class="block text-sm font-medium text-gray-700">Cheese Type</label>
                    <select id="vehiccheese_type_id" name="cheese_type_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" @change="changeCategory">
                      <option value="">-- Select Cheese Type --</option>
                      @foreach ($cheesetypes as $cheesetype)
                      <option value="{{ $cheesetype->id }}" data-val="{{ $cheesetype->id }}">{{ $cheesetype->type }}</option>
                      @endforeach
                    </select>
                    @error('cheese_type_id')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                  </div>
            
            </div>
          
        </div>
       
            <div class="md:flex flex-row justify-items space-between md:space-x-4 w-full text-xs">
                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Cheese Name<abbr title="required">*</abbr></label>
                    <input wire:model="name" placeholder="Cheese Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="name" id="name">
                    
                    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Upload Image<abbr title="required">*</abbr></label>
                    <input wire:model="image" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="file" name="image" id="image">
                    
                    @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
              
                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Cheese Price<abbr title="required">*</abbr></label>
                    <input wire:model="price" placeholder="Cheese price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="price" id="price">
                    
                    @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Cheese Weight (in grams)<abbr title="required">*</abbr></label>
                    <input wire:model="weight" placeholder="Cheese Weight" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="numeric" name="weight" id="weight">
                    
                    @error('weight') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Cheese Stock<abbr title="required">*</abbr></label>
                    <input wire:model="stock" placeholder="Cheese stock" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="stock" id="stock">
                    
                    @error('stock') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="md:flex flex-row justify-items space-between md:space-x-4 w-full text-xs">
                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Cheese Description<abbr title="required">*</abbr></label>
                    <textarea wire:model="description" placeholder="Cheese Description" class="resize appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="description" id="description">
                    </textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
              
            </div>
           
            
   
                    <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                        asterisk <abbr title="Required field">*</abbr></p>
                    <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                        <button class="mb-2 md:mb-0 bg-red-500 px-5 py-2 text-sm text-white shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">Cancel </button>
                        <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit">Save</button>
                    </div>
                </div>
            </form>
            </div>
</x-app-layout>