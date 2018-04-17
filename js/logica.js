// Preparando variables

var itemCarrito = 0;
var subTotal = 0;
const iva = 0.21;	// 21%
var precioTotal = 0;

// Onload cuando la página web se ha cargado completamente en el navegador.

window.onload = function() {
  $('img').addClass('img-responsive');
  
	$('.img-container').append('<button class="btn btn-success btn-add-cart">+</button>');
    
// Boton añadir carrito

$('.btn-add-cart').click( (e) => { 
		//animation
		$(e.target).animateCss('pulse');
		// find out which item is clicked
		// if 'span' with cart symbol is clicked, then navigate one level up to the button
		let evento;
		if ($(e.target).is('span')) evento = $(e.target).parent();
			else evento = $(e.target);
		let nombre = evento.parent().parent().find('h2')[0].textContent ;
		let precio = evento.parent().parent().find('p')[1].textContent ;
		addToCart(nombre, precio);
	});

	$('#submit').click( () => {
		formSubmitted();
	});

	
}

// La función para añadir

function addToCart(name, price) {
	let priceNumber = parseFloat(price.slice(0));
	if (itemCarrito === 0) $('#cart').text(" ");
	let newDiv = $('<div class="cart-item"></div>');
	newDiv.text(name + ' ... ' + price + '' + '€');
	newDiv.append('<button class="btn btn-danger btn-xs" onclick="deleteItem(this)">X</button>');
	newDiv.append('<hr>');
	newDiv.attr('name', name);
	newDiv.attr('price', priceNumber);
	$('#cart').append(newDiv);
	newDiv.animateCss('bounceInRight');
	itemCarrito++;
	$('#cartItems').text(itemCarrito);
	subTotal += priceNumber;
	updatePrice();
}

function deleteItem(e) {
	let price = $(e.parentElement).attr('price');
	subTotal -= price;
	$(e.parentElement).animateCss('bounceOutRight');
	$(e.parentElement).remove();
	itemCarrito--;
	$('#cartItems').text(itemCarrito);
	updatePrice();
	cartLonelyText();
}

function cartLonelyText() {
	if (itemCarrito === 0) 
		$('#cart').append('Añadir producto para venta.');
}

function updatePrice() {
	$('#prices').empty();
	if (itemCarrito === 0) return;
	let newDiv = $('<div></div>');
	newDiv.append('<strong>Subtotal: ' + subTotal.toFixed(2) + '€' + '<br>');
	newDiv.append('<strong>IVA: ' + iva * 100 + '%<br>');
	newDiv.append('<strong><h3>Total : ' + (subTotal + (subTotal * iva)).toFixed(2) + '€' + '</h3></strong>');

	newDiv.append('<button class="btn btn-info btn-block" onclick="openModal()">Finalizar compra</button>');

	$('#prices').append(newDiv);
	newDiv.animateCss('bounceInRight');
}


function cartToString() {
	let itemsString = "<small><p><strong>Ticket de compra:</strong><br>";
	let cartItems = document.querySelectorAll('.cart-item');
	for (let item of cartItems) {
		itemsString = itemsString + item.getAttribute('name') + " ... " + item.getAttribute('price') + '€' + "<br>";
		};
	itemsString += '</p><p>Subtotal: ' + subTotal.toFixed(2) + '€' + '<br>';
	itemsString += 'IVA: ' + iva * 100 + '%<br>'
	itemsString += 'Total : <mark><strong>' + (subTotal + (subTotal * iva)).toFixed(2) + '€' + '</strong></mark></p></small>';
	return itemsString;
}

function openModal() {
	$('#cartContentsModal').html(cartToString());
	$('#myModal').modal('show');
}


function formSubmitted() {
            
        $.ajax({
                method:  'POST',
                url:   'proceso.php',
                data:  { resultado : (subTotal + (subTotal * iva)).toFixed(2)},
                })
    .done(function(msg){
            $('#myModal').modal('hide');
	                   precioTotal = 0; subTotal = 0; itemCarrito = 0;
	                   $('#cart').empty();
	                   $('#prices').empty();
                       $('#cartItems').text(itemCarrito);
	                   cartLonelyText();
                       sweetAlert("Venta registrada!", "Transacción realizada con éxito", "success");
        })
   
    
}

// Función para imprimir (Gracias Google)

function imprSelec(nombre) {
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}


$.fn.extend({
//		https://github.com/daneden/animate.css
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
        return this;
    }
});