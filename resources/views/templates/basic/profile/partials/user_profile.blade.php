<div class="setProfile" id="basic-profile">
   <form action="{{ route('user.profile.save') }}" method="POST" id="form-basic-save" class="form-basic-save" enctype="multipart/form-data">
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
               <input type="file" name="image" id="img-upload" accept="image/png, image/gif, image/jpeg"
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
                     name="category_id"
                     class="form-control select-lang"
                     id="languages"
                     >
                     <option
                        value=""
                        selected=""
                        >
                        Select Category
                     </option>
                     @foreach ($categories as $category)
                     <option
                         value="{{$category->id}}"
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
                     value=""
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
                  ></textarea>
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
                     name="country_id"
                     class="form-control select-lang"
                     id="languages"
                     >
                     <option
                        value=""
                     >
                        Select Country

                     </option>
                     @foreach ($countries as $country)

                        <option
                           value="{{$country->id}}"
                        
                        >
                           {{$country->name}}
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
                  value=""
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
                     class="form-control select-lang select2"
                     id="languages"
                     >
                     <option
                        value=""
                        selected=""
                        >
                        Spoken
                        Language(s)
                     </option>
                     <option
                        value=""
                        >
                        Select Language
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
                     name="languages[0][language_level]"
                     class="form-control selected-level select-lang"
                     id="langLevel"
                     >
                     <option
                        value=""
                        selected=""
                        >
                        Proficiency Level
                     </option>
                     <option
                        value="1"
                        >
                        B1
                        (Pre-Intermediate)
                     </option>
                     <option
                        value="2"
                        >
                        B2
                        (Intermediate)
                     </option>
                     <option
                        value="3"
                        >
                        C1
                        (Upper-Intermediate)
                     </option>
                     <option
                        value="4"
                        >
                        C2
                        (Advanced)
                     </option>
                  </select>

               </div>
              
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