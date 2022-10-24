{{ include('top.tpl') }}
<div class="preloader">
	<div class="preloader-top">
		<div class="preloader-top-sun">
			<div class="preloader-top-sun-bg"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-0"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-45"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-90"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-135"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-180"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-225"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-270"></div>
			<div class="preloader-top-sun-line preloader-top-sun-line-315"></div>
		</div>
	</div>
	<div class="preloader-bottom">
		<div class="preloader-bottom-line preloader-bottom-line-lg"></div>
		<div class="preloader-bottom-line preloader-bottom-line-md"></div>
		<div class="preloader-bottom-line preloader-bottom-line-sm"></div>
		<div class="preloader-bottom-line preloader-bottom-line-xs"></div>
	</div> 
</div>
<div class="wrapper">
	<section class="bordure">
	    <p>Météo</p>
	</section>

	<section class="contenu">
	    <h1>
	    	{{_ville|capitalize}}, {{_ville.country|upper}} 
	    	<a href="http://maps.google.com/maps?q={{_ville.coord.lat}},{{_ville.coord.lon}}" class="lk" target="_blank" title="Voir sur une carte">
	    		Voir sur une carte
	    	</a>
	    </h1>
	    {% for journee in _journees_meteo 
	    	<div class="jour">
	    		<div class="numero_jour">
	    			<h2>Météo du {{journee.dt|date('d/m/Y')}}</h2>
	    		</div>

			    <div class="temperature {{journee.meteo}}">
			      <h2>{{journee.temp.day}}<span class="degree-symbol">°</span>C</h2>
			    </div>

			    <ul>
			      <li class="fontawesome-leaf left">
			        <span>{{journee.speed}} km/h</span>
			      </li>
			      <li class="fontawesome-tint center">
			        <span>{{journee.humidity}}%</span>
			      </li>
			      <li class="fontawesome-dashboard right">
			        <span>{{journee.pressure}}</span>
			      </li>
			    </ul> 
			    <div class="description">
			    	Description : {{journee.weather|first.description|capitalize}}
			    </div>
			</div>
	    {% endfor %}

	    <div class="bullets">
	    	{% for i in 1..n_jours_previsions %}
	    		<span class="entypo-record" data-cible="{{i-1}}"></span>
	    	{% endfor %}
	    </div>

	</section>
</div>
{{ incle('bottom.tpl') }}