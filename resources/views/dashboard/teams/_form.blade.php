    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en',$team->title['en']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar',$team->title['ar']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    @if ($team && $team->image)
                        <img class='mt-4' width='200' src="{{asset($team->image->path)}}">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>

                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                         <div class="mt-4">
                            <x-input-label for="position_en" :value="__('English Position')" />
                         <x-text-input id="position_en" class="block mt-1 w-full" type="text" name="position_en" :value="old('position_en',$team->position['en']??'')"    />
                            <x-input-error :messages="$errors->get('position_en')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="position_ar" :value="__('Arabic Position')" />
                         <x-text-input id="position_ar" class="block mt-1 w-full" type="text" name="position_ar" :value="old('position_ar',$team->position['ar']??'')"    />
                            <x-input-error :messages="$errors->get('position_ar')" class="mt-2" />
                         </div>
                        
                     </div>
                      <div class="mt-4 grid grid-cols-2 gap-2">
                         <div class="mt-4">
                            <x-input-label for="facebook" :value="__('Facebook Link')" />
                         <x-text-input id="facebook" class="block mt-1 w-full" type="text" name="facebook" :value="old('facebook',$team->facebook)"    />
                            <x-input-error :messages="$errors->get('facebook')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="instagram" :value="__('Instagram Link')" />
                         <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram" :value="old('instagram',$team->instagram)"    />
                            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                         </div>
                      </div>
                      <div class="mt-4 grid grid-cols-3 gap-2">
                         <div class="mt-4">
                            <x-input-label for="x" :value="__('X Link')" />
                         <x-text-input id="x" class="block mt-1 w-full" type="text" name="x" :value="old('x',$team->x)"    />
                            <x-input-error :messages="$errors->get('x')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="linkedin" :value="__('linkedin Link')" />
                         <x-text-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin" :value="old('linkedin',$team->linkedin)"    />
                            <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="youtube" :value="__('Youtube Link')" />
                         <x-text-input id="youtube" class="block mt-1 w-full" type="text" name="youtube" :value="old('youtube',$team->youtube)"    />
                            <x-input-error :messages="$errors->get('youtube')" class="mt-2" />
                         </div>

                     </div>




                     