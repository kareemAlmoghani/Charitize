    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en',$slider->title['en']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar',$slider->title['ar']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    @if ($slider && $slider->image)
                        <img class='mt-4' width='200' src="{{asset($slider->image->path)}}">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>
                     <div class="mt-4 grid grid-cols-2 gap-4">
                     <div class="mt-4">
                     <x-input-label for="content_en" :value="__('English Content')" />
                    <x-textarea-input id="content_en" class="block mt-1 w-full" rows="5" name="content_en" required>{{ old('content_en',$slider->content['en']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="content_ar" :value="__('Arabic Content')" />
                    <x-textarea-input id="content_ar" class="block mt-1 w-full" rows="5" name="content_ar" required>{{ old('content_ar',$slider->content['ar']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                     </div>

                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-4">
                         <div class="mt-4">
                            <x-input-label for="btn1_text_en" :value="__('English btn1_text')" />
                         <x-text-input id="btn1_text_en" class="block mt-1 w-full" type="text" name="btn1_text_en" :value="old('btn1_text_en',$slider->btn1_text['en']??'')" required   />
                            <x-input-error :messages="$errors->get('btn1_text_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="btn1_text_ar" :value="__(' Arabic btn1_text')" />
                         <x-text-input id="btn1_text_ar" class="block mt-1 w-full" type="text" name="btn1_text_ar" :value="old('btn1_text_ar',$slider->btn1_text['ar']??'')" required   />
                            <x-input-error :messages="$errors->get('btn1_text_ar')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="btn1_link" :value="__('btn1_link')" />
                         <x-text-input id="btn1_link" class="block mt-1 w-full" type="text" name="btn1_link" :value="old('btn1_link',$slider->btn1_link)" required   />
                            <x-input-error :messages="$errors->get('btn1_link')" class="mt-2" />
                         </div>

                     </div>
                     <div class="mt-4 grid grid-cols-3 gap-4">
                         <div class="mt-4">
                            <x-input-label for="btn2_text_en" :value="__('English btn2_text')" />
                         <x-text-input id="btn2_text_en" class="block mt-1 w-full" type="text" name="btn2_text_en" :value="old('btn2_text_en',$slider->btn2_text['en']??'')" required   />
                            <x-input-error :messages="$errors->get('btn2_text_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="btn2_text_ar" :value="__('English btn2_text')" />
                         <x-text-input id="btn2_text_ar" class="block mt-1 w-full" type="text" name="btn2_text_ar" :value="old('btn2_text_ar',$slider->btn2_text['ar']??'')" required  />
                            <x-input-error :messages="$errors->get('btn2_text_ar')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="btn2_link" :value="__('btn2_link')" />
                         <x-text-input id="btn2_link" class="block mt-1 w-full" type="text" name="btn2_link" :value="old('btn2_link',$slider->btn2_link)" required   />
                            <x-input-error :messages="$errors->get('btn2_link')" class="mt-2" />
                         </div>

                     </div>
