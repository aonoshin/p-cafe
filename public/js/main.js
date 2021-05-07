// サイドバーメニューの開閉システム
$(function(){
    $('#open').click(function(){
        $('.mask-bg').addClass('open');
        setTimeout(function(){
            $('.side-bar').addClass('open');
        }, 300);
    });
    $('#close').click(function(){
        $('.side-bar').removeClass('open');
        setTimeout(function(){
            $('.mask-bg').removeClass('open');
        }, 600);
    });
});
// サイドバーメニューの開閉システム

// フラッシュメッセージ
$(function(){
    setTimeout(function(){
        $('.flash-message').addClass('fadeIn');
    }, 300);
    $('.flash-message.fadeIn').ready(function(){
        setTimeout(function(){
            $('.flash-message.fadeIn').removeClass('fadeIn');
        }, 2500);
    });
});
// フラッシュメッセージ

// フッターの固定
$(function(){
    const $footer = $('#footer');
    if(window.innerHeight > $footer.offset().top + $footer.outerHeight()){
        $footer.attr({
            'style' : 'position:fixed; top:' + (window.innerHeight - $footer.outerHeight()) + 'px;'
        });
    }
})
// フッターの固定