
<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="header">Codeweekend is the unique platform to innovation</x-slot>
    <x-slot name="button">Join Us</x-slot>
    <div>
        

</x-layout>



<script>
const openModal = document.getElementById('open-modal')
const closeModal = document.getElementById('close-modal')
const modal = document.getElementById('modal')

openModal.addEventListener("click", function(){
    modal.style.display = "block"
    // console.log(modal.style.display)
})
closeModal.addEventListener('click', function(){
    modal.style.display = "none"
})


</script>

