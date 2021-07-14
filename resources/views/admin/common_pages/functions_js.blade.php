<script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

        $(document).ready(function() {
          $('#orders-table').DataTable();
      } );

      $(document).ready(function() {
          $('#orders-table2').DataTable();
      } );
      $(document).ready(function() {
          $('#orders-table3').DataTable();
      } );
      $(document).ready(function() {
          $('#orders-table4').DataTable();
      } );
      $(document).ready(function() {
          $('#orders-table5').DataTable();
      } );
      $(document).ready(function() {
          $('#orders-table6').DataTable();
      } );
    </script>4
    <script type="text/javascript">
function convertToSlug(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w ]+/g,'')
    .replace(/ +/g,'-');
}

function slugClean(Text) {
  return Text
    .toLowerCase()
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'-')
    .replace(/-+/g,'-');
}

function codeClean(Text) {
  return Text
    .replace(/[^\w -]+/g,'')
    .replace(/ +/g,'-')
    .replace(/-+/g,'-');
}

$('.nameForSlug').on('keyup change', function() {
  $('.slugForName').val(convertToSlug($(this).val()));
});

$('.slugForName').on('change keyup', function() {
  $('.slugForName').val(slugClean($(this).val()));
});

$('.codeClean').on('change keyup', function() {
  $('.codeClean').val(codeClean($(this).val()));
});


</script>