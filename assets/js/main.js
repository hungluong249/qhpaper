$(document).ready(function(){
    
    //Get Giant Square has Height as the same as Width
    
    var giantWidth = $('#cover #giant-round-square').width();
    
    console.log(giantWidth);
    
    $('#cover #giant-round-square').css( 'height' , giantWidth );
    
    //Make Top Nav smaller when scroll
    
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        
        var base_url = 'http://localhost/qhpaper/';
        
        if( scrollTop > 0 ){
            $('header').addClass('active')
            $('header #nav-logo img').attr('src' , base_url + 'assets/img/logo.png')
        }
    
        if( scrollTop === 0 ){
            $('header').removeClass('active')
            $('header #nav-logo img').attr('src' , base_url + 'assets/img/logo-w.png')
        }
    })
});
