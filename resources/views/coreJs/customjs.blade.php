<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
    navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
});


})


let faq = document.getElementsByClassName("faq-page");
let i;

for (i = 0; i < faq.length; i++) {
faq[i].addEventListener("click", function () {
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
document.getElementById('humbargar').addEventListener('click',()=>{

navigateMob.classList.remove('showMenu')
// console.log(document.getElementById('navigate-small-mob'))
})
document.getElementById('close-btn-menu-mob').addEventListener('click',()=>{
navigateMob.classList.add('showMenu')
})

function showModelContainer(){
document.getElementById('signInId').classList.remove('signInToggle')
}

function closeModelContainer(){
document.getElementById('signInId').classList.add('signInToggle')
}

function closeSignUpModel(){
document.getElementById('signUpId').classList.add('signUpToggle')


}

function showSignUpModel(){
document.getElementById('signInId').classList.add('signInToggle')
document.getElementById('signUpId').classList.remove('signUpToggle')
}


</script>