	$(function() {
		 $('#click-order').click(function(){  // ���������� �� �������� �� �������� ����� �������
			 $('#overlay').fadeIn('fast',function(){ // ����� ����� ��������� ��� �������
				 $('#orderbox').animate({'top':'70px'},500); // � ������ ��������� ������� ��� ����
			 });
		 });
		 $('#order-close').click(function(){ // ������� �� �������� ������� �� ��� ����� ���������
			 $('#orderbox').animate({'top':'-900px'},500,function(){ // ������� ��� ����
				 $('#overlay').fadeOut('fast'); // � ������ ������� �������
			 });
		 });
	 });	
	$(function() {
		 $('#click-sign').click(function(){  // ���������� �� �������� �� �������� ����� �������
			 $('#overlay').fadeIn('fast',function(){ // ����� ����� ��������� ��� �������
				 $('#signbox').animate({'top':'160px'},500); // � ������ ��������� ������� ��� ����
			 });
		 });
		 $('#sign-close').click(function(){ // ������� �� �������� ������� �� ��� ����� ���������
			 $('#signbox').animate({'top':'-600px'},500,function(){ // ������� ��� ����
				 $('#overlay').fadeOut('fast'); // � ������ ������� �������
			 });
		 });
	 }); 
	 