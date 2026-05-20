    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en',$testimonial->title['en']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar',$testimonial->title['ar']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    @if ($testimonial && $testimonial->image)
                        <img class='mt-4' width='200' src="{{asset($testimonial->image->path)}}">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>

                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                         <div class="mt-4">
                            <x-input-label for="position_en" :value="__('English Position')" />
                         <x-text-input id="position_en" class="block mt-1 w-full" type="text" name="position_en" :value="old('position_en',$testimonial->position['en']??'')"    />
                            <x-input-error :messages="$errors->get('position_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="position_ar" :value="__('Arabic Position')" />
                         <x-text-input id="position_ar" class="block mt-1 w-full" type="text" name="position_ar" :value="old('position_ar',$testimonial->position['ar']??'')"    />
                            <x-input-error :messages="$errors->get('position_ar')" class="mt-2" />
                         </div>
                        
                     </div>
                      <div class="mt-4 grid grid-cols-2 gap-2">
                         <div class="mt-4">
                            <x-input-label for="review" :value="__('Review')" />
                         <x-text-input id="review" class="block mt-1 w-full" type="text" name="review" :value="old('review',$testimonial->review)" required   />
                            <x-input-error :messages="$errors->get('review')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="rate" :value="__('Rate')" />
                         <x-text-input id="rate" class="block mt-1 w-full" type="number" name="rate" :value="old('rate',$testimonial->rate)"    />
                            <x-input-error :messages="$errors->get('rate')" class="mt-2" />
                         </div>
                      </div>
                   