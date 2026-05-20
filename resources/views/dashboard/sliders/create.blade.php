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
                    <form action="{{ route('dashboard.sliders.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    @include('dashboard.sliders._form')
                    {{--  هذه الطريقة للكتابة وفوق حطيناها في صفحة وضمناها  --}}
                        {{--  <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  required />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>
                     <div class="mt-4 grid grid-cols-2 gap-4">
                     <div class="mt-4">
                     <x-input-label for="content_en" :value="__('English Content')" />
                    <x-textarea-input id="content_en" class="block mt-1 w-full" rows="5" name="content_en" required>{{ old('content_en') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="content_ar" :value="__('Arabic Content')" />
                    <x-textarea-input id="content_ar" class="block mt-1 w-full" rows="5" name="content_ar" required>{{ old('content_ar') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                     </div>

                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-4">
                         <div class="mt-4">
                            <x-input-label for="btn1_text_en" :value="__('English btn1_text')" />
                         <x-text-input id="btn1_text_en" class="block mt-1 w-full" type="text" name="btn1_text_en" :value="old('btn1_text_en')" required   />
                            <x-input-error :messages="$errors->get('btn1_text_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="btn1_text_ar" :value="__(' Arabic btn1_text')" />
                         <x-text-input id="btn1_text_ar" class="block mt-1 w-full" type="text" name="btn1_text_ar" :value="old('btn1_text_ar')" required   />
                            <x-input-error :messages="$errors->get('btn1_text_ar')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="btn1_link" :value="__('btn1_link')" />
                         <x-text-input id="btn1_link" class="block mt-1 w-full" type="text" name="btn1_link" :value="old('btn1_link')" required   />
                            <x-input-error :messages="$errors->get('btn1_link')" class="mt-2" />
                         </div>

                     </div>
                     <div class="mt-4 grid grid-cols-3 gap-4">
                         <div class="mt-4">
                            <x-input-label for="btn2_text_en" :value="__('English btn2_text')" />
                         <x-text-input id="btn2_text_en" class="block mt-1 w-full" type="text" name="btn2_text_en" :value="old('btn2_text_en')" required   />
                            <x-input-error :messages="$errors->get('btn2_text_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="btn2_text_ar" :value="__('English btn2_text')" />
                         <x-text-input id="btn2_text_ar" class="block mt-1 w-full" type="text" name="btn2_text_ar" :value="old('btn2_text_ar')" required  />
                            <x-input-error :messages="$errors->get('btn2_text_ar')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="btn2_link" :value="__('btn2_link')" />
                         <x-text-input id="btn2_link" class="block mt-1 w-full" type="text" name="btn2_link" :value="old('btn2_link')" required   />
                            <x-input-error :messages="$errors->get('btn2_link')" class="mt-2" />
                         </div>

                     </div>  --}}
                     <button class=" mt-4 bg-green-600 p-1 px-8 rounded text-white hover:bg-green-700 duration-200">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

