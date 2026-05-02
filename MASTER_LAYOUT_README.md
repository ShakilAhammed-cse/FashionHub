# Master Layout Documentation

## Overview
The Master Layout (`layouts/app.blade.php`) is the main template that wraps all pages in your application. It includes common elements like the navbar, footer, and all required CSS/JS dependencies.

## File Structure
```
resources/views/layouts/
├── app.blade.php      # Main master layout
├── navbar.blade.php   # Navigation bar component
└── footer.blade.php   # Footer component
```

## How to Use

### 1. Extending the Master Layout
To create a new page that uses the master layout:

```blade
@extends('layouts.app')

@section('title', 'Page Title - FashionHub')

@section('content')
    <!-- Your page content here -->
@endsection
```

### 2. Available Sections

#### `@section('title', '...')`
Set the page title that appears in the browser tab.
```blade
@section('title', 'Home - FashionHub')
```

#### `@section('content')`
This is where all your page-specific content goes. This is the main area that changes per page.
```blade
@section('content')
    <h1>Welcome to our store</h1>
    <!-- Page content -->
@endsection
```

### 3. Adding Custom Styles and Scripts

#### Page-Specific Styles
Use `@push('styles')` to add CSS only for specific pages:
```blade
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom-page.css') }}">
@endpush
```

#### Page-Specific Scripts
Use `@push('scripts')` to add JavaScript only for specific pages:
```blade
@push('scripts')
    <script src="{{ asset('assets/js/custom-page.js') }}"></script>
@endpush
```

## Master Layout Components

### Navbar (`layouts/navbar.blade.php`)
- Automatically included in every page
- Contains main navigation links
- Uses route helper to highlight active links
- Responsive mobile menu

### Footer (`layouts/footer.blade.php`)
- Automatically included in every page
- Contains company info, links, and newsletter signup
- Consistent across all pages

### CSS Files (Auto-included)
- Bootstrap framework
- Font Awesome icons
- FashionHub custom stylesheet
- Owl Carousel
- Lightbox

### JS Files (Auto-included)
- jQuery 2.1.0
- Bootstrap Bundle
- Owl Carousel
- Custom scripts

## Complete Example

```blade
@extends('layouts.app')

@section('title', 'Products - FashionHub')

@section('content')
<div class="container mt-5">
    <h1>Our Products</h1>
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-4">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
    .product-card {
        border: 1px solid #ddd;
        padding: 15px;
    }
</style>
@endpush
```

## Creating Routes for Navigation

Make sure your routes are named (used in navbar links):

```php
// In routes/web.php
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
```

## Benefits

1. **Consistency**: Same navbar and footer across all pages
2. **DRY Principle**: Don't repeat HTML code
3. **Maintainability**: Update navbar/footer in one place
4. **Flexibility**: Add page-specific styles/scripts easily
5. **Clean Code**: Separate concerns into components

## Notes

- The navbar automatically highlights the active page
- Replace placeholder images and links with your actual content
- All asset paths use Laravel's `asset()` helper for proper URL generation
- The `@stack()` directive allows child views to push content to the layout
