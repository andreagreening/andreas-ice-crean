var app = new Vue({
           el: '#iceCreamStore', 
           data: {
                scoops: [
                    {description: 'Vanilla', price: 100, type: 'scoop'},
                    {description: 'Chocolate', price: 100, type: 'scoop'},
                    {description: 'Mint Chocolate Chip', price: 100, type: 'scoop'}, 
                ],
                toppings: [
                	{description: 'Sprinkles', price: 25, type: 'topping'},
                	{description: 'Chocolate Chips', price: 25, type: 'topping'}
                ],
                order: [],
                cart: []
           },

           methods: {
                addToOrder(item) {
                	this.order.push(item);
                },
                completeOrder(order) {
                	this.cart.push(order);
                	this.order = [];
                },
                checkOut(cart){
                	// this.$swal({
                	// 	title: "Thank You for Your Order!",
                	// 	button: "Cool",
                	// });
                	alert('Thank you for your Order!');
                	this.order = [];
                	this.cart = [];
                }, 
                countScoopsInOrder(order) {
	           		return order.filter(item => item.type === 'scoop').length;
                },
                removeItemFromOrder(index) {
                	this.order.splice(index, 1);
                }, 
                removeOrderFromCart(index) {
                	this.cart.splice(index, 1);
                },   
                countToppingsInOrder(order) {
	           		return order.filter(item => item.type === 'topping').length;
                },
                getOrderTotal(order) {
	           		return order.reduce(function(total, item){
	           			return total + item.price;
	           		}, 0);
           		},
           		getGrandTotal() {
           			return this.cart.reduce(function(total, order){
	           			subtotal = order.reduce(function(t, item){
		           			return t + item.price;
		           		}, 0);
		           		return total + subtotal;
	           		}, 0);
           		}
           },

       		computed: {
	           	// countScoops() {
	           	// 	return this.order.filter(item => item.type === 'scoop');
	           	// },
	           	// countToppings() {
	           	// 	return this.order.filter(item => item.type === 'topping');
	           	// },
	           	
	           	// getOrderTotal() {
	           	// 	return this.order.reduce(function(total, item){
	           	// 		return total + item.price;
	           	// 	}, 0);
	           	// }
           },

           filters: {
           	dollars(value) {
           		var num = value;
				var dollars = num / 100;
				return dollars.toLocaleString("en-US", {style:"currency", currency:"USD"});
           	}
           }
        });

