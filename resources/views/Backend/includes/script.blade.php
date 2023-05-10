<!-- JavaScript Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/') }}admin-assets/lib/chart/chart.min.js"></script>]
<script src="{{ asset('/') }}admin-assets/lib/easing/easing.min.js"></script>
<script src="{{ asset('/') }}admin-assets/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('/') }}admin-assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('/') }}admin-assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{ asset('/') }}admin-assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
{{--data table--}}
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
{{--//sweetalert--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/') }}admin-assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
{{--summer note--}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('/') }}admin-assets/js/main.js"></script>



@stack('js')

{{--summernote--}}
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
        });
        $('#summernote1').summernote({
            height: 200,
        });

        $('#summernote2').summernote({
            height: 200,
        });

        $('#summernote3').summernote({
            height: 200,
        });
    });
</script>
{{--sweet alert delete--}}
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title: " Are You Sure To Cancel ?",
            text: "You Are Not be able to revert this!",
            icon: "error",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if(willCancel)
            {
                window.location.href = urlToRedirect;
            }

            });

    }
</script>
{{--datatable--}}
<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
</script>
