// Ajax functions

$(document).on("click", ".load-btn:not(.loading)", function (e) {
  
  let loadBtn = $(this);
  let page = loadBtn.data("page");
  let newPage = page + 1;
  let sort = loadBtn.data("sort");
  let ajaxUrl = loadBtn.data("url");

  loadBtn.addClass("loading");
  loadBtn.html("Loading...");

  $.ajax({
    type: "post",
    url: ajaxUrl,
    data: {
      page: page,
      sort: sort,
      action: "load_more_users",
    },
    error: function (res) {
      console.log(res);
    },
    success: function (res) {
      loadBtn.data("page", newPage);
      loadBtn.removeClass("loading");
      loadBtn.html("Load More");
      $("#load-users").append(res);
    },
  });

  e.preventDefault();
});
