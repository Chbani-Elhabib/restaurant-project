$(document).ready(function(){

  const shadowimage = $(".shadowimage");
  const shadowimageinpute = $(".shadowimageinpute");

  shadowimageinpute.change ( e => {
    var filesArr = Array.prototype.slice.call(e.target.files);
    filesArr.forEach( f => {
        if (!f.type.match("image.*")) {
          console.log('jjj')
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
        }else{
            var storedFiles = [] ;
            storedFiles.push(f);
            var reader = new FileReader();
            reader.onload = function (e) {
              shadowimage.attr("src" , e.target.result );
              $('header .group-icon .profile .icon_wrap img').attr("src" , e.target.result );
              console.log(e.target.result)
            };
            reader.readAsDataURL(f);
        }
    });

  })

});