<?php

namespace App\Http\Controllers\front;

use App\Http\Requests\blogRequest;
use App\Models\Postimage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    //
    public function getData($id)
    {
        $obj = new \stdClass();
        $obj->id = 20;
        $obj->name = 'akram';
        $data = [];
        $data['id'] = $id;
        $data['age'] = 1;
        return view('welcome', $data, compact('obj'));
    }

    public function create()
    {
        return view('users');
    }

    public function save(blogRequest $request)
    {
        Blog::create([
            "name"  => $request->input("name"),
            "email" => $request->input("email"),
            "address"   => $request->input("address")
        ]);
        return redirect('blog');

    }

    public function showBlogs()
    {
        /*$post=User::join('postimages','blogs.id','=','postimages.post_id')
        ->get(['blogs.*','postimages.image']);
        return view('blogs',['post'=>$post]);*/
    }

    public function editBlog(Request $req, $id)
    {

        if ($post = User::where('id', '=', $id)->count() > 0) {
            $post = User::where('id', '=', $id)->get();
            return view('edit', ['post' => $post]);
        } else {
            return redirect('blog');
        }
    }

    public function saveEditPost(Request $req)
    {
        $postName = User::where('id', '!=', $req->id)->where('name', '=', $req->name)->first();
        $data = new Postimage();
        if (!$postName) {
            $update = User::where('id', '=', $req->id)
                ->update([
                    'name' => $req->name,
                    'email' => $req->email,
                    'address' => $req->address]);
            if ($req->file('image')) {
                $file = $req->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $data['image'] = $filename;
                $data['post_id'] = $req->id;
            }
            $data->save();
            return redirect('blog');

        } else {
            return redirect()->back()->with(['save' => 'اسم المقال مكرر الرجاء اختيار اسم اخر']);
        }
    }

    public function DeletePost($id)
    {
        $CheckId = User::where('id', '=', $id)->first();
        if ($CheckId) {
            $op = User::find($id);
            $op->delete();
            return redirect()->back()->with(['delete' => 'تم مسح المقال بنجاح']);
        } else {
            return redirect()->back()->with(['not' => 'خطاء في اختيار المقال']);
        }
    }
}
