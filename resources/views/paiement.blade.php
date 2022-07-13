
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-xl">participez</h1>
            <form action="{{ route('paiement.store', ['event' => $event->total_price_ht])  }}" id="form" method="post" class="my-4">
                @csrf
                <label for="email" value="email">
                <input id="email" type="email" name="email" >
                <label for="Address" value="Address" >
                <input id="address" type="text" name="address" >

                <label for="name" value="Name card">
                <input id="name" type="text" name="name" >

                <label for="city" value="city" >
                <input id="city" type="text" name="city" >
                <label for="zip_code" value="zip_code" >
                <input id="zip_code" type="text" name="zip_code" >


                <input type="hidden" name="payment_method" id="payment_method" >
                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>

                <button class="mt-3" id="submit-button">participez</button>
            </form>
            {{$event->total_price_ht}}
        </div>

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");

            const elements = stripe.elements();
            const cardElement = elements.create('card', {
                classes: {
                    base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
                }
            });

            cardElement.mount('#card-element');
            const cardButton = document.getElementById('submit-button');
            cardButton.addEventListener('click', async(e) => {
                e.preventDefault();
                const { paymentMethod, error } = await stripe.createPaymentMethod({
                    type: 'card',
                    card: cardElement,
                    billing_details: {
                        name: document.getElementById('name').value,
                        address: {
                            line1: document.getElementById('address').value,
                            city: document.getElementById('city').value,
                            postal_code: document.getElementById('zip_code').value,
                          },
                        email: document.getElementById('email').value
                    },

                })
                if (error) {
                    alert(error)
                } else {
                    document.getElementById('payment_method').value = paymentMethod.id;


                }

                document.getElementById('form').submit();

            })


        </script>
