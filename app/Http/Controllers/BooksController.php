<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Obipost;

class BooksController extends Controller
{
    public function book_info_rakuten($id) {
        
        $obipost = Obipost::find($id);

        $book_title = $obipost->book_title;
        $book_author = $obipost->book_author;
        
        $title = urlencode($book_title);
        $author = urlencode($book_author);

        $url = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';
        $params = [
            'format' => 'json',
            'applicationId' => '1061901298599694382',
            'hits' => 10,
            'imageFlag' => 1
        ];
        
        $query = http_build_query($params, "", "&");
        $search_url = $url . '?' . $query . '&title=' . $title . '&author=' . $author;
        
        $response_json = file_get_contents($search_url);
        $response = json_decode($response_json);  

        $data = [
            'Items' => $response->Items,
            'obipost' => $obipost,
        ];
        
        return view('books.book_info', $data);
    }
    
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
