<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;



use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Input;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Database\Eloquent\Builder;

use App\DataTables\newsModelDataTable;
use App\Models\newsModel;
use App\Models\User;

class NewsController extends Controller
{

    public function BN_news(Request $request)
    {
        // $news = newsModel::query()
        // ->orderBy('id', 'desc')
        // ->paginate(12);

        $query = newsModel::query()
            ->orderBy('id', 'desc');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('excerpt', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('content', 'LIKE', '%' . $keyword . '%');
            });
        }

        $resultPerPage = 12;
        $query = $query->paginate($resultPerPage);

        return view('backend/news', [ 
            'default_pagename' => 'ข่าวรถยนต์',
            'query' => $query,
        ]);
    }



    public function index(newsModelDataTable $dataTable)
    {
        return $dataTable->render('backend.news');
        // return Datatables::of(Customer::query())->make(true);
        // $data["data"] = "hello world";
        // return response(json_encode($data));
    }
    
    public function BN_news_add(Request $request)
    {
        return view('backend/news-add', [ 
            'default_pagename' => 'เพิ่มข่าวใหม่',
        ]);
    }
    public function BN_news_edit(Request $request, $id)
    {
        $mynews = newsModel::find($id);
        return view('backend/news-edit', [ 
            'default_pagename' => 'แก้ไขข่าว',
            'mynews' => $mynews,
        ]);
    }
    public function BN_newsFetch()
    {
        $query = newsModel::all()->sort();
        $output = '';
        if($query->count() > 0){
            ?>
                <div class="grid gap-6 mt-5 p-5 box">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="">
                                <tr class="">
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">#</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">ชื่อ</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">คำอธิบาย</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">รูปภาพ</td>
                                    <td class="font-medium px-5 py-3 border-b-2 dark:border-darkmode-300 whitespace-nowrap">*</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach($query as $key => $res){
                                $count++;
                                ?>
                                <tr class="">
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $count ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->name ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><?php echo $res->description ?></td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap">
                                        <img width="150" src="<?php echo url($res->feature) ?>" />
                                    </td>
                                    <td class="px-5 py-3 border-b dark:border-darkmode-300 whitespace-nowrap"><a href="<?php echo route('BN_categories_edit', ['id' => $res->id]); ?>">แก้ไข</a></td>
                                </tr>
                                <?php
                                }
                                ?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
        }else{
            echo "Not Found!!!";
        }
    }

    public function BN_news_add_action(Request $request)
    {
        // dd($request);
        $news = new newsModel;

        if($request->hasFile('feature')){

            if(isset($Customer->feature)){
                $oldPath = public_path($Customer->feature);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }

            $file = $request->file('feature');
            $destinationPath = public_path('/uploads/news-feature');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time().'-'.uniqid().'.'.$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/news-feature/'.$newfilenam;

            $news->feature = $filepath;
        }


        $news->user_id = $request->user_id;
        $news->title = $request->title;
        $news->excerpt = $request->excerpt;
        $news->content = $request->content;

        $news->save();

        // if(isset($Customer->id)){
        //     $usersavelog = auth()->user();
        //     $idsavelog = auth()->user()->id; 
        //     $emailsavelog = auth()->user()->email;
        //     $para = array(
        //         'part' => 'backend',
        //         'user' => $idsavelog,
        //         'ref' => $categories->id,
        //         'remark' => 'User '.$idsavelog.' Create new Category!',
        //         'event' => 'create category',
        //     );
        //     $result = (new LogsSaveController)->create_log($para);
        // }

        return redirect(route('BN_news'))->with('success', 'สร้างสำเร็จ !!!');

    }
    public function BN_news_edit_action(Request $request)
    {
        // dd($request);
        $news = newsModel::find($request->news_id);

        if($request->hasFile('feature')){

            if(isset($Customer->feature)){
                $oldPath = public_path($Customer->feature);
                if(File::exists($oldPath)){
                    File::delete($oldPath);
                }
            }

            $file = $request->file('feature');
            $destinationPath = public_path('/uploads/news-feature');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time().'-'.uniqid().'.'.$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/news-feature/'.$newfilenam;

            $news->feature = $filepath;
        }


        $news->user_id = $request->user_id;
        $news->title = $request->title;
        $news->excerpt = $request->excerpt;
        $news->content = $request->content;

        $news->update();

        // if(isset($Customer->id)){
        //     $usersavelog = auth()->user();
        //     $idsavelog = auth()->user()->id; 
        //     $emailsavelog = auth()->user()->email;
        //     $para = array(
        //         'part' => 'backend',
        //         'user' => $idsavelog,
        //         'ref' => $categories->id,
        //         'remark' => 'User '.$idsavelog.' Create new Category!',
        //         'event' => 'create category',
        //     );
        //     $result = (new LogsSaveController)->create_log($para);
        // }
        return redirect()->back()->with('success', 'แก้ไขสำเร็จ !!!');

    }
    public function BN_news_store(Request $request, newsModelDataTable $dataTable): RedirectResponse
    {
        $validated = $request->validate([
            'title'     => 'required',
            'feature'   => 'required',
            'excerpt'   => 'required',
            'content'   => 'required',
        ]);
        // return dd($request);

        $filepath = null;
        if($request->hasFile('feature')){
            $file = $request->file('feature');
            $destinationPath = public_path('/uploads');
            $filename = $file->getClientOriginalName();

            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $newfilenam = time() . '.' .$ext;
            $file->move($destinationPath, $newfilenam);
            $filepath = 'uploads/'.$newfilenam;
        }

        $news_store = [
            "title"     => $request->title,
            "feature"   => $filepath,
            "excerpt"   => $request->excerpt,
            "content"   => $request->content
        ];
        newsModel::create($news_store);

        return redirect($this->index($dataTable));
    }
    public function BN_news_ajaxlist(Request $request) {
        $data = [];
        return redirect(json_encode($data));
    }
}
