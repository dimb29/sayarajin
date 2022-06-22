const Manifest = require("laravel-mix/src/Manifest");

// like-comment | post.blade.php
$(document).ready(function(){
    $('#comment_like').on('click',function(){
        $('#comment_like').removeClass('fa-regular');
        $('#comment_like').addClass('fa-solid');
        
    });
  });