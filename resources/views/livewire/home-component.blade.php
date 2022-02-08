<div class="container mx-auto bg-cover bg-center py-6 mt-2 h-96 rounded-md flex items-center"
style="background-image: url('https://images.squarespace-cdn.com/content/v1/5efb7e97ca17d04786ab57ca/1593876832748-OBK2YNMQI2YPSEDRZSEI/Teifi_Cheese_1.jpg')"
 >
  <div class="sm:ml-20 text-gray-50 text-center sm:text-left">
    <h1 class="text-5xl font-bold mb-4">
  The tastiest ever! <br />
      
    </h1>
    <p class="text-lg inline-block sm:block">Just say Cheese!</p>
    <button class="mt-8 px-4 py-2 bg-gray-600 rounded"><a href="{{route('cheeses.cheeseList')}}">Order Now</a></button>
  </div>
</div>
    <main class="py-16 container mx-auto px-6 md:px-0">
      <section>
       
        <div class="container px-5 py-24 mx-auto bg-gray-600">
            <div class="flex flex-wrap w-full mb-8">
              <div class="w-full mb-6 lg:mb-0">
                <h1 class="sm:text-4xl text-5xl font-bold font-medium title-font mb-2 text-white">Latest Collection</h1>
                <div class="h-1 w-20 bg-gray-500 rounded"></div>
              </div>
            </div>
          
                
            <div class="flex flex-wrap -m-4">
                @foreach ($cheeses as $cheese)
              <div class="lg:w-1/4 p-4 w-1/2">
                <a class="block relative h-48 rounded overflow-hidden">
                  <img alt="" class="object-cover object-center w-full h-full block"
                   src="{{ asset($cheese->image) }}">
                </a>
                <div class="mt-4">
                  <h3 class="text-white text-xs tracking-widest title-font mb-1">Cheese Type: {{$cheese->cheesetype->type}}</h3>
                  <h2 class="text-white title-font text-lg font-medium">{{$cheese->name}}</h2>
                  <p class="mt-1 text-white">£{{$cheese->price}}</p>
                  <button class="mt-1 bg-yellow-500 px-5 rounded text-white text-lg">
                    <a href="{{ route('cheeses.cheeseDetails', ['id' => $cheese->id, 'name' => $cheese->name]) }}" class="no-underline">
                     View 
                    </a>
            </button>
                </div>
              </div>
              @endforeach
          
              </div>
            </div>
          </div>
        <hr class="w-40 my-14 border-4 rounded-md sm:mx-0 mx-auto" />
      </section>
    </main>
     
   
