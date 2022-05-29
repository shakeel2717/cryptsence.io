<div>
    <div>
        <label class="mt-4">Amount you want to stake</label>
        <div class="mt-2">
            <input type="number" wire:model="amount" class="form-control" name="amount" id="amount"
                placeholder="Enter USDT Amount" value="{{ $amount }}">
        </div>
    </div>
    <div>
        <label class="mt-4">Duration: (in days)</label>
        <div class="mt-2">
            <input type="number" wire:model="duration" class="form-control" name="duration" id="duration"
                placeholder="30" value="{{ $duration }}">
        </div>
        <small>for example type 7 (for 1 week)</small>
    </div>
    <br>
    <div class="g-col-12 g-col-sm-6 g-col-xxl-3 intro-y">
        <div class="box p-5 zoom-in">
            <div class="mt-4">
                <div class="w-2/4 flex-none">
                    <div class="fs-lg fw-medium truncate">You'll Get after {{ $duration }} Days</div>
                    <div class="fs-4xl text-theme-1 fw-medium lh-1">{{ number_format($total, 4) }} CTSE</div>
                </div>
            </div>
        </div>
    </div>
</div>
