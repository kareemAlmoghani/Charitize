<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.sliders') }}
        </h2>
        <a class="bg-green-600 p-1 px-8 rounded text-white hover:bg-green-700 duration-200" href="{{route('dashboard.sliders.index')}}">{{__('All Slider')}}</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.sliders.update',$slider->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')

                    @include('dashboard.sliders._form')
                    {{--  هذه الطريقة للتعديل قبل عمل عملية الترجمة واضافة حقل العربي  --}}
                     {{--  <div>
                     <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title',$slider->title)" required autofocus  />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    <img width="200" src="{{ asset($slider->image->path) }}">
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="content" :value="__('Content')" />
                    <x-textarea-input id="content" class="block mt-1 w-full" rows="5" name="content" required>{{ old('content',$slider->content) }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                     </div>
                    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="btn1_text" :value="__('btn1_text')" />
                         <x-text-input id="btn1_text" class="block mt-1 w-full" type="text" name="btn1_text" :value="old('btn1_text',$slider->btn1_text)" required   />
                            <x-input-error :messages="$errors->get('btn1_text')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="btn1_link" :value="__('btn1_link')" />
                         <x-text-input id="btn1_link" class="block mt-1 w-full" type="text" name="btn1_link" :value="old('btn1_link',$slider->btn1_link)" required   />
                            <x-input-error :messages="$errors->get('btn1_link')" class="mt-2" />
                         </div>

                     </div>
                     <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="btn2_text" :value="__('btn2_text')" />
                         <x-text-input id="btn2_text" class="block mt-1 w-full" type="text" name="btn2_text" :value="old('btn2_text',$slider->btn2_text)" required   />
                            <x-input-error :messages="$errors->get('btn2_text')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="btn2_link" :value="__('btn2_link')" />
                         <x-text-input id="btn2_link" class="block mt-1 w-full" type="text" name="btn2_link" :value="old('btn2_link',$slider->btn2_link)" required   />
                            <x-input-error :messages="$errors->get('btn2_link')" class="mt-2" />
                         </div>

                     </div>  --}}
                     <button class=" mt-4 bg-teal-600 p-1 px-8 rounded text-white hover:bg-teal-700 duration-200">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

