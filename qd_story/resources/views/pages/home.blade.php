
@extends('layout-2.nav-pages')

@section('body')
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <body>
    <section class="bg-white dark:bg-gray-900">
            <div class="px-4 mx-auto max-w-screen-xl lg:px-6">
            <section class="bg-white dark:bg-gray-900">
                <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                    <img class="w-full " src="https://i.imgur.com/FEmQcvW.jpg" alt="dashboard image">
                    <div class="mt-4 md:mt-0">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">QuanDap Store nơi mà mấy bạn sẽ muốn đến để sắm sửa </h2>
                        <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Flowbite helps you connect with friends and communities of people who share your interests. Connecting with your friends and family as well as discovering new ones is easy with features like Groups.</p>
                        <a href="#" class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                            Get started
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            </section>
            <div class="space-y-8 md:grid md:grid-cols-4 lg:grid-cols-3 md:gap-12 md:space-y-0">
                @foreach($sanpham as $key => $pham)
                <div>
                        <a href="/product/{{$pham->id}}"><img src="{{asset('public/uploads/hinhanh/'.$pham->hinhanh)}}" width="100%" lass="img-fluid" alt="..."></a>           
                        <h3 class="mb-2 text-xl font-bold dark:text-white">{{$pham->tensanpham}}</h3>
                        <p class="text-gray-500 dark:text-gray-400"  style="overflow:hidden;height:50px;display: -webkit-box;    -webkit-box-orient: vertical;-webkit-line-clamp: 2;">{{$pham->motasanpham}}</p>
                        <p class="text-purple-600 text-2xl">{{number_format($pham->gia).' '.'vnđ'}}</p>
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                        <a href="/product/{{$pham->id}}"class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            Xem Sản Phẩm
                        </a> <form method='POST' action="/giohang/store">
                                {{csrf_field() }}
                                <input name="soluong" type="hidden" min="1" value="1" />
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
                                <button type="submit" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            Thêm Giỏ Hàng
                        </button>
                            </form>
                        </div>
                </div>
                @endforeach    
            </div>
        </div>
    </section>
        @endsection
