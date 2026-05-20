    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en',$service->title['en']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar',$service->title['ar']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="icon" :value="__('icon')" />
                    <x-text-input id="icon" class="block mt-1 w-full" type="text" name="icon" :value="old('icon',$service->icon??'')" />
                    @if ($service && $service->icon)
                        <i class="mt-2 fa {{$service->icon}} fa-2x text-secondary"></i>
                        {{--  <img class='mt-4' width='200' src="{{asset($service->icon)}}">  --}}
                    @endif
                    <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                     </div>
                     <div class="mt-4 grid grid-cols-2 gap-4">
                     <div class="mt-4">
                     <x-input-label for="content_en" :value="__('English Content')" />
                    <x-textarea-input id="content_en" class="block mt-1 w-full" rows="5" name="content_en" required>{{ old('content_en',$service->content['en']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="content_ar" :value="__('Arabic Content')" />
                    <x-textarea-input id="content_ar" class="block mt-1 w-full" rows="5" name="content_ar" required>{{ old('content_ar',$service->content['ar']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                     </div>

                    </div>
