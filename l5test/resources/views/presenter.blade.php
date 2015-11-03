<section id="streaming">
    <div class="container">
    	<div id="progressbar-container" class="wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2 class="page-header" id="stream-title">{{ $title }}</h2>
            <h3>{{ $pid }}</h3>
            
            @foreach ($tags as $tag)
    		<div class="progress">
            	<strong class="progress-label">{{ $tag }}</strong>
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    40% Complete (success)
                </div>
            </div>
			@endforeach   
        </div><!--/#progressbar-container-->
        </div>
	</section>