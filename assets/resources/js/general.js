// search.js
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

$(document).ready(function () {
  $(".search-select-header").select2({
    templateResult: formatState,
    data,
    placeholder: "Search",
    matcher: matchStart,
  });

  $(".search-select-header").on("select2:select", function (e) {
    var data = e.params.data;
    console.log(data);
    window.location = `${data.url}?title=${data.searchText}`;
  });

  setCatgoryNameIntoFilter();
});

function matchStart(params, data) {
  if (params.term) {
    data.searchText = params.term;
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

function setCatgoryNameIntoFilter() {
  var urlParams = new URLSearchParams(window.location.search);

  if (urlParams.has("category_name")) {
    $("#category_search_selected").text(urlParams.get("category_name"));
  }
}
