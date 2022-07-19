$(document).ready(function () {
  $("#profileForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
      type: "POST",
      url: "{{ route('user.profileSave') }}",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        //
        // console.log("success");
        // console.log(data);
      },
      error: function (data) {
        console.log("error");
        console.log(data);
      },
    });
  });

  $('#skills').change(function(e){
    var vals = $(this).val();
    console.log(vals);
    if(vals.indexOf('ui design') > -1) {
      $('#btn-skill').prop('disabled', true);
    } else {
      $('#btn-skill').prop('disabled', false);
    }

    if(vals.indexOf('research') > -1) {
      $('#btn-skill-research').prop('disabled', true);
    } else {
      $('#btn-skill-research').prop('disabled', false);
    }

  })

  // $('#skills > option:selected').each(function() {
  //   if($(this).val() == "ui design") {
  //     $('#btn-skill').attr('disabled', true);
  //   } else {
  //     $('#btn-skill').prop('disabled', false);
  //   }

  //   if($(this).val() == "research") {
  //     $('#btn-skill-research').prop('disabled', true);
  //   } else {
  //     $('#btn-skill-research').prop('disabled', false);
  //   }
  // });
});

function changeProfileImage() {
  let a = document.getElementById("profile-picture").value;
}

// =========================================== Language area  ==============================================

function addMoreLanguages() {
  languageRow.append(`
                       <div id="moreLanguage-row">
                            <hr>
                       <div class="row" style="align-items: center; justify-content: space-between!important">
                         <div class="col-md-6 col-sm-10">
                            <label class="mt-4">Language <span class="imp">*</span></label>
                            <select name="languages[]" class="form-control select-lang py-2" id="">
                                <option value="" disabled selected>
                                   Spoken Language(s)
                                </option>
                               ${_languages?.map((language) => {
                                 return ` <option value="${language.id}"> ${language.name}</option>`;
                               })}
    </select>
  </div>
 <div class="col-md-5 col-sm-10">
    <label class="mt-4">Profeciency Level <span class="imp">*</span></label>
    <select name="language_level[]" class="form-control select-lang"
                                id="" required>
                                <option value="" disabled selected>
                                                           My Level is
                                                        </option>
                                ${_languages_levels?.map((level) => {
                                  return ` <option value="${level.id}"> ${level.name}</option>`;
                                })}
    </select>
</div>
<button type="button" class="btn btn-danger btn-delete col-md-1 mt-5" onclick="removeLanguageRow($('#moreLanguage-row'))"><i class="fa fa-trash"></i></button>
</div>
</div>
`);
}

$(document).ready(function () {
  basicProfileForm();
  experienceProfileForm();
  educationProfileForm();
  sillsProfileForm();
  rateProfileForm();
});
function basicProfileForm() {
  $(".form-basic-save").submit(function (e) {
    var title = $("#title").val();
    var about = $("#about").val();
    var location = $("#location").val();
    var phone = $("#phone").val();
    $(".error").remove();

    if ($.trim(title).length < 1) {
      e.preventDefault();
      $("#title").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(about).length < 1) {
      e.preventDefault();
      $("#about").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(location).length < 1) {
      e.preventDefault();
      $("#location").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(phone).length < 1) {
      e.preventDefault();
      $("#phone").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($("#languages :selected").val() < 1) {
      e.preventDefault();
      $("#languages").after(
        '<span class="error text-danger">This field is required </span>'
      );
    }
    if ($("#langLevel :selected").val() < 1) {
      e.preventDefault();
      $("#langLevel").after(
        '<span class="error text-danger">This field is required </span>'
      );
    }
  });
}
function experienceProfileForm() {
  $(".form-experience-save").submit(function (e) {
    var ex_description = $("#ex_description").val();
    var ex_title = $("#ex_title").val();
    var ex_company = $("#ex_company").val();
    var ex_location = $("#ex_location").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    $(".error").remove();

    if ($.trim(ex_description).length < 1) {
      e.preventDefault();
      $("#ex_description").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(ex_title).length < 1) {
      e.preventDefault();
      $("#ex_title").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(ex_company).length < 1) {
      e.preventDefault();
      $("#ex_company").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(ex_location).length < 1) {
      e.preventDefault();
      $("#ex_location").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(start_date).length < 1) {
      e.preventDefault();
      $("#start_date").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
  });
}
function educationProfileForm() {
  $(".user-education-form").submit(function (e) {
    var institute_name = $("#institute_name").val();
    var degree = $("#degree").val();
    var field = $("#field").val();
    var from_date = $("#from_date").val();
    var to_date = $("#to_date").val();
    var institute_description = $("#institute_description").val();
    $(".error").remove();

    if ($.trim(institute_name).length < 1) {
      e.preventDefault();
      $("#institute_name").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(degree).length < 1) {
      e.preventDefault();
      $("#degree").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(field).length < 1) {
      e.preventDefault();
      $("#field").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(from_date).length < 1) {
      e.preventDefault();
      $("#from_date").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(to_date).length < 1) {
      e.preventDefault();
      $("#to_date").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
    if ($.trim(institute_description).length < 1) {
      e.preventDefault();
      $("#institute_description").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
  });
}
function sillsProfileForm() {
  $(".user-skills-form").submit(function (e) {
    var skills = $("#skills").val();
    $(".error").remove();

    if ($.trim(skills).length < 1) {
      e.preventDefault();
      $("#skills_error").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
  });
}
function rateProfileForm() {
  $(".user-rate-form").submit(function (e) {
    var rate = $("#rate").val();
    $(".error").remove();

    if ($.trim(rate).length < 1) {
      e.preventDefault();
      $("#rate").after(
        '<span class="error text-danger">This field is required</span>'
      );
    }
  });
}


function addSkills(value, element) {
  $('#skills').append(`
    <option value="${value}" selected>${value}</option>
  `)

  element.prop('disabled', true);
}