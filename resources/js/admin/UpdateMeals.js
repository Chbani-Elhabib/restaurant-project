$(document).ready(function () {

    // Menu Sections
    const optionMenu = $(".select-menu");
    const selectBtn = $(".select-btn");
    const options = $(".options");
    const sBtn_text = $(".sBtn-text");
    const forminput = $(".forminput");

    selectBtn.click( e => {
        options.slideToggle(500)
    })
    
    options.children().each( option =>{
        options.children().eq(option).click( e => {
            sBtn_text.text(options.children().eq(option).children( "span" ).text()) ;
            forminput.eq(3).val(options.children().eq(option).children( "span" ).text());
            options.slideUp(500);
        })
    })


    // update image meals 
    forminput.eq(4).change((e) => {
        var filesArr = Array.prototype.slice.call(e.target.files);
        filesArr.forEach((f) => {
            if (!f.type.match("image.*")) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })                      
                Toast.fire({
                    icon: 'error',
                    title: 'Please insert a photo'
                })
            } else {
                var storedFiles = [];
                storedFiles.push(f);
                var reader = new FileReader();
                reader.onload = function (e) {
                    forminput.eq(4).parent().next().children().attr('src' , e.target.result )
                };
                reader.readAsDataURL(f);
            }
        });
    });

});