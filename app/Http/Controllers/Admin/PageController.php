<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        return view('admin.page.index' ,compact('pages'));
    }
    public function create()
    {
        return view('admin.page.create');
    }
    public function store(StorePageRequest $request)
    {
        $data = $request->validated();
        Page::create($data);
        return redirect()->route('admin.page.index')->with('success' , 'Sayfa Başarıyla Eklendi');
    }
    public function edit(Page $page)
    {
        return view('admin.page.edit' , compact('page'));
    }
    public function update(UpdatePageRequest $request , Page $page)
    {
        $data = $request->validated();
        $page->update($data);
        return redirect()->route('admin.page.index')->with('success' , 'Sayfa Başarıyla Güncellendi');
    }
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.page.index');
    }
}
