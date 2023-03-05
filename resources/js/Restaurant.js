$(document).ready(function () {

	// filter our meals
	const filtermeals = $('.filtermeals');
	var ordermeals = [] ;

	filtermeals.each( e => {
		filtermeals.eq(e).click( el => {
			filtermeals.each( ell => {
				filtermeals.eq(ell).removeClass('active');
			})
			filtermeals.eq(e).addClass('active');
		})
	})

	// click to cart our meals
	const card = $('.card')
	const showbtn = $('.showbtn')
	const showcart = $('.showcart')
	const faplus = $('.fa-plus')
	const faminus = $('.fa-minus')
	const total = $('.total p span')
	const orderimage = $('.orderimage span')
	const clickadd = $('.clickadd')
	const cartproducts = $('.cart-products')
	const likeicon = $('.likeicon')


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
							orderimage.text(parseInt(orderimage.text()) + 1)
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
							total.eq(0).text(parseInt(total.eq(0).text()) +  ( parseInt(order.amount) * parseInt($('.card-title p span').eq(e).text()) ))
							total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))

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
		if(parseInt($(this).parent().next().text()) < 99){
			$(this).parent().next().text(parseInt($(this).parent().next().text()) + 1)
		}
	})

	faminus.click( function(e){
		if(parseInt($(this).parent().prev().text()) > 1){
			$(this).parent().prev().text(parseInt($(this).parent().prev().text())- 1)
		}
	})

	// click btn add to cart or remove to cart
	showbtn.click(function(e) {
		if($(this).attr('data-btn') == 'false'){
			total.eq(0).text(parseInt(total.eq(0).text()) + ( parseInt($(this).parent().prev().children().children().text()) * parseInt($(this).prev().children().eq(1).text()) ))
			total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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
			orderimage.text(parseInt(orderimage.text()) + 1)
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
					orderimage.text(parseInt(orderimage.text()) - 1)
					$(this).attr('data-btn' , 'false')
					$(this).removeClass('btn-danger')
					$(this).addClass('btn-success')
					$(this).text('Add to cart')
					total.eq(0).text(parseInt(total.eq(0).text()) - ( parseInt(cartproducts.eq(x).children().children().eq(2).children().eq(1).text()) * parseInt(cartproducts.eq(x).children().children().eq(3).children().children().text()) ))
					total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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
			if(likeicon.eq(e).attr("data-icon") == "false"){
				likeicon.eq(e).removeClass('fa-regular')
				likeicon.eq(e).addClass('fa-solid text-danger')
				likeicon.eq(e).attr("data-icon","true")
				likearray[likeicon.eq(e).attr("data-meals")] = true ;
				const myString = $.map(likearray, function(value, key) {
					return key + ':' + value;
				}).join(",");
				localStorage.like = myString ;
			}else{
				likeicon.eq(e).removeClass('fa-solid text-danger')
				likeicon.eq(e).addClass('fa-regular')
				likeicon.eq(e).attr("data-icon","false")
				delete likearray[likeicon.eq(e).attr("data-meals")];
				const myString = $.map(likearray, function(value, key) {
					return key + ':' + value;
				}).join(",");
				localStorage.like = myString ;
			}
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
				orderimage.text(parseInt(orderimage.text()) + 1)
				total.eq(0).text(parseInt(total.eq(0).text()) + parseInt($('.card-title p span').eq(e).text()))
				total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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
				orderimage.text(parseInt(orderimage.text()) - 1)
				cartproducts.children().each( function(x){
					if(clickadd.eq(e).prev().children().eq(0).attr('data-meals') == $(this).children().eq(4).children().attr('data-icon') ){
						total.eq(0).text(parseInt(total.eq(0).text()) - ( parseInt($(this).children().eq(2).children().eq(1).text()) * parseInt($(this).children().eq(3).children().children().text()) ))
						total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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
		if( parseInt($(this).next().text()) < 99 ){
			$(this).next().text(parseInt($(this).next().text()) + 1)
			total.eq(0).text(parseInt(total.eq(0).text()) + parseInt($(this).parent().next().children().children().text()))
			total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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
		if( parseInt($(this).prev().text()) > 1 ){
			$(this).prev().text(parseInt($(this).prev().text()) - 1)
			total.eq(0).text(parseInt(total.eq(0).text()) - parseInt($(this).parent().next().children().children().text()))
			total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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
			total.eq(0).text( parseInt(total.eq(0).text()) + parseInt($(this).parent().parent().prev().children().children().text()) )
			total.eq(2).text( parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()) )
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
			total.eq(0).text( parseInt(total.eq(0).text()) - parseInt($(this).parent().parent().prev().children().children().text()) )
			total.eq(2).text( parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()) )
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
				total.eq(0).text(parseInt(total.eq(0).text()) - ( parseInt($(this).parent().prev().prev().children().eq(1).text()) * parseInt($(this).parent().prev().children().children().text())))
				total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
				likeicon.eq(e).parent().next().removeClass('btn-danger')
				likeicon.eq(e).parent().next().addClass('btn-success')
				likeicon.eq(e).parent().next().text('Add to cart')
				clickadd.eq(e).attr("data-btn","false")
				$(this).parent().parent().remove()
				orderimage.text(parseInt(orderimage.text()) - 1)
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
		total.eq(2).text(parseInt(total.eq(0).text()) + parseInt(total.eq(1).text()))
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



	// click icon cart order and message
	// TOGGLE CHATBOX
	const chatboxToggle = $('.chatbox-toggle')
	const chatboxMessage = $('.chatbox-message-wrapper')

	chatboxToggle.eq(1).click( el => {
		chatboxMessage.toggleClass('show');
	}); 

	chatboxToggle.eq(0).click( el => {
		CartContainer.removeClass('d-none')
	}); 

	CartContainer.click( e => {
		if(e.target.classList.contains('CartContainer')){
			CartContainer.addClass('d-none');
		}
	})



	
});


// MESSAGE INPUT
const textarea = document.querySelector('.chatbox-message-input')
const chatboxForm = document.querySelector('.chatbox-message-form')

textarea.addEventListener('input', function () {
	let line = textarea.value.split('\n').length

	if(textarea.rows < 6 || line < 6) {
		textarea.rows = line
	}

	if(textarea.rows > 1) {
		chatboxForm.style.alignItems = 'flex-end'
	} else {
		chatboxForm.style.alignItems = 'center'
	}
})







// DROPDOWN TOGGLE
const dropdownToggle = document.querySelector('.chatbox-message-dropdown-toggle')
const dropdownMenu = document.querySelector('.chatbox-message-dropdown-menu')

dropdownToggle.addEventListener('click', function () {
	dropdownMenu.classList.toggle('show')
})

document.addEventListener('click', function (e) {
	if(!e.target.matches('.chatbox-message-dropdown, .chatbox-message-dropdown *')) {
		dropdownMenu.classList.remove('show')
	}
})



// CHATBOX MESSAGE
const chatboxMessageWrapper = document.querySelector('.chatbox-message-content')
const chatboxNoMessage = document.querySelector('.chatbox-message-no-message')

chatboxForm.addEventListener('submit', function (e) {
	e.preventDefault()

	if(isValid(textarea.value)) {
		writeMessage()
		setTimeout(autoReply, 1000)
	}
})



function addZero(num) {
	return num < 10 ? '0'+num : num
}

function writeMessage() {
	const today = new Date()
	let message = `
		<div class="chatbox-message-item sent">
			<span class="chatbox-message-item-text">
				${textarea.value.trim().replace(/\n/g, '<br>\n')}
			</span>
			<span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
		</div>
	`
	chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
	chatboxForm.style.alignItems = 'center'
	textarea.rows = 1
	textarea.focus()
	textarea.value = ''
	chatboxNoMessage.style.display = 'none'
	scrollBottom()
}

function autoReply() {
	const today = new Date()
	let message = `
		<div class="chatbox-message-item received">
			<span class="chatbox-message-item-text">
				Thank you for your awesome support!
			</span>
			<span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
		</div>
	`
	chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
	scrollBottom()
}

function scrollBottom() {
	chatboxMessageWrapper.scrollTo(0, chatboxMessageWrapper.scrollHeight)
}

function isValid(value) {
	let text = value.replace(/\n/g, '')
	text = text.replace(/\s/g, '')

	return text.length > 0
}