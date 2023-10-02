<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all(); // Получите все отзывы из базы данных
        return view('admin.review.index', compact('reviews'));
    }

    public function create()
    {
        // Отображение формы для создания нового отзыва
        return view('admin.reviews.create');
    }

    public function store(Request $request)
    {
        // Валидация данных от формы создания отзыва
       // $validatedData = $request->validate([
        //    'name' => 'required|string|max:255',
            //'text' => 'required|string',
        //]);

        $request->validate([
            'name' => 'required|min:3|max:255'
           ]);

        // Создание нового отзыва
        Review::create($request->all());

        // Перенаправление на список отзывов с сообщением об успешном создании
        return redirect()->route('review.index')->with('success', 'Отзыв успешно создан');
    }

    public function show($id)
    {
        // Получение и отображение отзыва по его идентификатору
        $review = Review::findOrFail($id);

        return view('admin.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        // Отображение формы редактирования отзыва
        //$review = Review::findOrFail($id);
          
        
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        // Валидация данных от формы редактирования отзыва
        //$validatedData = $request->validate([
        //    'name' => 'required|string|max:255',
        //    'text' => 'required|string',
       // ]);

        // Обновление отзыва
       // $review = Review::findOrFail($id);
        //$review->update($validatedData);

        $request->validate([
            'name' => 'required|min:3|max:255'
        ]);
        $review->update($request->all());
        


        // Перенаправление на список отзывов с сообщением об успешном обновлении
        return redirect()->route('review.index')->with('success', 'Отзыв успешно обновлен');
    }

    public function destroy(Review $review)
    {
        // Удаление отзыва по его идентификатору
        //$review = Review::findOrFail($id);
        //$review->delete();

        $review->delete();
        

        // Перенаправление на список отзывов с сообщением об успешном удалении
        return redirect()->route('review.index')->with('success', 'Отзыв успешно удален');
    }
}