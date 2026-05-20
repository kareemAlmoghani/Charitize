    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en',$event->title['en']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar',$event->title['ar']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    @if ($event && $event->image)
                        <img class='mt-4' width='200' src="{{asset($event->image->path)}}">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>
                     <div class="mt-4 grid grid-cols-2 gap-4">
                     <div class="mt-4">
                     <x-input-label for="content_en" :value="__('English Content')" />
                    <x-textarea-input id="content_en" class="block mt-1 w-full" rows="5" name="content_en" required>{{ old('content_en',$event->content['en']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="content_ar" :value="__('Arabic Content')" />
                    <x-textarea-input id="content_ar" class="block mt-1 w-full" rows="5" name="content_ar" required>{{ old('content_ar',$event->content['ar']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                     </div>

                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-4">
                         <div class="mt-4">
                            <x-input-label for="hours" :value="__('Hours')" />
                         <x-text-input id="hours" class="block mt-1 w-full" type="text" name="hours" :value="old('hours',$event->hours)"    />
                            <x-input-error :messages="$errors->get('hours')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="location" :value="__('Location')" />
                         <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location',$event->location)"    />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="date" :value="__('Date')" />
                         <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date',$event->date)"    />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                         </div>

                     </div>

