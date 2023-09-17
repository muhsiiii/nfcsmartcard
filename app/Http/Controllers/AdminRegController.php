<?php

namespace App\Http\Controllers;

use App\Models\allergyDropdown;
use App\Models\Campany;
use App\Models\CropImage;
use App\Models\IndustryDropdown;
use App\Models\medicalDropdown;
use App\Models\Profile;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminRegController extends Controller
{

    public function UserList()
    {
        $Users = Users::latest()->paginate(10);
        $UsersCount = Users::count();
        return view('admin.registeration.user.users_list', compact('Users', 'UsersCount'));
    }

    public function UserRegSave(Request $request)
    {
        if (Users::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->cpwd)
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function UserRegUpdate(Request $request)
    {
        if (Users::where('id', $request->userid)->update([
            'firstname' => $request->fname,
            'lastname' => $request->lname,              
            'mobile' => $request->mobile1,
            'email' => $request->email,
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function UserRegDelete(Request $request)
    {
        if (Users::where('id', $request->userid)->delete()) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        echo json_encode($data);
    }

    public function UserChangePwd(Request $request)
    {
        if (Users::where('id', $request->userid)->update([
            'password' => bcrypt($request->password)
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function UserProfile($UserID)
    {
        $profiles = Profile::where('user_id', $UserID)->paginate(10);
        return view('admin.registeration.user.user_profile', compact('UserID', 'profiles'));
    }

    public function profileDelete(Request $request)
    {
        $profiledelete = Profile::where('id', $request->pid)->delete();

        if ($profiledelete) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function profileEdit($id, $user_id)
    {

        $profiles = Profile::find($id);
        $dropdownDatas = medicalDropdown::all();
        $dropdownallergyDatas = allergyDropdown::all();
        $dropdownindustryDatas = IndustryDropdown::all();
        return view('admin.registeration.user.profile_edit', compact('profiles', 'dropdownDatas', 'dropdownallergyDatas', 'dropdownindustryDatas', 'user_id'));
    }


    public function profileuserUpdate(Request $request)
    {
        if (Profile::where('id', $request->pid)->update([
            'profile_pic' => $request->profilepic,
            'user_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'bio' => $request->bio,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'emergency_name' => $request->fullname,
            'relation_user' => $request->relationship,
            'contact_info' => $request->contact,
            'conditions' => $request->condition,
            'allergies' => $request->allergy,
            'blood' => $request->bloodtype,
            'theme' => $request->theme,
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }


    public function profilebusinessUpdate(Request $request)
    {

        if (Profile::where('id', $request->pid)->update([

            'business_name' => $request->bname,
            'logo' => $request->logo,
            'industry' => $request->industry,
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'description' => $request->description,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'theme' => $request->theme,

        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function Profile($UserID)
    {
        $dropdownDatas = medicalDropdown::all();
        $dropdownallergyDatas = allergyDropdown::all();
        $dropdownindustries = IndustryDropdown::all();
        return view('admin.registeration.user.profile', compact('UserID', 'dropdownDatas', 'dropdownallergyDatas', 'dropdownindustries'));
    }

    public function ProfileSave(Request $request)
    {


        $profileSave = Profile::create([
            'profile_type' => $request->profileid,
            'theme' => $request->theme,
            'profile_pic' => $request->userdp,
            'user_name' => $request->username,
            'email' => $request->email,
            'user_id' => $request->userid,
            'phone' => $request->phone,
            'address' => $request->address,
            'dob' => $request->dob,
            'instagram' => $request->insta,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'bio' => $request->bio,

            'emergency_name' => $request->fullname,
            'relation_user' => $request->relationship,
            'contact_info' => $request->contact,
            'conditions' => $request->condition,
            'allergies' => $request->allergy,
            'blood' => $request->blood,

        ]);

        if ($profileSave) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        echo json_encode($data);
    }


    public function cropImageUploadAjax(Request $request)
    {
        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);



        return response()->json(['success' => 'Crop Image Uploaded Successfully', 'image_name' => $imageName]);
    }


    public function cropImageUploadBusinessAjax(Request $request)
    {
        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $LogoName = uniqid() . '.png';

        $imageFullPath = $folderPath . $LogoName;

        file_put_contents($imageFullPath, $image_base64);

        return response()->json(['success' => 'Crop Image Uploaded Successfully', 'logo_name' => $LogoName]);
    }

    public function ProfileSaveBus(Request $request)
    {
        $businessprofile = Profile::create([
            'profile_type' => $request->profileid,
            'theme' => $request->theme,
            'logo' => $request->logo,
            'business_name' => $request->bname,
            'industry' => $request->industry,
            'user_id' => $request->userid,
            'phone' => $request->phone,
            'website' => $request->website,
            'description' => $request->description,
            'twitter' => $request->twitter,
            'twitter' => $request->linkedin,
            'instagram' => $request->instagram,
            'address' => $request->address,
        ]);

        if ($businessprofile) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        echo json_encode($data);
    }

    public function ProfilePreview(Request $request, $profileID)
    {
        $profilePreview = Profile::where('id', $profileID)->first();
        if ($profilePreview->theme == 'theme1_user') {
            return view('admin.registeration.user.profile_themes.theme1_user', compact('profilePreview'));
        } elseif ($profilePreview->theme == 'theme2_user') {
            return view('admin.registeration.user.profile_themes.theme2_user', compact('profilePreview'));
        } elseif ($profilePreview->theme == 'theme1_bus') {
            return view('admin.registeration.user.profile_themes.theme1_business', compact('profilePreview'));
        } else {
            return view('admin.registeration.user.profile_themes.theme2_business', compact('profilePreview'));
        }
    }

    public function Theme1()
    {
        return view('admin.registeration.user.profile_themes.theme1_user');
    }

    public function Theme2()
    {
        return view('admin.registeration.user.profile_themes.theme1_business');
    }

    public function Theme3()
    {
        return view('admin.registeration.user.profile_themes.theme2_user');
    }

    public function Theme4()
    {
        return view('admin.registeration.user.profile_themes.theme2_business');
    }






    public function CampanyRegList()
    {
        $Campanies = Campany::latest()->paginate(10);
        return view('admin.registeration.campanies.campany_list', compact('Campanies'));
    }

    public function CampanyRegSave(Request $request)
    {
        if (Campany::create([
            'name' => $request->cname,
            'email' => $request->cemail,
            'mobile' => $request->ccontact,
            'password' => bcrypt($request->ccpwd),
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    public function CampanyRegUpdate(Request $request)
    {
        if (Campany::where('id', $request->campanyid)->update([
            'name' => $request->campanyname,
            'email' => $request->campanyemail,
            'mobile' => $request->campanymobile,
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        echo json_encode($data);
    }

    public function CampanyChangePwd(Request $request)
    {
        if (Campany::where('id', $request->cid)->update([
            'password' => bcrypt($request->password)
        ])) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        echo json_encode($data);
    }

    public function CampanyRegDelete(Request $request)
    {
        if (Campany::where('id', $request->cid)->delete()) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }

        echo json_encode($data);
    }
}
