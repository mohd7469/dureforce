<div class="setProfile" id="user-education">
   <form action="{{ route('education.save') }}" id="freelancer-education-save" method="POST" class="user-education-form">
      <div
      id="profile2"
      role="tabpanel"
      class="tab-pane"
   >

   {{ csrf_field() }}
      <div class="container-fluid welcome-body px-5">
         <h1 class="mb-4">Education</h1>
         <span class="cmnt pb-4">
         Complete your profile to join our global community of freelancers and start
         selling
         your
         service
         to growing network of businesses.</span>
         <div>
            <div
               id="education-container"
               >
             
               @if (count($usereducations->education) > 0)
             
                     
               @foreach ($usereducations->education as  $key => $Usereducation)
               {{-- {{dd($Usereducation)}} --}}
               <div
                        id="education-row-{{$key}}"
                          
                        >
               @if ($key > 0)
                        <hr/>
                  @endif
             
                  @if ($key>0)
                                 <button type="button" class="btn btn-danger float-right" onclick="removerow('#education-row-{{$key}}')"><i class="fa fa-trash"></i></button>
                                  
                        @endif
               <div class="col-md-12">
                  <label class="mt-4"
                     >School /
                  College /
                  University
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <input
                     type="text"
                     
                     name="educations[{{$key}}][school_name]"
                     id="educations.{{$key}}.school_name"
                     value="{{$Usereducation['school_name']}}"
                     placeholder="E.g. University Of London"
                     />
               </div>
               <div class="col-md-12">
                  <label class="mt-4"
                     >Education
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <input
                     name="educations[{{$key}}][education]"
                     id="educations.{{$key}}.education"
                     value="{{$Usereducation['education']}}"
                     type="text"
                     placeholder="E.g. University Of London"
                     />
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label class="mt-4">Degree <span class="imp">*</span>
                     </label>
                     <select name="educations[{{$key}}][degree_id]" class="form-control select-lang">
                        <option value="" selected=""> Select Degree </option>
                        <option value="1"> BSCS </option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="mt-4">Field Of Study <span class="imp">*</span>
                     </label>
                     <input 
                     type="text" 
                     name="educations[{{$key}}][field_of_study]"
                     id="educations.{{$key}}.field_of_study"
                     value="{{$Usereducation['field_of_study']}}"
                     
                   placeholder="Visual Arts" />
                  </div>
               </div>
               <div class="col-md-12 mt-1"
                  >
                  <div
                     class="form-check"
                     >

                     <input
                        class="form-check-input check current-working-check"
                        onclick="checkDate($(this), $('.end-date-job-0'))"
                        type="checkbox"
                        name="educations[{{$key}}][is_enrolled]"
                        id="educations.{{$key}}.is_enrolled"
                        value="{{$Usereducation['is_enrolled'] ==1   ? 'checked' : ''}}"
                     />

                     <label
                        class="form-check-label"
                        for="flexCheckDefault"
                        >
                        I’m
                        currently
                        enroll
                        here
                     </label
                        >
                  </div>
               </div>
               <div class="col-md-12">
                  <label class="mt-4"
                     >Dates Attended
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
               </div>
               <div class="row">
                  <div
                     class="col-md-6"
                     >
                     <label
                        for=""
                        class="mt-4"
                        >From Date
                     <span
                        class="imp"
                        >*</span
                        ></label
                        >
                     <input
                        type="date"
                        name="start_date[]"
                        id="from_date"
                        onchange="setMinDateInsti($(this), $('.end-date-0'))"
                        
                        />
                  </div>
                  <div
                     class="col-md-6"
                     >
                     <label
                        for=""
                        class="mt-4"
                        >To Date
                     <span
                        class="imp"
                        >*</span
                        ></label
                        >
                     <input
                        type="date"
                        class="start_date_job[]"
                        name="end_date[]"
                        id="to_date"
                        onchange="checkIfDateGreaterInsti($(this))"
                        />
                  </div>
               </div>
               <div class="col-md-12">
                  <label class="mt-4"
                     >Description
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <textarea
                     cols=""
                     rows="5"
                     name="educations[{{$key}}][description]"
                     id="educations.{{$key}}.description"
                     placeholder="Add Description  "
                   
                     >{{$Usereducation['description']}}</textarea>
               </div>
               </div>
               @endforeach
               @else
   
             
               <div class="col-md-12">
                  <label class="mt-4"
                     >School /
                  College /
                  University 
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                     
                  <input
                     type="text"
                     name="educations[0][school_name]"
                     id="educations.0.school_name"
                     placeholder="E.g. University Of Lo sdssdndon"
                     />
               </div>
               <div class="col-md-12">
                  <label class="mt-4"
                     >Education
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <input

                     name="educations[0][education]"
                     id="educations.0.education"
                     value=""
                     type="text"
                     placeholder="E.g. University Of London"
                     />
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label class="mt-4">Degree <span class="imp">*</span>
                     </label>
                     <select name="educations[0][degree_id]" class="form-control select-lang">
                        <option value="" selected=""> Select Degree </option>
                        <option value="77"> BSCS </option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="mt-4">Field Of Study <span class="imp">*</span>
                     </label>
                     <input 
                     type="text" 
                     name="educations[0][field_of_study]"
                     id="educations.0.field_of_study"
                   placeholder="Visual Arts" />
                  </div>
               </div>
               <div class="col-md-12 mt-1"
                  >
                  <div
                     class="form-check"
                     >
                     <input
                        class="form-check-input check current-working-check"
                        onclick="checkDate($(this), $('.end-date-job-0'))"
                        type="checkbox"
                        name="experiences[0][isCurrent]"
                        id="experiences.0.isCurrent"
                        
                        />
                     <label
                        class="form-check-label"
                        for="flexCheckDefault"
                        >I’m
                     currently
                     enroll
                     here</label
                        >
                  </div>
               </div>
               <div class="col-md-12">
                  <label class="mt-4"
                     >Dates Attended
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
               </div>
               <div class="row">
                  <div
                     class="col-md-6"
                     >
                     <label
                        for=""
                        class="mt-4"
                        >From Date
                     <span
                        class="imp"
                        >*</span
                        ></label
                        >
                     <input
                        type="date"

                        name="educations[0][start_date]"
                        id="educations.0.start_date"
                        onchange="setMinDateJob($(this), $('.end-date-job-0'))"
       
                        />
                  </div>
                  <div
                     class="col-md-6"
                     >
                     <label
                        for=""
                        class="mt-4"
                        >To Date
                     <span
                        class="imp"
                        >*</span
                        ></label
                        >
                     <input
                        type="date"
                        name="educations[0][end_date]"
                        id="educations.0.end_date"
                        onchange="setMinDateJob($(this), $('.end-date-job-0'))"
                      
                        
                        onchange="checkIfDateGreaterInsti($(this))"
                        />
                  </div>
               </div>
               <div class="col-md-12">
                  <label class="mt-4"
                     >Description
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <textarea
                     cols=""
                     rows="5"
                     name="educations[0][description]"
                     id="educations.0.description"
                     placeholder="Add Description  "
                   
                     ></textarea>
               </div>
            </div>
            @endif
            <button
               type="button"
               class="my-2"
               onclick="addEducation()"
               >
            Add another
            </button>
            {{-- <button type="submit" class="my-3">Continue</button> --}}
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