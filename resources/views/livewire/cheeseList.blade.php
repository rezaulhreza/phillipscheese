<x-guest-layout>
<main class="py-16 container mx-auto px-6 md:px-0">
    <section>
     
      <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap w-full mb-8">
            <div class="w-full mb-6 lg:mb-0">
              <h1 class="sm:text-4xl text-5xl font-bold font-medium title-font mb-2 text-gray-900">Browse Exciting Cheese!</h1>
              <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
          </div>
          @foreach ($cheeses as $cheese)
              
          @endforeach
          <div class="flex flex-wrap -m-4">
            <div class="lg:w-1/4 p-4 w-1/2">
              <a class="block relative h-48 rounded overflow-hidden">
                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://star-name-registry.com/blog/images/d/0/1/f/a/d01faec7ef04415eec34c1bfe61913e167fb26c7-snr-blog-37-resized.jpg">
              </a>
              <div class="mt-4">
                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">Name</h3>
                <h2 class="text-gray-900 title-font text-lg font-medium">{{$cheese->name}}</h2>
                <p class="mt-1">£{{$cheese->price}}</p>
              </div>
            </div>
            
        
            </div>
          </div>
        </div>
      <hr class="w-40 my-14 border-4 rounded-md sm:mx-0 mx-auto" />
    </section>
  </main>

</x-guest-layout>