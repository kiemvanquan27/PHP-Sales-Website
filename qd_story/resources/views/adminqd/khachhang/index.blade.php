@extends('layouts.app')

@section('content')
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <meta charset="utf-8">

              <h3 class="mb-2 text-xl font-bold dark:text-white">Customer</h3>
              <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="py-3 px-6">
                                Name
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
                              <th scope="col" class="py-3 px-6">
                                Created Date
                                </th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach  ($user as $key => $don)
                          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                              <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              {{$don->name}}
                              </th>
                              <td class="py-4 px-6">
                              {{$don->phone}}
                              </td>
                              <td class="py-4 px-6">
                              {{$don->address}}
                              </td>
                              <td class="py-4 px-6">
                              {{$don->email}}
                              </td>
                              <td class="py-4 px-6">
                                {{$don->created_at}}
                                </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
       @endsection
