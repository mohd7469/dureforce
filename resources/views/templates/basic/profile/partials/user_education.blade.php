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
                     name="institute_name[]"
                     id="institute_name"
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
                     type="text"
                     name="institute_name[]"
                     id="institute_name"
                     placeholder="E.g. University Of London"
                     />
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label class="mt-4">Degree <span class="imp">*</span>
                     </label>
                     <select name="degree" class="form-control select-lang">
                        <option value="" selected=""> Select Degree </option>
                        <option value="1"> BSCS </option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label class="mt-4">Field Of Study <span class="imp">*</span>
                     </label>
                     <input type="text" name="field[]" placeholder="Visual Arts" />
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
                        name="isCurrent[]"
                        id="flexCheckDefault"
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
                        name="start_date_institute[]"
                        id="from_date"
                        onchange="setMinDateInsti($(this), $('.end-date-insti'))"
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
                        name="end_date_institute[]"
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
                     name="institute_description[]"
                     placeholder="Add Description  "
                     id="institute_description"
                     ></textarea>
               </div>
            </div>
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