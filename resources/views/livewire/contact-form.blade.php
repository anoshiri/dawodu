<div>
    <form action="/contact">
        
        @if ($notice)
        <div class="alert alert-success">{{ $notice }}</div>
        @endif

        <div class="row">
            <div class="col-12">
                <h3>We'd love to hear from you</h3>
            </div>

            <div class="col-lg-6">
                <input type="text" wire:model="fullName"  placeholder="Your name">
                @error('fullName') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-lg-6">
                <input type="email" wire:model="email" placeholder="Your email address">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <input type="text" wire:model="subject" placeholder="Subject">
                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="col-12">
                <textarea wire:model="message" name="message" id="message" cols="30" rows="5" placeholder="What questions or comments do you have for us?"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
                <div class="space-20"></div>
                <input wire:click="send" class="cbtn1" type="button" value="Send">
            </div>
        </div>
    </form>
</div>
