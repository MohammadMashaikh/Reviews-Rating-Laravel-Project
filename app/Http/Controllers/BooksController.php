<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

       switch ($request->query('filter')) {
        case 'popular_last_month':
            $query->withCount(['reviews as reviews_count' => function ($q) {
                $q->where('created_at', '>=', now()->subMonth());
            }])
            ->orderBy('reviews_count', 'desc');
            break;

            case 'popular_last_six_months' :
                $query->withCount(['reviews as reviews_count' => function ($q) {
                    $q->where('created_at', '>=', now()->subMonth(6));
                }])
            ->orderBy('reviews_count', 'desc');
            break;

            case 'highest_rated_last_month' :
                $query->with(['reviews' => function ($q) {
                    $q->where('created_at', '>=', now()->subMonth());
                }])
                ->withCount('reviews')
                ->get()
                ->sortByDesc(function ($book) {
                    return $book->reviews->avg('rating');
                });
                break;
        
                case 'highest_rated_last_six_months' :
                    $query->with(['reviews' => function ($q) {
                        $q->where('created_at', '>=', now()->subMonth(6));
                    }])
                    ->withCount('reviews')
                    ->get()
                    ->sortByDesc(function ($book) {
                        return $book->reviews->avg('rating');
                    });
                    break;


                    case 'latest':
        default:
            $query->withCount('reviews')->latest();
            break;
       }

       $title = $query->where('title', 'like' , '%' . $request->query('title') . '%');

       $books = $query->paginate(10)->appends($request->only('filter'));

        return view('books.index', compact('books', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
