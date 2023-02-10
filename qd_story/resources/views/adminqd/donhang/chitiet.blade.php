@extends('layouts.app')

@section('content')
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <meta charset="utf-8">


    
          <div  style="width:90%;margin-left:70%;float:rigth">
            <form method="POST" action="{{route('donhang.update',[$donhang->id])}}">
                  @method('PUT')
                          @csrf
                    @foreach  ($danhsachdonhang as $key => $don)
                  <select name="is_complete" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        @if($don->is_complete=='false')
                        <option  selected value="false">Chưa Xác Nhận</option>
                          <option  value="DaXacNhan">Đã Xác Nhận</option>
                          <option  value="DangGiaoHang">Đang Giao Hàng</option>
                          <option  value="DaGiaoHang">Đã Giao Hàng</option>
                          @elseif ($don->is_complete=='DaXacNhan')
                          <option   value="false">Chưa Xác Nhận</option>
                          <option  selected value="DaXacNhan">Đã Xác Nhận</option>
                          <option value="DangGiaoHang">Đang Giao Hàng</option>
                          <option  value="DaGiaoHang">Đã Giao Hàng</option>
                          @elseif($don->is_complete=='DangGiaoHang')
                          <option   value="false">Chưa Xác Nhận</option>
                          <option   value="DaXacNhan">Đã Xác Nhận</option>
                          <option  selected value="DangGiaoHang">Đang Giao Hàng</option>
                          <option   value="DaGiaoHang">Đã Giao Hàng</option>
                          @else($don->is_complete=='DaGiaoHang')
                          <option   value="false">Chưa Xác Nhận</option>
                          <option  value="DaXacNhan">Đã Xác Nhận</option>
                          <option  value="DangGiaoHang">Đang Giao Hàng</option>
                          <option  selected value="DaGiaoHang">Đã Giao Hàng</option>
                          @endif
                    </select>     
                    <button type="submit"  name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">cập nhật</button>
                    @endforeach  
              </form>  
             </div>
          <div class="container">
            @foreach  ($danhsachdonhang as $key => $don)
            <h3 class="mb-2 text-xl font-bold dark:text-white">  CODE :  {{$don->code_order}}</h3>
            @endforeach
            
              
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                          <th scope="col" class="py-3 px-6">
                              Product Code 
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Product Name 
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Quantily
                          </th>
                          <th scope="col" class="py-3 px-6">
                          Total Price
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Size
                          </th>
                          <th scope="col" class="py-3 px-6">
                              Color
                          </th>
                          <th scope="col" class="py-3 px-6">
                          Order Date
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach  ($sanpham as $key => $pham)
                      <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                          <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          {{$pham->id_sanpham}}
                          <td class="py-4 px-6">
                          {{$pham->tensanpham}}
                          </td>
                          <td class="py-4 px-6">
                          {{$pham->soluong}}
                          </td>
                          <td class="py-4 px-6">
                          {{$pham->gia_tong.' '.'vnđ'}}
                          </td>
                          <td class="py-4 px-6">
                          {{$pham->size}}
                          </td>
                          <td class="py-4 px-6">
                          {{$pham->mau}}
                          </td>
                          <td class="py-4 px-6">
                          @foreach  ($danhsachdonhang as $key => $don)
                          {{$don->created_at}}
                          @endforeach
                          </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Customer</h3>
              <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  @foreach  ($danhsachdonhang as $key => $don)
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="py-3 px-6">
                                Customer 
                              </th>
                              <th scope="col" class="py-3 px-6">
                                  Phone
                              </th>
                              <th scope="col" class="py-3 px-6">
                                  Address
                              </th>
                              <th scope="col" class="py-3 px-6">
                                  Email
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                              <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              {{$don->User->name}}
                              </th>
                              <td class="py-4 px-6">
                              {{$don->User->phone}}
                              </td>
                              <td class="py-4 px-6">
                              {{$don->User->address}}
                              </td>
                              <td class="py-4 px-6">
                              {{$don->User->email}}
                              </td>
                          </tr>
                      </tbody>
                      @endforeach
                  </table>
              </div>
          </div>
       @endsection
