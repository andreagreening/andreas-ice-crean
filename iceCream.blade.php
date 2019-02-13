<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Andrea's Ice Cream Store</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
   
        <div class="uk-container uk-background-fixed" style="background-image: url(https://st.depositphotos.com/2370557/2960/i/450/depositphotos_29608743-stock-photo-candy-sprinkles-in-full-frame.jpg);">
            <div id="iceCreamStore">
                <div class="uk-margin-large-top uk-margin-large-bottom">
                    <div class="uk-child-width-1-1" uk-grid>
                        <div>
                            <div class="uk-card uk-card-secondary uk-card-body  uk-text-center">
                                <h3 class="uk-card-title">MENU</h3>
                                <p class="uk-text-muted">BUILD YOUR OWN SUNDAE</p>
                                <p class="uk-text-muted">Click items to add to your Sundae</p>
                                    <div class="uk-grid-divider uk-child-width-expand@s" uk-grid>
                                        <div class="uk-text-center">
                                            <h4>Scoops</h4>
                                            <ul class="uk-list" v-if="scoops">
                                                <li v-for="scoop in scoops">
                                                    <button class="uk-button uk-width-1-1 uk-button-danger uk-button-small" @click="addToOrder(scoop)">@{{ scoop.description }}</button> 
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="uk-text-center">
                                            <h4>Toppings</h4>
                                            <ul class="uk-list" v-if="toppings">
                                                <li v-for="topping in toppings">
                                                    <button class="uk-button uk-width-1-1 uk-button-danger uk-button-small" @click="addToOrder(topping)"> @{{ topping.description }}</button>
                                                </li>
                                            </ul>
                                        </div> 
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-child-width-1-2@m uk-text-center" uk-grid>
                        <div>
                            <div class="uk-card uk-card-secondary uk-card-body">
                            <h3 class="uk-card-title">Your Sundae <span v-if="order.length > 0">@{{ getOrderTotal(order) | dollars }}</span></h3>
                             <button v-if="countScoopsInOrder(order) > 0" class="uk-button uk-button-danger uk-button-small" @click="completeOrder(order)">Add Sundae To Cart</button>
                                <p v-if="countScoopsInOrder(order) > 0">@{{ countScoopsInOrder(order) }} Scoops <span></span></p>
                                <p v-if="countToppingsInOrder(order) > 0">@{{ countToppingsInOrder(order) }} Toppings</p>
                                
                                <p v-if="order.length === 0">Add items to your sundae!</p>
                                <ul class="uk-list uk-list-striped" v-for="(item, index) in order">
                                    <li>@{{ item.description }} @{{ item.price | dollars }} 
                                    <div class="uk-align-right">
                                        <button @click="removeItemFromOrder(index)" uk-icon="icon: trash"></button>
                                    </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-secondary uk-card-body">
                                <h3 class="uk-card-title">Cart @{{ getGrandTotal() | dollars }}</h3>
                                <button v-if="cart.length > 0" class="uk-button uk-button-danger uk-button-small" @click="checkOut">Check Out</button>
                                <ul class="uk-list uk-list-striped" v-for="(order, index) in cart">
                                    <li>Sundae
                                        <br>
                                        <span v-if="countScoopsInOrder(order) > 0" class="uk-text-muted">@{{ countScoopsInOrder(order) }} Scoops </span> <span v-if="countToppingsInOrder(order) > 0" class="uk-text-muted">@{{ countToppingsInOrder(order) }} Toppings</span>
                                        <br>
                                        <span class="uk-text-right uk-text-bold uk-text-large">@{{ getOrderTotal(order) | dollars }}</span>
                                        <div class="uk-align-right">
                                            <button @click="removeOrderFromCart(index)" uk-icon="icon: trash"></button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="{{ asset('js/iceCream.js') }}"></script>


 
    </body>
</html>
