<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SourceCreateRequest;
use App\Http\Requests\SourceEditRequest;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::select('*')
            ->paginate(5);

        return view('admin.news.sources.index', [
            'sources' => $sources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SourceCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SourceCreateRequest $request)
    {
        $data = $request->validated();

        $create = Source::create($data);
        if ($create) {
            return redirect()->route('admin.sources.index')
                ->with('success', trans('messages.admin.success'));
        }
        return back()->withInput()->with('errors', trans('messages.admin.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param Source $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        return view('admin.news.sources.show', ['source' => $source]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.news.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SourceEditRequest $request
     * @param Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(SourceEditRequest $request, Source $source)
    {
        $data = $request->validated();

        $save = $source->fill($data)->save();
        if ($save) {
            return redirect()->route('admin.sources.index')
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
