<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index() {
        $categories = Category::all(); // Ambil semua kategori
        return view('admin.index', compact('categories')); // Kirim kategori ke tampilan
    }

    public function createCategory(Request $request) {
        $request->validate(['name' => 'required']);
        Category::create($request->all());
        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function createMenu(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validate image
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->category_id = $request->category_id;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/menu', 'public');
            $menu->image = $imagePath; // Save image path to database
        }

        $menu->save();

        return redirect()->back()->with('success', 'Menu created successfully!');
    }
}
