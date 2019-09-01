<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function index(Request $request)
	{
		$posts = Post::when($request->search, function ($query) use ($request) {
			$search = $request->search;

			return $query->where('title', 'like', "%$search%")
				->orWhere('body', 'like', "%$search%");
		})->with('tags', 'category', 'user')
			->withCount('comments')
			->published()
			->simplePaginate(5);

		return view('frontend.index', compact('posts'));
	}

	public function post(Post $post)
	{
		$post = $post->load(['comments.user', 'tags', 'user', 'category']);

		return view('frontend.post', compact('post'));
	}

	public function comment(Request $request, Post $post)
	{
		$this->validate($request, ['body' => 'required']);

		$post->comments()->create([
			'body' => $request->body
		]);
		flash()->overlay('Comment successfully created');

		return redirect("/posts/{$post->id}");
	}

	public function contact()
	{
		return view('frontend.contact');
	}

	public function contactProcess(Request $request)
	{
		$nom = $request->input("nom");
		$correu = $request->input("correu");
		$comentari = $request->input("comentari");
		return view("frontend.contact_process", compact('nom', 'correu', 'comentari'));
	}

	public function entrades()
	{
		$entrades = Post::where('user_id', '1')
			->where(function ($query) {
				$query->where('category_id', '8')
					->orWhere('category_id', '9');
			})
			->get();
		return view("frontend.entrades", compact("entrades"));
	}

	public function entrada($id) {
		$entrada = Post::find($id);
		return view('frontend.entrada', compact('entrada'));
	}

	public function borradors(){
		$borradors = Post::where('is_published', '0')
			->where(function ($query) {
				$query->where('category_id', '10')
					->where('user_id', '3')
					->orWhere('category_id', '5')
					->where('user_id', '6');
			})
			->get();
		return view('frontend.borradors', compact('borradors'));
	}

	public function listAllPosts() {
		$autors = User::get();
		$categories = Category::get();
		$posts = Post::get();
		return view('frontend.list_all_posts', compact('autors', 'categories', 'posts'));
	}

	public function listPosts($autor, $categoria) {
		if ($autor < 0) {
			$autor = "%";
		}
		if ($categoria < 0) {
			$categoria = "%";
		}
		$posts = Post::where('user_id', 'like', $autor)
			->where('category_id', 'like', $categoria)
			->get();
		return view('frontend.list_posts', compact('posts'));
	}
}
