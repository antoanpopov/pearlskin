<?php
/**
 * Created by PhpStorm.
 * User: Antoan
 * Date: 25.12.2016 г.
 * Time: 23:20
 */
$locale = LaravelLocalization::setLocale() ?: App::getLocale();
// Home
Breadcrumbs::register('homepage', function ($breadcrumbs) {
    $breadcrumbs->push('Home', url('/'));
});
// HOME > [PAGE]
Breadcrumbs::register('page', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push($page->title, route('page', $page->slug));
});

// Home > Blog
Breadcrumbs::register($locale.'.blog', function ($breadcrumbs) use($locale) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push(trans('pearlskin::breadcrumbs.blog'), route($locale.'.blog'));
});
// Home > Blog > [Post]
Breadcrumbs::register($locale.'.blog.post', function ($breadcrumbs, $post) use($locale){
    $breadcrumbs->parent($locale.'.blog');
    $breadcrumbs->push($post->title, route($locale.'.blog.slug', $post->slug));
});
//HOME > OUR TEAM > [DOCTOR]
Breadcrumbs::register('doctor', function ($breadcrumbs, $doctor) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push(trans('pearlskin::breadcrumbs.about-us'), route('page', 'about-us'));
    $breadcrumbs->push($doctor->names, route('doctor', $doctor->names));
});

//HOME > OUR TEAM > [DOCTOR]
Breadcrumbs::register('procedure', function ($breadcrumbs, $procedure) {
    $breadcrumbs->parent('homepage');
    $breadcrumbs->push(trans('pearlskin::breadcrumbs.procedures'), route('page', 'процедури'));
    $breadcrumbs->push($procedure->title, route('procedure', $procedure->title));
});
