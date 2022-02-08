<div class="mt-5">
    <form action="{{route('cheesetype.store')}}" method="post">
        @csrf
    <div class="form w-1/3 mx-8">
    
            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                <div class="mb-3 space-y-2 w-full text-lg">
                    <label class="font-semibold  text-gray-600 py-2">Create a cheese type <abbr title="required">*</abbr></label>
                    <input wire:model="type" placeholder="Type Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"  type="text" name="type" id="type">
                    
                    @error('type') <span class="text-red-500">{{ $message }}</span>@enderror
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
            