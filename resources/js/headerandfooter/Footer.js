$(document).ready(function () {
    const lang = $(".lang");
    const namelang = $(".namelang");

    if( namelang.text() == 'Arabic'){
        lang.attr("href",'languageConverter/ar');
    }else if( namelang.text() == 'إنجليزي'){
        lang.attr("href",'languageConverter/en');
    }
});
