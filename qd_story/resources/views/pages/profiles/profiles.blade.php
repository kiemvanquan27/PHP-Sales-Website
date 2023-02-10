
@extends('layout-2.nav-pages')

@section('body')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Thông Tin Cá Nhân</h2>
            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
            @foreach($thongtin as $key => $nguoi)
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Tên Người Dùng</dt>
                    <dd class="text-lg font-semibold">{{$nguoi->name}}</dd>
                </div>
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email address</dt>
                    <dd class="text-lg font-semibold">{{$nguoi->email}}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Home address</dt>
                    <dd class="text-lg font-semibold">{{$nguoi->address}}</dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Phone number</dt>
                    <dd class="text-lg font-semibold">{{$nguoi->phone}}</dd>
                </div>
                @endforeach
            </dl>
            </div>
    </section>


    
    @endsection

