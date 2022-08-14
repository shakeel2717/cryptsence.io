<div class="col-lg-4">
    <div class="g-col-12 g-col-xl-8 mt-6">
        <div class="intro-y d-block d-sm-flex align-items-center h-10">
            <h2 class="fs-lg fw-medium truncate me-5">
                Your CTSE Receiving Addresses
            </h2>
        </div>
        <div class="intro-y box p-5 mt-12 mt-sm-5">
            <div class="justify-content-center-around">
            </div>
            <div class="form-group">
                <input type="text" wire:model='address0' wire:change='address0' class="form-control" placeholder="Address 01" value="{{ $address0 }}">
            </div>
            <div class="form-group mt-3">
                <input type="text" wire:model='address1' wire:change='address1' class="form-control" placeholder="Address 02" value="{{ $address1 }}">
            </div>
            <div class="form-group mt-3">
                <input type="text" wire:model='address2' wire:change='address2' class="form-control" placeholder="Address 03" value="{{ $address2 }}">
            </div>
        </div>
    </div>
</div>