    <?php

    use Illuminate\Support\Facades\Route;



    Route::get('/','PostsController@index')->name('home'); // all posts
    Route::get('/posts/{post}', 'PostsController@show'); // specific post by id
    Route::get('/create', 'PostsController@create');
    Route::post('/store', 'PostsController@store'); // create posts

    Route::post('/posts/{post}/comments', 'CommentsController@addComments'); // add comments
    Route::get('/posts/tags/{tag}', 'TagsController@index');

    Route::get('/login', 'MainController@index')->name('login');
    Route::post('login', 'MainController@store')->middleware('guest');
    Route::get('/logout', 'MainController@logout');;

    Route::get('/register', 'RegistrationController@create');
    Route::post('/register', 'RegistrationController@store');






