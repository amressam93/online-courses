<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('website.profile',compact('user'));
    }


    public function update_image(Request $request)
    {
        $user = auth()->user();

        $photoable_type = 'App\User';

        $photoable_id = $user->id;

        $old_image = $user->photo;


        if($image = $request->file('profile_image'))
        {
            $file_to_store = time().'_'.str_replace(" ","_",$user->name).'_'.'.'.$image->getClientOriginalExtension();


            if( $image->move(public_path('images'),$file_to_store))

            {
                if($old_image)
                {
                    $old_image_filename = $old_image->filename;
                    unlink('images/'.$old_image_filename);
                }


                $user->photo()->updateOrCreate(['photoable_id' => $photoable_id],['filename' => $file_to_store,'photoable_id' => $photoable_id,'photoable_type' => $photoable_type]);

            }


            return response()->json([
                'message' => 'Your Profile Image Successfully Uploaded',
                'uploaded_image' => '<img src="/images/'.$file_to_store.'" id="img-uploaded" class="avatar-xl rounded-circle" alt="" />',
                'uploaded_image_page_header' => '<img src="/images/'.$file_to_store.'" class="avatar-xl rounded-circle border border-4 border-white" alt="" />'
            ]);

        }




    }



    public function delete_image()
    {

        if(auth()->user()->photo)
        {
            $old_image_filename = auth()->user()->photo->filename;

            unlink('images/'.$old_image_filename);

            if(auth()->user()->photo->delete())
            {
                return response()->json([
                    'success' => 'Record deleted successfully!',
                    'message' => 'Your Profile Image Successfully Deleted',
                ]);
            }

            {

                return response()->json([
                    'error' => 'Record Not deleted successfully!'
                ]);
            }


        }




    }



}
