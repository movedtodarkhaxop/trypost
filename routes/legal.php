<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// TikTok Developer Portal URL-prefix ownership verification (signature file).
Route::get('/tiktokKRvJRgNOaIpTc0HvqHjXAkKdY7Yonx6K.txt', fn () => response(
    "tiktok-developers-site-verification=KRvJRgNOaIpTc0HvqHjXAkKdY7Yonx6K\n",
    200,
    ['Content-Type' => 'text/plain'],
))->name('legal.tiktok-verification');

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
