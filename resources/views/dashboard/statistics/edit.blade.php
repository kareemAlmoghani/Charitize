<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.statistics') }}
        </h2>
        <a class="bg-green-600 p-1 px-8 rounded text-white hover:bg-green-700 duration-200" href="{{route('dashboard.statistics.index')}}">{{__('All Statistics')}}</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.statistics.update',$statistic->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')

                    @include('dashboard.statistics._form')
                     <button class=" mt-4 bg-teal-600 p-1 px-8 rounded text-white hover:bg-teal-700 duration-200">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

