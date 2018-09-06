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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//backend
Route::group(['namespace'=>'Backend','prefix'=>'admin','as'=>'admin.','middleware'=>'auth'],function (){
        Route::get('home','HomeController@index')->name('home');
        Route::get('about_me','AboutMeController@index')->name('about_me');
        Route::get('about_me_basics','AboutMeController@aboutMeBasics')->name('about_me_basics');
        Route::post('save_about_me','AboutMeController@saveRecord')->name('save_about_me');

        //technical skills
        Route::get('technical_skills','TechnicalSkillController@index')->name('technical_skills');
        Route::post('save_technical_skill','TechnicalSkillController@saveTechnicalSkill')->name('save_technical_skill');
        Route::get('technical_skills_basics','TechnicalSkillController@technicalSkillsBasics')->name('technical_skills_basics');
        Route::post('delete_technical_skill','TechnicalSkillController@deleteSkill')->name('delete_technical_skill');


        //professional skills
        Route::get('professional_skills','ProfessionalSkillController')->name('professional_skills');
        Route::post('save_professional_skill','ProfessionalSkillController@saveData')->name('save_professional_skill');
        Route::get('all_professional_skills','ProfessionalSkillController@allSkills')->name('all_professional_skills');
        Route::get('delete_professional_skill/{id}','ProfessionalSkillController@delete');

        //interest routes
        Route::get('interest','InterestController')->name('interest');
        Route::get('all_interests','InterestController@allInterest')->name('all_interests');
        Route::post('save_interest','InterestController@saveInterest')->name('save_interest');
        Route::post('delete_interest','InterestController@deleteInterest')->name('delete_interest');
});
