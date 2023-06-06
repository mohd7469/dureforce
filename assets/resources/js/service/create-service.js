let stepsRow = $("#step-rows");
let addOnServiceContainer = $("#add-service-container");
let addOncustomServiceContainer = $("#add-service-custom-container");
let selector = $(".attribute-selector");
let back = $(".back");
let front = $(".front");
let add_on_service_row_number='';
let default_lead_image=$("input[name='default_lead_image_id']");
let lead_image_div=$('#lead_image_upload_div_id');
let default_lead_image_div=$('#default_lead_image_div');
"use strict";

let modules = {
  
  job_id: 1,
  service_id: 2,
  software_id: 3,

}

$(document).ready(function () {
  var service_id=$('#service_id').val();
  add_on_service_row_number=parseInt($('#number_of_add_on_services').val());
  if (service_id) {
    var category_id=$('#category').val();
    var sub_category_id=$('#sub-category').val();
    fetchSkills(category_id,sub_category_id,false);
  }
  $('.btn-link').click(function() {
    var target = $($(this).data('target'));
    
    if (target.hasClass('show')) {
      target.removeClass('show').addClass('collapsing');
    } else {
      target.removeClass('collapsing').addClass('collapse show');
    }
  });
  loadActiveTab();
  loadSelect2();
  baannerForm();
  reviewForm();
  overviewFormValidation();
  pricingFormValidation();
  requirementFormValidation();
    $('#service_features').select2({
      tags: false
    });
  // if (action != "edit") {
  //   if (selector.val() == "1") {
  //     back.attr("style", "display:none !important");
  //     front.show();
  //   } else {
  //     front.attr("style", "display:none !important");
  //     back.show();
  //   }
  // }

  $('#lead_image_type_id').on('change', function(){
    var lead_image_type = $(this).val();
    if(lead_image_type=='Default'){

        default_lead_image_div.show();
        lead_image_div.hide();

    }
    else{
      lead_image_div.show();
      default_lead_image_div.hide();
    }

  });


  $("#add-more-service").click(function () {
    addOnServiceContainer.append(addOnServiceRow());
    add_on_service_row_number+=1;
  });

  $(document).on(
    "mouseover ",
    ".nicEdit-main,.nicEdit-panelContain",
    function () {
      $(".nicEdit-main").focus();
    }
  );
  $("#add-more-customservice").click(function () {
    addOncustomServiceContainer.append(addOnServiceRowcustom());
  });

  $(document).on(
    "mouseover ",
    ".nicEdit-main,.nicEdit-panelContain",
    function () {
      $(".nicEdit-main").focus();
    }
  );

  var navListItems = $("div.setup-panel div a"),
    allWells = $(".setup-content"),
    allNextBtn = $(".nextBtn");

  allWells.hide();

  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr("href")),
      $item = $(this);

    if (!$item.hasClass("disabled")) {
      navListItems.removeClass("btn-success").addClass("btn-default");
      $item.addClass("btn-success");
      allWells.hide();
      $target.show();
      $target.find("input:eq(0)").focus();
    }
  });

  allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]')
        .parent()
        .next()
        .children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url']"),
      isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
      if (!curInputs[i].validity.valid) {
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }

    if (isValid) nextStepWizard.removeAttr("disabled").trigger("click");
  });

  $("div.setup-panel div a.btn-success").trigger("click");
});

function addSteps() {
    stepsRow.append(`
          <div id="add-on-service-step"> 
            <div class="col-12">

                    <button id="removeRow" type="button" class="btn btn-danger" style="float: right;  margin-bottom:1rem"><i class="fa fa-trash"></i></button>
            </div>
            
          <div class="col-xl-12 col-lg-12 form-group" >
              <label for="">Step Name</label>
                  <div class="col-xl-12 col-lg-12 form-group">
                      <input type="text" name="steps[]" placeholder="E.g. Initial Requirements" class="form-control step2"  />
                  </div>
                  <div>
                  <label for="discription">Step Description</label>
                  <textarea type="text" name="description[]" placeholder="This is a short description." class="form-control description2"
                      ></textarea>
                  <br />
                  <br />
              </div>
              </div>
          </div>
            
      `);
}

$(document).on("click", "#removeRow", function () {
  $(this).closest("#add-on-service-step").remove();
});

function removeExtraService(row) {
  let is_confirm = confirm(`Are you sure you want to remove field ?`);
  if (is_confirm) {
    row.remove();
  }
}

$("#category").on("change", function () {
  var category = $(this).val();
  $.ajax({
    type: "GET",
    url: route,
    data: {
      category: category    
    },
    success: function (data) {
      var html = "";
      if (data.error) {
        $("#subCategorys").empty();
        html += `<option value="1" selected >${data.error}</option>`;
        $(".mySubCatgry").html(html);
      } else {

        $("#subCategorys").empty();

        html += `<option value="" selected disabled>Select Sub Category</option>`;
        $.each(data.sub_category, function (index, item) {
            html += `<option value="${item.id}">${item.name}</option>`;
            $(".mySubCatgry").html(html);
        });

      }
    },
  });
});

$("#sub-category").on("change", function () {
  var sub_category_id = $(this).val();
  $.ajax({
    type: "GET",
    url: '/user/seller/sub-category-deliverables',
    data: {
      sub_category_id: sub_category_id,
      module_id: modules.service_id
    },
    success: function (data) {
      var html = "";
      if (data.error) {
          
        $("#deliverables").empty();
        html += `<option value="1" selected >${data.error}</option>`;
        $(".deliverables").html(html);

      } else {

        html='';
        let sub_category_deliverables = data.category_deliverable_ids;
        $('#sub_category_deliverable_ids').val(JSON.stringify(sub_category_deliverables));

        $("#deliverables").empty();
        html += `<option value="" disabled>Select Deliverables</option>`;
        $.each(data.deliverables, function (index, item) {
            html += `<option value="${item.id}" ${sub_category_deliverables.includes(item.id) ? 'selected' : ''}>${item.name}</option>`;
            $("#deliverables").html(html);
        });

      }
    },
  });
});



$(document).on("change", ".custom-file-input", function () {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

function loadSelect2() {
  $(".select2").select2({
    tags: true,
    createTag: function (params) {
      if (params.term.length > 25) {
        return null;
      }
      return {
        id: params.term,
        text: params.term,
      };
    },
  });
}

function proPicURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var preview = $(input)
        .parents(".preview-thumb")
        .find(".profilePicPreview");
      $(preview).css("background-image", "url(" + e.target.result + ")");
      $(preview).addClass("has-image");
      $(preview).hide();
      $(preview).fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

$(".profilePicUpload").on("change", function () {
  proPicURL(this);
});

$(".remove-image").on("click", function () {
  $(".profilePicPreview").css("background-image", "none");
  $(".profilePicPreview").removeClass("has-image");
});

$(".addExtra").on("click", function () {
  var html = `
  <div class="col-lg-12 extraServiceRemove">
      <div class="row">
      <div class="col-xl-9 col-lg-12 form-group">
          <input type="text" name="extra_title[]" class="form-control" placeholder="Enter title" required>
      </div>

      <div class="col-xl-2 col-lg-12 form-group">
          <div class="input-group mb-3">
              <input type="text" class="form-control" name="extra_price[]" placeholder="Enter Price" required="">
            <span class="input-group-text" id="basic-addon2">{{ __($general->cur_text) }}</span>
          </div>
      </div>
      <div class="col-xl-1">
          <button type="button" class="btn btn--danger text-white border--rounded btn-sm mt-1 removeBtn">
              <i class="fa fa-times"></i>
          </button>
      </div>
      </div>
  </div>`;
  $(".addExtraService").append(html);
});

$(document).on("click", ".removeBtn", function () {
  $(this).closest(".extraServiceRemove").remove();
});

$(".addExtraImage").on("click", function () {
  var html = `
      <div class="custom-file-wrapper removeImage">
          <div class="custom-file">
              <input type="file" class="custom-file-input" name="optional_image[]" id="customFile" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <button class="btn btn--danger text-white border--rounded removeExtraImage"><i class="fa fa-times"></i></button>
          <input type="text" class="form-control" name="optional_image_text[]"  required>
      </div>`;
  $(".addImage").append(html);
});

$(document).on("click", ".removeExtraImage", function () {
  $(this).closest(".removeImage").remove();
});

bkLib.onDomLoaded(function () {
  $(".nicEdit").each(function (index) {
    $(this).attr("id", "nicEditor" + index);
    new nicEditor({
      fullPanel: true,
    }).panelInstance("nicEditor" + index, {
      hasPanel: true,
    });
  });
});

function loadActiveTab() {
  var urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("view")) {
    const currentTab = urlParams.get("view");

    if ($(`#${currentTab}`).length > 0) {
      $(".setup-content").css({ display: "none" });
      $(`.stepwizard-step a`).removeClass("btn-success");
      $(`.stepwizard-step a[href$='${currentTab}']`).addClass("btn-success");
      $(`#${currentTab}`).css({ display: "block" });
    }
  }
}

function overviewFormValidation() {
  $(".user-profile-form").submit(function (e) {
    var title1 = $("#title_over").val();
    var description = $("#description").val();
    var select = $("#category").val();
    var sub = $("#sub-category").val();

    $(".error").remove();

    if ($("#tags :selected").length < 1) {
      e.preventDefault();
      $("#error").after(
        '<span class="error text-danger">This field is required</span>'
      );
      iziToast.error({
        message: "Tags filed is required",
        position: "topRight",
      });
    }

    if ($.trim(title1).length < 1) {
      e.preventDefault();
      $("#title_over").after(
        '<span class="error text-danger">This field is required</span>'
      );
      iziToast.error({
        message: "Title is required",
        position: "topRight",
      });
    }
    if ($.trim(description).length < 1) {
      e.preventDefault();
      $("#description").after(
        '<span class="error text-danger">This field is required</span>'
      );
      iziToast.error({
        message: "Description is required",
        position: "topRight",
      });
    }
    if ($.trim(select).length < 1) {
      e.preventDefault();
      $("#category").after(
        '<span class="error text-danger">This field is required</span>'
      );
      iziToast.error({
        message: "Category is required",
        position: "topRight",
      });
    }
    // @todo fix this validation code this code can be more concise
    if ($("#sub-category option").length > 1) {
      if ($.trim(sub).length < 1) {
        e.preventDefault();
        $("#sub-category").after(
          '<span class="error text-danger">This field is required</span>'
        );
        iziToast.error({
          message: "Sub Category is required",
          position: "topRight",
        });
      }
    }
    if ($('#service_features :selected').length<=0) {
      
        e.preventDefault();
        $(".include_error").after(
          '<span class="error text-danger">This field is required</span>'
        );
        iziToast.error({
          message: "Include features is required",
          position: "topRight",
        });
    }
    if($("input:checkbox[name='skills[]']:checked").length <= 0){
        e.preventDefault();
        iziToast.error({
          message: "Atleaset one skill is required",
          position: "topRight",
        });
     }
     
    var err = false;

   

  });
}

function baannerForm() {
  $(".banner-form").submit(function (e) {
  
    var static_banner = $("#static_image").val();
    var banner_heading = $("#banner_heading").val();
    var banner_intro = $("#banner_detail").val();
    $(".error").remove();
    if ($("#pages div#banner2").css("display") == "none") {
      if (
        $("#static_banner_image").val().length < 1 &&
        !$("input[name='image']").attr("value")
      ) {
        e.preventDefault();
        console.log($("input[name='image']").attr("value"));

        $("#static_banner_image").after(
          '<span class="error text-danger" style="margin-top:5px !important;">This field is required</span>'
        );
        iziToast.error({
          message: "Image is required",
          position: "topRight",
        });
      } else {
        return true;
      }
    } 
    else if ($("#pages div#banner1").css("display") == "none") {
      if ($.trim(banner_heading).length < 1) {
        e.preventDefault();
        $("#banner_heading").after(
          '<span class="error text-danger">This field is required</span>'
        );
        iziToast.error({
          message: "Banner Title is required",
          position: "topRight",
        });
      }
      if ($.trim(banner_intro).length < 1) {
        e.preventDefault();
        $("#banner_detail").after(
          '<span class="error text-danger">This field is required</span>'
        );
        iziToast.error({
          message: "Banner Introduction field  is required",
          position: "topRight",
        });
      }
      if ($('input:radio[name="banner_background_id"]:checked').length < 1) {
        e.preventDefault();
        $("#banner_err").after(
          '<span class="error text-danger">This field is required</span>'
        );
        iziToast.error({
          message: "Background Image is required",
          position: "topRight",
        });
        
      }

      
      if($('#lead_image_type_id').val()=='Custom' &&  $("#lead_image").val().length < 1 &&
          !$("input[name='dynamic_banner_image']").attr("value")){
        e.preventDefault();
        let lead_image_message="Please Upload Your Custom Lead Image";
        $("#lead_image").after(
          '<span class="error text-danger " style="margin-top:5px !important;">'+lead_image_message+'</span>'
        );
        
        iziToast.error({
          message: lead_image_message,
          position: "topRight",
        });
    }
    if($('#lead_image_type_id').val()=='Default' && $('input:radio[name="default_lead_image_id"]:checked').length < 1){
      e.preventDefault();  
      let lead_image_message="Please Select an image from default lead images";
        $("#default_lead_img_error").after(
          `<span class="error text-danger">`+lead_image_message+`</span>`
        );
        
      iziToast.error({
        message: lead_image_message,
        position: "topRight",
      });
    }

      if($("input:checkbox[name='technology_logos[]']:checked").length <= 0){
        iziToast.error({
          message: "Technology Logos are required",
          position: "topRight",
        });
       }
      
      if($('input:checkbox[name="technology_logos[]"]:checked').length != 3) {
          e.preventDefault();
          
          iziToast.error({
            message: "3 Technology Logos should be selected",
            position: "topRight",
          });
      }

      return true;
    }
  });
}

function reviewForm() {
  $(".review-form").submit(function (e) {
    var max_no_projects = $("#max_no_projects").val();
    $(".error").remove();
    if ($.trim(max_no_projects) < 3 || $.trim(max_no_projects) >10 ) {
      e.preventDefault();
      $("#max_no_projects").after(
        '<span class="error text-danger">Max no of simultaneous projects should be between [ 3 - 10 ] </span>'
      );
      iziToast.error({
        message: "Max no of simultaneous projects should be between [ 3 - 10 ]",
        position: "topRight",
      });
    }
    if ($("input:checkbox[name=copyright_notice]:checked").length < 1) {
      e.preventDefault();
      $("#copy").after(
        '<span class="error text-danger">This field is required</span>'
      );
      iziToast.error({
        message: "Terms of Service field is required",
        position: "topRight",
      });
    }
    if ($("input:checkbox[name=privacy_notice]:checked").length < 1) {
      e.preventDefault();
      $("#copy1").after(
        ' <span class="error text-danger">This field is required</span>'
      );
      iziToast.error({
        message: "Privancy Notice field is required",
        position: "topRight",
      });
    }
  });
}
function showValidationError(error){
  iziToast.error({
    message: error,
    position: "topRight",
  });
}

function pricingFormValidation() {
  $(".user-pricing-form").submit(function (e) {
    var new_delivery = $("#delivery").val();
    var new_price = $("#price").val();

    $(".error").remove();

    if ($("#deliverables :selected").length >= 0) {
      if ($("#deliverables :selected").length < 1) {
        e.preventDefault();
        $(".del_error").after(
          '<span class="error text-danger">This field is required</span>'
        );
        showValidationError('Deliverables field is required');
      }

      // if ($("#deliverables :selected").length > 3) {
      //   e.preventDefault();
      //   $(".del_error").after(
      //     '<span class="error text-danger">Cannot select more than 3</span>'
      //   );
      //   showValidationError('Cannot select more than 3');
      // }
    }

    if ($.trim(new_delivery) < 1) {
      e.preventDefault();
      $("#delivery").after(
        '<span class="error text-danger mt-1">This field is required</span>'
      );
      showValidationError('estimated delivery time field is required');
    }
    if ($.trim(new_price) < 5) {
      e.preventDefault();
      $("#price").after(
        '<span class="error text-danger mt-1">Minimum rate should be 5$</span>'
      );
      showValidationError('Minimum rate should be 5$');
    }

    $(".add-ons").each(function () {
      
        validateAddOnRows($(this), e);
      
    });

  
  });
}

function validateAddOnRows(element, e) {
  if (element.find(".add-on-delivery").val() != '' && element.find(".add-on-delivery").val() < 1 ) 
  {

    e.preventDefault();
    element
        .find(".add-on-delivery")
        .after('<span class="error text-danger">Field value should be greater than zero</span>');
  }
}
function deleteAddOnRow(row_id){
    $(row_id).remove();
    add_on_service_row_number-=1;
}
function addOnServiceRow() {
  return `<div class="row add-ons" id="add-on-row-id-`+add_on_service_row_number+`">

            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 form-group">
              <label>Title</label>
              <input type="text" class="form-control add-on-title" name="service_add_ons[`+add_on_service_row_number+`][title]"  placeholder="Title"  step="any" >
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12 form-group">
                <label>Per Hour Rate</label>
                <input type="number" class="form-control add_on_price" name="service_add_ons[`+add_on_service_row_number+`][rate_per_hour]"  
                    placeholder="per hour rate" id="add_on_price" step="any" oninput="this.value = Math.abs(this.value)">
            </div>
          
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12  form-group">
              <label>Estimated Delivery Time</label>
              <input type="number" class="form-control add-on-delivery"  name="service_add_ons[`+add_on_service_row_number+`][estimated_delivery_time]"   placeholder="Enter Number of Hours" oninput="this.value = Math.abs(this.value)">
              
          </div>  
          
          <div class ="col-xl-1 col-lg-1 col-sm-12 col-xs-12 col-md-1" style="margin-top:2.4rem" onclick="deleteAddOnRow('#add-on-row-id-`+add_on_service_row_number+`')">
            <button  type="button" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
          </div>

        </div>
      `;
}

$(document).on("click", "#removeRow", function () {
    let is_confirm = confirm(`Are you sure you want to remove field ?`);
    if (is_confirm) {
      $(this).closest("#add-on-service-row").remove();
    }
});

// function addOnServiceRowcustom() {
//   return `<div class="row add-ons" id="add-on-customservice-row">
//   <div class="col-xl-4 col-lg-4 form-group">
//       <label>Starting From Price</label>
//       <input type="number" class="form-control add_on_price" name="add_on_price[]"
//           placeholder="E.g. $100" id="add_on_price" step="any" >
//   </div>
//   <div class="col-xl-4 col-lg-4 form-group">
//       <label>Estimated Lead Time</label>
//       <div class="input-group mb-3">
//           <input type="number" class="form-control add-on-delivery" id="add_on_delivery" name="add_on_delivery[]"
//               placeholder="Enter Hours">
//       </div>
// </div>  
//   <div class ="col-xl-1 col-lg-1 " style="margin-top:2.4rem">
//   <button id="removecustomRow" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
//   </div>
// </div>
// `;
// }

$(document).on("click", "#removecustomRow", function () {
  let is_confirm = confirm(`Are you sure you want to remove field ?`);
  if (is_confirm) {
    $(this).closest("#add-on-customservice-row").remove();
  }
});


function requirementFormValidation() {
  
}

function removeAddOnRow(row) {
  let is_confirm = confirm(`Are you sure you want to remove field ?`);
  console.log(row);
  if (is_confirm) {
    row.remove();
  }
}

function onSelectChange(parent, back, front) {
  if (parent.val() == "1") {
    back.find("input[type=checkbox]:checked").prop("checked", false);

    back.attr("style", "display:none !important");
    front.show();
  } else {
    front.find("input[type=checkbox]:checked").prop("checked", false);

    front.attr("style", "display:none !important");
    back.show();
  }
}
