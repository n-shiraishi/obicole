<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Obipost;

class BooksController extends Controller
{
        public function book_info($id) {
        
        $obipost = Obipost::find($id);

        $book_title = str_replace(array(" ", "　"), "", $obipost->book_title);
        $book_author = str_replace(array(" ", "　"), "", $obipost->book_author);
        
        $url = 'https://www.googleapis.com/books/v1/volumes?q=';

        $search_url = $url . 'intitle=' . $book_title . '+inauthor=' . $book_author . '&maxResults=3';
        
        $response_json = file_get_contents($search_url);
        $response = json_decode($response_json); 
        
        if($response->totalItems > 0) {
            $items = $response->items;
        } else {
            $items = 0;
        }
        
        $data = [
            'obipost' => $obipost,
            'items' => $items,
        ];
        
        return view('books.book_info', $data);
    }
}
