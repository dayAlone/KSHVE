<div id="contacts" class="<?=(isset($_REQUEST['q'])?'open':'')?>">
	<span>Тел./факс: <a href="tel:84956170444">+7 (495) 617-04-44</a><a data-toggle="modal" data-target="#Call" class="call">перезвоните мне</a>E-mail: <a href="mailto:info@kremlin-ksk.ru">info@kremlin-ksk.ru</a></span>
	<a href="#" class="search"><?=svg('search')?></a>
	<div id="search">
		<form action="/search/">
			<input type="text" value="<?=$_REQUEST['q']?>" name="q">
		</form>
	</div>
</div>