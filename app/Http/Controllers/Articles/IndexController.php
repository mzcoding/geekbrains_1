<?php

namespace App\Http\Controllers\Articles;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class IndexController extends Controller
{
	protected $articles = [];
	public function __construct()
	{
		$this->articles = [
			'Я первая статья',
			'Я вторая статья',
			'Я просто статья'
		];
	}
	public function getProfileImage()
	{
		return response()->download(public_path('img/profile.jpg'));
	}

	public function listArticlesAsJson()
	{
		return response()->json(['articles' => $this->articles]);
	}

	public function listArticles(Request $request)
	{
		$objArticle = new Article();
		$articles = $objArticle->allArticles();
		$count = $objArticle->countArticles();

		return view('articles.listArticles', [
			'articles'      => $articles,
			'countArticles' => $count
		]);
	}
	public function getArticle(int $id)
	{
		$objArticle = new Article();
		$article = $objArticle->getArticleById($id);

		if(!$article) {
			return abort(404);
		}


		return view('articles.article', [
 			'article' => $article
		]);
	}

	public function saveArticle(ArticleRequest $request)
	{

			$title = $request->input('title');
			$date  = $request->input('created_at');
			$text  = $request->input('text', "Hello world");

			\DB::table('articles')
				          ->insert([
				          	  'title' => $title,
							  'text' => $text
						  ]);


			return redirect(route('articles'))
				->with('success', 'Статья успешно добавлена');



	}
}
