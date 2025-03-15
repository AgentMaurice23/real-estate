<x-home>

</x-home>
   
<div class="container mx-auto mt-10 py-8">
    <div class="py-8">
        <div class="grid grid-cols-3 gap-4">
        <div class="">
            <div class="col-span-2 lg:col-span-1 overflow-auto bg-white py-3">
                <div class="bg-gray-900 py-3">
                    <h2 class="text-white text-center text-xl">Gestion des Locations et Ventes</h2>
                </div>
                <div class="bg-gray-100 p-4">
                    <p class="text-lg flex items-center justify-center">
                        Notre plateforme SaaS fournit une solution complète pour gérer efficacement les locations et les ventes de biens immobiliers. Grâce à une interface intuitive, les utilisateurs peuvent facilement publier des annonces, suivre les offres, et communiquer avec les clients potentiels. Les outils de gestion automatisée aident à maintenir un suivi précis des contrats, des paiements, et des calendriers de location, réduisant ainsi le temps et les efforts nécessaires pour gérer plusieurs propriétés simultanément.
                    </p>
                </div>
            </div>
            
            <div class="col-span-6 lg:col-span-3 overflow-auto bg-white py-3">
                <div class="bg-gray-900 py-3">
                    <h2 class="text-white text-center text-xl">Avantages pour les Agents</h2>
                </div>
                <div class="bg-gray-100 p-4">
                    <p class="text-lg flex items-center justify-center">
                        Notre plateforme offre de nombreux avantages pour les agents immobiliers. En plus de simplifier la gestion des annonces et des transactions, elle permet d'accéder à des outils de marketing avancés pour promouvoir les propriétés. Les agents peuvent utiliser des tableaux de bord personnalisés pour suivre les performances et les tendances du marché, recevoir des notifications en temps réel pour les nouvelles offres et les interactions des clients, et bénéficier d'un support client dédié pour maximiser leur efficacité et leur productivité.
                    </p>
                </div>
            </div>
                
        </div>
        <div class="col-span-2 lg:col-span-1 bg-white py-3">
            <div class="bg-gray-900 py-3">
                <h2 class="text-white text-center text-xl">Discussion</h2>
            </div>
            <div class="bg-gray-100 p-4  overflow-auto">
                @include('Chatify::layouts.headLinks')
                <div class="messenger">
                    {{-- ----------------------Users/Groups lists side---------------------- --}}
                    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                
                        {{-- tabs and lists --}}
                        <div class="m-body contacts-container">
                        {{-- Lists [Users/Group] --}}
                        {{-- ---------------- [ User Tab ] ---------------- --}}
                        <div class="show messenger-tab users-tab app-scroll" data-view="users">
                            {{-- Favorites --}}
                            <div class="favorites-section">
                                <p class="messenger-title">
                                    {{-- <span>Favorites</span> --}}
                                </p>
                                <div class="messenger-favorites app-scroll-hidden"></div>
                            </div>
                        </div>
                            
                        </div>
                    </div>

                    {{-- ----------------------Messaging side---------------------- --}}
                    <div class="messenger-messagingView overflow-auto">
                        {{-- header title [conversation name] amd buttons --}}
                        <div class="m-header m-header-messaging">
                            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                {{-- header back button, avatar and user name --}}
                                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                    </div>
                                    <a href="#" class="user-name">{{ config('chatify.firtname') }}</a>
                                </div>
                                {{-- header buttons --}}
                                <nav class="m-header-right">
                                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                    <a href="/"><i class="fas fa-home"></i></a>
                                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                </nav>
                            </nav>
                            {{-- Internet connection --}}
                            <div class="internet-connection">
                                <span class="ic-connected">Connected</span>
                                <span class="ic-connecting">Connecting...</span>
                                <span class="ic-noInternet">No internet access</span>
                            </div>
                        </div>

                        {{-- Messaging area --}}
                        <div class="m-body messages-container overflow-y-auto app-scroll">
                            <div class="messages">
                                <p class="message-hint center-el">
                                    {{-- <span>Please select a chat to start messaging</span> --}}
                                </p>
                            </div>
                            {{-- Typing indicator --}}
                            <div class="typing-indicator">
                                <div class="message-card typing">
                                    <div class="message">
                                        <span class="typing-dots">
                                            <span class="dot dot-1"></span>
                                            <span class="dot dot-2"></span>
                                            <span class="dot dot-3"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {{-- Send Message Form --}}
                            @include('Chatify::layouts.sendForm')
                        </div>
                   
                    </div>
                
                </div>

                @include('Chatify::layouts.modals')
                @include('Chatify::layouts.footerLinks')

            </div>
        </div>
    </div>
    </div>
    
</div>
{{--  --}}