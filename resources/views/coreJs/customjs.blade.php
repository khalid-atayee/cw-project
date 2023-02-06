<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function authenticate(url, method, formId) {
        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();
        $('.error').text('');

        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 210) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#' + formId)[0].reset();


                }
                if (response.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#' + formId)[0].reset();

                    location.href = "/";

                }
                if (response.status == 300) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#' + formId)[0].reset();


                }

            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(key, value) {
                    $('#error-' + key).text(value);


                });
            }
        });
    }

    // this function is responsible for posting data to serve
    function postForm(url, method, formId ,btnClass='') {

        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();
        $('.' + btnClass).prop('disabled', true);
        $('.louder').removeClass('show-loader');
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                    $('.' + btnClass).prop('disabled', false);
                    $('.louder').addClass('show-loader');
                    $('#' + formId)[0].reset();
                $('.validation-error').text('');
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                    text: 'would like to redirect you to payment page?',

                    showDenyButton: true,
                    // showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                     
                        location.href = "{{ route('payment.index') }}"
                    } else if (result.isDenied) {
                        location.href = "/"


                    }

                })

                if (response.status == 410) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('.' + btnClass).prop('disabled', false);
                    $('.louder').addClass('show-loader');
                    $('#' + formId)[0].reset();

                }
                if (response.status == 'error') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
                $('.' + btnClass).prop('disabled', false);
                    $('.louder').addClass('show-loader');
                    $('#' + formId)[0].reset();


            },
            error: function(response) {
                $('.' + btnClass).prop('disabled', false);
                    $('.louder').addClass('show-loader');
                    $('#' + formId)[0].reset();

                $.each(response.responseJSON.errors, function(key, value) {
                    $('#error-' + key).text(value);


                });
            }
        });

    }

    $(function() {





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
            navText: ['<span class="icon-keyboard_arrow_left">',
                '<span class="icon-keyboard_arrow_right">'
            ]
        });


    })

    $("#password-input").keyup(function(event) {
        if (event.keyCode === 13) {
            $("#sign-in-form-hover").click();
        }
    });

    function resetPassword(url, method, formId, appendContainer, btnClass) {
        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();
        $('.error-email').text('');
        $('.' + btnClass).prop('disabled', true);
        $('.louder').removeClass('show-loader');

        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('.' + appendContainer).html(response.html_view)
                    $('.' + btnClass).prop('disabled', true);
                    $('.louder').addClass('show-loader');
                    $('#' + formId)[0].reset();

                }
                if (response.status == 'notFound') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('.' + btnClass).prop('disabled', false);
                    $('.louder').addClass('show-loader');
                    $('#' + formId)[0].reset();

                }

            },
            error: function(response) {
                $('.' + btnClass).prop('disabled', false);
                $('.louder').addClass('show-loader');
                $.each(response.responseJSON.errors.email, function(key, value) {
                    $('.error-email').text(value)
                });




            }

        });

    }

    function returnBlade(url, method, formId) {
        $('#' + formId).submit(e => e.preventDefault());

        let data = $('#' + formId).serialize();

        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('.forgot-otp-input-view').html(response.html_view);;

                }
                if (response.status == 'notFound') {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })

                }
            },
            error: function(response) {
                $.each(response.responseJSON.errors.email, function(key, value) {
                    $('.error-email').text(value)
                });




            }

        });

    }


    // let faq = document.getElementsByClassName("faq-page");
    // let i;

    // for (i = 0; i < faq.length; i++) {
    //     faq[i].addEventListener("click", function() {
    //         /* Toggle between adding and removing the "active" class,
    //         to highlight the button that controls the panel */
    //         this.classList.toggle("faq-active");

    //         /* Toggle between hiding and showing the active panel */
    //         let body = this.nextElementSibling;
    //         if (body.style.display === "block") {
    //             body.style.display = "none";
    //         } else {
    //             body.style.display = "block";
    //         }
    //     });
    // }


    document.getElementById('humbargar').addEventListener('click', () => {

        document.getElementById('navigate-small-mob').classList.remove('showMenu')
        // console.log(document.getElementById('navigate-small-mob'))
    })
    document.getElementById('close-btn-menu-mob').addEventListener('click', () => {
        document.getElementById('navigate-small-mob').classList.add('showMenu')
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

    function showSignUpModel() {
        document.getElementById('signInId').classList.add('signInToggle')
        document.getElementById('signUpId').classList.remove('signUpToggle')
    }



    // code for location start here
    function showLocationModal() {
        document.getElementById('locationModalId').classList.remove('locationToggle')
    }

    function closeLocationModal() {
        document.getElementById('locationModalId').classList.add('locationToggle')

    }



    // code for location end here

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    // partners section js
    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
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




    function showUserToggle(data, value) {
        console.log('ok');


        let content = `
           <span class="sign-close-icon" onclick="closeModal()">
       <i class="fa-solid fa-xmark"></i>
   </span>
       <img src="/storage/${value}/${data.image}" alt="">
       <h3>${data.name} </h3>
       <p>${data.description}</p>
       <br>
       <p>${data.email}</p>
       <a href="#">
           <i class="fa-brands fa-linkedin"></i>
           </a>
           
           `;


        document.querySelector('.mentor-container').innerHTML = content
        document.getElementById('mentorModalId').classList.remove('mentorToggle')



    }

    function closeModal() {
        document.getElementById('mentorModalId').classList.add('mentorToggle')


    }




    // active menu
    // let header = document.getElementById("active-container");
    // let btns = header.getElementsByClassName("header-typo");
    // for (let i = 0; i < btns.length; i++) {
    // btns[i].addEventListener("click", function() {
    // let current = document.getElementsByClassName("active-menu");
    // current[0].className = current[0].className.replace(" active-menu", "");
    // this.className += " active-menu";
    // });
    // }
</script>
