<div class="modal fade" id="clientBasicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Edit Basic Details</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            {{-- {{ route('profile.basics.save') }} --}}
             <form action="" method="POST" id="form-basic-save" class="form-basic-save"
                enctype="multipart/form-data">
                @csrf
                <div>
                   {{-- <label class="mt-4">Profile Picture</label>
                   <div class="profile-img col-md-12" action="">
                   <input type="file" name="profile_picture" id="img-upload" accept="image/png, image/gif, image/jpeg"
                           class="imgInp" onchange="previewFile(this)"
                           title=""/>
                    <image class="card-img-top image-ui" width="100" height="100" id="preview-img" src="{{ !empty($basicProfile->profile_picture)? $basicProfile->profile_picture: getImage('assets/images/default.png') }}" alt="">
                   </div> --}}
                   <div class="row">
                      <div class="col-md-12 col-sm-12">
                         <label class="mt-4"
                            >
                            {{-- Designation --}}
                            Title
                         <span class="imp"
                            >*</span
                            >
                            <small></small>
                            </label
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
                         >About 
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
                   <div class="row">
                   <div class="col-md-6">
                      <label class="mt-4"
                         >City
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
                            Select Location
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
                   {{-- location --}}
                   <div class="col-md-6">
                                        
                     <label class="mt-4">Location *  </label>
                     <select
                         name="country_id"
                         class="form-control select-lang"
                         id="country_id"
                         >
                         <option
                             value=""
                         >
                             Select Country

                         </option>

                         @foreach ($countries as $country)
                             <option
                             value="{{$country->id}}"
                             {{ $country->id == auth()->user()->country_id ? 'selected' : '' }}
                             >
                             {{$country->name}}
                             </option>
                         @endforeach

                     </select>
                     
                 </div>
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
                   </div>
                   {{-- phone --}}
                   <div class="col-md-12">
                      <label class="mt-4"
                         >Email
                      <span class="imp"
                         >*</span
                         ></label
                         >
                      <input
                         type="email"
                         name="email"
                         placeholder=""
                         id="email"
                         value="{{auth()->user()->email}}"
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
                      <div id="moreLanguage-row-{{$key}}">
                         <div class="row">
                            <div
                               class="col-md-6 col-sm-12"
                               >
                               <label class="mt-4"
                                  >Language
                               <span
                                  class="imp"
                                  >*</span
                                  >{{ $user_language->language_id ==App\Models\Language::$ENGLISH_LANGUAGE_ID  ?  ' (English is mandatory) ' : '' }}
                                  </label
                                  >
                               <select
                                  name="languages[{{$key}}][language_id]"
                                  class="form-control select-lang "
                                  id="languages.{{$key}}.language_id"
                                  style="{{ $user_language->language_id ==App\Models\Language::$ENGLISH_LANGUAGE_ID  ?  'pointer-events: none; ' : '' }}"
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
                               class="{{ $key > 0 ? 'col-md-6' : 'col-md-6'  }} col-sm-12"
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
                                  <option value="" selected="">
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
                            {{-- @if ($key > 0)
                            <div class="col-md-1" style="margin-top:20px; ">
                               <button type="button" class="btn btn-danger btn-delete col-md-1 mt-5"
                                  onclick="removerow('#moreLanguage-row-{{$key}}')"><i
                                  class="fa fa-trash"></i></button>
                            </div>
                            @endif --}}
                         </div>
                      </div>
                      {{-- --- --}}
                      @endforeach
                      <input type="hidden" name="languages_basics" id="languages_basics"
                         value="{{$user_languages->count()}}">
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
                            <option value="" selected="">
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
                {{-- <div class="">
                   <div class="col-md-12">
                      <button type="submit" class="btn btn-continue btn-secondary ">
                      Continue
                      </button>
                   </div>
                </div> --}}

                <div class="modal-footer pb-4 pt-4">
                  <button type="button" class="btn   btn-secondary c-canel" data-bs-dismiss="modal">Cancle</button>
                  <button type="submit" class="btn btn-continue  btn-secondary">Save</button>
               </div>
             </form>
          </div>
          
       </div>
    </div>
 </div>

 <style>
    .modal-header .btn-close {
        margin-bottom: 0px !important;
    }
    .modal-dialog{
       max-width:100% !important;
      
    }
    .setProfile .profile-img img{
       width:100px;
       height:100px;
       margin:0px !important;
    }
    .mt-4 {
    margin-top: 1rem!important;
    float:left;
}
.modal-body {
    max-height:100% !important;
    }
    .setProfile .profile-img{
       height:105px;
    }
    .setProfile .profile-img {
    height: 105px;
    position: relative;
    left: 120px;
}
 </style>