
<div class="setProfile" id="user-exp">
         
   <form action="{{ route('profile.experience.save') }}" method="POST" id="freelancer-experience-save" class="form-experience-save">
         
      <div
            id="profile2"
            role="tabpanel"
            class="tab-pane"
         >

         {{ csrf_field() }}

         <div
            class="container-fluid welcome-body px-5"
            id=""
         >
            <h1 class="mb-4">Experience</h1>
            <span class="cmnt pb-4">
                  Complete your profile to
                  join our global community of
                  freelancers and start
                  selling your service to
                  growing network of
                  businesses.</span
            >
            <div>
                  @if (count($userexperiences->experiences) > 0)
                     @foreach ($userexperiences->experiences as  $Userexperience)
                        <div
                           id="experiance-container"
                        >
                           <div
                              data-cycle="1"
                              class="experience-container"
                           >
                              <div
                                    class="col-md-12"
                              >
                                    <label
                                       class="mt-4"
                                       >Job Title
                                       <span
                                          class="imp"
                                          >*</span
                                       ></label
                                    >
                                    <input
                                       type="text"
                                       name="job_title[]"
                                       id="ex_title"
                                       placeholder="E.g. Full Stack Developer"
                                       value="{{$Userexperience['job_title']}}"
                                    />
                              </div>
                              <div
                                    class="col-md-12"
                              >
                                    <label
                                       class="mt-4"
                                       >Company
                                       <span
                                          class="imp"
                                          >*</span
                                       ></label
                                    >
                                    <input
                                       type="text"
                                       name="company[]"
                                       id="ex_company"
                                       placeholder="E.g. Microsoft"
                                       value="{{$Userexperience['company_name']}}"
                                    />
                              </div>
                              <div
                                    class="col-md-12"
                                    >
                                    <label
                                       class="mt-4"
                                       >Location
                                       <span
                                          class="imp"
                                          >*</span
                                       ></label
                                    >
                                    <select
                                    name="job_location"
                                    class="form-control select-lang"
                                    id="job_location"
                                    >
                                    <option
                                       value=""
                                       selected=""
                                    >
                                       Select Country
                                    </option>
                                    @foreach ($countries as $country)
                                    <option  
                                       value="{{$country->id}}"
                                       {{ $country->id == $Userexperience['country_id'] ? 'selected' : ''}}
                                    >
                                       {{$country->name}}
                                    </option>
                                    @endforeach
                              </select>
                              </div>
                              <div
                                    class="col-md-12 mt-1"
                                    >
                                    <div
                                       class="form-check"
                                    >
                                       <input

                                          class="form-check-input check current-working-check isCurrentmessageCheckbox"
                                          onclick="checkDate($(this), $('.end-date-job-0'))"
                                          type="checkbox"
                                          name="isCurrent[]"
                                          id="flexCheckDefault"

                                          value="{{ $Userexperience['is_working']  ? 'check' : ''}}"
                  
                                          
                                       />
                                       <label
                                          class="form-check-label"
                                          for="flexCheckDefault"
                                          >I’m
                                          currently
                                          working
                                          here</label
                                       >
                                    </div>
                              </div>

                              <div class="row">
                                    <div
                                       class="col-md-6"
                                    >
                                       <label
                                          for=""
                                          class="mt-4"
                                          >Start
                                          Date
                                          <span
                                                class="imp"
                                                >*</span
                                          ></label
                                       >
                                       <input
                                          type="date"
                                          name="start_date_job[]"
                                          id="ex_start_date"
                                          onchange="setMinDateJob($(this), $('.end-date-job-0'))"
                                          value="{{\Carbon\Carbon::parse($Userexperience['start_date_job'])->format('d-m-Y') }}" 


                                          
                                       />
                                    </div>
                                    <div
                                       class="col-md-6 date-picker-container"
                                    >
                                       <label
                                          for=""
                                          class="mt-4"
                                          >End
                                          Date
                                          <span
                                                class="imp"
                                                >*</span
                                          ></label
                                       >
                                       <input
                                          class="end-date-job-0"
                                          id="ex_end_date"
                                          onchange="checkIfDateGreaterJob($(this))"
                                          type="date"
                                          name="end_date_job[]"
                                          value="{{\Carbon\Carbon::parse($Userexperience['end'])->format('dd/mm/YY')}}"
                                       />
                                    </div>
                              </div>
                              <div
                                    class="col-md-12"
                              >
                                    <label
                                       class="mt-4"
                                       >Description
                                       <span
                                          class="imp"
                                          >*</span
                                       ></label
                                    >
                                    <textarea
                                       cols="10"
                                       rows="5"
                                       name="job_description[]"
                                       placeholder="Job Description"
                                       id="ex_description"
                                    >{{$Userexperience['description']}}</textarea>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  @else
                        <div
                        id="experiance-container"
                        >
                        <div
                           data-cycle="1"
                           class="experience-container"
                        >
                           <div
                                 class="col-md-12"
                           >
                                 <label
                                    class="mt-4"
                                    >Job Title
                                    <span
                                       class="imp"
                                       >*</span
                                    ></label
                                 >
                                 <input
                                    type="text"
                                    name="job_title[]"
                                    id="ex_title"
                                    placeholder="E.g. Full Stack Developer"
                                    value=""
                                 />
                           </div>

                           <div
                              class="col-md-12"
                           >
                              <label
                                 class="mt-4"
                                 >Company
                                 <span
                                    class="imp"
                                    >*</span
                                 ></label
                              >
                              <input
                                 type="text"
                                 name="company[]"
                                 id="ex_company"
                                 placeholder="E.g. Microsoft"
                                 value=""
                              />

                           </div>
                           <div
                                 class="col-md-12"
                                 >
                                 <label
                                    class="mt-4"
                                    >Location
                                    <span
                                       class="imp"
                                       >*</span
                                    ></label
                                 >
                                 <select
                                 name="job_location"
                                 class="form-control select-lang"
                                 id="job_location"
                                 >
                                 <option value="" ></option>
                                 <option
                                    value=""
                                    selected=""
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
                           <div
                                 class="col-md-12 mt-1"
                                 >
                                 <div
                                    class="form-check"
                                 >
                                    <input
                                       class="form-check-input check current-working-check isCurrentmessageCheckbox"
                                       onclick="checkDate($(this), $('.end-date-job-0'))"
                                       type="checkbox"
                                       name="isCurrent[]"
                                       id="flexCheckDefault"
                                       value="" 
               
                                       
                                    />
                                    <label
                                       class="form-check-label"
                                       for="flexCheckDefault"
                                       >I’m
                                       currently
                                       working
                                       here</label
                                    >
                                 </div>
                           </div>

                           <div class="row">
                                 <div
                                    class="col-md-6"
                                 >
                                    <label
                                       for=""
                                       class="mt-4"
                                       >Start
                                       Date
                                       <span
                                             class="imp"
                                             >*</span
                                       ></label
                                    >
                                    <input
                                       type="date"
                                       name="start_date_job[]"
                                       id="ex_start_date"
                                       onchange="setMinDateJob($(this), $('.end-date-job-0'))"
                                       value="" 


                                       
                                    />
                                 </div>
                                 <div
                                    class="col-md-6 date-picker-container"
                                 >
                                    <label
                                       for=""
                                       class="mt-4"
                                       >End
                                       Date
                                       <span
                                             class="imp"
                                             >*</span
                                       ></label
                                    >
                                    <input
                                       class="end-date-job-0"
                                       id="ex_end_date"
                                       onchange="checkIfDateGreaterJob($(this))"
                                       type="date"
                                       name="end_date_job[]"
                                       value=""
                                    />
                                 </div>
                           </div>
                           <div
                                 class="col-md-12"
                           >
                                 <label
                                    class="mt-4"
                                    >Description
                                    <span
                                       class="imp"
                                       >*</span
                                    ></label
                                 >
                                 <textarea
                                    cols="10"
                                    rows="5"
                                    name="job_description[]"
                                    placeholder="Job Description"
                                    id="ex_description"
                                 ></textarea>
                           </div>
                        </div>
                     </div>
                  @endif
                
                  <button
                     type="button"
                     class="my-2"
                     onclick="addMoreExperiance()"
                  >
                     Add another
                  </button>
            </div>
         </div>
         <div class="setProfile">
            <div class="col-md-12">
                  <button
                     type="submit"
                     class="btn btn-continue btn-secondary experiance-submit"
                  >
                     Continue
                  </button>
            </div>
         </div>
      </form>
   </div>
  </div>