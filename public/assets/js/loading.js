/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).bind('beforeunload ',function(){
    $('.loading').fadeIn('slow');
});

$(window).bind('unload',function(){
    $('.loading').fadeIn('slow');
});

$(window).bind('load',function(){
    $('.loading').fadeOut('slow');
});

$(window).bind('ready',function(){
    $('.loading').fadeOut('slow');
});

$(document).bind('beforeunload ',function(){
    $('.loading').fadeIn('slow');
});

$(document).bind('unload',function(){
    $('.loading').fadeIn('slow');
});

$(document).bind('load',function(){
    $('.loading').fadeOut('slow');
});

$(document).bind('ready',function(){
    $('.loading').fadeOut('slow');
});
$(document).bind({
    ajaxStart: function() { $('.loading').fadeIn('slow'); },
    ajaxStop: function() { $('.loading').fadeOut('slow'); }    
});
