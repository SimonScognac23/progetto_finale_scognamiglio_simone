<?php

use App\Models\Article;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
   #[Validate('required|min:5')]
   public $title;

   #[Validate('required|min:10')]
   public $description;

   #[Validate('required|numeric')]
   public $price;

   #[Validate('required')]
   public $category;

   public $articles;

   public function store()
   {
       $this->validate();
       $this->article = Article::create([
           'title' => $this->title,
           'description' => $this->description,
           'price' => $this->price,
           'category' => $this->category,
           'user_id' => Auth::id()
       ]);

       $this->reset();
         session()->flash('message', 'Article created successfully.');
   }

   public function render()
   {
       return view('livewire.create-article-form');
   }
}