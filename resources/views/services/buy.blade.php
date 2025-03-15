<x-home></x-home>

@section('title', 'Buy Property')

<div class="container mx-auto mt-16 pt-12">
    <h1 class="text-xl font-bold">Buy Property</h1>
    <form id="payment-form" action="{{ route('process.purchase') }}" method="POST">
        @csrf
        <div class="mb-4">
            @include('shared.input', ['name' => 'name', 'label' => 'Name'])
        </div>
        <div class="mb-4">
            @include('shared.input', ['name' => 'phone', 'label' => 'Phone'])
        </div>
        <div class="mb-4">
            @include('shared.input', ['name' => 'email', 'label' => 'Email'])
        </div>
        <div class="mb-4">
            @include('shared.input', ['name' => 'message', 'type' => 'textarea', 'label' => 'Message'])
        </div>

        <div id="card-element">
            <!-- Stripe.js injects the Card Element -->
        </div>

        <button id="submit-button" class="py-2 w-full text-blue-700 bg-blue-200 border-2 border-blue-700 rounded-full shadow hover:bg-blue-800 hover:text-white mb-3">Submit</button>
    </form>
</div>

<x-footer></x-footer>

<script src="https://js.stripe.com/v3/"></script>
{{-- <script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {error, paymentIntent} = await stripe.confirmCardPayment(
            '{{ $clientSecret }}',
            {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: document.querySelector('input[name=name]').value,
                    },
                },
            }
        );

        if (error) {
            console.log(error);
        } else {
            form.submit();
        }
    });
</script> --}}
