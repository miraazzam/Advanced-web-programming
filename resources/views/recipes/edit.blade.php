<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #1a0b2e;
            color: white;
        }

        .form-box {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(255,255,255,0.05);
            border-radius: 15px;
        }

        .btn-beige {
            background: #f5e6c8;
            color: #2d0b3f;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="form-box">

    <div class="d-flex justify-content-between mb-3">
        <h2>Edit Recipe</h2>
        <a href="{{ route('recipes.index') }}" class="btn btn-light btn-sm">Back</a>
    </div>

    <form method="POST" action="{{ route('recipes.update', $recipe->id) }}">
        @csrf
        @method('PUT')

        <input class="form-control mb-2"
               name="title"
               value="{{ old('title', $recipe->title) }}"
               placeholder="Title">

        <textarea class="form-control mb-2"
                  name="description"
                  placeholder="Description">{{ old('description', $recipe->description) }}</textarea>

        <textarea class="form-control mb-2"
                  name="instructions"
                  placeholder="Instructions">{{ old('instructions', $recipe->instructions) }}</textarea>

        <input class="form-control mb-2"
               name="image"
               value="{{ old('image', $recipe->image) }}"
               placeholder="Image URL">

        <input class="form-control mb-3"
               name="origin_country"
               value="{{ old('origin_country', $recipe->origin_country) }}"
               placeholder="Origin Country">

        <button class="btn btn-beige w-100">Update Recipe</button>
    </form>

</div>

</body>
</html>