<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/terms', 'legal.placeholder', [
    'title' => 'Terms of Service',
    'body' => '<p>By using this instance, you agree to use it responsibly and in accordance with the terms of any
        third-party platform (e.g. social networks) you connect through it. The operator provides this software
        as-is, without warranty, under the AGPL-3.0 license.</p>',
])->name('legal.terms');

Route::view('/privacy', 'legal.placeholder', [
    'title' => 'Privacy Policy',
    'body' => '<p>This instance stores the account data and content you provide (posts, connected social accounts,
        media) to operate the service. Data is not sold or shared with third parties beyond what is required to
        publish content to the platforms you explicitly connect. Contact the operator to request deletion of your
        data.</p>',
])->name('legal.privacy');
