<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('active', 1)->get();
        

        // Get totalSales
        $totalSales = Sale::where(function ($query) {
            $query->whereNull('active')
              ->orWhere('active', 1);
        })->sum('total_amount');

        // Get totalProducts
        $totalProducts = Product::where(function ($query) {
            $query->whereNull('active')
              ->orWhere('active', 1);
        })->count();

        // Get totalClients
        $totalClients = Client::where(function ($query) {
            $query->whereNull('active')
              ->orWhere('active', 1);
        })->count();
        

        // Get totalSuppliers
        $totalSuppliers = Supplier::where(function ($query) {
            $query->whereNull('active')
              ->orWhere('active', 1);
        })->count();
        return view('frontend.index', compact('totalSales', 'totalProducts', 'totalClients', 'totalSuppliers'));
    }



    public function getPost($id)
    {
        $post_categories = PostCategory::where('active', 1)->with('posts')->get();
        $latest_posts = Post::where('active', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $post = Post::with('comments.user')->findOrFail($id);
        return view('frontend.post', compact('post_categories', 'latest_posts', 'post'));
    }


    public function posts()
    {
        $post_categories = PostCategory::where('active', 1)->with('posts')->get();
        $posts = Post::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);
        $featured_posts = Post::where('active', 1)->where('status', 3)->orderBy('created_at', 'desc')->get();

        return view('frontend.posts', compact('post_categories', 'posts', 'featured_posts'));
    }
}
