
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
            <div >
               <div id="experiance-container">

              
                  @if (count($userexperiences->experiences) > 0)
                     
                     @foreach ($userexperiences->experiences as  $key => $Userexperience)
                       
                        <div
                        id="experiance-row-{{$key}}"
                          
                        >
                        @if ($key > 0)
                        <hr/>
                        @endif
                           <div
                              data-cycle="1"
                              class="experience-container"
                           >
                              @if ($key>0)
                                 <button type="button" class="btn btn-danger float-right" onclick="removerow('#experiance-row-{{$key}}')"><i class="fa fa-trash"></i></button>
                                  
                              @endif
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
                                       name="experiences[{{$key}}][job_title]"
                                       id="experiences.{{$key}}.job_title"
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
                                       name="experiences[{{$key}}][company_name]"
                                       id="experiences.{{$key}}.company_name"
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
                                    name="experiences[{{$key}}][country_id]"
                                    class="form-control select-lang"
                                    id="experiences.{{$key}}.country_id"
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
                                          onclick="checkDate($(this), $('.end-date-job-{{$key}}'))"
                                          type="checkbox"
                                          name="experiences[{{$key}}][is_working]"
                                          id="experiences.{{$key}}.is_working"
                                          {{ $Userexperience['is_working']==1  ? 'checked' : ''}}
                  
                                          
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
                                          name="experiences[{{$key}}][start_date]"
                                          id="experiences.{{$key}}.start_date"
                                          onchange="setMinDateJob($(this), $('.end-date-job-{{$key}}'))"
                                          value="{{\Carbon\Carbon::parse($Userexperience['start_date'])->format('d-m-Y') }}" 


                                          
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
                                          class="end-date-job-{{$key}}"
                                          id="experiences.{{$key}}.end_date"
                                          onchange="checkIfDateGreaterJob($(this))"
                                          type="date"
                                          name="experiences[{{$key}}][end_date]"
                                          value="{{\Carbon\Carbon::parse($Userexperience['end_date'])->format('dd/mm/YY')}}"
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
                                       name="experiences[{{$key}}][description]"
                                       placeholder="Job Description"
                                       id="experiences.{{$key}}.description"
                                    >{{$Userexperience['description']}}</textarea>
                              </div>
                           </div>
                        </div>
                        <input type="hidden" name="experience_count" id="experience_count" value="{{count($userexperiences->experiences)}}">
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
                                    name="experiences[0][job_title]"
                                    id="experiences.0.job_title"
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
                                 name="experiences[0][company_name]"
                                 id="experiences.0.company_name"
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
                                 name="experiences[0][country_id]"
                                 class="form-control select-lang"
                                 id="experiences.0.country_id"
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
                                       name="experiences[0][is_working]"
                                       id="experiences.0.is_working"
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
                                       name="experiences[0][start_date]"
                                       id="experiences.0.start_date"
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
                                       id="experiences.0.end_date"
                                       onchange="checkIfDateGreaterJob($(this))"
                                       type="date"
                                       name="experiences[0][end_date]"
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
                                    name="experiences[0][description]"
                                    placeholder="Job Description"
                                    id="experiences.0.description"
                                 ></textarea>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="experience_count" id="experience_count" value="1">

                  @endif
               </div>
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