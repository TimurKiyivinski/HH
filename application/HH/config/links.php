<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// link of different pages
$config['href']['search'] = 'search';
$config['href']['area'] = 'area';
$config['href']['icon'] = 'public/images/icons';
$config['href']['base'] = 'public/images/base';
$config['href']['thumb'] = 'public/images/places/thumbnails';

// This config contains all the necessary links to specific functions
$config['href']['places']['details'] = 'places/details';
$config['href']['places']['categories'] = 'places/list_categories';
$config['href']['places']['list'] = 'places/list_places';
$config['href']['map']['index'] = 'map';
$config['href']['map']['go'] = 'map/go';
$config['href']['map']['nav'] = 'map/nav';
$config['href']['ajax']['map'] = 'map/get_places';
$config['href']['ajax']['nav'] = 'map/get_place';
$config['href']['admin']['new'] = 'admin/place/create';
$config['href']['admin']['view'] = 'admin/place/read';
$config['href']['admin']['edit'] = 'admin/place/update';
$config['href']['admin']['pop'] = 'admin/place/remove';
$config['href']['admin']['photo'] = 'admin/place/photo';
$config['href']['admin']['thumb'] = 'admin/place/thumbnail';
$config['href']['admin']['photos']['photo'] = 'admin/place/upload_photo';
$config['href']['admin']['photos']['thumb'] = 'admin/place/upload_thumbnail';
$config['href']['admin']['photos']['pop'] = 'admin/place/pop_photo';
