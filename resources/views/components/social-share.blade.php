<div class="author_social inline text-right">
    Share: 
    <ul>
        <li><a href="https://wa.me/?text={{ $title.' '.$url }}" target="social">
            <i class="fab fa-whatsapp"></i></a>
        </li>

        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="social">
            <i class="fab fa-facebook-f"></i></a>
        </li>
        
        <!-- <li><a href="{{ config('contact.social-medial.youtube') }}" target="social">
            <i class="fab fa-youtube"></i></a>
        </li> -->
        
        <li><a href="https://twitter.com/intent/tweet?text={{ $title.' '.$url }}" target="social">
            <i class="fab fa-twitter"></i></a>
        </li>

        <li><a href="https://linkedin.com/shareArticle?mini=true&url= {{ $url }}" target="social">
            <i class="fab fa-linkedin"></i></a>
        </li>
    </ul>
</div>