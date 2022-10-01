
// const list = document.querySelector('#itemList table');
// const tbody = document.querySelector('#table tbody');
// var subTotal = document.getElementById('subTotal');

// //Remove Item From Cart
// list.addEventListener('click', function(e){
//     if(e.target.className == 'delete'){
//         const tr = e.target.parentNode;
//         tr.parentNode.removeChild(tr);
//         // console.log(e.target.parentNode);
//     }
// })

// //Add Items To Cart
// const addForm = document.forms['addItems'];

// let proName;
// let price;

// addForm.addEventListener('submit', function(e){
//     e.preventDefault();
//     var value = addForm.querySelector('input[type="text"]').value;
//     const splitted = value.split(" ");
//     proName = splitted[0];
//     price = parseInt(splitted[1]);

//     // const qty = addForm.querySelector('input[type="number"]').value;
   
//     // Create Element
//     const tr = document.createElement('tr');
//     const creatProName = document.createElement('td');
//     const creatProQty = document.createElement('td');
//     const creatProPrice = document.createElement('td');
//     const creatTotal = document.createElement('td');
//     const creatRemove = document.createElement('td');

//     //New Created Elements
//     const div = document.createElement('div');
//     const btn1 = document.createElement('button');
//     const input = document.createElement('input');
//     const btn2 = document.createElement('button');
//     //Unit Price Input
//     const unitPrice = document.createElement('input');
//     //Amount
//     const span = document.createElement('span');

//     //New Added ClassName
//     div.classList.add('button-container');

//     btn1.classList.add('cart-qty-plus');
//     btn1.setAttribute('type', 'button');
//     btn1.setAttribute('value', '+');

//     input.setAttribute('type', 'text');
//     input.setAttribute('name', 'qty');
//     input.setAttribute('min', 0);
//     input.classList.add('qty');
//     input.className += " form-control";
//     input.setAttribute('value', '0');

//     btn2.classList.add('cart-qty-minus');
//     btn2.setAttribute('type', 'button');
//     btn2.setAttribute('value', '-');

//     unitPrice.setAttribute('type', 'text');
//     unitPrice.value = price;
//     unitPrice.classList.add('price');
//     unitPrice.className += " form-control";

//     span.setAttribute('id', 'amount');
//     span.classList.add('amount');

//     //Add Content
//     creatProName.textContent = proName;
//     // creatProQty.textContent = qty;
//     // creatProPrice.textContent = price;
//     creatTotal.textContent = "N ";
//     creatRemove.textContent = "remove";

//     //New Added Contents
//     btn1.textContent = "+";
//     btn2.textContent = "-";
//     span.textContent = 0;

//     unitPrice.disabled = true;

//     //Add ClassName
//     // creatTotal.classList.add('total');
//     creatRemove.classList.add('delete');

//     // Append To DOM
//     tr.appendChild(creatProName);
//     tr.appendChild(creatProQty);
//     tr.appendChild(creatProPrice);
//     tr.appendChild(creatTotal);
//     tr.appendChild(creatRemove);
//     tbody.appendChild(tr);
//     list.appendChild(tbody);

//     //New Append
//     div.appendChild(btn1);
//     div.appendChild(input);
//     div.appendChild(btn2);
//     creatProQty.appendChild(div);
//     creatProPrice.appendChild(unitPrice);
//     creatTotal.appendChild(span);

//     //Empty Form Fields
//     value = addForm.querySelector('input[type="text"]').value = "";

// })

// //Hide Book
// const hideItems = document.querySelector('#hide');
// hideItems.addEventListener('change', function(e){
//     if(hideItems.checked){
//         list.style.opacity = 0;
//     }else{
//         list.style.opacity = 1;
//     }
// })

// // const table = document.querySelector('table tr');
// // const last = table.lastElementChild;
// // const getAll = last.previousElementSibling.innerText;

// // console.log(getAll * 2);

























// $(document).ready(function(){
//     update_amounts();
//     $('.qty, .price').on('keyup keypress blur change', function(e) {
//         update_amounts();
//     });
// });

// function update_amounts(){
//     var sum = 0.0;
//     $('#table > tbody  > tr').each(function() {
//         var qty = $(this).find('.qty').val();
//         var price = $(this).find('.price').val();
//         var amount = (qty*price)
//         sum+=amount;
//         $(this).find('.amount').text(''+amount);
//     });
//     $('.total').text(sum);
// }
// //----------------for quantity-increment-or-decrement-------
// var incrementQty;
// var decrementQty;

// var plusBtn  = $(".cart-qty-plus");
// var minusBtn = $(".cart-qty-minus");
// var incrementQty = plusBtn.click(function() {
//     var $n = $(this)
//     .parent(".button-container")
//     .find(".qty");
//     $n.val(Number($n.val())+1 );
//     update_amounts();
// });

// var decrementQty = minusBtn.click(function() {
//     var $n = $(this)
//     .parent(".button-container")
//     .find(".qty");
//     var QtyVal = Number($n.val());
//     if (QtyVal > 0) {
//         $n.val(QtyVal-1);
//     }
//     update_amounts();
// });