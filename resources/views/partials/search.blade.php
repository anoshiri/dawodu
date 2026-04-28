<div class="searching">
    <div class="container">
        <div class="row">
            <div class="col-8 text-center m-auto">
                <div class="v1search_form">
                    <form action="/articles/search" method="get">
                        @csrf

                        <input class="input-lg" type="text" name="param" placeholder="Search articles here...">
                        <button type="submit" class="cbtn1">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="close_btn">	<i class="fal fa-times"></i> </div>
</div>