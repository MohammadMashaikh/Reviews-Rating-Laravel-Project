<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Reviews</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <section class="container mt-5">
        <div>
            <h3 class="display-5 mb-5">Add a New Review For <span class="text-info-emphasis fw-bold">{{ $book->title }}</span></h3>
        </div>

        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="mb-3">
              <div class="form-floating">
                <textarea name="review_description" class="form-control" placeholder="Leave a Review here" id="floatingTextarea">{{ old('review_description') }}</textarea>
                <label for="floatingTextarea">Something interest you ...</label>
              </div>
            </div>
            <div class="mb-3">
            <select class="form-select" name="rating" aria-label="Default select example">
                <option value="{{ old('rating') }}" selected>Choice Your Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <button type="submit" class="btn color-black bg-light">Add a Review</button>
          </form>

    </section>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>