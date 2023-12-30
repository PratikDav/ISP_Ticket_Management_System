<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /********************************
     **** Admin Section Start *******
     *********************************/

    public function viewAdminForm()
    {
        $title = 'Add Admin';
        $description = 'Add a new Admin here !';
        $url = url('admin/store');
        return view('admin.pages.admin.create_admin', compact('title', 'description', 'url'));
    }

    public function storeAdmin(Request $request)
    {
        $user = new User();

        $request->validate([

            'name' => 'required|filled',
            'number' => 'required|filled|numeric',
            'email' => 'required|email',
            'address' => 'required|filled',
            'picture' => 'required|image|max:7000|mimes:png,jpg,jpeg,gif,svg',
            'password' => 'required|min:6',

        ]);
        $originalImage = $request->file('picture');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $filename = $originalImage->getClientOriginalName();
        $arr = explode(".", $filename);
        $name = $arr[0];
        $extension = $arr[1];
        $uploaded_file_name = time() . '.' . $extension;
        $thumbnailImage->save($originalPath . $uploaded_file_name);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $uploaded_file_name);

        $user_exists = User::where('email', '=', $request->email)->first();

        if ($request->password == $request->confirm_password) {
            if ($user_exists) {
                return redirect()->back()->with('failed', 'Email Already Exists!');
            } else {
                $user->name = ucwords($request['name']);
                $user->number = $request['number'];
                $user->email = $request['email'];
                $user->address = $request['address'];
                $user->picture = $uploaded_file_name;
                $user->role = 'Admin';
                $user->password = md5($request['password']);
                if ($user->save()) {
                    return redirect()->back()->with('success', 'Admin Registered Successfully!');
                }
            }
        } else {
            return redirect()->back()->with('failed', 'Password Not Matched');
        }

    }

    public function showAdmin()
    {
        $data = User::where('role', '=', 'Super Admin')->get();
        $admin = User::where('role', '=', 'Admin')->where('status', '=', 1)->get();
        return view('admin.pages.admin.show_admin', compact('data', 'admin'));
    }

    public function editAdmin($id)
    {

        $title = ' Update Admin';
        $description = 'Update Admin here!';
        $url = url('admin/update') . '/' . $id;
        $admin = User::find($id);
        if (is_null($admin)) {
            return redirect('admin/show');
        } else {

            return view('admin.pages.admin.create_admin', compact('title', 'description', 'url', 'admin'));
        }

    }

    public function updateAdmin(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([

            'name' => 'required|filled',
            'number' => 'required|filled|numeric',
            'address' => 'required|filled',
            'picture' => 'required|image|max:7000|mimes:png,jpg,jpeg,gif,svg',

        ]);
        $originalImage = $request->file('picture');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $filename = $originalImage->getClientOriginalName();
        $arr = explode(".", $filename);
        $name = $arr[0];
        $extension = $arr[1];
        $uploaded_file_name = time() . '.' . $extension;
        $thumbnailImage->save($originalPath . $uploaded_file_name);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $uploaded_file_name);

        $user->name = ucwords($request['name']);
        $user->number = $request['number'];
        $user->address = $request['address'];
        $user->picture = $uploaded_file_name;
        if ($user->save()) {
            return redirect()->back()->with('success', 'Updated Successfully!');
        }

    }

    public function pendingUsers()
    {
        $pending_user = User::where('status', '=', 0)->get();
        $data = compact('pending_user');
        return view('admin.pages.admin.pending_users')->with($data);
    }
    public function approveUsers($id)
    {
        User::where('id', '=', $id)
            ->update(['status' => true]);
        return redirect()->route('pendingUser')->with('success', 'User Approved successfully');

    }
    public function pendingUserDelete($id)
    {
        $delete = User::where('id', '=', $id);
        if (!is_null($delete)) {
            $delete->delete();
            return redirect()->route('pendingUser')->with('deleted', 'Deleted successfully');
        } else {
            return redirect()->route('pendingUser');
        }

        return redirect()->route('pendingUser');

    }

    /********************************
     **** Admin Section End *******
     *********************************/

    /********************************
     **** Client Section Start *******
     *********************************/

    public function viewClientForm()
    {
        $title = 'Add Client';
        $description = 'Add a new Client here !';
        $url = url('client/store');
        return view('admin.pages.client.client_form', compact('title', 'description', 'url'));
    }

    public function storeClient(Request $request)
    {
        $user = new User();

        $request->validate([

            'name' => 'required|filled',
            'number' => 'required|filled|numeric',
            'email' => 'required|email',
            'picture' => 'required|image|max:7000|mimes:png,jpg,jpeg,gif,svg',
            'address' => 'required|filled',
            'client_id' => 'required|filled',
            'client_password' => 'required|filled',

        ]);
        $originalImage = $request->file('picture');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $filename = $originalImage->getClientOriginalName();
        $arr = explode(".", $filename);
        $name = $arr[0];
        $extension = $arr[1];
        $uploaded_file_name = time() . '.' . $extension;
        $thumbnailImage->save($originalPath . $uploaded_file_name);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $uploaded_file_name);

        $user_exists = User::where('email', '=', $request->email)->first();

        if ($request->password == $request->confirm_password) {
            if ($user_exists) {
                return redirect()->back()->with('failed', 'Email Already Exists!');
            } else {
                $user->name = ucwords($request['name']);
                $user->number = $request['number'];
                $user->email = $request['email'];
                $user->address = $request['address'];
                $user->picture = $uploaded_file_name;
                $user->client_id = $request['client_id'];
                $user->client_pass = $request['client_password'];
                $user->role = 'Client';
                $user->password = md5($request['password']);
                if ($user->save()) {
                    return redirect()->back()->with('success', 'Client Registered Successfully!');
                }
            }
        } else {
            return redirect()->back()->with('failed', 'Password Not Matched');
        }

    }

    public function showClient()
    {
        $client = User::where('role', '=', 'Client')->where('status', '=', 1)->get();
        return view('admin.pages.client.show_client', compact('client'));
    }
    public function deleteClient($id)
    {
        $delete = User::where('id', '=', $id)->where('role', '=', 'Client');
        if (!is_null($delete)) {
            $delete->delete();
            return redirect('client/show')->with('deleted', 'Deleted successfully');
        } else {
            return redirect('client/show');
        }

        return redirect()->back();

    }

    public function editClient($id)
    {

        $title = ' Update Client';
        $description = 'Update Client here !';
        $url = url('client/update') . '/' . $id;
        $client = User::find($id);
        if (is_null($client)) {
            return redirect('client/show');
        } else {

            return view('admin.pages.client.client_form', compact('title', 'description', 'url', 'client'));
        }

    }

    public function updateClient(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([

            'name' => 'required|filled',
            'number' => 'required|filled|numeric',
            'address' => 'required|filled',
            'client_id' => 'required|filled',
            'client_password' => 'required|filled',
            'picture' => 'required|image|max:7000|mimes:png,jpg,jpeg,gif,svg',

        ]);
        $originalImage = $request->file('picture');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $filename = $originalImage->getClientOriginalName();
        $arr = explode(".", $filename);
        $name = $arr[0];
        $extension = $arr[1];
        $uploaded_file_name = time() . '.' . $extension;
        $thumbnailImage->save($originalPath . $uploaded_file_name);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $uploaded_file_name);

        $user->name = ucwords($request['name']);
        $user->number = $request['number'];
        $user->address = $request['address'];
        $user->client_id = $request['client_id'];
        $user->client_pass = $request['client_password'];
        $user->picture = $uploaded_file_name;
        if ($user->save()) {
            return redirect()->back()->with('success', 'Client Updated Successfully!');
        }

    }
    /********************************
     **** Client Section End *******
     *********************************/

/********************************
 **** My Profile Section Start *******
 *********************************/

    public function showUserProfile()
    {
        $user = User::all();
        return view('admin.pages.user_profile.user_profile', compact('user'));
    }

    public function updateBasicInfo(Request $request)
    {

        $id = Session::get('user_id');

        $user = User::find($id);

        $request->validate([

            'name' => 'required|filled',
            'number' => 'required|filled|numeric',
            'address' => 'required|filled',
            'picture' => 'required|image|max:7000|mimes:png,jpg,jpeg,gif,svg',

        ]);
        $originalImage = $request->file('picture');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/thumbnail/';
        $originalPath = public_path() . '/images/';
        $filename = $originalImage->getClientOriginalName();
        $arr = explode(".", $filename);
        $name = $arr[0];
        $extension = $arr[1];
        $uploaded_file_name = time() . '.' . $extension;
        $thumbnailImage->save($originalPath . $uploaded_file_name);
        $thumbnailImage->resize(150, 150);
        $thumbnailImage->save($thumbnailPath . $uploaded_file_name);

        $user->name = ucwords($request['name']);
        $user->number = $request['number'];
        $user->address = $request['address'];
        $user->client_id = $request['client_id'];
        $user->client_pass = $request['client_password'];

        $user->picture = $uploaded_file_name;
        if ($user->save()) {
            return redirect()->back()->with('success', 'Info Saved Successfully!');
        }

    }

    public function updateClientInfo(Request $request)
    {

        $id = Session::get('user_id');

        $user = User::find($id);

        $request->validate([

            'client_id' => 'required|filled',
            'client_password' => 'required|filled|min:4',

        ]);

        $user->client_id = $request['client_id'];
        $user->client_pass = $request['client_password'];

        if ($user->save()) {
            return redirect()->back()->with('clientInfoUpdateSuccess', 'Client Info Saved Successfully!');
        } else {
            return redirect()->back()->with('clientInfoUpdateFailed', 'Client Info not Saved!');

        }

    }

    public function updatePassword(Request $request)
    {

        $id = Session::get('user_id');

        $user = User::find($id);

        $request->validate([

            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required',

        ]);
        $getUser = User::where('id', $id)->get();
        foreach ($getUser as $g) {
            $password = $g->password;
        }
        $old_password = md5($request->old_password);

        if ($password == $old_password) {
            if ($request->new_password == $request->confirm_password) {
                $user->password = md5($request->new_password);
                if ($user->save()) {
                    return redirect()->back()->with('passwordChanged', 'Password Changed Successfully!');
                }

            } else {
                return redirect()->back()->with('passwordFailed', 'Confirm Password Must be same to New Password!');

            }

        } else {
            return redirect()->back()->with('passwordFailed', 'Old password Not Matched');

        }

    }

}
/********************************
 **** My Profile Section End *******
 *********************************/
