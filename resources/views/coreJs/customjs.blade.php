<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


<<<<<<< HEAD
    function authenticate(url, method, formId) {
        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();
        $('.error').text('');

=======
    function authenticate(url, method, formId){
        $('#'+formId).submit(e=>e.preventDefault());

        let data = $('#'+formId).serialize();
        $('.error').text('');
        
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
<<<<<<< HEAD
            success: function(response) {
                if (response.status == 210) {
=======
            success: function (response) {
                if(response.status==210){
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
<<<<<<< HEAD
                    })
                    $('#' + formId)[0].reset();


                }
                if (response.status == 200) {
=======
                        })
        $('#'+formId)[0].reset();


                }
                if(response.status==200){
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
<<<<<<< HEAD
                    })
                    $('#' + formId)[0].reset();

                    location.href = "/";

                }
                if (response.status == 300) {
=======
                        })
        $('#'+formId)[0].reset();

                    location.href="/";

                }
                if(response.status==300){
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
<<<<<<< HEAD
                    })
                    $('#' + formId)[0].reset();


                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(key, value) {
                    $('#error-' + key).text(value);


                });
=======
                        })
        $('#'+formId)[0].reset();


                }
                
            },
            error: function (response){
                
                $.each(response.responseJSON.errors, function (key, value) { 
                $('#error-'+key).text(value);

                 
            });
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
            }
        });
    }

    // this function is responsible for posting data to serve
<<<<<<< HEAD
    function postForm(url, method, formId) {
        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                $('.validation-error').text('');
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    text: 'would like to redirect you to payment page?',

=======
    function postForm(url,method,formId){
    $('#'+formId).submit(e=>e.preventDefault());

    let data = $('#'+formId).serialize();
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            $('.validation-error').text(''); 
            Swal.fire({
                    icon: 'success',
                    title:response.message,
                    text:'would like to redirect you to payment page?',
    
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
                    showDenyButton: true,
                    // showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
<<<<<<< HEAD
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "{{ route('payment.index') }}"
                    } else if (result.isDenied) {
                        location.href = "/"


                    }

                })


            },
            error: function(response) {
                console.log(response.responseJSON.errors)

                $.each(response.responseJSON.errors, function(key, value) {
                    $('#error-' + key).text(value);


                });
            }
        });

=======
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href="{{ route('payment.index') }}"
                        }
                        else if(result.isDenied){
                            location.href="/"


                        }

                    })
            
        
        },
        error: function(response){
            console.log(response.responseJSON.errors)
      
            $.each(response.responseJSON.errors, function (key, value) { 
                $('#error-'+key).text(value);

                 
            });
        }
    });
    
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d
    }

    $(function() {


<<<<<<< HEAD
=======



$('.slide-one-item').owlCarousel({
    center: false,
    autoplayHoverPause: true,
    items: 1,
    loop: true,
    stagePadding: 0,
    margin: 10,
    smartSpeed: 1500,
    autoplay: true,
    pauseOnHover: false,
    dots: true,
    nav: true,
    navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
});
>>>>>>> 1d5ca9f34a63396d044882135d511b20efbded4d



        $('.slide-one-item').owlCarousel({
            center: false,
            autoplayHoverPause: true,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 10,
            smartSpeed: 1500,
            autoplay: true,
            pauseOnHover: false,
            dots: true,
            nav: true,
            navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
        });


    })

    $(function() {







    })

    let faq = document.getElementsByClassName("faq-page");
    let i;

    for (i = 0; i < faq.length; i++) {
        faq[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("faq-active");

            /* Toggle between hiding and showing the active panel */
            let body = this.nextElementSibling;
            if (body.style.display === "block") {
                body.style.display = "none";
            } else {
                body.style.display = "block";
            }
        });
    }

    let navigateMob = document.getElementById('navigate-small-mob')
    document.getElementById('humbargar').addEventListener('click', () => {

        navigateMob.classList.remove('showMenu')
        // console.log(document.getElementById('navigate-small-mob'))
    })
    document.getElementById('close-btn-menu-mob').addEventListener('click', () => {
        navigateMob.classList.add('showMenu')
    })

    function showModelContainer() {
        document.getElementById('signInId').classList.remove('signInToggle')
    }

    function closeModelContainer() {
        document.getElementById('signInId').classList.add('signInToggle')
    }

    function closeSignUpModel() {
        document.getElementById('signUpId').classList.add('signUpToggle')


    }

    function showSignUpModel() {
        document.getElementById('signInId').classList.add('signInToggle')
        document.getElementById('signUpId').classList.remove('signUpToggle')
    }

    // partners section js
    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>