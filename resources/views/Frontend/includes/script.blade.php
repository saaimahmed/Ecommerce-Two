<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/') }}front-assets/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}front-assets/assets/js/tiny-slider.js"></script>
<script src="{{ asset('/') }}front-assets/assets/js/glightbox.min.js"></script>
{{--//image zoom--}}
<script src="{{asset('/')}}front-assets/assets/js/xzoom.min.js"></script>
<script src="{{asset('/')}}front-assets/assets/js/setup.js"></script>
<script src="{{ asset('/') }}front-assets/assets/js/main.js"></script>

{{--toastr.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@stack('js')
{{--toastr--}}
<script>
    {{--    success --}}
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
        }
    toastr.success(" {{ Session::get('success') }}")
    @endif
        {{--delete--}}
        @if(Session::has('delete'))
        toastr.options =
        {
            "closeButton" : true,
        }
        toastr.error("{{ Session::get('delete') }}")
    @endif
        {{--        edit--}}
        @if(Session::has('edit'))
        toastr.options =
        {
            "closeButton" : true,

        }
     toastr.info("{{ Session::get('edit') }}")
    @endif
        {{--        show--}}
        @if(Session::has('show'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ Session::get('show') }}")
    @endif
</script>
<script type="text/javascript">
    //========= Hero Slider
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });

    //======== Brand Slider
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1,
            },
            540: {
                items: 3,
            },
            768: {
                items: 5,
            },
            992: {
                items: 6,
            }
        }
    });

</script>
<script>
    const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

    const timer = () => {
        const now = new Date().getTime();
        let diff = finaleDate - now;
        if (diff < 0) {
            document.querySelector('.alert').style.display = 'block';
            document.querySelector('.container').style.display = 'none';
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
        let seconds = Math.floor(diff % (1000 * 60) / 1000);

        days <= 99 ? days = `0${days}` : days;
        days <= 9 ? days = `00${days}` : days;
        hours <= 9 ? hours = `0${hours}` : hours;
        minutes <= 9 ? minutes = `0${minutes}` : minutes;
        seconds <= 9 ? seconds = `0${seconds}` : seconds;

        document.querySelector('#days').textContent = days;
        document.querySelector('#hours').textContent = hours;
        document.querySelector('#minutes').textContent = minutes;
        document.querySelector('#seconds').textContent = seconds;

    }
    timer();
    setInterval(timer, 1000);
</script>


{{--Ajax Checkout email--}}
<script>

    $(document).on('blur','#email', function () {
        var email = $(this).val();
        $.ajax({
            type: 'GET',
            url: "{{url('/get-email-status')}}",
            data: {email: email},
            dataType:'JSON',
            success: function (response) {
                if(response.status == 1)
                {
                    $('#emailCheckSpan').text(response.message);
                    $('#emailCheckSpan').attr('class','text-danger');
                    $('#confirmOrderBtn').prop('disabled',true);

                }

                else
                {
                    $('#emailCheckSpan').text(response.message);
                    $('#emailCheckSpan').attr('class','text-success');
                    $('#confirmOrderBtn').prop('disabled',false);
                }
            }
        });
    });
</script>
