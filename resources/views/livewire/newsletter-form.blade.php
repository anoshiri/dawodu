<div>
    <form action="/newsletter/subscribe">
        <input wire:model.defer="email" class="signup" type="email" placeholder="Your email address">
        <input wire:click="subscribe" wire:loading.attr="disabled" type="button" class="cbtn" value="sign up">
    </form>
    
    <div class="text-warning" wire:loading>Please wait!</div>
    <div class="text-success">{{ $notice }}</div>

    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
</div>
