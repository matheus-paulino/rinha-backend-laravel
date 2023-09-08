<?php

Route::get('/ping', fn () => response()->json(['message' => 'pong']));
