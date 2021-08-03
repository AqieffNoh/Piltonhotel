

<!--Bootstrap Main Javascript!-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<!-- Bootstrap core Javascript! -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>


<!-- <script src="vendor//jquery/jquery.min.js"></script> -->

<!-- Core Plugin Javascript
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

Page level Plugins
<script src="vendor/chart.js/chart.min.js"></script>

Page level custom scripts
<script src="js/demo/chart-area-demos.js"></script>
<script src="js/demo/chart-pie-demos.js"></script> -->

<!-- delete popup script -->
<script>

    $(document).ready(function() {
        $('.deletecontentbtn').on('click', function() {

            $('#deletecontentmodal').modal('show'); //bootstrap script
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[4]);
        });
    });

</script>

<script>

    $(document).ready(function() {
        $('.deleteeventbtn').on('click', function() {

            $('#deleteeventmodal').modal('show'); //bootstrap script
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[4]);
        });
    });

</script>

<script>

    $(document).ready(function() {
        $('.deleteaddonbtn').on('click', function() {

            $('#deleteaddonmodal').modal('show'); //bootstrap script
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[4]);
        });
    });

</script>

<script>

    $(document).ready(function() {
        $('.deletesellerbtn').on('click', function() {

            $('#deletesellermodal').modal('show'); //bootstrap script
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[4]);
        });
    });

</script>

<script>

$(document).ready(function() {
    $('#sellertable').DataTable();
} );

</script>