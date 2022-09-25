<div class="setProfile" id="basic-profile">
   <form action="{{ route('profile.basics.save') }}" method="POST" id="form-basic-save" class="form-basic-save" enctype="multipart/form-data">
      @csrf
      
      <div class="container-fluid welcome-body px-5">
         
         <h1 class="mb-4">Welcome Shahzaib</h1>
         <span class="cmnt pb-4">
         Complete your profile to join our global community of freelancers and start
         selling
         your
         service
         to growing network of businesses.</span>
         <div>
            <label class="mt-4">Profile Picture</label>
            <div class="profile-img col-md-12" action="">
               <input type="file" name="profile_picture" id="img-upload" accept="image/png, image/gif, image/jpeg"
                  class="imgInp" onchange="previewFile(this)"
                  title="" />
               <image width="100" height="100" id="preview-img"
                  src="{{ getImage('assets/images/default.png') }}" />
            </div>
            <div class="row">
               <div
                  class="col-md-6 col-sm-12"
                  >
                  <label class="mt-4"
                     >Category
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <select
                     name="category_id[]"
                     class=" form-control select-lang select2 select2-hidden-accessible"
                     multiple="" data-placeholder="Select Categories"  tabindex="-1" aria-hidden="true" style="width: 100% !important"
                     id="category_id"
                     >
                     <option
                        value=""
                       
                        >
                        Select Category
                     </option>
                     @foreach ($categories as $category)
                     <option
                         value="{{$category->id}}"

                         {{in_array($category->id,$user->categories->pluck('id')->toArray()) ? 'selected' :''}}
                     >
                    {{$category->name}}
                 </option>
                     @endforeach
                  </select>
               </div>
               <div class="col-md-6 col-sm-12">
                  <label class="mt-4"
                     >Designation
                  <span class="imp"
                     >*</span
                     ></label
                     >
                  <input
                     type="text"
                     name="designation"
                     id="title"
                     placeholder="E.g. Full Stack Developer"
                     value="{{$basicProfile->designation}}"
                     />
               </div>
            </div>
            <div class="col-md-12">
               <label class="mt-4"
                  >About You
               <span class="imp"
                  >*</span
                  ></label
                  >
               <textarea
                  cols="20"
                  rows="5"
                  name="about"
                  placeholder="Describe yourself to clients"
                  id="about"
                  >{{ $basicProfile->about }}</textarea>
            </div>
            {{-- location --}}
            <div class="col-md-12">
               <label class="mt-4"
                  >Location
               <span class="imp"
                  >*</span
                  ></label
                  >
               <select
                     name="city_id"
                     class="form-control select-lang"
                     id="languages"
                     >
                     <option
                        value=""
                     >
                        Select City

                     </option>
                     @foreach ($cities as $city)

                        <option
                           value="{{$city->id}}"

                           {{ $city->id == $basicProfile->city_id ? 'selected' : '' }}
                        >
                           {{$city->name}}
                        </option>

                     @endforeach
               </select>
            </div>
            {{-- phone --}}
            <div class="col-md-12">
               <label class="mt-4"
                  >Phone
               <span class="imp"
                  >*</span
                  ></label
                  >
               <input
                  type="number"
                  name="phone_number"
                  placeholder=""
                  id="phone"
                  value="{{$basicProfile->phone_number}}"
                  />
            </div>
            {{-- language row --}}
            <div
               class="language-container row"
               id="language-row"
               style="
               justify-content: space-between !important;
               "
               >
               @if ($user_languages->count()>0)
                  
                  @foreach ($user_languages as $key=>$user_language)
                      {{-- language --}}
                     <div  id="moreLanguage-row-{{$key}}">
                        <div class="row">
                           <div
                           class="col-md-6 col-sm-12"
                           >
                           <label class="mt-4"
                              >Language
                           <span
                              class="imp"
                              >*</span
                              ></label
                              >
                           <select
                              name="languages[{{$key}}][language_id]"
                              class="form-control select-lang "
                              id="languages.{{$key}}.language_id"
                              >
                              <option
                                 value=""
                                 selected=""
                                 >
                                 Spoken
                                 Language(s)
                              </option>
                              
                              @foreach ($languages as $language)
                                 <option
                                    value="{{$language->id}}"
                                    {{ $language->id== $user_language->language_id ? 'selected' :'' }}
                                 >
                                 {{ $language->iso_language_name }}
                              </option>
                              @endforeach
                           </select>
                        </div>
                        {{-- proficiency level --}}
                        <div
                           class="{{ $key > 0 ? 'col-md-5' : 'col-md-6'  }} col-sm-12"
                           >
                           <label class="mt-4"
                              >Profeciency
                              Level
                           <span
                              class="imp"
                              >*</span
                              ></label
                              >
                           
                           <select
                              name="languages[{{$key}}][language_level_id]"
                              class="form-control selected-level select-lang"
                              id="languages.{{$key}}.language_level_id"
                              >
                              <option value="" selected="" >
                                 Proficiency Level
                              </option>
   
                              @foreach ($language_levels as $level)
                                 <option 
                                    value="{{$level->id}}"
                                    {{ $level->id== $user_language->language_level_id ? 'selected' :'' }}
                                 >
                                    {{$level->name}}
                                 </option>
                                
                              @endforeach
                              
                              
                           </select>
   
                        </div>
                        {{-- delete btn --}}
                        @if ($key > 0)
                           <div class="col-md-1" style="margin-top:20px; ">
                              <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5" onclick="removerow('#moreLanguage-row-{{$key}}')"><i class="fa fa-trash"></i></button>
   
                           </div>
                        @endif   
                        </div>
                        
                     </div>
                        
                    
                  {{-- --- --}}
                      
                  @endforeach
                  <input type="hidden" name="languages_basics" id="languages_basics" value="{{$user_languages->count()}}">
                   
               @else
                    {{-- language --}}
                        <div
                        class="col-md-6 col-sm-12"
                        >
                        <label class="mt-4"
                           >Language
                        <span
                           class="imp"
                           >*</span
                           ></label
                           >
                        <select
                           name="languages[0][language_id]"
                           class="form-control select-lang "
                           id="languages.0.language_id"
                           >
                           <option
                              value=""
                              selected=""
                              >
                              Spoken
                              Language(s)
                           </option>
                           
                           @foreach ($languages as $language)
                           <option
                              value="{{$language->id}}"
                           >
                              {{ $language->iso_language_name }}
                           </option>
                           @endforeach
                        </select>
                     </div>
                     {{-- proficiency level --}}
                     <div
                        class="col-md-6 col-sm-12"
                        >
                        <label class="mt-4"
                           >Profeciency
                           Level
                        <span
                           class="imp"
                           >*</span
                           ></label
                           >
                        
                        <select
                           name="languages[0][language_level_id]"
                           class="form-control selected-level select-lang"
                           id="languages.0.language_level_id"
                           >
                           <option value="" selected="" >
                              Proficiency Level
                           </option>

                           @foreach ($language_levels as $level)
                              <option value="{{$level->id}}">
                                 {{$level->name}}
                              </option>
                           @endforeach
                           
                           
                        </select>

                     </div>
                     <input type="hidden" name="languages_basics" id="languages_basics" value="1">

                  {{-- --- --}}
               @endif
              
            </div>
            {{-- add another language btn --}}
            <button
               type="button"
               class="my-2"
               id="add-language"
               onclick="addMoreLanguages()"
               >
               Add another
            </button>

         </div>
      </div>
      <div class="setProfile">
         <div class="col-md-12">
            <button type="submit" class="btn btn-continue btn-secondary ">
            Continue
            </button>
         </div>
      </div>
   </form>
</div>
