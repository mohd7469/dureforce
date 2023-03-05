// todo should move this into seprate file only for search
var data = [
  {
    id: 1,
    text: " Hire professionals and agencies Service",
    url: "/service",
    icon: "fa-user-md",
    heading: "Service",
    searchText: null,
  },
  {
    id: 2,
    text: "Browse and buy Software",
    url: "/software",
    icon: "fa-check",
    heading: "Software",
    searchText: null,
  },
  {
    id: 3,
    text: " Apply to jobs posted by clients",
    url: "/jobs-listing-old",
    icon: "fa-suitcase",
    heading: "Jobs",
    searchText: null,
  },
];
(function($) {

  $(".sub-nav").on('scroll', function() {
    $val = $(this).scrollLeft();

    if($(this).scrollLeft() + $(this).innerWidth()>=$(this)[0].scrollWidth){
      $(".nav-next").hide();
    } else {
      $(".nav-next").show();
    }

    if($val == 0){
      $(".nav-prev").hide();
    } else {
      $(".nav-prev").show();
    }
  });
  console.log( 'init-scroll: ' + $(".nav-next").scrollLeft() );
  $(".nav-next").on("click", function(){
    $(".sub-nav").animate( { scrollLeft: '+=460' }, 200);

  });
  $(".nav-prev").on("click", function(){
    $(".sub-nav").animate( { scrollLeft: '-=460' }, 200);
  });
})(jQuery);

$(document).ready(function () {
  $(".search-select-header").select2({
    templateResult: formatState,
    data,
    placeholder: "Search",
    matcher: matchStart,
  });
});

$(".search-select-header").on("select2:select", function (e) {
  var data = e.params.data;
  console.log(data);
  window.location = `${data.url}?title=${data.searchText}`;
});

function matchStart(option, data) {
  if (option.term) {
    data.searchText = option.term;
  } else {
    data.searchText = data.heading;
  }

  return data;
}

function formatState(state) {
  var $state = $(
    `<span class="header-select-options">
    <span class="search-content">
    <i class="fa ${state.icon}" aria-hidden="true"></i>
       <span class="heading"> ${state.searchText}</span>
</span>
    <span class="sp"> ${state.text}</span>
    </span>`
  );
  return $state;
}

$(document).ready(function () {
  setCatgoryNameIntoFilter();
});
function setCatgoryNameIntoFilter() {
  var urlParams = new URLSearchParams(window.location.search);

  if (urlParams.has("category_name")) {
    $("#category_search_selected").text(urlParams.get("category_name"));
  }
}
// $(".select2-custom").select2({
//   placeholder:'Type Skills and Enter press',
//   allowClear: true
// });
