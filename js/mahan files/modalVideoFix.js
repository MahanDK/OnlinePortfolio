jQuery(document).ready(function() {
  jQuery('.portfolio-modal').on('hidden.bs.modal', function (e) {
  jQuery('.portfolio-modal iframe').attr("src", jQuery(".portfolio-modal  iframe").attr("src"));
  });
});
