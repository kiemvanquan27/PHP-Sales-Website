
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
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Size
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($giohang as $key => $gio)    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-32 p-4">
                    @foreach($sanpham as $key => $pham)
                        <a href="/product/{{$pham->id}}"> 
                            <img src="{{asset('public/uploads/hinhanh/'.$gio->hinhanh)}}" width="50px" lass="img-fluid" alt="...">
                        </a>
                    @endforeach
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$gio->tensanpham}}
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{$gio->size}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <button class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button"  value="-">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            </button>
                            <div>
                                <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$gio->soluong}}" required>
                            </div>
                            <button class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button"  value="+">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    {{number_format($gio->gia_tong).' '.'vnđ'}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="/delete_cart/{{$gio->id}}"class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                    </td>
                </tr>
            @endforeach
            @if(session()->has('success'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ session()->get('success') }}
            @endif
            </tbody>
        </table>
    </div>
          <!-- Pricing Card -->
        <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white" style="margin-top:20px;">
            <ul role="list" class="mb-8 space-y-4  ">
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <span><span class="font-semibold">Tổng :</span>
                                        <?php
                                            $user = Auth::user();
                                            $total = DB::table('giohang')->where('id_user',$user->id)->sum('gia_tong');
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
                                            $user = Auth::user();
                                            $total = DB::table('giohang')->where('id_user',$user->id)->sum('gia_tong');
                                            echo ($total.' '.'vnđ');
                                            ?>
                      </span>
                  </li>       
              </ul>
              <form method="POST" action="{{route('donhang.store')}}" >
                                        @csrf
                                        @foreach($cart as $key => $gio)  
                                                <div class="d-grid gap-2">                                            
                                                <input name="id_sanpham" type="hidden"  value="{{$gio->id_sanpham}}" />
                                                <input name="gia_tong" type="hidden"  value="{{$gio->gia_tong}}" />                                             
                                                <input name="id_user" type="hidden"  value="{{$gio->all('id_user')}}" />
                                                <input name="thanh_tien" type="hidden"  value="{{$gio->all('thanh_tien')}}" />
                                                <input name="code_order" type="hidden"  value="{{'id'}}" />
                                            @endforeach
                                            <input name="is_active" type="hidden"  value="false" />
                                            <input name="is_delete" type="hidden"  value="false" />
                                            <input name="is_complete" type="hidden"  value="false" />
                                            <?php
                                            $mytime = Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                            ?>
                                            <input name="created_at" type="hidden"  value="{{$mytime}}" />
                                            <button  required type="submit"  class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Đặt Hàng</button>

                </form>          
            </div>
    </div>        

@endsection