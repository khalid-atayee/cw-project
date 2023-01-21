<?php

namespace app\Traits;

use App\Models\CurriculamTemplate;
use App\Models\CurriculamTemplateItem;
use App\Models\Organizer;
use Illuminate\Support\Facades\DB;

trait HomeTrait{



    public function postCurriculam($data){

        DB::beginTransaction();
        try {

        $organizer_id = Organizer::where('chapter_id',$data['chapter_id'])->pluck('id')->first();
        $curriculumTemplate = new CurriculamTemplate();
        $curriculumTemplate->module_name = $data['name'];
        $curriculumTemplate->chapter_id = $data['chapter_id'];
        $curriculumTemplate->organizer_id = $organizer_id;
        $curriculumTemplate->mentor_ids =json_encode($data['mentors']) ;
        $curriculumTemplate->save();
        $curriculum_id = CurriculamTemplate::orderBy('id', 'DESC')->pluck('id')->first();
            
    
        if(isset($data['topic'])){
            
            foreach ($data['topic'] as $key => $topic) {
                $curriculumTemplateItem = new CurriculamTemplateItem();
                $curriculumTemplateItem->item_name = $data['topic'][$key];
                $curriculumTemplateItem->curriculam_template_id = $curriculum_id;
                $curriculumTemplateItem->save();
        
                
            }
        }
        DB::commit();
        return back();
    }
         catch (\Throwable $th) {
           
            DB::rollback();
            return back();
        }
        
    
        
    }

    function postSession($data){
        

    }
}