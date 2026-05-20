    <div class="mt-4 grid grid-cols-2 gap-4">
                         <div class="mt-4">
                            <x-input-label for="title_en" :value="__('English Title')" />
                            <x-text-input id="title_en" class="block mt-1 w-full" type="text" name="title_en" :value="old('title_en',$cause->title['en']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                            <x-input-label for="title_ar" :value="__('Arabic Title')" />
                            <x-text-input id="title_ar" class="block mt-1 w-full" type="text" name="title_ar" :value="old('title_ar',$cause->title['ar']??'')" required autofocus  />
                            <x-input-error :messages="$errors->get('title_ar')" class="mt-2" />
                         </div>
                         </div>
                     <div class="mt-4">
                     <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    @if ($cause && $cause->image)
                        <img class='mt-4' width='200' src="{{asset($cause->image->path)}}">
                    @endif
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                     </div>


                     <div class="mt-4">
                     <x-input-label for="gallery" :value="__('Gallery')" />
                    <x-text-input id="gallery" class="block mt-1 w-full" type="file" name="gallery[]" multiple  />
                    @if ($cause && $cause->gallery)
                        <div class=" flex gap-1">
                            @foreach ($cause->gallery as $item )
                        <div>
                            <img class='mt-4' width='200' src="{{asset($item->path)}}">
                        <a href="{{route('dashboard.delete_gallery',[$cause->id,$item->id])}}"
                            class="bg-red-600 text-white text-wrap">X</a>
                        </div>
                        @endforeach
                        </div>
                    @endif
                    <x-input-error :messages="$errors->get('gallery')" class="mt-2" />
                     </div>




                     <div class="mt-4 grid grid-cols-2 gap-4">
                     <div class="mt-4">
                     <x-input-label for="content_en" :value="__('English Content')" />
                    <x-textarea-input id="content_en" class="block mt-1 w-full" rows="5" name="content_en" required>{{ old('content_en',$cause->content['en']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                     </div>
                     <div class="mt-4">
                     <x-input-label for="content_ar" :value="__('Arabic Content')" />
                    <x-textarea-input id="content_ar" class="block mt-1 w-full" rows="5" name="content_ar" required>{{ old('content_ar',$cause->content['ar']??'') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('content_ar')" class="mt-2" />
                     </div>

                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-4">
                         <div class="mt-4">
                            <x-input-label for="goal" :value="__('Goal')" />
                         <x-text-input id="goal" class="block mt-1 w-full" type="text" name="goal" :value="old('goal',$cause->goal)" required   />
                            <x-input-error :messages="$errors->get('goal')" class="mt-2" />
                         </div>
                         <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                         <x-select id="status" class="block mt-1 w-full" type="text" name="status"  required>
                            <option @selected(old('status',$cause->status)=='open') value="open">Open</option>
                            <option @selected(old('status',$cause->status)=='close') value="close">Close</option>
                         </x-select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                         </div>
                          <div class="mt-4">
                             <x-input-label for="category_id" :value="__('Category')" />
                            <x-select id="category_id" class="block mt-1 w-full" type="text" name="category_id"  required>
                             @foreach($categories as $category)
                                 <option @selected(old('category_id',$cause->category_id)==$category->id) value="{{$category->id}}">{{{$category->title[app()->getLocale()]}}}</option>
                             @endforeach

                         </x-select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                         </div>

                     </div>

