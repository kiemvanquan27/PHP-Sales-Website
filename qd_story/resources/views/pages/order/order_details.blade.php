@extends('layout-2.nav-pages')

@section('body')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Image</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Mã Sản Phẩm
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Tên Sản Phẩm
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Size
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Màu
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Giá
                    </th>
                    <th scope="col" class="px-6 py-3">
                    Ngày Đặt Hàng
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($sanpham as $key => $pham)  
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-32 p-4">
                        <a href="/product/{{$pham->id}}"> 
                            <img src="{{asset('public/uploads/hinhanh/'.$pham->hinhanh)}}" width="50px" lass="img-fluid" alt="...">
                        </a>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$pham->id}}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$pham->tensanpham}}
                    </td>
                    <td class="px-6 py-4">
                    {{$pham->size}}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$pham->mau}}
                    </td>
                    <td class="px-6 py-4">
                    {{$pham->gia_tong}}
                    </td>
                    <td class="px-6 py-4">
                    <?php
                                            echo $donhang->created_at;
                                            
                                            ?>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
          <!-- Pricing Card -->
        <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white" style="margin-top:20px;">
        <h4 > YOU ORDER</h4>
            <ul role="list" class="mb-8 space-y-4  ">
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <span><span class="font-semibold">Tổng Số Lượng :</span>
                      <?php
                                            $soluong = $donhang->soluong;
                                            echo ($soluong);
                                            ?>
                    </span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <span><span class="font-semibold">Tổng Giá :</span>  <?php
                                            $total = $donhang->gia_tong;
                                            echo ($total.' '.'vnđ');
                                            ?>
                      </span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <span><span class="font-semibold">Ship :</span> Free
                      </span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <span><span class="font-semibold">Thành TIền (VNĐ) :</span>
                      <?php
                                            $total = $donhang->gia_tong;
                                            echo ($total.' '.'vnđ');
                                            ?>
                      </span>
                  </li>
              </ul>
            </div>
    </div>        
   
    @endsection

