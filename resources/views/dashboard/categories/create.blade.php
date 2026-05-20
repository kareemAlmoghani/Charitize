<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.categories') }}
        </h2>
        <a class="bg-green-600 p-1 px-8 rounded text-white hover:bg-green-700 duration-200" href="{{route('dashboard.categories.index')}}">{{__('All Category')}}</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.categories.store') }}" method="POST">
                    @csrf
                    <div class="mt-4 grid grid-cols-2 gap-4">
                     <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                         <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en')" required   />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                         <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar')" required   />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                    </div> 
                     <button class=" mt-4 bg-green-600 p-1 px-8 rounded text-white hover:bg-green-700 duration-200">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

