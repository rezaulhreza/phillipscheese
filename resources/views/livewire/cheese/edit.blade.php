<x-app-layout>

    <div class="mt-5">
        <form method="post" action="{{ route('cheese.update', $cheese->id) }}">
            @csrf
            @method('PATCH')
        <div class="form  mx-8">
    
            <div class="text-2xl font-bold">Edit Cheese</div>
            <div class="md:flex flex-row justify-items space-between md:space-x-4 w-full text-xs">
                <div class="row text-lg">
                    <div class="col-span-6 sm:col-span-4">
                        <label class="block text-sm font-medium text-gray-700">Cheese Type</label>
                        <select id="cheese_type_id" name="cheese_type_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" @change="changeCategory">
                          <option value="">Select Cheese Type</option>
                          @foreach ($cheesetypes as $cheesetype)
                         
                          <option value="{{ $cheesetype->id }}" {{ $cheesetype->id == $cheese->cheese_type_id ? 'selected' : '' }}>{{ $cheesetype->type }}</option>
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
                        <input value="{{ $cheese->name }}"  wire:model="name" placeholder="Cheese Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="name" id="name">
                        
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                  
                    <div class="mb-3 space-y-2 w-full text-lg">
                        <label class="font-semibold  text-gray-600 py-2">Cheese Price<abbr title="required">*</abbr></label>
                        <input value="{{ $cheese->price }}" wire:model="price" placeholder="Cheese price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="price" id="price">
                        
                        @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
    
                    <div class="mb-3 space-y-2 w-full text-lg">
                        <label class="font-semibold  text-gray-600 py-2">Cheese Weight (in grams)<abbr title="required">*</abbr></label>
                        <input value="{{ $cheese->weight}}" wire:model="weight" placeholder="Cheese Weight" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="numeric" name="weight" id="weight">
                        
                        @error('weight') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
    
                    <div class="mb-3 space-y-2 w-full text-lg">
                        <label class="font-semibold  text-gray-600 py-2">Cheese Stock<abbr title="required">*</abbr></label>
                        <input value="{{ $cheese->stock }}" wire:model="stock" placeholder="Cheese stock" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="number" name="stock" id="stock">
                        
                        @error('stock') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="md:flex flex-row justify-items space-between md:space-x-4 w-full text-xs">
                    <div class="mb-3 space-y-2 w-full text-lg">
                        <label class="font-semibold  text-gray-600 py-2">Cheese Description<abbr title="required">*</abbr></label>
                        <textarea wire:model="description" placeholder="Cheese Description" class="resize appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="description" id="description">
                           {{$cheese->description }}
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