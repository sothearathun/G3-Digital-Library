<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Analytics</title>

  <link rel="stylesheet" href="{{ asset('css/admin/authors.css') }}"> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<x-navigation.admin-sidebar/>

<div class="main-content">
    <h1>📚 Author</h1>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Author Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Total Books</th>
            <!-- <th>Actions</th> -->
          </tr>
        </thead>
        <tbody>
          @foreach($v_authors as $authors)
          <tr>
            <td>{{ $authors->author_id }}</td>
            <td>{{ $authors->author_image }}</td>
            <td>{{ $authors->author_name }}</td>
            <td>
              <form method="POST" action="{{ route('updateAuthorCategory', $authors->author_id) }}">
                @csrf
                @method('PATCH')
                <select name="author_categories" onchange="this.form.submit()">
                  @foreach($categories as $category)
                    <option value="{{ $category }}" {{ $authors->author_categories == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                  @endforeach
                </select>
              </form>
            </td>
            <!-- how to count books associated with an author -->
            <td> {{ $authors->books_count }} </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
