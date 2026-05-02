@extends('layouts.app')

@section('title', 'Admin - Products')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <h1 style="color: #333; margin: 0;">Admin Panel - Product Management</h1>
        <a href="{{ route('admin.logout') }}" style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none; cursor: pointer; font-size: 14px;">Logout</a>
    </div>

    @if($message = Session::get('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ $message }}
        </div>
    @endif

    <!-- Add Product Form -->
    <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 30px; border: 1px solid #ddd;">
        <h2 style="margin-top: 0; color: #333; font-size: 20px;">Add New Product</h2>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Product Name</label>
                <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                @error('name') <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span> @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Category</label>
                    <select name="category" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-family: Arial;">
                        <option value="">-- Select Category --</option>
                        <option value="mens">Men's</option>
                        <option value="womens">Women's</option>
                        <option value="kids">Kids</option>
                    </select>
                    @error('category') <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Image Preview</label>
                    <img id="imagePreview" src="" alt="Preview" style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; border-radius: 4px; display: none;">
                    <p id="noImage" style="color: #999; font-size: 14px;">No image selected</p>
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Description</label>
                <textarea name="description" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-family: Arial;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Price</label>
                    <input type="number" name="price" step="0.01" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                    @error('price') <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Quantity</label>
                    <input type="number" name="quantity" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                    @error('quantity') <span style="color: #dc3545; font-size: 12px;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Image URL (Recommended: Square images like 500x500px)</label>
                <input type="text" name="image" id="imageInput" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
                <small style="color: #777;">Example: https://via.placeholder.com/500</small>
            </div>

            <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Add Product</button>
        </form>

        <script>
            document.getElementById('imageInput').addEventListener('input', function() {
                var imagePreview = document.getElementById('imagePreview');
                var noImage = document.getElementById('noImage');
                if (this.value) {
                    imagePreview.src = this.value;
                    imagePreview.style.display = 'block';
                    noImage.style.display = 'none';
                } else {
                    imagePreview.style.display = 'none';
                    noImage.style.display = 'block';
                }
            });
        </script>
    </div>

    <!-- Products List Grouped by Category -->
    @php
        $categories = ['mens' => "Men's", 'womens' => "Women's", 'kids' => "Kids"];
    @endphp

    @foreach($categories as $key => $label)
        @php
            $categoryProducts = $products->where('category', $key);
        @endphp

        <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ddd;">
            <h2 style="margin-top: 0; color: #333; font-size: 20px; margin-bottom: 20px;">{{ $label }} Products ({{ $categoryProducts->count() }})</h2>

            @if($categoryProducts->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #e9ecef;">
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; font-weight: bold;">ID</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; font-weight: bold;">Image</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; font-weight: bold;">Name</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; font-weight: bold;">Price</th>
                                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; font-weight: bold;">Qty</th>
                                <th style="padding: 12px; text-align: center; border-bottom: 2px solid #ddd; font-weight: bold;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoryProducts as $product)
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding: 12px;">{{ $product->id }}</td>
                                    <td style="padding: 12px;">
                                        @if($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <div style="width: 80px; height: 80px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #999; font-size: 12px;">No image</div>
                                        @endif
                                    </td>
                                    <td style="padding: 12px;">{{ $product->name }}</td>
                                    <td style="padding: 12px;">${{ number_format($product->price, 2) }}</td>
                                    <td style="padding: 12px;">{{ $product->quantity }}</td>
                                    <td style="padding: 12px; text-align: center;">
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" style="background-color: #dc3545; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="color: #666; text-align: center; padding: 20px;">No products in this category yet.</p>
            @endif
        </div>
    @endforeach

</div>
@endsection
