<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    @if (session('success_review_new'))
    <div class="mt-5 mb-5 alert alert-success container">
        <h3 class="display-5">{{ session('success_review_new') }}</h3>
    </div>
  @endif



    <section class="container mt-5">
        <div class="mb-5">
            <h1 class="display-5">Books</h1>
        </div>

        <form action="{{ route('books.index', ['filter' => 'title']) }}" method="GET" class="d-flex gap-3 mb-5">
        <div class="w-75">
            <input type="search" name="title" placeholder="Search by title" class="form-control flex-1" value="{{ request()->get('title') }}">
        </div>
        <div>
            <button type="submit" class="btn btn-outline-info">Search</button>
            <a href="{{ route('books.index') }}" class="btn btn-outline-info">Clear</a>
          </div>
        </form>
    </section>


    <section class="mt-5 container">
      <div class="p-3 bg-info bg-opacity-10 border border-info rounded w-75">
      <ul class="nav nav-underline">
        <li class="nav-item text-primary-emphasis">
          <a class="nav-link text-primary-emphasis {{ request()->query('filter') == 'latest' || request()->query('filter') == ''  ? 'active' : '' }}" aria-current="page" href="{{ route('books.index', array_merge(request()->query(), ['filter' => 'latest'])) }}">Latest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary-emphasis {{ request()->query('filter') == 'popular_last_month' ? 'active' : '' }}" href="{{ route('books.index', array_merge(request()->query(), ['filter' => 'popular_last_month'])) }}">Popular Last Month</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary-emphasis {{ request()->query('filter') == 'popular_last_six_months' ? 'active' : '' }}" href="{{ route('books.index', array_merge(request()->query(), ['filter' => 'popular_last_six_months'])) }}">Popular Last 6 Months</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary-emphasis {{ request()->query('filter') == 'highest_rated_last_month' ? 'active' : '' }}" href="{{ route('books.index', array_merge(request()->query(), ['filter' => 'highest_rated_last_month'])) }}">Highest Rated Last Month</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary-emphasis {{ request()->query('filter') == 'highest_rated_last_six_months' ? 'active' : '' }}" href="{{ route('books.index', array_merge(request()->query(), ['filter' => 'highest_rated_last_six_months'])) }}">Highest Rated Last 6 Months</a>
        </li>
      </ul>
    </div>
    </section>


    <section class="container mt-5">
      @foreach ($books as $book)
      <a style="color: inherit; text-decoration: none;" href="{{ route('reviews.book', ['book' => $book]) }}">
      <div class="shadow p-3 mb-5 bg-body rounded w-75">
        <div class="d-flex justify-content-between">
        <div>
          <h5>{{ $book->title }}</h5>
          <p class="lead">By {{ $book->author }}</p>
        </div>
        <div class="align-center mt-3">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <p class="lead">out of {{ $book->reviews_count}} reviews</p>
        </div>
        </div>
      </div>
    </a>
      @endforeach
    </section>

    <div class="container mt-5 mb-5 text-center">
      <div class="d-flex justify-content-center w-75">
          {{ $books->appends(request()->query())->links('pagination::bootstrap-5') }}
      </div>
  </div>
  


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>