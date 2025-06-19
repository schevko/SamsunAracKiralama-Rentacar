<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'is_active' => 'boolean'
        ]);
        Page::create($data);
        return redirect()->route('admin.page.index')->with('success' , 'Sayfa Başarıyla Eklendi');
    }
    public function edit(Page $page)
    {
        return view('admin.page.edit' , compact('page'));
    }
    public function update(Request $request , Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'is_active' => 'boolean'
        ]);
        $page->update($data);
        return redirect()->route('admin.page.index')->with('success' , 'Sayfa Başarıyla Güncellendi');
    }
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.page.index');
    }
}
