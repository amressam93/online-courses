<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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

        if($image = $request->file('profile_image'))
        {

            $photoable_type = 'App\User';

            $photoable_id = $user->id;

            $old_image = $user->photo;

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

        else
        {
           $rules = [
               'name'                  => 'required|regex:/^[a-zA-Z ]+$/|min:5|unique:users,name,'.$user->id,
               'email'                 => 'required|email|unique:users,email,'.$user->id,
               'password'              => 'nullable|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/',
               'password_confirmation' => 'same:password'
           ];


         // $this->validate($request,$rules);
            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()

                ), 400); // 400 being the HTTP code for an invalid request.
            }

            else
            {
                if($request->password == null)
                {
                    if($user->update(['name' => $request->name,'email' => $request->email,]))
                    {
                        //  return redirect('/profile')->with('success','Profile Updated Successfully');

                        return response()->json([
                            'message' => 'Your Profile Info Successfully Updated',
                            'email' => $request->email,
                            'name' => $request->name

                        ]);

                    }

                }
                else
                {
                    $password = Hash::make($request->get('password'));

                    if($user->update(['name' => $request->name,'email' => $request->email,'password' => $password]))
                    {
                        // return redirect('/profile')->with('success','Profile Updated Successfully');

                        return response()->json([
                            'message' => 'Your Profile Info Successfully Updated',
                            'email' => $request->email,
                            'name' => $request->name
                        ]);

                    }

                }
            }




//            if($request->password == null)
//            {
//                if($user->update(['name' => $request->name,'email' => $request->email,]))
//                {
//                  //  return redirect('/profile')->with('success','Profile Updated Successfully');
//
//                    return response()->json([
//                        'message' => 'Your Profile Info Successfully Updated'
//                    ]);
//
//                }
//
//            }
//            else
//            {
//                 $password = Hash::make($request->get('password'));
//
//                if($user->update(['name' => $request->name,'email' => $request->email,'password' => $password]))
//                {
//                   // return redirect('/profile')->with('success','Profile Updated Successfully');
//
//                    return response()->json([
//                        'message' => 'Your Profile Info Successfully Updated'
//                    ]);
//
//                }
//
//            }




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
