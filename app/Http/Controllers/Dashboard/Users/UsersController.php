<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Dashboard\Users\EditUserRequest;

class UsersController extends Controller
{
    public function index(Request $request) {
        
        if(!empty($request->q)){
            $q = User::select(['id','name','email','phone','created_at'])
                ->where('name', 'LIKE', '%'.$request->q.'%')
                ->orWhere('phone', 'LIKE', '%'.$request->q.'%')
                ->orWhere('email', 'LIKE', '%'.$request->q.'%');
        }else{
            $q = User::select(['id','name','email','phone','created_at']);
        }

        $users = $q->orderBy('id','DESC')
                    ->withCount(['questions','comments'])
                    ->paginate(15);

        return view('dashboard.users.index',compact('users'));
    }

    public function remove(Request $request) {

        $validated = $request->validate([
            'id' => 'required|exists:users'
        ]);

        $user = User::find($request->id)->delete();

        return true;

    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit',compact('user'));
    }

    public function update(EditUserRequest $request) {
        $data = $request->validated();
        User::find($data['id'])->update($data);
        return redirect()->back()->withSuccess('User updated successfully');
    }


}
