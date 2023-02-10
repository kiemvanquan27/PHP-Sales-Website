
@extends('layout-2.nav-pages')

@section('body')
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <body>
    <section class="bg-white dark:bg-gray-900">
        @foreach($sanpham as $key => $pham)
            <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img src="{{asset('public/uploads/hinhanh/'.$pham->hinhanh)}}" lass="img-fluid" alt="..." height="100%" width="100%">
                <div class="mt-4 md:mt-0">
                    <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                     MÃ SP : QD{{$pham->id}}VN
                    </button>
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{$pham->tensanpham}}</h2>
                    <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Mô Tả SP : {{$pham->motasanpham}}</p>
                    <form method='POST' action="/giohang/store">
                            @csrf  
                            <P >Giá Sản Phẩm : {{number_format($pham->gia).' '.'vnđ'}}</P>
                            <label class="mb-4 fw-semibold" >Số Lượng :</label>
                            <input name="soluong" type="number" min="1" value="1" />
                            <input name="gia" type="hidden"  value="{{$pham->gia}}" />
                            <input name="is_active" type="hidden"  value="on" />
                            <input name="size" type="hidden"  value="{{$pham->size}}" />
                            <input name="mau" type="hidden"  value="{{$pham->mau}}" />
                            @foreach($danhmuc as $key => $muc)
                            <input name="id_danhmuc" type="hidden"  value="{{$muc->id}}" />
                            @endforeach
                            @foreach($user as $key => $khach)
                            <input name="id_user" type="hidden"  value="{{$khach->id}}" />
                            @endforeach
                            <input name="id_sanpham" type="hidden"  value="{{$pham->id}}" />
                            <input name="tensanpham" type="hidden"  value="{{$pham->tensanpham}}" />
                            <input name="gia_tong" type="hidden"  value="{{$pham->gia}}" />
                            <input name="hinhanh" type="hidden"  value="{{$pham->hinhanh}}" />
                            <button type="submit" name="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Thêm Vào Giỏ Hàng</button>
                    <form>
                </div>
            </div>
        @endforeach  
    </section>

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://i.imgur.com/aQAQVgC.jpg">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">QuanDap</a>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400">CEO QuanDap FASHIONS STORE</p>
                                <p class="text-base font-light text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Chi Tiết Sản Phẩm</h1>
                </header>
                <p class="lead">Flowbite is an open-source library of UI components built with the utility-first
                    classes from Tailwind CSS. It also includes interactive elements such as dropdowns, modals,
                    datepickers.</p>
                <p>Before going digital, you might benefit from scribbling down some ideas in a sketchbook. This way,
                    you can think things through before committing to an actual design project.</p>
                <p>But then I found a <a href="https://flowbite.com">component library based on Tailwind CSS called
                        Flowbite</a>. It comes with the most commonly used UI components, such as buttons, navigation
                    bars, cards, form elements, and more which are conveniently built with the utility classes from
                    Tailwind CSS.</p>
                <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png" alt="">
                    <figcaption>Digital art by Anonymous</figcaption>
                </figure>
            </article>
        </div>
    </main>

@endsection
        
    