@extends('layout-2.nav-pages')

@section('body')
<div class="max-w-screen-md mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Thông Tin Đơn Hàng</h2>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Mã Đơn Hàng
                </th>
                <th scope="col" class="px-6 py-3">
                Số Sản Phẩm
                </th>
                <th scope="col" class="px-6 py-3">
                Tổng Giá
                </th>
                <th scope="col" class="px-6 py-3">
                Thành Tiền 
                </th>
                <th scope="col" class="px-6 py-3">
                Trạng Thái 
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($donhang as $key => $don)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$don->code_order}}
                </th>
                <td class="px-6 py-4">
                {{$don->soluong}}
                </td>
                <td class="px-6 py-4">
                {{$don->gia_tong.' '.'vnđ'}}
                </td>
                <td class="px-6 py-4">
                {{$don->thanh_tien.' '.'vnđ'}}
                </td>
                <td class="px-6 py-4">
                @if($don->is_complete=='false')
                                            <option STYLE="COLOR:RED" class="fst-italic" selected value="false">Chưa Xác Nhận</option>
                                            @elseif ($don->is_complete=='DaXacNhan')
                                            <option STYLE="COLOR:GREEN" class="fst-italic" selected value="DaXacNhan">Đã Xác Nhận</option>
                                            @elseif($don->is_complete=='DangGiaoHang')
                                            <option STYLE="COLOR:GREEN" class="fst-italic" selected value="DangGiaoHang">Đang Giao Hàng</option>
                                            @else($don->is_complete=='DaGiaoHang')
                                            <option STYLE="COLOR:GREEN" class="fst-italic"selected value="DaGiaoHang">Đã Giao Hàng</option>
                                            @endif
                </td>
                <td class="px-6 py-4">
                <a href="/chitiet/{{ $don->id }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Chi Tiết Đơn Hàng<a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
    @endsection
