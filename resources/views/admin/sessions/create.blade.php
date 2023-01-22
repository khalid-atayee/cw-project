<x-layout>
    <x-slot name="title">Create New session</x-slot>
    <x-slot name="header">Create New session</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('sessions.index') }}">All session</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" id="form-id">
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">Session Title</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="title" id="title" placeholder="Session Title" />

                    <span class="text-danger error" id="error-title"></span>
                        
                </div>
            </div>


            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <textarea class="tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
                <span class="text-danger" id="error-description"></span>
                    
              
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="start_date1">Start date</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="datetime-local" name="start_date" id="start_date" placeholder="Start Date" />

                    <span class="text-danger error" id="error-start_date"></span>
                        
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="start_date1">End date</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="datetime-local" name="end_date" id="end_date" placeholder="End Date" />

                    <span class="text-danger error" id="error-end_date"></span>
                        
                </div>
            </div>




            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
    
                <select onchange="changeDropDown('{{ route('sessions.store') }}','chapter_id_select','POST','mentors_select','curriculam', '')" class=" tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id_select">
                    <option disabled selected>Select Chapter</option>
                    @foreach ($chapters as $chapter)
    
                        <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                            
                    @endforeach
                </select>

                <span class="text-danger error" id="error-chapter_id"></span>
                
            </div>
        </div>
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentors">Select Mentor</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="mentors_select" data-placeholder="Choose anything" name="mentor_id" >
                        
                    </select>
                <span class="text-danger error" id="error-mentor_id"></span>
                
            </div>
        </div>

        <div class="tw-flex">
            <label class="tw-w-[20%] tw-p-2" for="curriculum1">Select Curriculum</label>
            <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <select class="form-select" id="curriculam" data-placeholder="Choose anything" name="curriculam_template_id" onchange="changeDropDown('{{ route('sessions.item') }}','curriculam','POST','curriculam_template_item','','')">
                    
                </select>
            <span class="text-danger error" id="error-curriculam_template_id"></span>
            </div>
        </div>

        <div class="tw-flex">
            <label class="tw-w-[20%] tw-p-2" for="curriculum_topic">Select Curriculum Topic</label>
            <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <select class="form-select" id="curriculam_template_item" data-placeholder="Choose anything" name="curriculam_template_item_id" >
                    
                </select>
            <span class="text-danger error" id="error-curriculam_template_item_id"></span>
        </div>
    </div>

        

        

           
          
    
             
            
            <div class="tw-text-right">
                <button type="button" onclick="postSerializeForm('{{ route('sessions.submit') }}','POST','form-id')" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>
        </form>

    </div>
</x-layout>

