	$(function() {
		 $('#click-order').click(function(){  // добираемся до элемента по которому будем кликать
			 $('#overlay').fadeIn('fast',function(){ // после клика запускаем наш оверлэй
				 $('#orderbox').animate({'top':'70px'},500); // а теперь аккуратно выводим наш блок
			 });
		 });
		 $('#order-close').click(function(){ // кликаем по элементу который всё это будет закрывать
			 $('#orderbox').animate({'top':'-900px'},500,function(){ // убираем наш блок
				 $('#overlay').fadeOut('fast'); // и теперь убираем оверлэй
			 });
		 });
	 });	
	$(function() {
		 $('#click-sign').click(function(){  // добираемся до элемента по которому будем кликать
			 $('#overlay').fadeIn('fast',function(){ // после клика запускаем наш оверлэй
				 $('#signbox').animate({'top':'160px'},500); // а теперь аккуратно выводим наш блок
			 });
		 });
		 $('#sign-close').click(function(){ // кликаем по элементу который всё это будет закрывать
			 $('#signbox').animate({'top':'-600px'},500,function(){ // убираем наш блок
				 $('#overlay').fadeOut('fast'); // и теперь убираем оверлэй
			 });
		 });
	 }); 
	 