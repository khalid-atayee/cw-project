<?php

/**
 * 
 *
 * 
 * @author  Khalid Atayee <khalid.atayee101@gmail.com>
 * @description, This trait developed for code reusebaility and cleaness for controllers
 */

namespace app\Traits;

use App\Models\Chapter;
use App\Models\Mentor;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;



trait UserTrait
{

    public function registerUser($name, $email, $password, $email_verifed = false)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        if ($email_verifed) {
            $user->email_verified_at = Carbon::now();
        }
        $user->save();
        return User::orderBy('id', 'desc')->first();
    }

    public function registerChapter($data)
    {
        DB::beginTransaction();
        try {

            $password = Hash::make($data['chapter_password']);
            $lastUser = $this->registerUser($data['title'], $data['chapter_email'], $password);
            $role = Role::where('name', '=', 'chapter')->first();
            $lastUser->assignRole([$role->id]);
            if ($lastUser) {
                $chapter = new Chapter();
                $chapter->title = $data['title'];
                $chapter->city_id = $data['city_id'];
                $chapter->fees = $data['fees'];
                $chapter->duration = $data['duration'];
                $chapter->start_date = $data['start_date'];
                $chapter->end_date = $data['end_date'];
                $chapter->user_id = $lastUser->id;
                $chapter->save();
            }


            DB::commit();
            return back();
        } catch (\Throwable $th) {

            DB::rollback();
            return back();
        }
    }

    public function updateChapter($data, $id)
    {
        DB::beginTransaction();
        try {

            $chapter = Chapter::find($id);
            $chapter->title = $data['title'];
            $chapter->city_id = $data['city_id'];
            $chapter->fees = $data['fees'];
            $chapter->duration = $data['duration'];
            $chapter->start_date = $data['start_date'];
            $chapter->end_date = $data['end_date'];
            $chapter->update();

            DB::commit();
            return back();
        } catch (\Throwable $th) {

            DB::rollback();
            return back();
        }
    }


    public function registerAdmin($data)
    {

        $password = Hash::make($data['admin_password']);

        $lastUser = $this->registerUser($data['admin_name'], $data['admin_email'], $password, true);

        $role = Role::where('name', '=', 'admin')->first();
        $lastUser->assignRole([$role->id]);
        return back();
    }

    public function updateUser($data, $id)
    {
        $user = User::find($id);
        $user->name = $data['user_name'];
        $user->email = $data['user_email'];
        $user->password = Hash::make($data['user_password']);
        $user->update();
        return back();
    }

    public function registerOrganizerMentor($data, $role, $flag)
    {
        DB::beginTransaction();
        try {

            $password = Hash::make($data['password']);
            $register = $this->registerUser($data['name'], $data['email'], $password);

            $lastUser = User::orderBy('id', 'desc')->first();
            $role = Role::where('name', '=', $role)->first();
            $lastUser->assignRole([$role->id]);



            $shareData = $data;
            unset($shareData['image']);


            if ($register) {
                if ($flag) {
                    $wantedOrganizers = DB::table('chapters AS C')->join('organizers AS O', 'O.chapter_id', '=', 'C.id')
                        ->select('O.*')->where('O.chapter_id', $data['chapter_id'])->first();

                    $image = $data['image'];
                    $image_name = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/mentorImage', $image_name);

                    $wantedData = [
                        'image' => $image_name,
                        'organizer_id' => $wantedOrganizers->id,
                        'user_id' => $lastUser->id
                    ];
                    $shareData = array_merge($shareData, $wantedData);

                    Mentor::create($shareData);
                } else {

                    $image = $data['image'];
                    $image_name = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/organizerImage', $image_name);
                    $wantedData = [
                        'image' => $image_name,
                        'user_id' => $lastUser->id
                    ];
                    $shareData = array_merge($shareData, $wantedData);
                    Organizer::create($shareData);
                }
            }
            DB::commit();

            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
    }


    public function UpdateOrganizer($data, $organizer_id, $image)
    {
        DB::beginTransaction();
        try {

            $organizer = Organizer::find($organizer_id);

            $user_id = $organizer->user_id;

            $organizer->name = $data['name'];
            $organizer->email = $data['email'];
            $organizer->description = $data['description'];
            $organizer->image = $image;
            $organizer->chapter_id = $data['chapter_id'];
            $organizer->user_id = $user_id;
            $organizer->update();

            DB::commit();

            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
    }

    public function UpdateMentor($data, $mentor_id, $image_name)
    {
        DB::beginTransaction();
        try {

            $mentor = Mentor::find($mentor_id);




            $wantedOrganizers = DB::table('chapters AS C')->join('organizers AS O', 'O.chapter_id', '=', 'C.id')
                ->select('O.*')->where('O.chapter_id', $data['chapter_id'])->first();


            $mentor->name = $data['name'];
            $mentor->email = $data['email'];
            $mentor->description = $data['description'];
            $mentor->image = $image_name;
            $mentor->chapter_id = $data['chapter_id'];
            $mentor->organizer_id = $wantedOrganizers->id;
            $mentor->user_id = $mentor->user_id;
            $mentor->update();

            DB::commit();

            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            return back();
        }
    }

   
}
