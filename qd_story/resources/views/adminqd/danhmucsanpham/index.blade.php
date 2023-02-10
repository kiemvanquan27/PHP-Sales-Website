@extends('layouts.app')

@section('content')
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <meta charset="utf-8">



    <div class="py-4 px-6" style="width:90%;margin-left:82%;float:rigth">
    <a href="{{route('danhmuc.create')}}" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">+Add category</a>
    </div>
       
<div style="width:90%;margin:auto;" class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead style="background-color:lightblue" class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                Name list    
                </th>
                <th scope="col" class="py-3 px-6">
                Category Description
                </th>
                <th scope="col" class="py-3 px-6">
                Activated
                </th>
                <th scope="col" class="py-3 px-6">
                    Edit
                </th>
                <th scope="col" class="py-3 px-6">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($danhmucsanpham as $key => $danhmuc)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$key}}
                </th>
                <td class="py-4 px-6">
                   {{$danhmuc->tendanhmuc}}
                </td>
                <td class="py-4 px-6">
                {{$danhmuc->mota}}
                </td>
                <td class="py-4 px-6">
                        @if($danhmuc->kichhoat==0)
                       <SPAN STYLE="COLOR:GREEN"> Activated</SPAN>
                        @else
                       <SPAN STYLE="COLOR:RED">Not activated</SPAN>
                        @endif
                </td>
                <td class="py-4 px-6">
                    <a href="{{route('danhmuc.edit',['danhmuc' => $danhmuc->id])}}" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">EDIT</a>
                </td>
                <td class="py-4 px-6"> 
                    <form action="{{route('danhmuc.destroy',['danhmuc' => $danhmuc->id])}}" method="POST">
                                           @method('DELETE')
                                            @csrf
                                                <button class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" type="button" data-modal-toggle="popup-modal">
                                                    DELETE
                                                </button>

                                                <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-6 text-center">
                                                                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                                                <button data-modal-toggle="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>

       </div> 
       @endsection
