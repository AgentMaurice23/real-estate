<x-home></x-home>
<div class="py-14"></div>

<div class="container mx-auto py-8">
    {{-- <h1 class="flex  items-center mt-10 justify-center">Booster votre {{ ucfirst($type) }}</h1> --}}
    <div class="flex md:flex-col flex-wrap md:flex-nowrap shadow-lg  justify-center">
        <div class="w-1/2 p-8 bg-blue-500 text-white relative rounded-2xl">
            <h2 class="text-2xl mt-6 font-bold mb-4">Détails de l'annonce</h2>
            <img class="w-full h-48 object-cover mb-4" 
                src="{{ $type === 'property' ? asset('storage/' . $item->fichiers[0]) : ($type === 'land' ? asset('storage/' . $item->images[0]) : asset('storage/' . $item->images[0])) }}" 
                alt="Image"/>
            <h3 class="text-xl font-semibold">{{ $item->title }}</h3>
            <p>{{ $item->description }}</p>
        </div>
        <div class="w-1/2 p-8 bg-white">
            <h2 class="text-2xl font-bold mb-4">Booster votre annonce</h2>
            <form id="boostForm" action="{{ route('subscriptions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="{{ $type }}">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="mb-4">
                    <label for="duration" class="block text-lg font-medium">Durée (jours):</label>
                    <input type="number" name="duration" class="w-full p-2 border rounded" min="1" value="1">
                </div>
                <div class="mb-4">
                    <label for="payment_method" class="block text-lg font-medium">Moyen de paiement:</label>
                    <select name="payment_method" class="w-full p-2 border rounded">
                        <option value="credit_card">Carte de crédit</option>
                        <option value="paypal">PayPal</option>
                        <option value="bank_transfer">Virement bancaire</option>
                    </select>
                </div>
                <button type="button" class="bg-blue-500 text-white p-2 rounded" onclick="checkBoostStatus()">Booster</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="boostModal" tabindex="-1" aria-labelledby="boostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="boostModalLabel">Confirmation de Boost</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Un boostage est déjà en cours. Voulez-vous vraiment annuler l'actuel et en créer un nouveau ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="submitBoostForm()">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    function checkBoostStatus() {
        // Assurez-vous de remplacer cette URL par l'URL réelle de votre API ou endpoint
        fetch(`/api/check-boost-status?item_id={{ $item->id }}&type={{ $type }}`)
            .then(response => response.json())
            .then(data => {
                if (data.boosting) {
                    // Ouvrir le modal de confirmation
                    var myModal = new bootstrap.Modal(document.getElementById('boostModal'));
                    myModal.show();
                } else {
                    // Soumettre le formulaire directement si aucun boostage en cours
                    submitBoostForm();
                }
            });
    }

    function submitBoostForm() {
        document.getElementById('boostForm').submit();
    }
</script>
{{-- 
<style>
    .semi-circle {
        position: relative;
        overflow: hidden;
    }

    .semi-circle::before {
        content: '';
        position: absolute;
        top: 0;
        left: -50%;
        width: 200%;
        height: 200%;
        background-color: #3B82F6; /* Tailwind's blue-500 */
        border-radius: 50%;
        z-index: -1;
    }
</style> --}}
