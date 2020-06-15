<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');


Route::get('/admin/portfolio', function () {
    return view('admin.portfolio.index');
})->name('portfolio');

Route::get('/admin/category', function () {
    return view('admin.portfolio.index');
})->name('category');
Route::get('/admin/team', function () {
    return view('admin.team.index');
})->name('team');
Route::get('/admin/projects', function () {
    return view('admin.projects.index');
})->name('projects');
Route::get('/admin/about', function () {
    return view('admin.about.index');
})->name('about');
Route::get('/admin/section2', function () {
    return view('admin.section2.index');
})->name('section2');
// Route::get('/admin/portfolio', function () {
//     return view('admin.portfolio.update');
// })->name('portfolio');
Route::get('/admin/section2', 'Section2Controller@index')->name('section2');

Route::get('/admin/add-section2', 'Section2Controller@AddView')->name('add-section2');
Route::post('/admin/add-section2', 'Section2Controller@AddSection2')->name('submit-add-section2');
Route::get('/admin/edit-section2/{id}', 'Section2Controller@Edit')->name('edit-section2');
Route::post('/admin/update-section2', 'Section2Controller@Update')->name('update-section2');
Route::get('/admin/delete-section2/{id}', 'Section2Controller@Delete')->name('dalete-section2');

Route::get('/admin/about', 'AboutController@index')->name('about');

Route::get('/admin/add-about', 'AboutController@AddView')->name('add-about');
Route::post('/admin/add-about', 'AboutController@AddAbout')->name('submit-add-about');
Route::get('/admin/edit-about/{id}', 'AboutController@Edit')->name('edit-about');
Route::post('/admin/update-about', 'AboutController@Update')->name('update-about');
Route::get('/admin/delete-about/{id}', 'AboutController@Delete')->name('dalete-about');


Route::get('/admin/portfolio', 'PortfolioController@index')->name('portfolio');
Route::get('/admin/add-portfolio', 'PortfolioController@AddView')->name('add-portfolio');
Route::post('/admin/add-portfolio', 'PortfolioController@AddPortfolio')->name('submit-add-portfolio');
Route::get('/admin/edit-portfolio/{id}', 'PortfolioController@Edit')->name('edit-portfolio');
Route::post('/admin/update-portfolio', 'PortfolioController@Update')->name('update-portfolio');
Route::get('/admin/delete-portfolio/{id}', 'PortfolioController@Delete')->name('dalete-portfolio');

Route::get('/admin/category', 'CategoryController@index')->name('category');
Route::get('/admin/add-category', 'CategoryController@AddView')->name('add-category');
Route::post('/admin/add-category', 'CategoryController@AddCategory')->name('submit-add-category');
Route::get('/admin/edit-category/{id}', 'CategoryController@EditView')->name('edit-category');
Route::get('/admin/delete-category/{id}', 'CategoryController@Delete')->name('delete-category');
Route::post('/admin/edit-category', 'CategoryController@Update')->name('submit-edit-category');

Route::post('/add-employee', 'EmployeeController@AddEmployee')->name('add-employee');
Route::post('/update-employee', 'EmployeeController@UpdateEmployee')->name('update-employee');
Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::get('/edit-employee/{id}', 'EmployeeController@Edit')->name('edit-employee');
Route::get('/delete-employee/{id}', 'EmployeeController@Delete')->name('dalete-employee');

Route::get('/admin/team', 'TeamController@index')->name('team');
Route::get('/admin/add-team', 'TeamController@AddView')->name('add-team');
Route::post('/admin/add-team', 'TeamController@AddTeam')->name('submit-add-team');
Route::get('/admin/edit-team/{id}', 'TeamController@Edit')->name('edit-team');
Route::post('/admin/update-team', 'TeamController@Update')->name('update-team');
Route::get('/admin/delete-team/{id}', 'TeamController@Delete')->name('dalete-team');

Route::get('/admin/projects', 'ProjectsController@index')->name('projects');
Route::get('/admin/add-projects', 'ProjectsController@AddView')->name('add-projects');
Route::post('/admin/add-projects', 'ProjectsController@AddProjects')->name('submit-add-projects');
Route::get('/admin/edit-projects/{id}', 'ProjectsController@Edit')->name('edit-projects');
Route::post('/admin/update-projects', 'ProjectsController@Update')->name('update-projects');
Route::get('/admin/delete-projects/{id}', 'ProjectsController@Delete')->name('dalete-projects');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
