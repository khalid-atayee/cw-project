<?php
/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This controller is only for curriculum purposes
 */
namespace App\Http\Controllers;

use App\Http\Requests\curriculumValidations;
use App\Http\Requests\UpdateCurriculamValidation;
use App\Models\Chapter;
use App\Models\CurriculamTemplate;
use App\Models\CurriculamTemplateItem;
use App\Models\Mentor;
use Illuminate\Http\Request;
use App\Traits\HomeTrait;
use Illuminate\Support\Facades\Auth;

class CurriculumController extends Controller
{
    use HomeTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user()->roles[0]->name=='chapter'){

            $curriculumTemplates  = CurriculamTemplate::with('organizers','chapters')->where('chapter_id',Auth::user()->chapter->id)->get();
        }
        
        if(Auth::user()->roles[0]->name=='organizer'){
            $curriculumTemplates  = CurriculamTemplate::with('organizers','chapters')->where('chapter_id',Auth::user()->organizer->chapter_id)->get();


        }

        if(Auth::user()->roles[0]->name=='mentor'){
            $curriculumTemplates  = CurriculamTemplate::with('organizers','chapters')->where('chapter_id',Auth::user()->mentor->chapter_id)->get();


        }


        if(Auth::user()->roles[0]->name=='admin')
        {
        $curriculumTemplates = CurriculamTemplate::with('organizers','chapters')->get();
        }
        return view('admin.curriculam.index',compact('curriculumTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all();
        return view('admin.curriculam.create',compact('chapters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mentors = Mentor::where('chapter_id',$request->chapter_id)->get();
        return response()->json(['data'=>$mentors,'status'=>200],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function postSerializeForm(curriculumValidations $request){
    $data=$this->postCurriculam($request->all());
    if($data){
        return response()->json(['message'=>'curriculum successfully created','status'=>'success'],200);
    }
    else {
        return response()->json(['message'=>'something went wrong','status'=>'error'],200);
    }

   

    
    }
    public function show($id)
    {
        $curriculumTemplates = CurriculamTemplate::with('organizers','chapters')->where('id',$id)->first();
    
        return view('admin.curriculam.view',compact('curriculumTemplates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapters = Chapter::all();
        $curriculumTemplateItem = CurriculamTemplateItem::with('CurriculamTemplate')->where('curriculam_template_id',$id)->get();
        $mentor_ids =  json_decode($curriculumTemplateItem[0]->CurriculamTemplate->mentor_ids, true);

        $mentors = Mentor::with('chapters')->where('chapter_id',$curriculumTemplateItem[0]->CurriculamTemplate->chapter_id)->get();
        $ids =array();
        foreach( $mentor_ids as $key=> $id){

           $ids[$key]=(int)$id;

        }

        return view('admin.curriculam.edit',compact('chapters','curriculumTemplateItem','ids','mentors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurriculamValidation $request, $id)
    {
        $data = $this->updateCurriculam($request->all(),$id);
        if($data){
            session()->flash('success-message', 'Curriculum record updated');

            return redirect()->route('curriculum.index');
        }
        else{
            session()->flash('fail-message', 'something went wrong plz refere to code');


            return redirect()->route('curriculum.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculumTemplates = CurriculamTemplate::find($id);
        $curriculumTemplates->delete();
        session()->flash('success-message', 'Curriculum record deleted');
        return redirect()->route('curriculum.index');
    }
}
