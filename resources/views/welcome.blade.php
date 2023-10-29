@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <section class="max-w-6xl m-auto :tablet :laptop :desktop">
        <x-home.navbar />
     @if ($feature)
     <h1 class="text-center text-4xl font-bold mb-11 mt-5 desktop:text-4xl laptop:text-3xl tablet:text-2xl mobile:text-xl">FEATURED</h1>
     <div class="flex  items-center">
        <div>
             @if ($feature->image)
             <img class="rounded-lg h-[336px] max-w-[450px]" src="{{ asset('/storage/'. $feature->image) }}" alt="image">
         @else
             <img  class="rounded-lg h-[336px] max-w-[450px]" src="https://dummyimage.com/721x401" alt="blog">
         @endif
     </div>
     <div class="ml-10">
         <h3><b>Bussiness,Travel</b><span class="text-bilal"> -{{ $feature->created_at->format('d, M y') }}</span></h3>
        @if (strlen($feature->title)<=79)
        <h2 class="text-5xl font-bold mt-3">{{ $feature->title }}</h2>
        @else
            <h2 class="text-5xl font-bold mt-3">{{ substr($feature->title,0,75) }}</h2>    
        @endif
         @if (strlen($feature->content)<=224)
             <p class="mt-4 text-md text-gray-400">{{ $feature->content }}</p>
            @else
            <p class="mt-4 text-md text-gray-400">{{ substr($feature->content, 0, 221) }}...</p>
         @endif
         <div class="flex mt-2">
             <div class="h-[50px] w-[50px] bg-cover bg-center rounded-full" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
             <div class="flex flex-col ml-3">
                 <b>{{ $feature->user->name }}</b>
                 <span class="text-gray-400">CEO, Founder</span>
             </div>
         </div>
     </div>
     </div>
     @endif
        <div class="grid grid-cols-3 gap-5 mt-12 desktop:grid-cols-3 laptop:grid-cols-3 tablet:grid-cols-2 mobile:grid-cols-1">
            @foreach ($posts as $item)
                <a href="{{ route('posts', $item->slug) }}" class="flex flex-col">
                    @if ($item->image)
                        <img class="w-full rounded-lg mb-3 h-[250px] object-cover" src="{{ asset('/storage/'. $item->image) }}" alt="{{ $item->title }} image">
                    @else
                        <img class="lg:h-48 md:h-36 w-full mb-3 rounded-lg object-cover object-center" src="https://dummyimage.com/721x401" alt="blog">
                    @endif
                    <span><b>Bussiness,Travel</b> - {{ $item->created_at->format('d, M y') }}</span>
                    @if(strlen($item->title) <= 40)
                        <h3 class="text-lg mb-3">{{ $item->title }}</h3>
                    @else
                        <h3 class="text-lg mb-3">{{ substr($item->title, 0, 40) }}...</h3>
                    @endif
                    <div class="flex">
                        <div class="h-[50px] w-[50px] bg-center bg-cover rounded-full" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                        <div class="flex flex-col ml-3">
                            <b>{{ $item->user->name }}</b>
                            <span class="text-gray-400">CEO, Founder</span>
                        </div>
                    </div>

                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-2 gap-8 mt-16 desktop:grid-cols-2 laptop:grid-cols-2 tablet:grid-cols-2 mobile:grid-cols-1">
            <div>
                <h2 class="text-2xl font-bold">Sports</h2>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] bg-cover bg-center rounded-full" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] bg-cover bg-center rounded-full" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] bg-cover bg-center rounded-full" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] bg-cover bg-center rounded-full" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <h2 class="text-2xl font-bold">Bussiness</h2>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] rounded-full bg-cover bg-center" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] rounded-full bg-cover bg-center" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] rounded-full bg-cover bg-center" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="rounded-lg" src="https://preview.colorlib.com/theme/magdesign/images/img_4.jpg.webp"
                        width="30%">
                    <div class="ml-4">
                        <h3 class="mt-4"><b>Bussiness,Travel</b><span class="text-gray-400"> -July 2,2003</span></h3>
                        <h2 class="text-xl font-bold mb-3">Your most unhappy customers are <br> your greatest source of
                            learning.</h2>
                        <div class="flex mt-2">
                            <div class="w-[50px] h-[50px] rounded-full bg-cover bg-center" style="background-image: url('https://cache.desktopnexus.com/thumbseg/2487/2487414-bigthumbnail.jpg')"></div>
                            <div class="flex flex-col ml-2">
                                <b>Sergery Campbell</b>
                                <span class="text-gray-400">CEO and Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

        <x-home.footer />
    </section>
@endsection
