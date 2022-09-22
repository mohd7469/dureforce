<div class="setProfile" id="user-skills">
   <form action="{{ route('user.profile.save.skills') }}" method="POST" class="user-skills-form">
      @csrf
      <div class="container-fluid welcome-body px-5">
         <h1 class="mb-4">Expertise & Skills</h1>
         <span class="cmnt pb-4">
         Complete your profile to join our global community of freelancers and start
         selling
         your
         service
         to growing network of businesses.</span>
         <div>
            <div
               class="row mt-3"
               id="rate-row"
               >
               <div
                  class="col-xl-7 col-md-7 col-lg-7 form-group select2Tag"
                  >
                  <label class=""
                     >Hourly Rate
                  <span
                     class="imp"
                     >*</span
                     ></label
                     >
                  <div class="input-group">
                     <input
                        type="number"
                        name="rates"
                        class="field-rate col-md-10"
                        min="0"
                        id="rate"
                        value=""
                        />
                     <span class="input-group-text float-end">$</span>
                  </div>
               </div>
               <div
                  class="col-xl-5 col-md-5 col-lg-5"
                  >
                  <div class="card w-100 bg-light">
                     <div class="card-body form-group pt-3">
                        <label for="" ><strong class="text-dark">Dureforce Service Fee</strong></label>
                        <small  class="form-text text-muted">20% Service Fee <a href="#" class="link-space">Explain this</a></small><br>
                        <span class="pt-2 text-dark">$12.00</span>
                     </div>                               
                  </div>
               </div>
            </div>
            <hr>
            <div>
               <div class="row mt-3"
                  id="skill-row"
                  >
                  <div
                     class="col-xl-6 col-md-12 col-lg-6 form-group select2Tag mb-4"
                     >
                     <label
                        >Your Skills
                     <span
                        class="imp"
                        >*</span
                        ></label
                        >
                     <select
                        class="form-control select2 select2-hidden-accessible"
                        name="skills[]"
                        id="skills"
                        multiple=""
                        data-select2-id="select2-data-skills"
                        tabindex="-1"
                        aria-hidden="true"
                        ></select
                        >
                     <span
                        class="select2 select2-container select2-container--default"
                        dir="ltr"
                        data-select2-id="select2-data-14-wkwg"
                        style="
                        width: auto;
                        "
                        >
                        <span
                           class="selection"
                           >
                           <span
                              class="select2-selection select2-selection--multiple"
                              role="combobox"
                              aria-haspopup="true"
                              aria-expanded="false"
                              tabindex="-1"
                              aria-disabled="false"
                              >
                              <ul
                                 class="select2-selection__rendered"
                                 id="select2-skills-container"
                                 ></ul>
                              <span
                                 class="select2-search select2-search--inline"
                                 ><input
                                 class="select2-search__field"
                                 type="search"
                                 tabindex="0"
                                 autocorrect="off"
                                 autocapitalize="none"
                                 spellcheck="false"
                                 role="searchbox"
                                 aria-autocomplete="list"
                                 autocomplete="off"
                                 aria-describedby="select2-skills-container"
                                 placeholder=""
                                 style="
                                 width: 0.75em;
                                 " /></span>
                           </span>
                        </span
                           >
                        <span
                           class="dropdown-wrapper"
                           aria-hidden="true"
                           ></span
                           >
                     </span>
                     <small
                        >Type Skills and
                     Enter
                     press</small
                        >
                     <p
                        id="skills_error"
                        ></p>
                  </div>
                  <div
                     class="col-xl-12 col-md-12 col-lg-12 form-group add-skills"
                     >
                     <br />
                     <h5>
                        Suggested Skills
                     </h5>
                     <ul class="" id="">
                        <li
                           class="suggest-skill"
                           title=""
                           >
                           ui design
                           <button
                              type="button"
                              id="btn-skill"
                              onclick="addSkills('ui design', $('#btn-skill'))"
                              >
                           +
                           </button>
                        </li>
                        <li
                           class="suggest-skill"
                           title=""
                           >
                           research
                           <button
                              type="button"
                              id="btn-skill-research"
                              onclick="addSkills('research', $('#btn-skill-research'))"
                              >
                           +
                           </button>
                        </li>
                     </ul>
                     <br />
                  </div>
               </div>
            </div>
         </div>
         <div class="setProfile p-0">
            <div class="col-md-12">
               <button type="submit" class="btn btn-continue m-0 btn-secondary ">
               Continue
               </button>
            </div>
         </div>
      </div>
   </form>
</div>