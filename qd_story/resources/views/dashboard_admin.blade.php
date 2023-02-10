@extends('layouts.app')

@section('content')
<header>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</header>
<body>
<section class="bg-white dark:bg-gray-900">
                                <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                                <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
                                        <div class="flex flex-col items-center justify-center">
                                        <dt class="mb-2 text-3xl md:text-4xl font-extrabold">
                                        <?php    
                                                $tongdon = DB::table("donhang")->orderby('id','DESC')->get();
                                                echo count($tongdon, COUNT_RECURSIVE );
                                        ?>       
                                + </dt>
                                        <dd class="font-light text-gray-500 dark:text-gray-400">TOTAL ORDER</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                        <dt class="mb-2 text-3xl md:text-4xl font-extrabold">
                                        <?php    
                                                $nguoi = $khachhang;
                                                echo count($nguoi, COUNT_RECURSIVE );
                                        ?>       
                                        + </dt>
                                        <dd class="font-light text-gray-500 dark:text-gray-400">USER</dd>
                                        </div>
                                        <div class="flex flex-col items-center justify-center">
                                        <dt class="mb-2 text-3xl md:text-4xl font-extrabold">
                                        <?php    
                                                $sanpham = DB::table("sanpham")->orderby('id','DESC')->get();
                                                echo count($sanpham, COUNT_RECURSIVE );
                                        ?>    
                                        + </dt>
                                        <dd class="font-light text-gray-500 dark:text-gray-400">PRODUCT</dd>
                                        </div>
                                </dl>
                                </div>
                        </section>
        <section class="bg-white dark:bg-gray-900" >
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">TOTAL REVENUE</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 text-5xl sm:px-16 xl:px-48 text-green-500">
                                   +     <?php    
                                                $tongdonhang =  DB::table("donhang")->sum('gia_tong');
                                                echo $tongdonhang;
                                        ?>      VNĐ
                </p>
        </div>
        </section>

</body>


      

  




    
       @endsection
