@extends('layouts.app')

@section('content')
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <meta charset="utf-8">


          <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Customer
                </th>
                <th scope="col" class="py-3 px-6">
                    Code
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantily
                </th>
                <th scope="col" class="py-3 px-6">
                Total Price
                </th>
                <th scope="col" class="py-3 px-6">
                Status
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach  ($danhsachdonhang as $key => $don)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{$don->User->name}}
                </th>
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$don->code_order}}
                <td class="py-4 px-6">
                {{$don->soluong}}
                </td>
                <td class="py-4 px-6">
                {{$don->gia_tong.' '.'vnđ'}}
                </td>
                <td class="py-4 px-6">
                @if($don->is_complete=='false')
                       <option  selected value="false">Chưa Xác Nhận</option>
                        @elseif ($don->is_complete=='DaXacNhan')
                        <option  selected value="DaXacNhan">Đã Xác Nhận</option>
                        @elseif($don->is_complete=='DangGiaoHang')
                        <option  selected value="DangGiaoHang">Đang Giao Hàng</option>
                        @else($don->is_complete=='DaGiaoHang')
                        <option  selected value="DaGiaoHang">Đã Giao Hàng</option>
                        @endif
                </td>
                <td class="py-4 px-6">
                    <a href="{{route('donhang.edit',['donhang' => $donhang->id])}}"class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-2 py-2.5 text-center mr-2 mb-2">Details</a>
                </td>
              </tr>
              @endforeach
        </tbody>
    </table>
</div>



    
       


       </div> 
       @endsection
