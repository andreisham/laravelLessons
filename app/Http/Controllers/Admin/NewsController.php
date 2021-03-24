<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsEditRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsList = News::select('*')
            ->paginate(5);

        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function create(News $news)
    {
        $categories = Category::all();
        return view('admin.news.create', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $data = $request->only('title', 'description', 'status');
        $category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $fileName = uniqid() . "." . $ext;
            $data['image'] = $image->storeAs('/news', $fileName, 'public');
        }
        $category = Category::findOrFail($category_id);
        $news = new News($data);
        $status = $category->news()->save($news);

        if ($status) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.success'));
        }
        return back()->withInput()->with('errors', trans('messages.admin.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsEditRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, News $news)
    {
        $data = $request->validated();

        $save = $news->fill($data)->save();
        if ($save) {
            return redirect()->route('admin.news.index')
                ->with('success', trans('messages.admin.success'));
        }
        return back()->withInput()->with('errors', trans('messages.admin.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
