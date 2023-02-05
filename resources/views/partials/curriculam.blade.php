<!-- curriculam section Start here -->
<div class="curriculam-section">


    <div class="content">
        <h1 class=" fw-bold my-3" data-aos="fade-up">Here is how your Curriculam looks like</h1>
        <p class="code-camp-text w-75 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat,
            consequuntur
            sed
            earum reiciendis
            excepturi, autem, adipisci vitae odit sint est optio nemo tempore? Voluptate rem beatae temporibus
            veritatis
            excepturi eius.</p>
    </div>

    <div class="module-container-curriculm mb-4 ">
        @if (isset($data))
            @php
                $length = count($data->curriculumTemplate);
            @endphp
            @for ($i = 0; $i < $length; $i++)
                <div class="container-module-two"  id = "changes-card">
                    <div class="module m-2" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
                        <h4>{{ $data->curriculumTemplate[$i]->module_name }}</h4>
                        <p>{{ $data->curriculumTemplate[$i]->description }}</p>
                    </div>
                    @if ($i == $length - 1)
                </div>
            @break

        @else
            <img src="images/Line 22.png" alt="" class="vertical-vector">
            
             <img src="images/Line 20.png" alt="" class="horizontal-vector">
        @endif

</div>
@endfor

@elseif (count($curiculumn))
@php
    $length = count($curiculumn[0]->curriculumTemplate);
@endphp
@for ($i = 0; $i < $length; $i++)
    <div class="container-module-two"  id = "changes-card">
        <div class="module m-2" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500">
            <h4>{{ $curiculumn[0]->curriculumTemplate[$i]->module_name }}</h4>
            <p>{{ $curiculumn[0]->curriculumTemplate[$i]->description }}</p>
        </div>
        @if ($i == $length - 1)
    </div>
@break

@else
<img src="images/Line 22.png" alt="" class="vertical-vector">

 <img src="images/Line 20.png" alt="" class="horizontal-vector">
@endif

</div>
@endfor


@endif



</div>





<div class="btn-container text-center">

<a href="{{ isset($data) ? route('cw-curriculam',$data->id) : count($curiculumn) ?  route('cw-curriculam',$curiculumn[0]->id) : '#' }}" class="cw-btn btn-dark-blue p-3 mt-3 ">See The Schedule</a>
</div>


</div>
