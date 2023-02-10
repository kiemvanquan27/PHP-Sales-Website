@extends('layouts.app')

@section('content')
            <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
            <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
            <meta charset="utf-8">


            <div class="py-12">
               <div style="width:40%;margin:auto;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                     <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                           
                           <form method="POST" action="{{route('danhmuc.store')}}">
                                 @csrf
                           <div class="mb-6">
                                 <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name list</label>
                                 <input type="text" name="tendanhmuc"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name list..." required="">
                           </div>
                           <div class="mb-6">
                                 <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category Description</label>
                                 <input type="text" name="mota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Category Description..." required="">
                           </div>
                           <div class="mb-6">
                           <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Activated</label>
                           <select  id="countries" name="kichhoat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                 <option value="0">Activated</option>
                                 <option value="1">Not activated</option>
                           </select>
                           </div>
                           <button type="submit" name="themdanhmuc" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add</button>
                           </form>

                        </div>
                     </div>
               </div>
               </div> 
       @endsection
