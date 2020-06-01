<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('news.categories.index',
			[
				'categories' => $categories

			]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
	{
			$title = $request->input('title');
			$slug = $request->input('slug');

			$category = Category::create([
				'title' => $title,
				'slug' => $slug
			]);
			if ($category) {
				return redirect()->route('categories.index')
					->with('success', 'Категория успешно добавлена');
			}

			return back()->with('error', ' Не удалось добавить категорию');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
    	if($category->id === 2) {
			dd($category->news);
		}
		return view('news.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
    	$request->validate([
    		'title' => ['required', 'min:3'],
			'slug' => ['required' ,'min:3', Rule::unique('categories')->ignore($category->id)]

		]);
        $category->title = $request->input('title');
        $category->slug  = $request->input('slug');

        if($category->save()) {
			return redirect()->route('categories.index')
				->with('success', 'Категория успешно обновлена');
		}

        return back()->with('error', 'Не удалось обновить данные');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
        	 $category->delete();
		}catch(\Exception $exception) {
        	dd($exception->getMessage());
		}
    }
}
