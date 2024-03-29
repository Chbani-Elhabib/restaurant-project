$(document).ready(function () {

	// filter our meals
	const filtermeals = $('.filtermeals');
	const card = $('.card')

	var ordermeals = [] ;

	filtermeals.each( e => {
		filtermeals.eq(e).click( function(){
			filtermeals.each( ell => {
				filtermeals.eq(ell).removeClass('active');
			})
			filtermeals.eq(e).addClass('active');
			card.each( x => {
				if($(this).children().eq(1).text() != 'All' ){
					if( $(this).children().eq(1).text() != card.eq(x).children().eq(0).children().eq(1).text() ){
						card.eq(x).fadeOut()
					}else{
						card.eq(x).fadeIn()
					}
				}else{
					card.eq(x).fadeIn()
				}
			})
		})
	})

	// click to cart our meals
	const showbtn = $('.showbtn')
	const showcart = $('.showcart')
	const faplus = $('.fa-plus')
	const faminus = $('.fa-minus')
	const total = $('.total p span')
	const orderimage = $('.orderimage span')
	const clickadd = $('.clickadd')
	const cartproducts = $('.cart-products')
	const likeicon = $('.likeicon')
	const textlight = $('.text-light')


	// local storage
	if(typeof(localStorage.order) != 'undefined'){
		ordermeals = JSON.parse(localStorage.order) ;
		ordermeals.map( order => {
			if(order.city == window.location.href.split('/')[4]){
				if(order.restaurant == window.location.href.split('/')[5]){
					card.each( e => {
						if(likeicon.eq(e).attr('data-meals') == order.meal ){
							clickadd.eq(e).removeClass('btn-success')
							clickadd.eq(e).addClass('btn-danger')
							clickadd.eq(e).attr("data-btn","true")
							clickadd.eq(e).text("Remove to cart")
							orderimage.text(parseFloat(orderimage.text()) + 1)
							cartproducts.prepend('\
								<div class="Cart-Items d-grid align-items-center mb-3">\
								<div class="image-box"><img src="'+$(".cardmeals img").eq(e).attr("src")+'"/></div>\
								<div class="about d-flex align-items-center"><h1 class="title mb-0">'+$('.card-title h5').eq(e).text()+'</h1></div>\
								<div class="counter d-flex align-items-center justify-content-between">\
								<div class="btn plus">+</div><div class="count">'+order.amount+'</div><div class="btn Subtract">-</div></div>\
								<div class="amount d-flex justify-content-center align-items-center">\
								<p class="mb-0"><span>'+$('.card-title p span').eq(e).text()+'</span>DH</p></div>\
								<div class="remove d-flex justify-content-center align-items-center">\
								<i class="fa-solid fa-trash-can"  data-icon="'+likeicon.eq(e).attr("data-meals")+'"></i></div></div>'
							)
							total.eq(0).text(parseFloat(total.eq(0).text()) +  ( parseFloat(order.amount) * parseFloat($('.card-title p span').eq(e).text()) ))
							total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))

						}
					})
				}
			}
		})
	}

	card.each( e => {
		card.eq(e).click( el => {
			if(! (el.target.classList.contains('clickadd') || el.target.classList.contains('likeicon')) ){
				$('.showcart-content h3').text($('.card-title h5').eq(e).text());
				$('.showprix p span').text($('.card-title p span').eq(e).text());
				$('.show-description p').text($('.description p').eq(e).text());
				$('.showcart-image img').attr('src' , $(".cardmeals img").eq(e).attr("src"));
				showbtn.attr('data-cart' , $(".likeicon").eq(e).attr("data-meals") )
				if($('.card button').eq(e).attr('data-btn') == 'true'){
					showbtn.removeClass('btn-success')
					showbtn.addClass('btn-danger')
					showbtn.text("Remove to cart")
					showbtn.attr('data-btn' , 'true')
					cartproducts.children().each( function(){
						if($(".likeicon").eq(e).attr("data-meals") == $(this).children().eq(4).children().attr('data-icon')){
							$('.numbermeal p').text($(this).children().eq(2).children().eq(1).text())
						}
					})
				}else {
					showbtn.removeClass('btn-danger')
					showbtn.addClass('btn-success')
					showbtn.text("Add to cart")
					showbtn.attr('data-btn' , 'false')
					$('.numbermeal p').text('1')
				}
				showcart.eq(0).removeClass('d-none');
			}
		})
	})

	showcart.click( e => {
		if(e.target.classList.contains('showcart')){
			card.each(function(){
				if($(this).children().eq(1).children().eq(2).children().eq(0).children().attr('data-meals') == showbtn.attr('data-cart')){
					if(showbtn.attr('data-btn') == 'true'){
						$(this).children().eq(1).children().eq(2).children().eq(1).removeClass('btn-success')
						$(this).children().eq(1).children().eq(2).children().eq(1).addClass('btn-danger')
						$(this).children().eq(1).children().eq(2).children().eq(1).text("Remove to cart")
						$(this).children().eq(1).children().eq(2).children().eq(1).attr('data-btn' , 'true')
					}else if(showbtn.attr('data-btn') == 'false'){
						$(this).children().eq(1).children().eq(2).children().eq(1).removeClass('btn-danger')
						$(this).children().eq(1).children().eq(2).children().eq(1).addClass('btn-success')
						$(this).children().eq(1).children().eq(2).children().eq(1).text("Add to cart")
						$(this).children().eq(1).children().eq(2).children().eq(1).attr('data-btn' , 'false')
					}
				}
			})
			showcart.eq(0).addClass('d-none');
		}
	})

	faplus.click( function(e){
		if(parseFloat($(this).parent().next().text()) < 99){
			$(this).parent().next().text(parseFloat($(this).parent().next().text()) + 1)
		}
	})

	faminus.click( function(e){
		if(parseFloat($(this).parent().prev().text()) > 1){
			$(this).parent().prev().text(parseFloat($(this).parent().prev().text())- 1)
		}
	})

	// click like and deslack 
	var likerestaurant = [] ;
	if(typeof(localStorage.LikeRestaurand) != 'undefined'){
		likerestaurant = JSON.parse(localStorage.LikeRestaurand)
		likerestaurant.map( restaurant => {
			if( restaurant.NameRestaurant == window.location.href.split('/')[5]  ){
				if( restaurant.active){
					textlight.removeClass('fa-regular')
					textlight.addClass('fa-solid')
					textlight.attr('date' , 'true')
				}else{
					textlight.removeClass('fa-solid')
					textlight.addClass('fa-regular')
					textlight.attr('date' , 'false')
				}
			}
		})
	}

	textlight.click( function(){
		var x = 0 ;
		if( $(this).attr('date') == 'false' ){
			$(this).removeClass('fa-regular')
			$(this).addClass('fa-solid')
			$(this).attr('date' , 'true')
			if(typeof(localStorage.LikeRestaurand) != 'undefined'){
				var xactive = true ;
				likerestaurant.map( restaurant => {
					if( restaurant.NameRestaurant == window.location.href.split('/')[5]  ){
						restaurant.active = true ;
						xactive = false ;
					}
				})
				if(xactive){
					likerestaurant.push({ NameRestaurant : window.location.href.split('/')[5] , active : true  });
				}
			}else{
				likerestaurant.push({ NameRestaurant : window.location.href.split('/')[5] , active : true  });
			}
			localStorage.LikeRestaurand = JSON.stringify(likerestaurant) ;
			$(this).next().text( parseFloat($(this).next().text())  + 1 )
			x = 1 ;
		}else{
			$(this).removeClass('fa-solid')
			$(this).addClass('fa-regular')
			$(this).attr('date' , 'false')
			if(typeof(localStorage.LikeRestaurand) != 'undefined'){
				var xactive = true ;
				likerestaurant.map( restaurant => {
					if( restaurant.NameRestaurant == window.location.href.split('/')[5]  ){
						restaurant.active = false ;
						xactive = false ;
					}
				})
				if(xactive){
					likerestaurant.push({ NameRestaurant : window.location.href.split('/')[5] , active : false  });
				}
			}else{
				likerestaurant.push({ NameRestaurant : window.location.href.split('/')[5] , active : false  });
			}
			localStorage.LikeRestaurand = JSON.stringify(likerestaurant) ;
			$(this).next().text( parseFloat($(this).next().text())  - 1 )
			x = -1 ;
		}

		$.ajax({
			url: '/restaurant/likerestaurant',
			method: 'POST',
			data: {x: x ,  _token: $('meta[name="csrf-token"]').attr('content') , idrestaurant: window.location.href.split('/')[5] }, 
			// success: function(response) {
			// 	console.log(response);
			// },
		});
		
	})

	// click btn add to cart or remove to cart
	showbtn.click(function(e) {
		if($(this).attr('data-btn') == 'false'){
			total.eq(0).text(parseFloat(total.eq(0).text()) + ( parseFloat($(this).parent().prev().children().children().text()) * parseFloat($(this).prev().children().eq(1).text()) ))
			total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
			cartproducts.prepend('<div class="Cart-Items d-grid align-items-center mb-3"><div class="image-box">\
								<img src="'+$(this).parent().parent().prev().children().attr('src')+'"/></div>\
								<div class="about d-flex align-items-center"><h1 class="title mb-0">'+$(this).parent().parent().children().eq(0).text()+'</h1></div>\
								<div class="counter d-flex align-items-center justify-content-between"><div class="btn plus">+</div>\
								<div class="count">'+$(this).prev().children().eq(1).text()+'</div><div class="btn Subtract">-</div></div>\
								<div class="amount d-flex justify-content-center align-items-center"><p class="mb-0">\
								<span>'+$(this).parent().prev().children().children().text()+'</span>DH</p></div>\
								<div class="remove d-flex justify-content-center align-items-center">\
								<i class="fa-solid fa-trash-can"  data-icon="'+$(this).attr('data-cart')+'"></i></div></div>'
							)
			$(this).attr('data-btn' , 'true')
			$(this).removeClass('btn-success')
			$(this).addClass('btn-danger')
			$(this).text('Remove to cart')
			orderimage.text(parseFloat(orderimage.text()) + 1)
			ordermeals.push({
				'city': window.location.href.split('/')[4] ,
				'restaurant':window.location.href.split('/')[5],
				'meal':$(this).attr('data-cart'),
				'amount':$(this).prev().children().eq(1).text(),
			})
			localStorage.order = JSON.stringify(ordermeals);
		}else if($(this).attr('data-btn') == 'true'){
			cartproducts.children().each( x => {
				if(cartproducts.eq(x).children().children().eq(4).children().attr('data-icon') == $(this).attr('data-cart') ){
					orderimage.text(parseFloat(orderimage.text()) - 1)
					$(this).attr('data-btn' , 'false')
					$(this).removeClass('btn-danger')
					$(this).addClass('btn-success')
					$(this).text('Add to cart')
					total.eq(0).text(parseFloat(total.eq(0).text()) - ( parseFloat(cartproducts.eq(x).children().children().eq(2).children().eq(1).text()) * parseFloat(cartproducts.eq(x).children().children().eq(3).children().children().text()) ))
					total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
					cartproducts.eq(x).children().remove()
				}
			})
			var x = JSON.parse(localStorage.order).filter( order => {
				return order.city != window.location.href.split('/')[4]  || order.restaurant != window.location.href.split('/')[5] || order.meal != $(this).attr('data-cart')
			});
			ordermeals = x ;
			localStorage.order = JSON.stringify(ordermeals);
		}
	})


	// click like our meals
	var likearray = {} ;
	if(typeof(localStorage.like) != 'undefined'){
		$.each(localStorage.like.split(','), function(index, value) {
			const parts = value.split(':');
			likearray[parts[0]] = (parts[1] === 'true');
		});
		likeicon.each( e => {
			$.map(likearray, function(value, key) {
				if(likeicon.eq(e).attr("data-meals") == key){
					likeicon.eq(e).removeClass('fa-regular')
					likeicon.eq(e).addClass('fa-solid text-danger')
					likeicon.eq(e).attr("data-icon","true")
				}
			})
		})
    }
	
	likeicon.each( e => {
		likeicon.eq(e).click( el => {
			$.ajax({
				url: '/meals/like',
				method: 'POST',
				data: { id: likeicon.eq(e).attr("data-meals") ,
					    dataicon: likeicon.eq(e).attr("data-icon") ,
					   _token: $('meta[name="csrf-token"]').attr('content') ,
					  },
				success: function(response) {
					if(response == 'yes'){
						if(likeicon.eq(e).attr("data-icon") == "false"){
							likeicon.eq(e).removeClass('fa-regular')
							likeicon.eq(e).addClass('fa-solid text-danger')
							likeicon.eq(e).attr("data-icon","true")
							likearray[likeicon.eq(e).attr("data-meals")] = true ;
							var x = parseFloat(likeicon.eq(e).next().text()) ;
							likeicon.eq(e).next().text( x + 1  )
							const myString = $.map(likearray, function(value, key) {
								return key + ':' + value;
							}).join(",");
							localStorage.like = myString ;
						}else{
							likeicon.eq(e).removeClass('fa-solid text-danger')
							likeicon.eq(e).addClass('fa-regular')
							likeicon.eq(e).attr("data-icon","false")
							delete likearray[likeicon.eq(e).attr("data-meals")];
							var x = parseFloat(likeicon.eq(e).next().text()) ;
							likeicon.eq(e).next().text( x - 1  )
							const myString = $.map(likearray, function(value, key) {
								return key + ':' + value;
							}).join(",");
							localStorage.like = myString ;
						}
					}
				},
			});
		})
	})

	// click add to cart our meals

	clickadd.each( e => {
		clickadd.eq(e).click( el => {
			if(clickadd.eq(e).attr("data-btn") == "false"){
				clickadd.eq(e).removeClass('btn-success')
				clickadd.eq(e).addClass('btn-danger')
				clickadd.eq(e).attr("data-btn","true")
				clickadd.eq(e).text("Remove to cart")
				orderimage.text(parseFloat(orderimage.text()) + 1)
				total.eq(0).text(parseFloat(total.eq(0).text()) + parseFloat($('.card-title p span').eq(e).text()))
				total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
				cartproducts.prepend('<div class="Cart-Items d-grid align-items-center mb-3"><div class="image-box"><img src="'+$(".cardmeals img").eq(e).attr("src")+'"/></div>\
										<div class="about d-flex align-items-center"><h1 class="title mb-0">'+$('.card-title h5').eq(e).text()+'</h1></div>\
										<div class="counter d-flex align-items-center justify-content-between"><div class="btn plus">+</div><div class="count">1</div><div class="btn Subtract">-</div></div>\
										<div class="amount d-flex justify-content-center align-items-center"><p class="mb-0"><span>'+$('.card-title p span').eq(e).text()+'</span>DH</p></div>\
										<div class="remove d-flex justify-content-center align-items-center"><i class="fa-solid fa-trash-can"  data-icon="'+likeicon.eq(e).attr("data-meals")+'"></i></div></div>'
									)
				ordermeals.push({
								'city': window.location.href.split('/')[4] ,
								'restaurant':window.location.href.split('/')[5],
								'meal':likeicon.eq(e).attr("data-meals"),
								'amount':1,
								})
				localStorage.order = JSON.stringify(ordermeals);
			}else{
				clickadd.eq(e).removeClass('btn-danger')
				clickadd.eq(e).addClass('btn-success')
				clickadd.eq(e).attr("data-btn","false")
				clickadd.eq(e).text("Add to cart")
				orderimage.text(parseFloat(orderimage.text()) - 1)
				cartproducts.children().each( function(x){
					if(clickadd.eq(e).prev().children().eq(0).attr('data-meals') == $(this).children().eq(4).children().attr('data-icon') ){
						total.eq(0).text(parseFloat(total.eq(0).text()) - ( parseFloat($(this).children().eq(2).children().eq(1).text()) * parseFloat($(this).children().eq(3).children().children().text()) ))
						total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
						$(this).remove()
					}
				})
				var x = JSON.parse(localStorage.order).filter( order => {
					return order.city != window.location.href.split('/')[4]  || order.restaurant != window.location.href.split('/')[5] || order.meal != likeicon.eq(e).attr("data-meals")
				});
				ordermeals = x ;
				localStorage.order = JSON.stringify(ordermeals);
			}
		})
	})

	// click + and - en cart producte

	cartproducts.on('click', '.plus', function() {
		if( parseFloat($(this).next().text()) < 99 ){
			$(this).next().text(parseFloat($(this).next().text()) + 1)
			total.eq(0).text(parseFloat(total.eq(0).text()) + parseFloat($(this).parent().next().children().children().text()))
			total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
			ordermeals = JSON.parse(localStorage.order)
			ordermeals.map( order => {
				if(order.city == window.location.href.split('/')[4]){
					if(order.restaurant == window.location.href.split('/')[5]){
						if(order.meal == $(this).parent().next().next().children().attr('data-icon')){
							order.amount = $(this).next().text();
						}
					}
				}
			})
			localStorage.order = JSON.stringify(ordermeals);
		}
	});
	
	cartproducts.on('click', '.Subtract', function() {
		if( parseFloat($(this).prev().text()) > 1 ){
			$(this).prev().text(parseFloat($(this).prev().text()) - 1)
			total.eq(0).text(parseFloat(total.eq(0).text()) - parseFloat($(this).parent().next().children().children().text()))
			total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
			ordermeals = JSON.parse(localStorage.order)
			ordermeals.map( order => {
				if(order.city == window.location.href.split('/')[4]){
					if(order.restaurant == window.location.href.split('/')[5]){
						if(order.meal == $(this).parent().next().next().children().attr('data-icon')){
							order.amount = $(this).prev().text();
						}
					}
				}
			})
			localStorage.order = JSON.stringify(ordermeals);
		}
	});

	// click + and - en show to cart producte

	$('.numbermeal').children().eq(0).click(function(){
		if($(this).parent().next().attr('data-btn') == "true"){
			total.eq(0).text( parseFloat(total.eq(0).text()) + parseFloat($(this).parent().parent().prev().children().children().text()) )
			total.eq(2).text( parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()) )
			cartproducts.children().each( e => {
				if($('.remove i').eq(e).attr('data-icon') == $(this).parent().next().attr('data-cart')){
					$('.count').eq(e).text($(this).next().text())
				}
			})
			ordermeals = JSON.parse(localStorage.order)
			ordermeals.map( order => {
				if(order.city == window.location.href.split('/')[4]){
					if(order.restaurant == window.location.href.split('/')[5]){
						if(order.meal == $(this).parent().next().attr('data-cart')){
							order.amount = $(this).next().text();
						}
					}
				}
			})
			localStorage.order = JSON.stringify(ordermeals);
		}
	})

	$('.numbermeal').children().eq(2).click(function(){
		if($(this).parent().next().attr('data-btn') == "true"){
			total.eq(0).text( parseFloat(total.eq(0).text()) - parseFloat($(this).parent().parent().prev().children().children().text()) )
			total.eq(2).text( parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()) )
			cartproducts.children().each( e => {
				if($('.remove i').eq(e).attr('data-icon') == $(this).parent().next().attr('data-cart')){
					$('.count').eq(e).text($(this).prev().text())
				}
			})
			ordermeals = JSON.parse(localStorage.order)
			ordermeals.map( order => {
				if(order.city == window.location.href.split('/')[4]){
					if(order.restaurant == window.location.href.split('/')[5]){
						if(order.meal == $(this).parent().next().attr('data-cart')){
							order.amount = $(this).prev().text();
						}
					}
				}
			})
			localStorage.order = JSON.stringify(ordermeals);
		}
	})

	// remove producte in cart 

	cartproducts.on('click', '.remove i', function() {
		likeicon.each( e => {
			if( $(this).attr('data-icon') == likeicon.eq(e).attr('data-meals') ){
				total.eq(0).text(parseFloat(total.eq(0).text()) - ( parseFloat($(this).parent().prev().prev().children().eq(1).text()) * parseFloat($(this).parent().prev().children().children().text())))
				total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
				likeicon.eq(e).parent().next().removeClass('btn-danger')
				likeicon.eq(e).parent().next().addClass('btn-success')
				likeicon.eq(e).parent().next().text('Add to cart')
				clickadd.eq(e).attr("data-btn","false")
				$(this).parent().parent().remove()
				orderimage.text(parseFloat(orderimage.text()) - 1)
				var x = JSON.parse(localStorage.order).filter( order => {
					return order.city != window.location.href.split('/')[4]  || order.restaurant != window.location.href.split('/')[5] || order.meal != $(this).attr('data-icon')
				});
				ordermeals = x ;
				localStorage.order = JSON.stringify(ordermeals);
			}
		})
	});

	// remove all producte in cart

	const removeall = $('.removeall button')

	removeall.click( e => {
		cartproducts.children().each(function(){
			$(this).remove()
		})
		total.eq(0).text('0')
		total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
		orderimage.text('0')
		clickadd.each(function(){
			$(this).removeClass('btn-danger')
			$(this).addClass('btn-success')
			$(this).text('Add to cart')
			$(this).attr("data-btn","false")
		})
		var x = JSON.parse(localStorage.order).filter( order => {
			return order.city != window.location.href.split('/')[4]  || order.restaurant != window.location.href.split('/')[5]
		});
		ordermeals = x ;
		localStorage.order = JSON.stringify(ordermeals);
	})


	// click git started in cart producte

	const getstarted = $('.getstarted')
	const CartContainer = $('.CartContainer')

	getstarted.click( e => {
		CartContainer.addClass('d-none');
		$('.sign').css('display' , 'block')
	})

	// click buy in cart producte

	const buy = $('.buy button')
	const Shopping = $('.Shopping')
	const payment = $('.payment')
	const thankyou = $('.thankyou')

	buy.click( e => {
		if( cartproducts.children().length > 0 ){
			Shopping.animate({
				'left': '-760px'
			},1000);
			payment.animate({
				'left': '-761px'
			},1000);
		}
	})

	// click type cart en payment 
	const typecart = $('.typecart')
	const contentpayment = $('.content-payment')

	typecart.each( e => {
		typecart.eq(e).click( el => {
			contentpayment.each( x =>{
				contentpayment.eq(x).addClass('d-none')
				typecart.eq(x).removeClass('active')
			})
			contentpayment.eq(e).removeClass('d-none')
			typecart.eq(e).addClass('active')
		})
	})

	// verification Fonne number
	const verification = $('.verification')
	const receipt = $('.receipt')
	const commitesend = $('.commite-send')

	receipt.eq(0).keyup(function(e){
		if (/[0-9]/g.test(this.value)){
			this.value = this.value.replace(/[0-9]/g, '');
		}
	});

	receipt.eq(2).keyup(function(e){
		if (/\D/g.test(this.value)){
			this.value = this.value.replace(/\D/g, '');
		}
	});

	verification.click( e => {
		e.preventDefault()


		// virification full name
		var xfullname = false ;
		if(receipt.eq(0).val().length <= 0 ){
			xfullname = false ;
			receipt.eq(0).prev().addClass('text-danger')
			receipt.eq(0).css('border' , 'solid red 1px')
			receipt.eq(0).next().text('please enter full name')
			receipt.eq(0).next().addClass('text-danger')
		}else{
			xfullname = true ;
			receipt.eq(0).prev().removeClass('text-danger')
			receipt.eq(0).css('border' , '1px solid #ced4da')
			receipt.eq(0).next().text('')
			receipt.eq(0).next().removeClass('text-danger')
		}

		// virification NUmber
		var xphonenumber = false ;
		if(receipt.eq(2).val().length <= 0 ){
			xphonenumber = false ;
			receipt.eq(2).prev().addClass('text-danger')
			receipt.eq(2).css('border' , 'solid red 1px')
			receipt.eq(2).next().text('please enter number phone')
			receipt.eq(2).next().addClass('text-danger')
		}else if(receipt.eq(2).val().length != 10){
			xphonenumber = false ;
			receipt.eq(2).prev().addClass('text-danger')
			receipt.eq(2).css('border' , 'solid red 1px')
			receipt.eq(2).next().text('sggdgdfggdf')
			receipt.eq(2).next().addClass('text-danger')
		}else{
			xphonenumber = true ;
			receipt.eq(2).prev().removeClass('text-danger')
			receipt.eq(2).css('border' , '1px solid #ced4da')
			receipt.eq(2).next().text('')
			receipt.eq(2).next().removeClass('text-danger')
		}

		if( xfullname && xphonenumber ){
			setTimeout(function() {
				receipt.eq(3).parent().parent().removeClass('d-none')
				verification.addClass('confirmation')
				verification.text('confirmation')
				verification.removeClass('verification')
			}, 1000);
		}



	})

	const confirmation = $('.position-absolute')

	confirmation.on('click', '.confirmation' , function(e) {
		e.preventDefault();
		var dataorder = []
		cartproducts.children().each( function(){
			dataorder.push({
							id_order: $(this).children().eq(4).children().attr('data-icon') ,
							ordered_number: $(this).children().eq(2).children().eq(1).text()
						   })
		})
		$.ajax({
			url: '/order/store',
			method: 'POST',
			data: { dataorder: dataorder ,
				    FullName: receipt.eq(0).val() ,
				    Address: receipt.eq(1).val() ,
				    phone: receipt.eq(2).val() ,
				    restaurant: window.location.href.split('/')[5] ,
				    type_payment: 'Payment upon receipt' ,
				    buy: 0 ,
					total: total.eq(2).text() ,
				  _token: $('meta[name="csrf-token"]').attr('content')},
			success: function(response) {
				if(response == 'yes'){
					payment.animate({
						'left': '-1521px'
					},1000);
					thankyou.animate({
						'left': '-1519px'
					},1000);
					var orderr = JSON.parse(localStorage.order) ;
					orderr.map( order => {
						if( order.city == window.location.href.split('/')[4] ){
							if( order.restaurant == window.location.href.split('/')[5] ){
								card.each( e => {
									if(likeicon.eq(e).attr('data-meals') == order.meal ){
										clickadd.eq(e).removeClass('btn-danger')
										clickadd.eq(e).addClass('btn-success')
										clickadd.eq(e).attr("data-btn","false")
										clickadd.eq(e).text("Add to cart")
										orderimage.text(0)
										cartproducts.children().remove()
										total.eq(0).text(0)
										total.eq(2).text(parseFloat(total.eq(0).text()) + parseFloat(total.eq(1).text()))
				
									}
								})
							}
						}
					})
					var x = JSON.parse(localStorage.order).filter( order => {
						return order.city != window.location.href.split('/')[4]  || order.restaurant != window.location.href.split('/')[5] 
					});
					ordermeals = x ;
					localStorage.order = JSON.stringify(ordermeals);
					commitesend.children().eq(1).addClass('send')
				}
			},
		});
	});




	// ta9yim stars
	const stars = $(".star i");

	stars.each(( index1 , star ) => {
		star.addEventListener("click", () => {
			stars.each(( index2 , star ) => {
				index1 >= index2 ? $(star).addClass("active") : $(star).removeClass("active");
			});
			$.ajax({
				url: '/users/stars',
				method: 'POST',
				data: {Number: index1  ,  _token: $('meta[name="csrf-token"]').attr('content')},
				success: function(response) {
					if(response == 'yes'){
						setTimeout(function() {
							CartContainer.fadeOut('d-none');
							Shopping.css('left', '0px');
							payment.css('left', '0px');
							thankyou.css('left', '0px');
						}, 500);
					}
				},
			});
	  	});
	});


	// click icon cart order and message
	// TOGGLE CHATBOX
	const chatboxToggle = $('.chatbox-toggle')
	const chatboxMessage = $('.chatbox-message-wrapper')

	chatboxToggle.eq(1).click( el => {
		chatboxMessage.toggleClass('show');
	}); 

	chatboxToggle.eq(0).click( el => {
		CartContainer.fadeIn()
	}); 

	CartContainer.click( e => {
		if(e.target.classList.contains('CartContainer')){
			CartContainer.fadeOut();
			Shopping.css('left', '0px');
			payment.css('left', '0px');
			thankyou.css('left', '0px');
		}
	})




	// commit 
	const commentsection = $('.comment-section')

	commitesend.on('click', '.send' , function(e) {

		if($(this).prev().children().val().length == 0 ){
			$(this).prev().children().css('border' , 'solid #ff0000d1 0.8px')
		}else{
			$.ajax({
				url: '/comment/store',
				method: 'POST',
				data: {
						message: $(this).prev().children().val()  ,
						restaurant: window.location.href.split('/')[5] ,
						_token: $('meta[name="csrf-token"]').attr('content')
					},
				success: response => {

					var html = '<div class="bg-white p-2">'
					html += '<div class="d-flex flex-row user-info">'
					html += '<img class="rounded-circle" src="/ImageUsers/'+response.person.Photo+'" width="40">'
					html += '<div class="d-flex flex-column justify-content-start ms-2">'
					html += '<span class="d-block font-weight-bold name fs-5">'+response.person.UserName+'</span>'
					html += '<span class="date text-black-50">'+response.created_at+'</span>'
					html += '</div>'
					html += '</div>'
					html += '<div class="mt-2 text-commite  position-relative">'
					html += '<p class="comment-text mb-0">'+response.comment+'</p>'
					html += '</div>'
					html += '</div>'

					commentsection.prepend(html);
					$(this).prev().children().val('')
				},
			});

		}
	});


	
});




