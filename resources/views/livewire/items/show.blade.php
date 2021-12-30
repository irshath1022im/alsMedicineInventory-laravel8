<div>
    <section class="container">
        <div class="row">
            <div class="col-md-4">
               @livewire('shared.item-component', ['item_id' => $item_id])
            </div>


                <div class="col-md-8 card">
                    <div class="card-body">
                        <div class="row">
                            <ul class="nav nav-pills nav-tabs" id="myTab" role="tablist">
                                 
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active " id="badges-tab" data-bs-toggle="tab" data-bs-target="#badges" type="button" role="tab" aria-controls="badges" aria-selected="true">BADGES</button>
                                </li>
                                
                                <li class="nav-item" role="presentation"   
                                    {{-- wire:click="$emit('itemReceivingsRequest', {{ $item_id }})" --}}
                                >     
                                    <button class="nav-link  " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">RECEIVING</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">CONSUMPTION</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="badges" role="tabpanel" aria-labelledby="badges-tab">          
                                    @livewire('badges.show-badges-by-item-id', ['item_id' => $item_id])
                                </div>

                                <div class="tab-pane fade show " id="home" role="tabpanel" aria-labelledby="home-tab" >
                                                            
                                    @livewire('shared.item-receivings', ['item_id' => $item_id])
                                </div>

                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">                            
                                    @livewire('shared.item-consumptions',  ['item_id' => $item_id])                               
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </div>

</section>
</div>
